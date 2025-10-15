<?php

namespace PrusovCode\JsonYamlComparator;

use PrusovCode\JsonYamlComparator\Formatters\StylishFormatter;
use PrusovCode\JsonYamlComparator\Formatters\PlainFormatter;
use PrusovCode\JsonYamlComparator\Formatters\JsonFormatter;

class Formatter
{
    public static function formatDiff(array $diff, string $outputFormat): string|false
    {
        $outputFormat = trim(mb_strtolower($outputFormat));
        switch ($outputFormat) {
            case 'plain':
                return PlainFormatter::formatDiffToPlain($diff);
            case 'json':
                return JsonFormatter::formatDiffToJson($diff);
            default:
                return StylishFormatter::formatDiffToStylish($diff);
        }
    }
}
