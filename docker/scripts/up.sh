#!/usr/bin/env bash

set -euo pipefail

trap cleanup INT

COMPOSE_FILE="./../docker/docker-compose.yml"
GREP_REGEX="findme-energy-app|findme-energy-nginx"

function cleanup() {
  echo "Cleaning up docker..."
  docker-compose --file $COMPOSE_FILE down
  echo "Done,goodbye!"
  exit 0
}

docker-compose --file $COMPOSE_FILE up | grep --color=always -E "${GREP_REGEX}"