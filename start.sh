#!/bin/bash

until mysql -h"$DB_HOST" -u"$DB_USERNAME" -p"$DB_PASSWORD" -e "SELECT 1;" > /dev/null 2>&1; do
  echo "⏳ Esperando a MySQL..."
  sleep 2
done

echo "✅ Base de datos disponible. Ejecutando migraciones..."

php artisan config:clear
php artisan cache:clear

php artisan migrate:fresh --seed --force

exec /usr/bin/supervisord -c /etc/supervisor/conf.d/supervisord.conf
