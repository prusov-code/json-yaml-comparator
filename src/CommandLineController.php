<?php

namespace Hexlet\Code;

use Docopt;
use Hexlet\Code\Formatter;
use Hexlet\Code\Parser;
use Hexlet\Code\Comparator;

class CommandLineController
{
    private const HELP_MESSAGE = <<<DOC
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
    private const array HELP_PARAMS = ['version' => "Comparator v0.1\nCopyright (c) prusov-code"];
    public static function handleCommandLinePrompt(): void
    {
        $handleResult = Docopt::handle(self::HELP_MESSAGE, self::HELP_PARAMS);
        if ($handleResult) {
            try {
                $file1Content = Parser::parseFile($handleResult->args['<firstFile>']);
                $file2Content = Parser::parseFile($handleResult->args['<secondFile>']);
            } catch (\Exception $e) {
                echo $e->getMessage();
                return;
            }
            $diff = Comparator::compare((array)$file1Content, (array)$file2Content);
            $outputFormat = $handleResult->args['--format'];
            switch ($outputFormat) {
                default:
                    $formattedDiff = Formatter::formatDiffStylish($diff);
                    break;
            }
            echo $formattedDiff;
        }
    }
}
