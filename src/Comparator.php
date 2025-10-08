<?php

namespace Hexlet\Code;
use function Funct\Collection\sortBy;
class Comparator
{
    public static function getDiff(array $array1, array $array2):string {
        $mergedKeys=array_unique(array_merge(array_keys($array1),array_keys($array2)));
        $sortedKeys=sortBy($mergedKeys,fn($item)=>$item);
        $resultString='';
        foreach($sortedKeys as $key) {
            $isInArray1=isset($array1[$key]);
            $isInArray2=isset($array2[$key]);
            if($isInArray1 && $isInArray2) {
                $value1=$array1[$key];
                $value2=$array2[$key];
                if($value1==$value2) {
                    $resultString.="    $key: $value1\n";
                }
                else {
                    $resultString.="  - $key: $value1\n  + $key: $value2\n";
                }
            }
            elseif($isInArray1) {
                $resultString.="  - $key: $array1[$key] \n";
            }
            else {
                $resultString.="  + $key: $array2[$key]\n";
            }
        }
        return "{\n$resultString}\n";
    }
}