#!/bin/bash
git add -A
if [ x$1 != x ]
then
	git commit -m $1
else
	git commit -m 'sync'
fi
git push origin master