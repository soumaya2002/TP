#!/bin/sh

curl -LO https://deployer.org/deployer.phar
mv deployer.phar /usr/local/bin/dep
chmod +x /usr/local/bin/dep
RESULT=$?
exit $RESULT