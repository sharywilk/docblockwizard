<?php

class DocBlockRemoverTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var DocBlockRemover
     */
    private $testObject;

    public static function setUpBeforeClass()
    {
        echo get_include_path();
        include_once(dirname(dirname(__FILE__)) . '/src/DocBlockRemover.class.php');
    }

    public function setUp()
    {
        parent::setUp();
        $this->testObject = new DocBlockRemover();
    }

    public function tearDown()
    {
        parent::tearDown();
        $this->testObject = null;
    }

    /**
     * @dataProvider newDocblockTestDataProvider
     */
    public function testRemoveAnnotationsFromDocblock($inAnnotations, $inDocBlock, $expOutput)
    {
        $actOutput = $this->testObject->removeAnnotationsFromDocblock($inAnnotations, $inDocBlock);
        $this->assertEquals($expOutput, $actOutput);
    }

    /**
     * @TODO: provide real data sets, do not generate them using
     * same logic as tested method as it's pointless
     */
    public function newDocblockTestDataProvider()
    {
        $dataSets = [];
        $annotation = '@annotation';
        $annotation1 = '@annotation1';
        $annotation2 = '@annotation2';

        $docBlock = <<<EOF
/**
 * @annotation Annotation
 */
EOF;
        $expDocBlock = '';
        $dataSets []= [
            [$annotation],
            $docBlock,
            $expDocBlock
        ];
        
        $docBlock = <<<EOF
/**
 * @annotation Annotation
 * @annotation1 Annotation1
 */
EOF;
        $expDocBlock = <<<EOF
/**
 * @annotation1 Annotation1
 */
EOF;
        $dataSets []= [
            [$annotation],
            $docBlock,
            $expDocBlock
        ];
        
        $expDocBlock = '';
        $dataSets []= [
            [$annotation, $annotation1],
            $docBlock,
            $expDocBlock
        ];

        return $dataSets;
    }
}