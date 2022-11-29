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

## Wordpress CLI and Unit Testing

For unit testing a separate CLI based wordpress is included, this can be started trough

```CLI
$docker compose -f docker-compose-cli.yml up
```

You can than run [Wordpress CLI commands](https://developer.wordpress.org/cli/commands/) with in the container. For example, getting a list of all available plugins can be done trough

```CLI
$docker-compose exec wordpress wp plugin list
```


## Local development configuration

Once your docker is running, you can configure the Wordpress installation:

1. Navigate to `localhost/wp-admin`, initiate Wordpress and login


## Setting up the plugin

_Note: to start this step, you're expected to have an active WordPress installation running._

1. Activate the plugins: OpenPub and Advanced Custom Fields
2. Navigate to "Aangepaste velden" and then to "Gereedschap"
3. Upload the file `plugins/OpenPub/publication-acf-group.json` within the "Veldgroepen Importeren" option
4. Create one (or multiple) new users with the "KISS Redacteur" role  
   _Note: users with the assigned role "KISS Redacteur" can now create and maintain publications._
5. Navigate to "OpenPub" > "Configuration" and add the gateway URI to the "API Domain" field and the gateway API key to the "API KEY" field.

### Managing users

_Note: Users with the user role "Administrator" can create new users, an account with this role is automatically assigned once WordPress is installed. **For this portion of the documentation, you're expected to be logged in as an Administrator user.**_


#### Create a user

1. Navigate to "Users" and click on "Add new"
2. Fill the required fields (username and email), leave the other fields _as-is_
3. Change the (default) role of "Subscriber" to "KISS Redacteur"
4. Finally, click "Add New User"

_Note: if you want to create another Admin user, follow the above steps and choose the role "Administrator" instead of "KISS Redacteur"._

#### Remove a user

_Note: removing a user **can not** be reverted._

1. Navigate to "Users" and hover your mouse over the target user
2. Click "Delete"
3. Optionally, assign the user's content to another account
4. Finally, click "Confirm Deletion"

### Managing publications

_Note: Users with the role "KISS Redacteur" can manage publications, an account with this role should be created as stated within #Managing users._

#### Create a publication

1. Navigate to "Publications" and click "Add New"
2. Add the following fields
   - Title: the title of the publication (required)
   - Publicatie: the content of the publication (required)
   - Publicatitetype: the type of the publication ("Nieuws" or "Werkinstructie) (required)
   - Skills: the skills relevant to this publication (optional)
   - Einddatum: the date after which the publication is no longer visible (optional; the value must be in the future if you want your publication to be shown)
   - Belangrijke publicatie: check this field to make your publication more prominent (optional)
3. Finally, click "Publish"

#### Editing a publication

1. Navigate to the publication you want to edit by clicking on "Publications" and then clicking on the target publication
2. Edit any field that needs editing (note: you cannot remove the required fields)
3. Finally, click "Publish"

#### Removing a publication

1. Navigate to the publication you want to remove by clicking on "Publications" and then clicking on the target publication
2. Click on "Move to Trash"

_Note: removed publications can be found and restored in the trash, once the trash is emptied they can no longer be restored._

## Proxy communication via Gateway

_Optional parameter: `per_page`._

- `GET {gateway_environment_uri}/api/openpub/openpub_type`
  _Returns all openpub_type objects within the WordPress environment, via a gateway proxy._
- `GET {gateway_environment_uri}/api/openpub/openpub_skill`
  _Returns all openpub_skill objects within the WordPress environment, via a gateway proxy._



