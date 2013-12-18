<?php

/**
 * Class DocBlockRemover
 *
 * Removes docblocks
 */
class DocBlockRemover {

    /**
     * Removes from docblock text lines containing specified 
     * annotations 
     *
     * @param $docBlock string
     * @param $annotations array
     *
     * @return string
     */
    public function removeAnnotationsFromDocblock($annotations, $docBlock) {
        foreach ($annotations as $annotation) {
            $pattern = '#\s*\*\s*' . $annotation . '\s*#';
            $docBlock = preg_replace($pattern, '', $docBlock);
        }

        $pattern = '#\s*\/\*\*\s*\*\/\s*#m';
        $docBlock = preg_replace($pattern, '', $docBlock);
        return $docBlock;
    }

}
