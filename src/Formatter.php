<?php

namespace Hexlet\Code;

use Hexlet\Code\Formatters\StylishFormatter;
use Hexlet\Code\Formatters\PlainFormatter;
use Hexlet\Code\Formatters\JsonFormatter;

class Formatter
{
    public static function formatDiff(array $diff, string $outputFormat): string
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
