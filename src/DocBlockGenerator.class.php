<?php


/**
 * Class DocBlockGenerator
 *
 * Generates docblocks
 */
class DocBlockGenerator
{
    /**
     * Returns new docblock with proper indentation,
     * containing specified annotations line-by-line
     *
     * @param $annotations array
     * @param $identation integer
     *
     * @return string
     */
    public function getNewDocblockForAnotations($annotations, $indentation = 0)
    {
        $indent = str_repeat(' ', $indentation);

        $newDocComment = $indent . '/**' . "\n";
        foreach ($annotations as $annotation) {
            $newDocComment .= $indent . ' * ' . $annotation . "\n";
        }
        $newDocComment .= $indent . ' */' . "\n";

        return $newDocComment;
    }
}