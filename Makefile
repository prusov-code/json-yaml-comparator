install:
	composer install
lint:
	composer exec phpcs -- src/
test:
	composer exec phpunit tests/