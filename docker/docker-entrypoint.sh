#!/bin/sh
set -e



# first arg is `-f` or `--some-option`
if [ "${1#-}" != "$1" ]; then
	set -- php-fpm "$@"
fi

echo "Container ready to recieve commands"

exec docker-php-entrypoint "$@"
