# JSON-YAML-comparator

## About project
A powerful PHP library and command-line utility for comparing JSON and YAML files with multiple output formats.

## Code quality
[![Build](https://github.com/prusov-code/php-project-48/actions/workflows/build.yml/badge.svg)](https://github.com/prusov-code/php-project-48/actions/workflows/build.yml)
[![Maintainability Rating](https://sonarcloud.io/api/project_badges/measure?project=prusov-code_php-project-48&metric=sqale_rating)](https://sonarcloud.io/summary/new_code?id=prusov-code_php-project-48)
[![Quality Gate Status](https://sonarcloud.io/api/project_badges/measure?project=prusov-code_php-project-48&metric=alert_status)](https://sonarcloud.io/summary/new_code?id=prusov-code_php-project-48)
[![Security Rating](https://sonarcloud.io/api/project_badges/measure?project=prusov-code_php-project-48&metric=security_rating)](https://sonarcloud.io/summary/new_code?id=prusov-code_php-project-48)
[![Reliability Rating](https://sonarcloud.io/api/project_badges/measure?project=prusov-code_php-project-48&metric=reliability_rating)](https://sonarcloud.io/summary/new_code?id=prusov-code_php-project-48)
[![Lines of Code](https://sonarcloud.io/api/project_badges/measure?project=prusov-code_php-project-48&metric=ncloc)](https://sonarcloud.io/summary/new_code?id=prusov-code_php-project-48)
[![Bugs](https://sonarcloud.io/api/project_badges/measure?project=prusov-code_php-project-48&metric=bugs)](https://sonarcloud.io/summary/new_code?id=prusov-code_php-project-48)
[![Code Smells](https://sonarcloud.io/api/project_badges/measure?project=prusov-code_php-project-48&metric=code_smells)](https://sonarcloud.io/summary/new_code?id=prusov-code_php-project-48)
[![Duplicated Lines (%)](https://sonarcloud.io/api/project_badges/measure?project=prusov-code_php-project-48&metric=duplicated_lines_density)](https://sonarcloud.io/summary/new_code?id=prusov-code_php-project-48)
[![Technical Debt](https://sonarcloud.io/api/project_badges/measure?project=prusov-code_php-project-48&metric=sqale_index)](https://sonarcloud.io/summary/new_code?id=prusov-code_php-project-48)
[![Vulnerabilities](https://sonarcloud.io/api/project_badges/measure?project=prusov-code_php-project-48&metric=vulnerabilities)](https://sonarcloud.io/summary/new_code?id=prusov-code_php-project-48)
[![Coverage](https://sonarcloud.io/api/project_badges/measure?project=prusov-code_php-project-48&metric=coverage)](https://sonarcloud.io/summary/new_code?id=prusov-code_php-project-48)
[![Actions Status](https://github.com/prusov-code/php-project-48/actions/workflows/hexlet-check.yml/badge.svg)](https://github.com/prusov-code/php-project-48/actions)


## Prerequisites
- Linux, Macos, WSL
- PHP >= 8.2.0
- Composer >= 2.8.5
- Make
- Git

## Installation
### Composer
```bash
composer require prusov-code/json-yaml-comparator
```
### Standalone

```bash
git clone https://github.com/prusov-code/json-yaml-comparator.git

cd json-yaml-comparator

make install

./bin/compare /absolute/path/to/file/file1.json relative/path/to/file/file2.yaml
```

## Usage as a library
```php
require_once __DIR__.'/vendor/autoload.php';
use function PrusovCode\JsonYamlComparator\compare;

$pathToFile1='files/file1_nested.json'; # You can use absolute or relative path
$pathToFile1='files/file2_nested.yml';
$outputFormat='stylish'; # Available formats: stylish (default format), plain, json

echo compare($pathToFile1,$pathToFile2,$outputFormat); 
```

## Usage examples
### Compare two JSON files, stylish output
[![asciicast](https://asciinema.org/a/6vAtWBmLfq6jPk7A4CpbpIgW3.svg)](https://asciinema.org/a/6vAtWBmLfq6jPk7A4CpbpIgW3)

### Compare two YAML files, plain output
[![asciicast](https://asciinema.org/a/aLn5d1aQzGuyCcI4HFRVhrtzL.svg)](https://asciinema.org/a/aLn5d1aQzGuyCcI4HFRVhrtzL)

### Compare JSON and YAML files, json output
[![asciicast](https://asciinema.org/a/Ivnc1o5VjFyjDmKg5G8hmzv6S.svg)](https://asciinema.org/a/Ivnc1o5VjFyjDmKg5G8hmzv6S)
