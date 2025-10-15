<?php

namespace Hexlet\Code\Formatters;

class StylishFormatter
{
    private const int SPACES_IN_INDENT = 4;
    public static function formatDiffToStylish(array $diff, int $enclosure = 1): string
    {
        $formattedDiff = '';
        foreach ($diff as $key => $value) {
            $spacesStr = str_repeat(' ', $enclosure * self::SPACES_IN_INDENT);
            $spacesForSignedElements = str_repeat(' ', $enclosure * self::SPACES_IN_INDENT - 2);
            if (isset($value['value']) && is_array($value['value'])) {
                $state = $spacesStr;
                if (isset($value['state'])) {
                    $state = $value['state'] == 'added' ? '+' : '-';
                    $state = $spacesForSignedElements . $state;
                }
                $childArray = self::formatDiffToStylish($value['value'], $enclosure + 1);
                $formattedDiff .= "$state $key: {\n" . $childArray . $spacesStr . "}\n";
            } elseif (!isset($value['state']) && is_array($value)) {
                $childArray = self::formatDiffToStylish($value, $enclosure + 1);
                $formattedDiff .= $spacesStr . "$key: {\n" . $childArray . $spacesStr . "}\n";
            } elseif (!isset($value['state'])) {
                $formattedDiff .= "{$spacesStr}$key: $value\n";
            } elseif ($value['state'] == 'changed') {
                if (is_array($value['prevValue'])) {
                    $childArray = self::formatDiffToStylish($value['prevValue'], $enclosure + 1);
                    $formattedDiff .= $spacesForSignedElements . "- $key: {\n" . $childArray . $spacesStr . "}\n";
                } else {
                    $formattedDiff .= $spacesForSignedElements . '- ' . $key . ': ' . $value['prevValue'] . "\n";
                }
                if (is_array($value['newValue'])) {
                    $childArray = self::formatDiffToStylish($value['newValue'], $enclosure + 1);
                    $formattedDiff .= $spacesForSignedElements . "+ $key: {\n" . $childArray . $spacesStr . "}\n";
                } else {
                    $formattedDiff .= "$spacesForSignedElements+ $key: {$value['newValue']}\n";
                }
            } elseif ($value['state'] == 'correct') {
                $formattedDiff .= "{$spacesStr}$key: {$value['value']}\n";
            } elseif ($value['state'] == 'added') {
                $formattedDiff .= $spacesForSignedElements . '+ ' . $key . ': ' . $value['value'] . "\n";
            } elseif ($value['state'] == 'removed') {
                $formattedDiff .= $spacesForSignedElements . '- ' . $key . ': ' . $value['value'] . "\n";
            }
        }
        return $enclosure !== 1 ? $formattedDiff : "{\n$formattedDiff}\n";
    }
}
