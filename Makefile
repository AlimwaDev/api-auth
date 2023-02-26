run\:tests:
	./vendor/bin/phpunit

run\:coverage:
	./vendor/bin/phpunit --coverage-html coverage

routes:
	php ./vendor/bin/testbench route:list

run\:quality\:phpstan:
	./vendor/bin/phpstan analyse --memory-limit=2G --xdebug

run\:quality\:phpinsights:
	./vendor/bin/phpinsights

run\:checks\:all:
	./vendor/bin/phpstan analyse --memory-limit=2G --xdebug
	./vendor/bin/phpinsights
	./vendor/bin/phpunit