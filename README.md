# Openpub

[![Automated Testing](https://github.com/Klantinteractie-Servicesysteem/Openpub/actions/workflows/tests.yml/badge.svg)](https://github.com/Klantinteractie-Servicesysteem/Openpub/actions/workflows/tests.yml)

Open pub is een onderdeel van OpenWeb concept en behelst het beheren en publiceren van nieuwsberichten en taxanomien

## Opzet van de plugin

-   Custom postype (publication)
-   Custom taxonnomy ()

## Opzet van deze repository

Deze repository beheert een variant van de OpenPub plugin die niet afhankenlijk is van composer en commerciele Closed Source software. Deze repositoery voorziet daarnaast ook in een automatische testflow voor unit en integratietesting en een lokale ontwikkelomgeving.

## Design afwegingen

-   De repository maakt gebruik van een oficial WordPress image
-   De repository maakt gebruik van de Open Source WordPress-plugin [Advanced Custom Fields](https://github.com/AdvancedCustomFields)

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

## Documentation
Documentation is included in the general [KISS-documentation](https://kiss-klantinteractie-servicesysteem.readthedocs.io/).
