<?php

namespace Hexlet\Code;

use Docopt;

require_once __DIR__ . '/../vendor/autoload.php';

class CommandLineController
{
    CONST HELP_MESSAGE = <<<DOC
Generate diff

Usage:
  gendiff (-h|--help)
  gendiff (-v|--version)
  gendiff [--format <fmt>] <firstFile> <secondFile>

Options:
  -h --help                     Show this screen
  -v --version                  Show version
  --format <fmt>                Report format [default: stylish]
DOC;
    public static function printDocumentation()
    {
        $params=['version'=>"Comparator v0.1\nCopyright (c) prusov-code"];
        dump(Docopt::handle(self::HELP_MESSAGE,$params));
    }

}