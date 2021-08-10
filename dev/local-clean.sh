#!/usr/bin/env bash
set -e

# only continue if we are in the correct directory
SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" &>/dev/null && pwd)"
CURRENT_DIR=$(pwd)
if [[ "$SCRIPT_DIR" != "$CURRENT_DIR" ]]; then
  echo "Script must be executed inside the 'dev' directory"
  exit 1
fi

docker-compose down --volumes
rm -rf ./wp
