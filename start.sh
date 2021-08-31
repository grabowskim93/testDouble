#!/bin/bash

set -e # exit when a command exits non-zero
set -x # print commands just before execution

docker-compose down -v --remove-orphans
docker network prune -f

if [[ $1 != 'fast' ]]; then
  docker-compose pull
  docker-compose build --pull
fi

docker-compose up -d nginx