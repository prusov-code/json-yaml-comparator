<?php

namespace Hexlet\Code;

use function Funct\Collection\sortBy;

class Comparator
{
    public static function compare(array $array1, array $array2, int $spacesCount = 1): array
    {
        $mergedKeys = array_unique(array_merge(array_keys($array1), array_keys($array2)));
        $sortedKeys = sortBy($mergedKeys, fn($item)=>$item);
        $diff = [];
        foreach ($sortedKeys as $key) {
            $isInArray1 = array_key_exists($key, $array1);
            $isInArray2 = array_key_exists($key, $array2);
            $value1 = $array1[$key] ?? null;
            $value2 = $array2[$key] ?? null;
            if (is_array($value1) && is_array($value2)) {
                 $diff[$key] = self::compare($value1, $value2, $spacesCount);
                 continue;
            }
            $value1 = self::stringifyValue($value1);
            $value2 = self::stringifyValue($value2);
            if ($isInArray1 && $isInArray2) {
                if ($value1 === $value2) {
                    $diff[$key] = ['state' => 'correct','value' => $value1];
                } else {
                    $diff[$key] = ['state' => 'changed','prevValue' => $value1, 'newValue' => $value2];
                }
            } elseif ($isInArray1) {
                $diff[$key] = ['state' => 'removed','value' => $value1];
            } else {
                $diff[$key] = ['state' => 'added','value' => $value2];
            }
        }
        return $diff;
    }
    private static function stringifyValue(mixed $value): mixed
    {
        if (is_bool($value)) {
            return $value ? 'true' : 'false';
        } elseif (is_null($value)) {
            return 'null';
        }
        return $value;
    }
}
