# Openpub

[![Automated Testing](https://github.com/Klantinteractie-Servicesysteem/Openpub/actions/workflows/tests.yml/badge.svg)](https://github.com/Klantinteractie-Servicesysteem/Openpub/actions/workflows/tests.yml)

Open pub is een onderdeel van OpenWeb concept en behelst het beheren en publiceren van nieuwsberichten en taxanomien

## Opzet van de plugin

-   Custom postype (publication)
-   Custom taxonnomy ()

## Opzet van deze repository

Deze repository beheerd een variant van de OpenPub plugin die niet afhankenlijk is van composer en commerciele closed source softwhare

Deze repositoery voorziet daarnaast ook in een automatische test flow voor unit en integratie testing en een locale ontwikkel omgeving

## Design afwegingen

-   De repository maakt gebruik van een oficial wordpress image
-   De repository maakt gebruik van de open source plugin [Advanced Custom Fields](https://github.com/AdvancedCustomFields)

## Local development environment

For easy development an [docker](https://www.docker.com/) based wordpress environment is included, this can be started up trough afhter installing the [docker desktop client](https://docs.docker.com/desktop/).

```CLI
$docker compose up
```

## Local development configuration

Once your docker is running, you can configure the Wordpress installation:

1. Navigate to `localhost/wp-admin`, initiate Wordpress and login
2. Activate the plugins: OpenPub and Advanced Custom Fields  
   _Note: admin users can now create and maintain publication types and skills._
3. Navigate to "Aangepaste velden" and then to "Gereedschap"
4. Upload the file `plugins/OpenPub/publication-acf-group.json` within the "Veldgroepen Importeren" option
5. Create one (or multiple) new users with the "KISS Redacteur" role  
   _Note: these users can now create and maintain publications._

## Wordpress CLI and Unit Testing
We base our development on image -> https://github.com/docker-library/wordpress/tree/master/cli/php8.1


For unit testing a separate CLI based wordpress is included, this can be started trough

```CLI
$ docker compose -f docker-compose-cli.yml up
```

You can than run [Wordpress CLI commands](https://developer.wordpress.org/cli/commands/) with in the container. For example, getting a list of all available plugins can be done trough

```CLI
$ docker compose exec wordpress wp plugin list
```

Activating the plugin (if  it isnt activated yet)

```CLI
$ docker compose  exec wordpress wp plugin activate OpenPub
```

Unit test are provided by [php unit actions](https://github.com/marketplace/actions/phpunit-php-actions) as a part of the github workflow

## Security
We use [Grype](https://github.com/anchore/grype) as a scanning tool for containers as a [action](https://github.com/marketplace/actions/anchore-container-scan) in our git workkflow. The flow is wired to fail when an critcal error is found (in wich casses no new release artifacts are created). This can be altered in the test.yaml worklow.  The fail point can be set to `low`,`medium`,`high` or `critical` alternativly the fail point can be ignored completly by setting `fail-build` to `false`.
Additional configuration for snyk is also included based on the [snyk action]( https://github.com/snyk/actions), however it requires setting up a snyk token. Keep in mind that snyk will actively send data to snyk on your scans. So tis not recommended for privacy oriented applications.

Thirdly a [trivy action]( https://github.com/aquasecurity/trivy-action) is included for container scanning.

### Known issues
Since we use dibian (alpine) images we are confronted with know zero day issues for wich there are no fixes available. Current know issues can be found here
- CVE-2021-30473
- CVE-2021-30474
- CVE-2021-30475

### Choosing your image
We test the plugin security against the official wordpress images and advice to ALWAYS use the official wordpress images in production BUT this is a plugin so choocing your local wordpress installation is in the end up to you 