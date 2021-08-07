#!/usr/bin/env bash
set -e

# build theme
./build-zip.sh

# move theme to WordPress
rm -rf ./wp/wp-content/themes/slrg-sss-nautilus/
unzip -d ./wp/wp-content/themes/slrg-sss-nautilus/ ../dist/slrg-sss-nautilus.zip

