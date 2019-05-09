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

## Dupal8Cards #11 ­- Creating a Custom D8 Content Entity Type #

### Objective

At the end of this course, you will be able to

* create a content entity type with administration management pages

### Exercise

1. Create a custom content entity type called “Contact” with the following fields:
    * Name
    * Email Address
    * Telephone
    * Address
1. Build / Provide a minimal CRUD management page to manage the custom contact entities
1. Explore why would you even want to define a custom entity type vs using a Content Type

## Dupal8Cards #12 ­- Theming 101 #

### Objective

At the end of this course, you will be able to

* build a very basic 3 column D8 theme using "stable" as the base theme

### Exercise

1. Generate a new theme with “stable” as the base theme usingDrupal console.
1. Define 3 regions (sidebar1, content, sidebar2 while generatingthe theme).
1. Turn on Twig Debugging to see the template names in use, as well as template name suggestions (This is covered in our Day10 course) in the view source.
1. Override page.html.twig in your theme such that 3 columns are rendered in the page.

## Dupal8Cards #13 ­- Logging in D8 #

### Objective

At the end of this course, you will be able to

* use the replacement of watchdog() in D8

### Exercise

1. Build a small custom module, which adds to the “Recent Log Messages” a message of type “Node Updates” with the message “Node with title %NODE_TITLE% of type %NODE_TYPE% has been updated“ whenever a node is updated.

## Dupal8Cards #14 ­- Features Module in D8 #

* _skipped_

## Dupal8Cards #15 ­- Creating a Custom Field Formatter #

### Objective

In this course today, we will be revising the plugin system bycreating a custom field formatter.

### Exercise

1. On the Movie content type, create a Decimal field called Rating that accepts any decimal value between 0 and 5.
1. Build a custom field formatter for decimal fields, which when selected for the display, will show the decimal value (between 0 and 5) as a collection of stars. (Of course quantized at 0.5 stars, as limited by the CSS we chose to implement.)

CSS: http://www.webcodingeasy.com/Webdesign/Display-simple-CSS-star-rating

## Dupal8Cards #16 ­- Dependency Injection Example / Service Container #

### Objective

We will be trying out an example today, in an attempt to use Dependency Injection by modifying an existing code without changing any functionality.

### Exercise

1. Download the examples module from https://www.drupal.org/project/examples. It has a bunch of modules but we will be interested in the  page_example  module only, during the course of this exercise.
1. The module has a  PageExampleController  defined in src/Controller/PageExampleController.php. The  simple() method in this controller is responsible for rendering the url “examples/page_example/simple”  when the module is enabled.
1. Let’s modify this method by adding a line such that a log entry is made whenever this url is opened.
    `\Drupal::logger('page_example_module')->notice('Simple Page was displayed');`
1. Now, this is the code we will start with for our exercise.
1. Modify the code to use dependency injection to give access to logger.factory service from our controller, which will be used to do the logging, instead of \Drupal::logger.
1. The links in additional resources are a great read towards achieving this.

## Dupal8Cards #17 ­- Composer in your module to load PHP libraries #

### Objective

In this session, we will see how we could leverage composer,and composer-merge-plugin to load PHP libraries / SDKs in our custom modules

### Exercise

1. Create a custom module.
1. Update the module’s composer.json file to include this library <https://packagist.org/packages/guhelski/forecast­php>
1. Install `wikimedia/composer-merge-plugin`. Run `composer ­update` in root such that the mentioned library is fetched to the vendor folder and autoloaded and hence is available for use in your module.
1. Build a custom block with a [configuration form that takes latitude and longitude in the configuration form](https://www.evernote.com/l/ASlXtGHPMWJP7aNyvPRqyjJdWlGtft5SxYA).
1. The block, when enabled should show the forecast for the configured location by a simple text as "Forecast is XXXXX with temperature of XXX deg C". This forecast information is retrieved using [Forecast wrapper library](https://packagist.org/packages/guhelski/forecast-php) that we included.
1. API Key you could use = `7411b0e6d5e0c99fbd7405fd6de00cd5` (Alternatively, you could register on forecast.io for the key).

## Dupal8Cards #18 ­- Events and Subscriber #

### Objective

In this session, we will take a look into the Events and Subscribers which is a mechanism very similar to the Drupal’s hook system which allows one component of code to be triggered when something else is triggered.

### Exercise

1. Modify the page_example module such that whenever the “examples/page_example/simple” page is loaded, an event “simple_page_load” is dispatched.
1. In your custom module, subscribe to the earlier event. Implement some custom code in your subscriber (Say make an entry to database logging under “Simple Page” type with the message “Simple Page Loaded”).

## Dupal8Cards #19 ­- Twig Templating #

### Objective

In this session, we will take a look at basics of Twig Templating, that has replaced the PHPTemplate engine in Drupal.

### Exercise

1. Download and install [this module](https://github.com/saitanay/day19/archive/master.zip). This module provides a very basic block whose template is "day19/templates/day19‐twig‐test.html.twig". The build() of the block provides variables­ "var1, var2, classes, myclasscount" that are available in the template to be used.
1. Place the block provided by the module ("My Block") onto a region on your site from block admin interface, so you can view the block.
1. If you see the block display "Your template goes here.."­ you are all set now. Go further.
1. Now modify the template as below
    1. If "var1" is set, print the value of "var1".
    1. Move the output of "var1" to a "<span>" whose class names are those provided by "classes" variable passed to the template (Hint:­ Ensure that the class names are cleaned enough so they deserve to be class names).
    1. Print the variable "$var2[3][‘g’]".
    1. Print the word "Hello", such that it can be translated using the admin translation interface.
    1. Move the "Hello" string into a "<div>" such that the div has all classes in the pattern "minion0, minion1, minion2, minion3, minion4.....till minionX", where "X" is provided by the value of "myclasscount" variable.
    1. Try out "{{ dump() }}" and "{{ dump(var1) }}" on the template to see how the printed variables show up on the screen.
1. With the above changes, the markup of the rendered block is expected to besomething like [this](https://www.evernote.com/l/ASnkTipykNpL5ZxfvW-jwahb4BY_KK4w-hg).

### Bonus Exercise

* The provided solution has a bug wherein the classes added to the span enclosing "var1", are also added as classes to the div enclosing the translatable "Hello" String. Fix the template.
