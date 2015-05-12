#!/bin/bash
#
# Highlight Unread Posts
#
# @copyright (c) 2015 Wolfsblvt ( www.pinkes-forum.de )
# @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
# @author Clemens Husung (Wolfsblvt)
#
set -e
set -x

DB=$1
TRAVIS_PHP_VERSION=$2
EXTNAME=$3
PHP_VERSION_FOR_COVERAGE=$4

if [ "$TRAVIS_PHP_VERSION" == "$PHP_VERSION_FOR_COVERAGE" -a "$DB" == "mysqli" ]
then
	phpBB/vendor/bin/phpunit --configuration phpBB/ext/$EXTNAME/travis/phpunit-$DB-travis.xml --bootstrap ./tests/bootstrap.php --coverage-clover build/logs/clover.xml
else
	phpBB/vendor/bin/phpunit --configuration phpBB/ext/$EXTNAME/travis/phpunit-$DB-travis.xml --bootstrap ./tests/bootstrap.php
fi
