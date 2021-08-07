#!/usr/bin/env bash

set -e

docker-compose -f docker-compose.yml -f docker-compose.wp-cli.yml run --rm wpdev-cli "$@"
