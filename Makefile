.PHONY: install lint tests test-coverage
install:
	composer install
lint:
	composer exec phpcs -- src/
tests:
	composer exec phpunit tests/
test-coverage:
	XDEBUG_MODE=coverage composer exec --verbose phpunit tests -- --coverage-clover=build/logs/clover.xml