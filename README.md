# LASNTG Admin Translate

Please see [WordPress plugin developer handbook](https://developer.wordpress.org/plugins/) for detailed info. 

## Localization

```sh
su -s /bin/bash www-data
cd /usr/local/src/languages
wp i18n make-mo
```

## Development

Emails will be sent to [Mailtrap Inbox](https://mailtrap.io/). Credentials are available on our [Bitwarden](https://bitwarden.veri.ie).

Create `.env` file. 

Add your plugin folder name to the `WP_PLUGIN=` environment variable.

```
SITE_URL=localhost:8080
SITE_TITLE=WordPress
WP_PLUGIN=lasntgadmin-translate
WP_PLUGINS=woocommerce advanced-custom-fields user-role-editor wp-mail-smtp
WP_THEME=storefront
ADMIN_USERNAME=admin
ADMIN_PASSWORD=secret
ADMIN_EMAIL=admin@example.com
```

Build images and run WordPress.

```sh
# build Docker image
docker-compose build # optionally override Dockerfile build arguments by appending --build-arg USER_ID=$(id -u)
# start container
docker-compose up wordpress 
```

Run the tests

```sh
docker exec -ti -u www-data lasntg-plugin_template_wordpress_1 bash
cd /usr/local/src
composer install
composer all
```

__Note:__ Most WordPress coding convention errors can be automatically fixed by running `composer fix`

Visit [http://localhost:8080/wp-login.php](localhost:8080/wp-login.php)

## Release a version

Update `composer.json` file with appropriate `name`, `version` and `installer-name`.

Update `Version: 0.0.0` of main plugin file, in this case `example-plugin.php`.

Use `git` to commit and push changes to origin.

Use `git` to tag the commit and push it to origin.

```sh
# list existing tag
git tag -l
# tag the commit with appropriate version
git tag -a 0.1.4
# push tag as a release
git push -u origin 0.1.4
```

## Localization

- [Localization](https://developer.wordpress.org/apis/internationalization/localization/#using-localizations)
- [How to Internationalize Your Plugin](https://developer.wordpress.org/plugins/internationalization/how-to-internationalize-your-plugin/)
- [wp i18n](https://developer.wordpress.org/cli/commands/i18n/)

