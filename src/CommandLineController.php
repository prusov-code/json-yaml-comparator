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
    CONST HELP_PARAMS=['version'=>"Comparator v0.1\nCopyright (c) prusov-code"];
    public static function handleCommandLinePrompt():void
    {

        $handleResult=Docopt::handle(self::HELP_MESSAGE,self::HELP_PARAMS);
        if($handleResult) {
            try {
                $file1Content=Parser::parseFile($handleResult->args['<firstFile>']);
                $file2Content=Parser::parseFile($handleResult->args['<firstFile>']);
            }
            catch (\Exception $e) {
                echo $e->getMessage();
                return;
            }
            echo ("File {$handleResult->args['<firstFile>']} content:\n");
            dump($file1Content);
            echo ("File {$handleResult->args['<firstFile>']} content:\n");
            dump($file2Content);
        }
    }
}