<?php

namespace Hexlet\Code;
use function Funct\Collection\sortBy;
class Comparator
{
    public static function compare(array $array1, array $array2):string {
        $mergedKeys=array_unique(array_merge(array_keys($array1),array_keys($array2)));
        $sortedKeys=sortBy($mergedKeys,fn($item)=>$item);
        $resultString='';
        foreach($sortedKeys as $key) {
            $isInArray1=isset($array1[$key]);
            $isInArray2=isset($array2[$key]);
            $value1=$array1[$key]??'';
            $value2=$array2[$key]??'';
            $value1=self::stringifyValue($value1);
            $value2=self::stringifyValue($value2);
            if($isInArray1 && $isInArray2) {
                if($value1===$value2) {
                    $resultString.="    $key: $value1\n";
                }
                else {
                    $resultString.="  - $key: $value1\n  + $key: $value2\n";
                }
            }
            elseif($isInArray1) {
                $resultString.="  - $key: $value1\n";
            }
            else {
                $resultString.="  + $key: $value2\n";
            }
        }
        return "{\n$resultString}\n";
    }
    private static function stringifyValue(mixed $value):string {
        if(is_bool($value)) {
            return $value ? 'true' : 'false';
        }
        elseif(is_null($value)) {
            return 'null';
        }
        return $value;
    }
}