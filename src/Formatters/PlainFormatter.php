<?php

namespace Hexlet\Code\Formatters;

class PlainFormatter
{
    public static function formatDiffToPlain(array $diff, int $enclosure = 1, string $fullPath = ''): string
    {
        $formattedDiff = '';
        foreach ($diff as $key => $value) {
            $currentFullPath = $enclosure === 1 ? $key : "$fullPath.$key";
            if (isset($value['value']) && is_array($value['value'])) {
                if (isset($value['state'])) {
                    $status = $value['state'] === 'added' ? 'was added with value: [complex value]' : 'was removed';
                    $formattedDiff .= "Property '$currentFullPath' $status\n";
                } else {
                    $formattedDiff .= self::formatDiffToPlain($value['value'], $enclosure + 1, $currentFullPath);
                }
            } elseif (!isset($value['state']) && is_array($value)) {
                $formattedDiff .= self::formatDiffToPlain($value, $enclosure + 1, $currentFullPath);
            } elseif (!isset($value['state'])) {
                continue;
            } elseif ($value['state'] === 'changed') {
                $unStringifiedPrevValue = self::unStringifyValue($value['prevValue']);
                $unStringifiedNewValue = self::unStringifyValue($value['newValue']);
                $prevValue = is_array($value['prevValue']) ? '[complex value]' : $unStringifiedPrevValue;
                $newValue = is_array($value['newValue']) ? '[complex value]' : $unStringifiedNewValue;
                $formattedDiff .= "Property '$currentFullPath' was updated. From $prevValue to $newValue\n";
            } elseif ($value['state'] === 'added') {
                $unStringifiedValue = self::unStringifyValue($value['value']);
                $formattedDiff .= "Property '$currentFullPath' was added with value: $unStringifiedValue\n";
            } elseif ($value['state'] === 'removed') {
                $formattedDiff .= "Property '$currentFullPath' was removed\n";
            }
        }
        return $formattedDiff;
    }
    public static function unStringifyValue(mixed $value): mixed
    {
        if ($value === 'false' || $value === 'true' || $value === 'null') {
            return $value;
        } else {
            return var_export($value, true);
        }
    }
}
