<?php

namespace Hexlet\Code;

class Parser
{
    public static function parseFile(string $filePath): mixed
    {
        $fileContent = @file_get_contents($filePath);
        if ($fileContent === false) {
            throw new \Exception("[ERROR]: Can't read file: $filePath. Please check the file path and try again.\n");
        }
        return json_decode($fileContent, true);
    }
}
