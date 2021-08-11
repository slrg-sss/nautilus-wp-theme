# Development


## Local Development Environment

### General notes
* Docker and Docker-Compose need to be installed.
* If not otherwise stated, the commands need to be executed in the `dev` directory.
* The WordPress installation can be reached at [`localhost:8585`](http://localhost:8585)
* If you want to prevent IntelliJ IDEA from indexing the deployed theme, mark the
  `./wp/wp-content/themes/slrg-sss-nautilus` folder as *Excluded* in the
  settings *(File | Project Structure | Modules | Sources)*.


### Docker
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


### Scripts

#### `build-zip`
Builds the ZIP for distribution with the version as defined in `styles.css`:
```bash
./build-zip.sh
```

Builds the ZIP for distribution with an overridden version:
```bash
./build-zip.sh 1.2.3
```


#### `local-install`
Prepares basic installation by executing the "WordPress 5-minute installation",
installs and activates some plugins, builds and activates the theme.


#### `local-clean`
Stops and removes containers, the database volume and the local WordPress directory (`./wp`).


#### `local-deploy`
Build and move the new version of theme into the local WordPress deployment.


#### `wp-cli`
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


## Branching Model

* The `main` branch contains the work-in-progress for the next release
  (current development version) but should be potentially shippable.
* Create your branches directly from `main`.
* Use `main` as target for pull requests.


## Release Process
1. Verify that the `style.css` file contains the appropriate version according to [SemVer](https://semver.org).
2. Run the [«Create/Update Release» Action](https://github.com/slrg-sss/nautilus-wp-theme/actions/workflows/draft-release.yml)
   with the given version. This builds the theme and creates a draft release with the required
   distributable ZIP already attached.
3. Go to the [Releases page](https://github.com/slrg-sss/nautilus-wp-theme/releases)
   and open the draft release by clicking *edit*.
4. Add a description of the release and check the *pre-release* checkbox if this is only a preview release.
5. Finish by clicking *Update release*.
 
*To make the new release available for the built-in update functionality,
the data served on `update.wordpress.slrg.dev` must be updated appropriately.* 
