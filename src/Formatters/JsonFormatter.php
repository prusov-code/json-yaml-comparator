<?php

namespace Hexlet\Code\Formatters;

class JsonFormatter
{
    public static function formatDiffToJson(array $diff):string {
        return json_encode($diff,JSON_PRETTY_PRINT);
    }
}