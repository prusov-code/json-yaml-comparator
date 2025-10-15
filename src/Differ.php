<?php

namespace PrusovCode\JsonYamlComparator;

use PrusovCode\JsonYamlComparator\Comparator;
use PrusovCode\JsonYamlComparator\Formatter;
use PrusovCode\JsonYamlComparator\Parser;

function genDiff(string $pathToFile1, string $pathToFile2, string $format = 'stylish'): string|false
{
    try {
        $file1Content = Parser::parseFile($pathToFile1);
        $file2Content = Parser::parseFile($pathToFile2);
    } catch (\Exception $e) {
        echo $e->getMessage();
        return '';
    }
    $diff = Comparator::compare((array)$file1Content, (array)$file2Content);
    return Formatter::formatDiff($diff, $format);
}
