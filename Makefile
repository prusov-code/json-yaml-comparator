install:
	composer install
lint:
	composer exec phpcs -- src/
tests:
	composer exec phpunit tests/