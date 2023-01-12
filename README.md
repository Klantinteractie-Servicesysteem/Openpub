# Openpub

[![Automated Testing](https://github.com/Klantinteractie-Servicesysteem/Openpub/actions/workflows/tests.yml/badge.svg)](https://github.com/Klantinteractie-Servicesysteem/Openpub/actions/workflows/tests.yml)

Open pub is een onderdeel van OpenWeb concept en behelst het beheren en publiceren van nieuwsberichten en taxanomien. Binnen KISS gebruiken we OpenPub-api-specificatie voor het beheren en lezen van Nieuws en Werkinstructies. 

## Opzet van de plugin

-   Custom postype (publication)
-   Custom taxonnomy ()

## Opzet van deze repository

Deze repository beheert een variant van de OpenPub plugin die niet afhankenlijk is van composer en commerciele Closed Source software. Deze repository voorziet daarnaast ook in een automatische testflow voor unit en integratietesting en een lokale ontwikkelomgeving. 


## Design afwegingen

-   De repository maakt gebruik van een oficial WordPress image, t.b.v. development (minimaal WordPress versie 6+)
-   De repository maakt gebruik van de Open Source WordPress-plugin [Advanced Custom Fields](https://github.com/AdvancedCustomFields)  (minimaal plugin versie 6+)

## Local development environment

For easy development a [docker](https://www.docker.com/) based WordPress environment is included. This can be started up  afhter installing the [docker desktop client](https://docs.docker.com/desktop/). You can use this command:

```CLI
$docker compose up
```

## WordPress CLI and Unit Testing

For unit testing a separate CLI based WordPress is included.  This can be started with this command:

```CLI
$docker compose -f docker-compose-cli.yml up
```

You can than run [WordPress CLI commands](https://developer.wordpress.org/cli/commands/) with in the container. For example, getting a list of all available plugins can be done trough

```CLI
$docker-compose exec wordpress wp plugin list
```

## Local development configuration

Once you have installed WordPress and have it running within your cluster, you can configure the Wordpress installation:

1. Navigate to `localhost/wp-admin`, initiate Wordpress and login


## Installation of the plugin
See the general [KISS-documentation](https://kiss-klantinteractie-servicesysteem.readthedocs.io/) for information about installation and activation of the plugin.
