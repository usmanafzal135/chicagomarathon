# WordPress Baseline Theme /w ACF Page Blocks & Foundation 6

### Dependencies
 - NPM
 - GULP

### Plugin Dependencies
- Advanced Custom Fields Pro - Blocks (License/login is in 1P) https://www.advancedcustomfields.com/resources/
- Classic Editor - https://wordpress.org/plugins/classic-editor/

### Plugins That Should Always Be Used
- Yoast WordPress SEO - https://wordpress.org/plugins/wordpress-seo/
- Gravity Forms (License/login is in 1P)

Before adding new plugins to projects, check that it is absolutley needed. Minimizing 3rd party plugin usage is best.

### Foundation/Gulp

Use `/js/foundation.js` to define Foundation needs for the project.
Use app.scss and critical.scss to define Foundation CSS needs.

### Front-End Wiki

Before starting any front-end development, please be sure to review our front-end wiki and adhere to guidelines.

http://assets.timezoneone.com/front-end-wiki/

### Theme Info
Uses standard WordPress theme templates and located in root of theme (page.php, archive.php, etc...). Folder structure is setup as follows...

```
- dist
- images
- includes
    - admin (only used to add TZO logo on login page)
    - functions (organize hooks and functions here)
    - partials (store template parts/template includes)
        blocks (there are a pre-set of blocks that can be used, once Advanced Custom Fields Pro is installed. You can also create your own, as scope requires)
- js
    - common
- scss
    - components
        - blocks (to enable styles, edit app.scss and uncomment)
- templates (to store custom templates)
```

### Critical CSS
In `/scss` there is `app.scss` and `critical.scss`. Include your SCSS partials in one of these appropriate files. Critical.scss being for above of the fold CSS.

### jQuery and JavaScript

When looking for JavaScript functionality, avoid using jQuery plugins, where possible. Instead look for plain JavaScript solutions that do not rely on jQuery.

### Page Blocks (ACF field group)

Blocks editing is based on Advanced Custom Field Pro and Flexible Content field. This allows end users to build page by block. It is similar to Gutenberg editing, but simpified. 

Intial blocks supported are listed below. You can create additonal blocks as needed using Advanced Custom Fields Pro.

- HTML Content Block (WYSIWYG)
- Accordion Block
- Half Block
- Pathways Block
- Highlights Block
- Call to Action Block
- Image Gallery Block
- Content Carousel/Slider Block
- Embed Block (like 3rd party iFrame or JS script)
- Testimonial Block
- Seperator Block

By default, Blocks are to to display on Posts and Pages. They can optionally be added to custom post types, as project requires.

Note: On posts, we have enabled the classic content editor for these posts. The reason for this is that many times we end up rebuilding an existing WordPress site that already has content. We make blocks optional here. If this is a new site and the classic content editor is not needed, disable this via `/includes/functions/wp-settings/wp-defaults.php` and adjust the `remove_editor_from_pages()` function accordingly.

**If the project requires a new block/s, you would need to do the following...**

- Create the new layout in the existing ACF field group of `Page Blocks`
- Create a template for the new block under `/includes/partial/blocks/`
- Add the block to  `/includes/partial/blocks/init-blocks.php`
- SCSS for new blocks should be stored in `/scss/components/blocks/`
- Add JavaScript in `/js`

Advanced Custom Fields Pro can be used for more than creating blocks. They can also be used to create custom fields for pages/posts and also an Options page, similar to the settings page/SiteConfig in SilverStripe.

### Custom Templates
WordPress has its own set of theme templates but you can define your own, as project dictates. These should be stored in the `templates` folder. All custom templates must include the following at the top of the file for it to be available when adding/editing pages/posts.

```php
<?php /* Template Name: My Example Template */ ?>
```
### Custom Options Page
Within the dashboard, there is a tab labeled `Options`. Out of the box, the following can be set from the CMS...

- GTM ID
- Social Links
- Custom Header/Footer Code

The options (Found in WP dashboard under Options) is another Advanced Custom Fields Pro feature that is used and allows for adding addtional custom options. For more on ACF Options Page, see:  https://www.advancedcustomfields.com/resources/options-page/

### Theme Setup

- Install WordPress
- Install Classic Editor and enable (WordPress plugin repository)
- Install Advanced Custom Fields Pro and enable (License/login is in 1P)
- Go to Custom Fields > Sync ALL ACF fields
- Activate this theme

From here, develop theme to meet project needs.
