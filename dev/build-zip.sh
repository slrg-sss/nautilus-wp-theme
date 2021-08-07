#!/usr/bin/env bash
set -e

THEME_SLUG="slrg-sss-nautilus"

SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" &>/dev/null && pwd)"
INPUT_DIR="$(cd "$SCRIPT_DIR/.."; pwd -P)"
OUTPUT_DIR="$(cd "$SCRIPT_DIR/../dist"; pwd -P)"

# define version override if requested
if [[ -n "$1" ]]; then
  # check format of version (must be x.x.x)
  if ! [[ $1 =~ ^[0-9]+\.[0-9]+\.[0-9]+$ ]]; then
    echo "Error: Version does not match the required pattern (x.x.x)"
    exit 1
  fi
  VERSION_OVERRIDE="$1"
fi

# create output directory if necessary
if ! [[ -d "$OUTPUT_DIR" ]]; then
  mkdir -p "$OUTPUT_DIR"
fi

# re-create staging directory
STAGE_DIR="${OUTPUT_DIR}"/"${THEME_SLUG}"
rm -rf "${STAGE_DIR:?}"
mkdir "$STAGE_DIR"

# prepare all files to be archived (copy to staging directory)
cp "$INPUT_DIR"/style.css "$STAGE_DIR"
cp "$INPUT_DIR"/*.php "$STAGE_DIR"
cp "$INPUT_DIR"/screenshot.png "$STAGE_DIR"
cp "$INPUT_DIR"/README.md "$STAGE_DIR"
cp -r "$INPUT_DIR"/assets "$STAGE_DIR"
cp -r "$INPUT_DIR"/js "$STAGE_DIR"
cp -r "$INPUT_DIR"/languages "$STAGE_DIR"
cp -r "$INPUT_DIR"/updater "$STAGE_DIR"

# override version in style.css if requested
if [[ -n "$VERSION_OVERRIDE" ]]; then
  sed -i '' -r -e "s/^Version:[[:space:]]*.*$/Version: ${VERSION_OVERRIDE}/g" "$STAGE_DIR/style.css"
fi

# create archive (excluding folders and files starting with a dot)
ZIP_FILE="${THEME_SLUG}.zip"
rm -rf "${ZIP_FILE:?}"
(cd "$OUTPUT_DIR" && zip -r -T "$ZIP_FILE" "$THEME_SLUG" -x ".*" -x "*/.*")

# remove staging directory
rm -rf "${STAGE_DIR:?}"
