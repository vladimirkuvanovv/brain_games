install:
	composer install

setup: install
	composer run-script --working-dir=vendor/felixfbecker/language-server parse-stubs

console:
	psysh --config psysh.php

lint:
	composer run-script phpcs -- --standard=PSR12 src bin

lint-fix:
	composer run-script phpcbf -- --standard=PSR12 src bin