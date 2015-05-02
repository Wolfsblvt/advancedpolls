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
	sed -n '1h;1!H;${;g;s/<\/php>/<\/php>\n\t<filter>\n\t\t<whitelist>\n\t\t\t<directory>..\/<\/directory>\n\t\t\t<exclude>\n\t\t\t\t<directory>..\/tests\/<\/directory>\n\t\t\t\t<directory>..\/vendor\/<\/directory>\n\t\t\t\t<directory>..\/lib\/<\/directory>\n\t\t\t\t<directory>..\/adm\/style\/lib\/<\/directory>\n\t\t\t\t<directory>..\/style\/all\/lib\/<\/directory>\n\t\t\t\t<directory>..\/language\/<\/directory>\n\t\t\t\t<directory>..\/migrations\/<\/directory>\n\t\t\t<\/exclude>\n\t\t<\/whitelist>\n\t<\/filter>/g;p;}' phpBB/ext/$EXTNAME/travis/phpunit-mysqli-travis.xml &> phpBB/ext/$EXTNAME/travis/phpunit-mysqli-travis.xml.bak
	cp phpBB/ext/$EXTNAME/travis/phpunit-mysqli-travis.xml.bak phpBB/ext/$EXTNAME/travis/phpunit-mysqli-travis.xml
fi
