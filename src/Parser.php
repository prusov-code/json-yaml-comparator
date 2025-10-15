<?php

namespace Hexlet\Code;

use Symfony\Component\Yaml\Yaml;

class Parser
{
    public static function parseFile(string $filePath): mixed
    {
        $fileContent = @file_get_contents($filePath);

        if ($fileContent === false) {
            throw new \UnexpectedValueException("[ERROR]: Can't read file: $filePath." .
                "Please check the file path and try again.\n");
        }

        $extension = mb_strtolower(pathinfo($filePath, PATHINFO_EXTENSION));
        if ($extension === "json") {
            $parsedData = json_decode($fileContent, true);
        } elseif ($extension === "yml" || $extension === "yaml") {
            $parsedData = Yaml::parse($fileContent);
        } else {
            throw new \UnexpectedValueException("[ERROR]: Unsupported file type." .
                "Please use .json or .yml files only\n");
        }

        return $parsedData;
    }
}
