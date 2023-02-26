run\:tests:
	./vendor/bin/phpunit --testdox

run\:coverage:
	./vendor/bin/phpunit --coverage-html coverage

routes:
	php ./vendor/bin/testbench route:list

run\:quality\:phpstan:
	./vendor/bin/phpstan analyse --memory-limit=2G --xdebug