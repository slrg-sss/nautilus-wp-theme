#!/usr/bin/env bash

set -e

./wp-cli.sh wp core install \
  --url="http://localhost:8585" \
  --title="SLRG Sektion Test" \
  --admin_user='admin' \
  --admin_email='noreply@domain.tld' \
  --admin_password="admin" \
  --skip-email

