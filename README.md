# Drupal 8 Activity Cards

## Drupal8Cards #01 - Configuration Management in D8 #

### Objective

At the end of this course, you will be able to

1. export configuration from a local or Dev environment
1. transfer the same by copying the files or through version control to another environment

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

1. Create paragraph types
1. Use paragraphs in content types to display grouped fields appropriately.

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
