#!/usr/bin/env bash
set -e

# only continue if we are in the correct directory
SCRIPT_DIR="$(cd "$(dirname "${BASH_SOURCE[0]}")" &>/dev/null && pwd)"
CURRENT_DIR=$(pwd)
if [[ "$SCRIPT_DIR" != "$CURRENT_DIR" ]]; then
  echo "Script must be executed inside the 'dev' directory"
  exit 1
fi

# WordPress 5-minute install within some seconds
./wp-cli.sh wp core install \
  --url="http://localhost:8585" \
  --title="SLRG Sektion Test" \
  --admin_user='admin' \
  --admin_email='noreply@domain.tld' \
  --admin_password="admin" \
  --skip-email

# update options (tagline, date/time formats)
# deactivate comments and require approval for comments
# remove ping sites and avoid indexing by search engines
./wp-cli.sh bash -c \
 'wp option update blogdescription "Ihre Rettungsschwimmer!" &&
  wp option update date_format "j. F Y" &&
  wp option update time_format "G:i" &&
  wp option update links_updated_date_format "j. F Y, G:i" &&
  wp option update start_of_week 1 &&
  wp option update default_comment_status "" &&
  wp option update comment_moderation 1 &&
  wp option update ping_sites "" &&
  wp option update blog_public 0'

# install and activate plugins
./wp-cli.sh bash -c \
 'wp plugin install --activate debug-bar &&
  wp plugin install --activate wordpress-importer &&
  wp plugin install --activate classic-widgets &&
  wp plugin install --activate widget-options'

# install languages (DE/FR/IT) and activate DE
./wp-cli.sh bash -c \
 'wp language core install de_DE &&
  wp language core install fr_FR &&
  wp language core install it_IT &&
  wp language plugin install --all de_DE &&
  wp language plugin install --all fr_FR &&
  wp language plugin install --all it_IT &&
  wp language theme install --all de_DE &&
  wp language theme install --all fr_FR &&
  wp language theme install --all it_IT &&
  wp site switch-language de_DE'

# build and move the development version of theme into the local WordPress deployment
./local-deploy.sh

# activate 'slrg-sss-nautilus' theme
./wp-cli.sh wp theme activate slrg-sss-nautilus

