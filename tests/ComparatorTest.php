<?php
require_once __DIR__."/../vendor/autoload.php";

use PhpUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use Hexlet\Code\Parser;

class ComparatorTest extends TestCase
{
    public static function compareProvider(): array
    {
        return [
            'JSON files comparison: '=>['tests/fixtures/file1.json','tests/fixtures/file2.json','/fixtures/comparation_one_result.txt'],
            'YAML files comparison: '=>['tests/fixtures/file1.yml','tests/fixtures/file2.yml','/fixtures/comparation_one_result.txt'],
            'JSON nested files comparison: '=>['tests/fixtures/file1_nested.json','tests/fixtures/file2_nested.json','/fixtures/comparation_nested_result.txt'],
        ];
    }
    #[DataProvider('compareProvider')]
    public function testCompare(string $file1Path,string $file2Path, string $resultFilePath):void {
        $file1=Parser::parseFile($file1Path);
        $file2=Parser::parseFile($file2Path);
        $diff=\Hexlet\Code\Comparator::compare($file1, $file2);
        $this->assertStringEqualsFile(__DIR__.$resultFilePath,$diff);
    }
}