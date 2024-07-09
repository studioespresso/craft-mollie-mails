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

To start sending e-mails, you have to comment out the lines in [MollieMails.php](https://github.com/studioespresso/craft-mollie-mails/blob/main/src/MollieMails.php#L45-L78):

You'll see examples per status and per payment type (subscriptions and single payments).
The ``sendEmail`` function take 4 parameters:
- the `recipient` (required off course, use `$event->element->email` to send the email to the visitor who made the payment, or add your own email addess to send to a custom address)
- the `subject` of the email
- the `template` that will be used for the email. This should be located with your site's templates
- the ``element``, this should always be `$event->element`, which will give you access to the custom fields you've added to your payment form.
