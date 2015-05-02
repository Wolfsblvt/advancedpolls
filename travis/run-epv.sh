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

if [ "$TRAVIS_PHP_VERSION" == "5.3.3" -a "$DB" == "mysqli" ]
then
	phpBB/ext/$EXTNAME/vendor/bin/EPV.php run --dir="phpBB/ext/$EXTNAME/"
fi
