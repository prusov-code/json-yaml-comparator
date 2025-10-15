<?php

namespace Differ\Differ;

use Hexlet\Code\Comparator;
use Hexlet\Code\Formatter;
use Hexlet\Code\Parser;

function genDiff($pathToFile1, $pathToFile2, string $format = 'stylish')
{
    try {
        $file1Content = Parser::parseFile($pathToFile1);
        $file2Content = Parser::parseFile($pathToFile2);
    } catch (\Exception $e) {
        echo $e->getMessage();
        return;
    }
    $diff = Comparator::compare((array)$file1Content, (array)$file2Content);
    return Formatter::formatDiff($diff, $format);;
}
