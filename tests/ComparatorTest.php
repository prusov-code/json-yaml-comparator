<?php

namespace PrusovCode\JsonYamlComparator\Tests;

use PhpUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use PrusovCode\JsonYamlComparator\Parser;
use PrusovCode\JsonYamlComparator\Differ;

class ComparatorTest extends TestCase
{
    public static function compareProvider(): array
    {
        return [
            'JSON files diff generation: ' => [
                'tests/fixtures/file1_nested.json',
                'tests/fixtures/file2_nested.json',
                '/fixtures/comparation_result.json'],
            'YAML files diff generation: ' => [
                'tests/fixtures/file1_nested.yml',
                'tests/fixtures/file2_nested.yml',
                '/fixtures/comparation_result.json'],
        ];
    }
    #[DataProvider('compareProvider')]
    public function testCompare(string $file1Path, string $file2Path, string $resultFilePath): void
    {
        $file1 = Parser::parseFile($file1Path);
        $file2 = Parser::parseFile($file2Path);
        $diff = Differ::genDiff($file1, $file2);
        $comparationCorrectResult = json_decode(file_get_contents(__DIR__ . $resultFilePath), true);
        $this->assertEquals($comparationCorrectResult, $diff);
    }
}
