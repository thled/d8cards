# Drupal 8 Activity Cards

## Drupal8Cards #01 - Configuration Management in D8 #

### Objective

At the end of this course, you will be able to

* export configuration from a local or Dev environment
* transfer the same by copying the files or through version control to another environment

Thereby, moving version controlled configuration across various environments.

### Exercise

1. Setup 2 local D8 instances. Call one site Dev and the other Prod (Clone the dev site to prod, rather than setting them up individually. Research issues with mismatching UUIDs)
1. Create a simple content type (say Book) with 2 fields (Title, ISBN) and create 2 nodes of content on Dev
1. Build a simple view (of page type, accessible at the url /list) listing the book nodes
1. Export the site configuration using Drush (which includes the content type and the view) using drush cex command or Drupal Console using drupal ce
1. Copy the exported files to same directory on Prod site simulating a code pull from upstream repo.
1. Import the configuration using drush cim on prod site or drupal ci. Verify the content type and view are available on Prod.

## Dupal8Cards #02 ­- Paragraphs Module #

### Objective

At the end of this course, you will be able to

* Create paragraph types
* Use paragraphs in content types to display grouped fields appropriately.

### Exercise

1. Create a Paragraph type ­ “Social Media” with the following fields ­ 1) Embed Code (Text field that accepts any long text and is rendered without any filters (Hint: Create a text format called “Raw”) and 2) Link
1. On the Article Content type ­ Add a new field referring to the above paragraph type created (Multiple values allowed).
1. Configure display of the paragraph type and the article content type such that the embed code and link are displayed as on the screengrab attached.

Screengrabs: https://www.evernote.com/l/ASmw_AMKx2dFaqaeh3jyTA4icDft3dhvopM

### Bonus Exercise

* Theme the paragraph type such that the 2 fields (Embed code and link, wherever they are shown on any content type, are rendered in 2 columns as below:

    ```xml
    <table>
        <tr>
            <td>Embed Code</td>
            <td>Link</td>
        </tr>
    </table>
    ```

## Dupal8Cards #03 ­- Building Configuration forms #

### Objective

At the end of this course, you will be able to

* Create a very basic configuration form on a custom page
* UProvide Default values for the configuration on the form
* Save the configuration values on form submission.

### Exercise

1. Create a custom module that provides a configuration form available at the url “mymodule/config” to all users with the permission “administer content”
1. The form shall have 3 fields. Labels and Types of fields are arbitrary. Ensure you have diverse fields ­ Text, Select, Radio
1. Get the form to work such that the form values are saved and persisted on the form on reload.
1. The values submitted on the form should be accessible elsewhere on the same or a different module using the Config API.

### Bonus Exercise

* Create your own permission and use that to restrict this page

## Dupal8Cards #04 ­- Migration 101 #

### Objective

At the end of this course, you will be able to

* Import content from MySQL/CSV dump to content types, taxonomies in Drupal.

### Exercise

1. Create a movie content type with fields ­ Title (text), Plot(Formatted Text), Actors (Node Reference), Genre(Term Reference)
1. Actors and Genres are simple content type and vocab respectively with no additional fields
1. Import the CSV dumps from [here](https://drive.google.com/drive/folders/0BzCHjdGh1ZXAdGVudW9ybnBwREU) to populate the movie nodes in Drupal using Migrate API.

Preview Content: [Movies](https://www.evernote.com/l/ASk8HlRO67xMuagUArvsUDDcP3YK5AGuVro), [Actors](https://www.evernote.com/l/ASlyjvoonFhLdoi48KdFn9_Q33JNOoLB0HY)

### Bonus Exercise

* Let’s try some preprocessing while migrating. In the plot field of the movie, remove the word “the” (wherever it occurs, irrespective of the letter case).
* Add an Image field to the Movie content type. Update the migration script to use the dump file with images. Re­run the migration such that the images are downloaded and attached to the movie nodes.

## Dupal8Cards #05 ­- Block System #

### Objective

At the end of this course, you will be able to

* Create "Block Types" with fields
* Place Multiple Instances of the block type with different field values
* Programmatically update block instance values / content

### Exercise

1. Create a Block type called "Stock Exchange Rate Card"
    * Company Name
    * Symbol
    * Last Price
    * Change
1. Create Instances of the block with different sets of values and place them at different spots on the site. Example values ­ (Apple, AAPL), (Bank of America,BAC), (Transocean, RIG), (Freeport, FCX). (Ignore the Last Price and Change fields’ values, we will be dealing them in next step).
1. Below API can be used to retrieve Last Price and Change values
    http://dev.markitondemand.com/MODApis/Api/v2/Quote/json?symbol=BAC&callback=myFunction
1. Build a custom module, which on Cron run,
    * Iterates through each instance of blocks of type "Stock Exchange Price Card"
    * For each block, take the symbol value and call the API to retrieve the Last Price and Change values
    * Update the block field values programmatically with the values of Last Price and Change retrieved from the API and save the block

## Dupal8Cards #06 ­- Services and Dependency Injection #

### Objective

At the end of this course, you will be able to

* What is dependency injection
* Building Services and why build services
* Core Services

### Exercise

This is not a Drupal API to have an exercise for itself

## Dupal8Cards #07 ­- Cron Queuing #

### Objective

At the end of this course, you will be able to

* Understand and utilize the Queue API to add tasks to the queue and process them on cron runs

### Exercise

1. Build a module that sends a welcome email to registered users
1. Use the Cron Queue by adding to the queue the user id whenever a user registers
1. Create a queue worker that picks these queue items (uids) during the cron and sends a welcome email (can be any simple text) to the registered email address.

## Dupal8Cards #08 ­- Plugin System: Text Filters #

### Objective

At the end of this course, you will be able to

* Understand a bit of the plugin system
* Create a new Custom Text filter using the Plugin system

### Exercise

1. Create a custom text filter that could be added to any text format, which auto­capitalizes pre­configured words anywhere they occur in the filtered text
1. The filter has a configuration form that allows to configure the list of words that should be auto­capitalized

## Dupal8Cards #09 ­- Attaching assets (CSS/JS) #

### Objective

At the end of this course, you will be able to

* add JS/CSS to a module or a theme to be available on selection / all pages

### Exercise

1. Create a custom module and add a CSS and JS file in appropriate subdirectories in the module.
1. Create a libraries.yml file and define 2 libraries one for each of the CSS and JS.
1. Attach the CSS such that it is loaded for all Table elements shown anywhere on the site. [Hint](https://www.evernote.com/shard/s297/sh/d9be02e1-7167-42ff-b021-a1915c171794/d8fe46c64cc54283)
1. Take any custom block that you have built over the previous exercises. Modify the build() to attach the JS to be loaded whenever the block is displayed. [Hint](https://www.evernote.com/shard/s297/sh/ad090511-4c94-4209-922a-13f934ddd704/fd6c52cfe8bddab3)

## Dupal8Cards #10 ­- Configuring your local site for Development #

### Objective

At the end of this course, you will be able to

* Setting up your settings.local.php
* Null Cache Service
* Disabling Twig Cache
* rebuild.php

### Exercise

1. On your local D8 site, perform all the configuration changes mentioned on the video tutorial.

    Video tutorial: <https://www.youtube.com/watch?v=rRsOxSuJ4OU>
