#!/bin/bash

if [ ! -f /var/www/.env ]; then
  cp /var/www/.env.example /var/www/.env
  php /var/www/artisan key:generate
fi

exec "$@"
