<?php


use Hexlet\Code\Formatter;
use Hexlet\Code\Parser;
use Hexlet\Code\Comparator;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;

class FormatterTest extends TestCase
{
    public static function formatterProvider(): array
    {
        return [
            'JSON files diff formatting: '=>['tests/fixtures/file1_nested.json','tests/fixtures/file2_nested.json','/fixtures/formatting_result.txt'],
            'YAML files diff formatting: '=>['tests/fixtures/file1_nested.yml','tests/fixtures/file2_nested.yml','/fixtures/formatting_result.txt'],
        ];
    }
    #[DataProvider('formatterProvider')]
    public function testFormatDiff(string $file1Path,string $file2Path, string $resultFilePath):void {
        $file1=Parser::parseFile($file1Path);
        $file2=Parser::parseFile($file2Path);
        $diff=Comparator::compare($file1, $file2);
        $formattedDiff=Formatter::formatDiffStylish($diff);
        $this->assertStringEqualsFile(__DIR__.$resultFilePath,$formattedDiff);
    }
}
