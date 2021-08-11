#!/usr/bin/env bash
set -e

SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" &>/dev/null && pwd)"
INPUT_DIR="$(cd "$SCRIPT_DIR/.."; pwd -P)"

VERSION_LINE=$(grep -E "^Version:[[:space:]]*([0-9]+\.[0-9]+\.[0-9]+)$" "$INPUT_DIR/style.css")
VERSION=$(echo "$VERSION_LINE" | sed -r -e "s/^Version:[[:space:]]([0-9]+\.[0-9]+\.[0-9]+)$/\1/g")

echo $VERSION
