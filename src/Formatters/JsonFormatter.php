<?php

namespace Hexlet\Code\Formatters;

class JsonFormatter
{
    public static function formatDiffToJson(array $diff): string|false
    {
        return json_encode($diff, JSON_PRETTY_PRINT);
    }
}
