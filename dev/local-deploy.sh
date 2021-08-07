#!/usr/bin/env bash
set -e

# build theme
./build-zip.sh

# remove theme from WordPress installation
rm -rf ./wp/wp-content/themes/slrg-sss-nautilus/

# unzip theme into WordPress installation
unzip -d ./wp/wp-content/themes/ ../dist/slrg-sss-nautilus.zip
