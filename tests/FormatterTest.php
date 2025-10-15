<?php

namespace PrusovCode\JsonYamlComparator\Tests;

use PrusovCode\JsonYamlComparator\Formatter;
use PrusovCode\JsonYamlComparator\Parser;
use PrusovCode\JsonYamlComparator\Comparator;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;

class FormatterTest extends TestCase
{
    public static function formatterProvider(): array
    {
        return [
            'JSON files diff: ' => ['tests/fixtures/file1_nested.json','tests/fixtures/file2_nested.json'],
            'YAML files diff: ' => ['tests/fixtures/file1_nested.yml','tests/fixtures/file2_nested.yml'],
        ];
    }
    public static function getDiff(string $file1Path, string $file2Path)
    {
        $file1 = Parser::parseFile($file1Path);
        $file2 = Parser::parseFile($file2Path);
        return Comparator::compare($file1, $file2);
    }
    #[DataProvider('formatterProvider')]
    public function testStylishFormat(string $file1Path, string $file2Path): void
    {
        $formattedDiff = Formatter::formatDiff(self::getDiff($file1Path, $file2Path), 'stylish');
        $this->assertStringEqualsFile(__DIR__ . '/fixtures/stylish_formatting_result.txt', $formattedDiff);
    }
    #[DataProvider('formatterProvider')]
    public function testPlainFormat(string $file1Path, string $file2Path): void
    {
        $formattedDiff = Formatter::formatDiff(self::getDiff($file1Path, $file2Path), 'plain');
        $this->assertStringEqualsFile(__DIR__ . '/fixtures/plain_formatting_result.txt', $formattedDiff);
    }
    #[DataProvider('formatterProvider')]
    public function testJsonFormat(string $file1Path, string $file2Path): void
    {
        $formattedDiff = Formatter::formatDiff(self::getDiff($file1Path, $file2Path), 'json');
        $this->assertStringEqualsFile(__DIR__ . '/fixtures/json_formatting_result.txt', $formattedDiff);
    }
}
