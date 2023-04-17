#!/usr/bin/env bash

set -euo pipefail

COMPOSE_FILE="../docker-compose.yml"

docker-compose --file $COMPOSE_FILE up --build --detach && \
docker exec sasoft-test-app composer install && \
docker exec sasoft-test-app php artisan migrate && \
docker exec sasoft-test-app npm install && \
docker exec sasoft-test-app npm run build

echo ""
echo "Should be ready to rock and roll!"
echo ""
echo "!!! Remember to add sasofttest.local to your hosts file !!!"
echo "Thereafter, you can access the site via your browser at http://sasofttest.local"
echo ""
