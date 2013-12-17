<?php

class DocBlockGeneratorTest extends PHPUnit_Framework_TestCase
{
    /**
     * @var DocBlockGenerator
     */
    private $testObject;

    public static function setUpBeforeClass()
    {
        echo get_include_path();
        include_once(dirname(dirname(__FILE__)) . '/src/DocBlockGenerator.class.php');
    }

    public function setUp()
    {
        parent::setUp();
        $this->testObject = new DocBlockGenerator();

    }

    public function tearDown()
    {
        parent::tearDown();
        $this->testObject = null;
    }

    /**
     * @dataProvider newDocblockTestDataProvider
     */
    public function testGetNewDocblockForAnotations($inAnnotation, $inIntendation, $expOutput)
    {
        $actOutput = $this->testObject->getNewDocblockForAnotations($inAnnotation, $inIntendation);
        $this->assertEquals($expOutput, $actOutput);
    }

    public function newDocblockTestDataProvider()
    {
        $dataSets = [];
        $annotation = '@annotation Annotation';
        $annotation1 = '@annotation Annotation1';
        $annotation2 = '@annotation Annotation2';

        for ($indentation = 0; $indentation < 8; $indentation++) {
            $indent = str_repeat(' ', $indentation);

            $dataSets [] = [
                [$annotation],
                $indentation,
                $indent . '/**' . "\n"
                . $indent . ' * ' . $annotation . "\n"
                . $indent . ' */' . "\n"
            ];
            $dataSets [] = [
                [
                    $annotation1,
                    $annotation2
                ],
                $indentation,
                $indent . '/**' . "\n"
                . $indent . ' * ' . $annotation1 . "\n"
                . $indent . ' * ' . $annotation2 . "\n"
                . $indent . ' */' . "\n"
            ];
        }
        return $dataSets;
    }
}