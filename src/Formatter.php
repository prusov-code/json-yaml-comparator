<?php

namespace Hexlet\Code;

use Hexlet\Code\Formatters\StylishFormatter;
use Hexlet\Code\Formatters\PlainFormatter;

class Formatter
{
    public static function formatDiff(array $diff, string $outputFormat): string
    {
        $outputFormat = trim(mb_strtolower($outputFormat));
        switch ($outputFormat) {
            case 'plain':
                return PlainFormatter::formatDiffPlain($diff);
            default:
                return StylishFormatter::formatDiffStylish($diff);
        }
    }
}
