# Development Environment


## Notes
* Docker and Docker-Compose need to be installed.
* If not otherwise stated, the commands need to be executed in the `dev` directory.
* The WordPress installation can be reached at [`localhost:8585`](http://localhost:8585)


## Docker
Start services:
```bash
docker-compose up -d
```

Stop services:
```bash
docker-compose stop
```

Stop and remove containers as well as volumes (database):
```bash
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


### `local-install`
Prepares basic installation by executing the "WordPress 5-minute installation",
installs and activates some plugins, builds and activates the theme.


### `local-clean`
Stops and removes containers, the database volume and the local WordPress directory (`./wp`).


### `local-deploy`
Build and move the new version of theme into the local WordPress deployment.


### `wp-cli`
Execute commands in dockerized WP-CLI:
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
