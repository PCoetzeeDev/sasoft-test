#!/usr/bin/env bash

set -euo pipefail

COMPOSE_FILE="../docker-compose.yml"

docker-compose --file $COMPOSE_FILE up --build --detach && \
docker exec sasoft-test-app composer install && \
docker exec sasoft-test-app npm install && \
docker exec sasoft-test-app npm run build

echo ""
echo "Good to go!"
echo ""
