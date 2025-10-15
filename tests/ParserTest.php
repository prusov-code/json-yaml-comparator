<?php

namespace PrusovCode\JsonYamlComparator\Tests;

use PHPUnit\Framework\TestCase;

class ParserTest extends TestCase
{
    public function testParse()
    {
        $parser = new \PrusovCode\JsonYamlComparator\Parser();
        $this->expectException(\UnexpectedValueException::class);
        $parser::parseFile('fakeFile.yml');
        $this->expectException(\UnexpectedValueException::class);
        $parser::parseFile(__DIR__ . '/../files/file1.txt');
    }
}
