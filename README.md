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

## Security
We use [Grype](https://github.com/anchore/grype) as a scanning tool for containers as a [action](https://github.com/marketplace/actions/anchore-container-scan) in our git workkflow. The flow is wired to fail when an critcal error is found (in wich casses no new release artifacts are created). This can be altered in the test.yamml worklow.  The fail point can be set to `low`,`medium`,`high` or `critical` alternativly the fail point can be ignored completly by setting `fail-build` to `false`. Aditiona configuration for snyk and trivy are also  included (but commented out) and are not recomended.

## Creating a new plugin

Create test casses for your plugin
- wp scaffold plugin-tests my-plugin