<?php

namespace PrusovCode\JsonYamlComparator;

use Docopt;
use PrusovCode\JsonYamlComparator\Formatter;
use PrusovCode\JsonYamlComparator\Parser;
use PrusovCode\JsonYamlComparator\Differ;
use function PrusovCode\JsonYamlComparator\compare;

class CommandLineController
{
    private const HELP_MESSAGE = <<<DOC
Generate diff

Usage:
  compare (-h|--help)
  compare (-v|--version)
  compare [--format <fmt>] <firstFile> <secondFile>

Options:
  -h --help                     Show this screen
  -v --version                  Show version
  --format <fmt>                Report format [default: stylish]
DOC;
    private const array HELP_PARAMS = ['version' => "Differ v0.1\nCopyright (c) prusov-code"];
    public static function handlePrompt(): void
    {
        $handleResult = Docopt::handle(self::HELP_MESSAGE, self::HELP_PARAMS);
        $pathToFile1=$handleResult->args['<firstFile>'];
        $pathToFile2=$handleResult->args['<secondFile>'];
        $outputFormat = $handleResult->args['--format'];
        echo \PrusovCode\JsonYamlComparator\compare($pathToFile1,$pathToFile2, $outputFormat);
    }
}
