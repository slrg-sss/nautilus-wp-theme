# Development Environment

*If not otherwise stated, the commands need to be executed in the `dev` directory.*


## Docker
Start services (WordPress and database):
```
docker-compose up -d
```

Stop services:
```
docker-compose stop
```

Stop and remove containers as well as volumes:
```
docker-compose down --volumes
```


## Scripts

### `build-zip`
Builds the ZIP for distribution with the version as defined in `styles.css`:
```bash
./build-zip.sh
```

Builds the ZIP for distribution with an overridden version:
```bash
./build-zip.sh 1.2.3
```


### `cli-core-install`
Executes the "WordPress 5-minute installation" within some seconds.
```bash
./cli-core-install.sh
```


### `local-deploy-theme`
Build and move the new version of theme into the local WordPress deployment:
```
./local-deploy-theme.sh
````


### `wp-cli`
Abstracts calls to the dockerized WP-CLI.
```bash
./wp-cli.sh wp option update time_format "G:i"
```

```bash
./wp-cli.sh wp theme install --activate "https://url-to-theme/theme.zip"
```

```bash
./wp-cli.sh bash -c \
  'wp option update date_format "j. F Y" &&
  wp option update time_format "G:i"'
```
