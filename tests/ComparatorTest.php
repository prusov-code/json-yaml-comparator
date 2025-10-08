<?php
require_once __DIR__."/../vendor/autoload.php";

use PhpUnit\Framework\TestCase;
use Hexlet\Code\Parser;

class ComparatorTest extends TestCase
{
    public function testCompare():void {
        $file1=Parser::parseFile('tests/fixtures/file1.json');
        $file2=Parser::parseFile('tests/fixtures/file2.json');
        $diff=\Hexlet\Code\Comparator::compare($file1, $file2);
        $this->assertStringEqualsFile(__DIR__.'/fixtures/comparation_one_result.txt',$diff);
    }
}