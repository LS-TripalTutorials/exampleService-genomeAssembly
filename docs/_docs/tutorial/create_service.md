---
layout: page
title: "Creating a custom service"
permalink: /tutorial/create-service
---

Now that we have a module, we are going to use the drush generator to create a skeleton of our service. As before, we simply tell drush we want the custom service template to be used and it will prompt us for the following information:

| Value                            | Prompt: Description |
|----------------------------------|---------------------|
| lstrptut_s4rnhy                  | Module machine name: The machine name of the module to add the service to. |
| lstrptut_s4rnhy.genomeassemblies | Service name: The machine name of the new service. |
| GenomeAssemblies                 | Class: The name of the class for this service (Drupal standards are to use snake-case for class names). |

Next it asks you "Would you like to inject dependencies?" and we would, so we leave the default "Yes". We want to add the following dependencies:

 - tripal_chado.database
 - tripal.logger

{% capture info_notice %}
Note: You can find the name of all services available in your site using <code>drush devel:services</code>.
{% endcapture %}

{% include callout.html text=info_notice type="info" %}

Okay, now that we know all the information we need to provide, let's run the generator and see what it creates!

{% capture terminal_command %}

docker exec -it LStutorial drush generate service:custom

{% endcapture %}
{% capture terminal_output %}

Welcome to custom-service generator!
––––––––––––––––––––––––––––––––––––––

Module machine name [web]:
➤ lstrptut_s4rnhy

Service name [lstrptut_s4rnhy.example]:
➤ lstrptut_s4rnhy.genomeassemblies

Class [Genomeassemblies]:
➤ GenomeAssemblies

Would you like to inject dependencies? [Yes]:
➤ Yes

Type the service name or use arrows up/down. Press enter to continue:
➤ tripal_chado.database

Type the service name or use arrows up/down. Press enter to continue:
➤ tripal.logger

Type the service name or use arrows up/down. Press enter to continue:
➤

The following directories and files have been created or updated:
–––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––––
• /var/www/drupal9/web/modules/lstrptut_s4rnhy/lstrptut_s4rnhy.services.yml
• /var/www/drupal9/web/modules/lstrptut_s4rnhy/src/GenomeAssemblies.php

{% endcapture %}
{% include terminal.html commands=terminal_command output=terminal_output %}
