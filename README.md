# Mollie Mails

Starter plugin the includes events for craft-mollie-payments

## Requirements

This plugin is meant as a starter for adding email notifications when you are using [studioespresso/craft-mollie-payments](https://github.com/studioespresso/craft-mollie-payments).

> [!IMPORTANT]  
> Out of the box, this plugin doesn't do anything.
> You need to add your own templates and code to start sending emails


## Installation instructions

Download the plugin/repository from GitHub so you have the zip archive on your computer.

> [!IMPORTANT]  
> This plugin is intended to installed as a local plugin **only**.

- Create a `plugins` folder in the root of your project (that's where your templates, config and vendor folders are located)
- Unzip the plugin and place it in the `plugins` folder
- The composer.json of your project will already have a ``repositories`` heading, amend it to look like this:
````json
 "repositories": [
    {
      "type": "composer",
      "url": "https://composer.craftcms.com",
      "canonical": false
    },
    {
      "type": "path",
      "url": "plugins/mollie-mails"
    }
  ],
````
- Run ``composer require studioespresso/craft-mollie-mails`` in your terminal to add to the plugin to the project.
- Now you can install the plugin through the control panel.

## Usage


