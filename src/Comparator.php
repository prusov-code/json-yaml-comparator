<?php

namespace PrusovCode\JsonYamlComparator;

use PrusovCode\JsonYamlComparator\Differ;
use PrusovCode\JsonYamlComparator\Formatter;
use PrusovCode\JsonYamlComparator\Parser;

function compare(string $pathToFile1, string $pathToFile2, string $format = 'stylish'): string|false
{
    try {
        $file1Content = Parser::parseFile($pathToFile1);
        $file2Content = Parser::parseFile($pathToFile2);
    } catch (\Exception $e) {
        echo $e->getMessage();
        return false;
    }
    $diff = Differ::genDiff((array)$file1Content, (array)$file2Content);
    return Formatter::formatDiff($diff, $format);
}
