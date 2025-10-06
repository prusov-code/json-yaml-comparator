<?php

namespace Hexlet\Code;

use Docopt;

require_once __DIR__ . '/../vendor/autoload.php';

class CommandLineController
{
    public static function printDocumentation()
    {
        $doc = <<<DOC
Generate diff

Usage:
  gendiff (-h|--help)
  gendiff (-v|--version)

Options:
  -h --help                     Show this screen
  -v --version                  Show version

DOC;
        $args = Docopt::handle($doc);
    }

}