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
            $pattern = '#\s*\*\s*' . $annotation . '\s+.*\s*(\n)#';
            $docBlock = preg_replace($pattern, '\\1', $docBlock);
        }

        $docBlock = $this->clearEmptyDocBlock($docBlock);
        return $docBlock;
    }

    /**
     * Returns empty string if input is an empty docblock
     * or the input docblock otherwise
     * 
     * @param string $docBlock
     * @return string
     */
    protected function clearEmptyDocBlock($docBlock) {
        $pattern = '#\s*\/\*\*\s*\*\/\s*#m';
        $docBlock = preg_replace($pattern, '', $docBlock);
        return $docBlock;
    }
}
