# Openpub
[![Automated Testing](https://github.com/Klantinteractie-Servicesysteem/Openpub/actions/workflows/tests.yml/badge.svg)](https://github.com/Klantinteractie-Servicesysteem/Openpub/actions/workflows/tests.yml)

Open pub is een onderdeel van OpenWeb concept en behelst het beheren en publiceren van nieuwsberichten en taxanomien


## Opzet van de plugin
- Custom postype (publication)
- Custom taxonnomy ()

## Opzet van deze repository
Deze repository beheerd een variant van de OpenPub plugin die niet afhankenlijk is van composer en commerciele closed source softwhare

Deze repositoery voorziet daarnaast ook in een automatische test flow voor unit en integratie testing en een locale ontwikkel omgeving 

## Design afwegingen
- De repository maakt gebruik van een oficial wordpress image
- 

## Local development environment
For easy development an [docker](https://www.docker.com/) based wordpress environment is included, this can be started up trough afhter installing the [docker desktop client](https://docs.docker.com/desktop/).
```CLI
$docker compose up
```

## Wordpress CLI and Unit Testing
For unit testing a separate CLI based wordpress is included, this can be started trough
```CLI
$docker compose -f docker-compose-cli.yml up
```

You can than run [Wordpress CLI commands](https://developer.wordpress.org/cli/commands/) with in the container. For example, getting a list of all available plugins can be done trough

```CLI
$docker-compose exec wordpress wp plugin list
```