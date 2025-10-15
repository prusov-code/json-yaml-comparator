.PHONY: install lint tests test-coverage
install:
	composer install
lint:
	composer exec phpcs -- src/ tests/ bin/
fix-lint:
	composer exec phpcbf -- src/ tests/ bin/
tests:
	composer exec phpunit tests/
test-coverage:
	XDEBUG_MODE=coverage composer exec --verbose phpunit tests -- --coverage-clover=build/logs/clover.xml