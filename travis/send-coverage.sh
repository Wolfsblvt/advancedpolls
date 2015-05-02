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
GITREPO=$3
PHP_VERSION_FOR_COVERAGE=$4
CODECLIMATE_REPO_TOKEN=$5

if [ "$TRAVIS_PHP_VERSION" == "$PHP_VERSION_FOR_COVERAGE" -a "$DB" == "mysqli" ]
then
	cd ../$GITREPO
	wget https://scrutinizer-ci.com/ocular.phar
	php ocular.phar code-coverage:upload --format=php-clover ../../phpBB3/build/logs/clover.xml

	if [ "CODECLIMATE_REPO_TOKEN" != "0" ]
	then
		cd ../../phpBB3
		CODECLIMATE_REPO_TOKEN=$CODECLIMATE_REPO_TOKEN ../$GITREPO/vendor/bin/test-reporter
	fi
fi
