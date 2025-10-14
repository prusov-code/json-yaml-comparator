<?php
require_once __DIR__."/../vendor/autoload.php";

use PhpUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;
use Hexlet\Code\Parser;
use Hexlet\Code\Comparator;

class ComparatorTest extends TestCase
{
    public static function compareProvider(): array
    {
        return [
            'JSON files diff generation: '=>['tests/fixtures/file1_nested.json','tests/fixtures/file2_nested.json','/fixtures/comparation_result_stylish.json'],
            'YAML files diff generation: '=>['tests/fixtures/file1_nested.yml','tests/fixtures/file2_nested.yml','/fixtures/comparation_result_stylish.json'],
        ];
    }
    #[DataProvider('compareProvider')]
    public function testCompare(string $file1Path,string $file2Path, string $resultFilePath):void {
        $file1=Parser::parseFile($file1Path);
        $file2=Parser::parseFile($file2Path);
        $diff=Comparator::compare($file1, $file2);
        $comparationCorrectResult = json_decode(file_get_contents(__DIR__ . $resultFilePath),true);
        $this->assertEquals($comparationCorrectResult,$diff);
    }
}