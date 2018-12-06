# Drupal8Cards #01 - Configuration Management in D8 #

## Objective

At the end of this course, you will be able to
1. export configuration from a local or Dev environment
1. transfer the same by copying the files or through version control to another environment
Thereby, moving version controlled configuration across various environments.

## Exercise

1. Setup 2 local D8 instances. Call one site Dev and the other Prod (Clone the dev site to prod, rather than setting them up individually. Research issues with mismatching UUIDs)
2. Create a simple content type (say Book) with 2 fields (Title, ISBN) and create 2 nodes of content on Dev
3. Build a simple view (of page type, accessible at the url /list) listing the book nodes
4. Export the site configuration using Drush (which includes the content type and the view) using drush cex command or Drupal Console using drupal ce
5. Copy the exported files to same directory on Prod site simulating a code pull from upstream repo.
6. Import the configuration using drush cim on prod site or drupal ci. Verify the content type and view are available on Prod.
 
