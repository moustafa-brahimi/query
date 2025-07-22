# Query

Contributors: brahimi mustapha
Requires at least: 5.0
Tested up to: 6.0
Requires PHP: 7.0
License: GNU General Public License v2 or later
License URI: https://www.gnu.org/licenses/old-licenses/gpl-2.0.html
Tags: custom-colors, one-column, blog, rtl-language-support, custom-logo, accessibility-ready

Query is an Arabic WordPress Theme For Personal Blogs with modern design and excellent readability.

## Description
Query is a clean and modern WordPress theme specially designed for Arabic personal blogs. The theme focuses on content readability and provides a beautiful browsing experience for your readers.

Features:
* Modern, clean design
* RTL support for Arabic content
* Customizable colors scheme
* Custom logo support
* Accessibility features including skip links
* Multiple post formats (standard, video, gallery, audio, status, image)
* Responsive layout for all devices
* Various post display styles (full width, masonry, list)
* Social media integration
* Header ad placement options

Manual: https://github.com/brahimi-mustapha/query/blob/main/manual.pdf

## Installation 

1. Upload the theme files to the `/wp-content/themes/query` directory, or install the theme through the WordPress themes screen directly.
2. Activate the theme through the 'Themes' screen in WordPress.
3. Use the Appearance -> Customize menu to configure theme options.

## Frequently Asked Questions

### How do I change the theme colors?

You can change the theme colors from the WordPress Customizer under Appearance > Customize > Colors.

### Does this theme support RTL languages?

Yes, Query has full support for RTL languages, especially Arabic.

### How do I set up the homepage slider?

The homepage slider displays your recent posts with featured images. You can configure it from the WordPress Customizer under Appearance > Customize > Latest Posts.

## Changelog

**1.6.6**

* Added new comments.php template with enhanced accessibility features
* Improved Bootstrap styling for comment form elements
* Added proper comment threading and navigation
* Updated theme compatibility with WordPress 6.8
* Fixed comment form field validation and labeling
* Enhanced security with proper escaping in comment templates
* Added GDPR-compliant cookie consent checkbox styling
* Improved screen reader text for comment navigation
* Optimized comment display on mobile devices

**1.6.5**

* Fixed set_query_var() usage - replaced with get_template_part() with $args parameter for better WordPress compliance
* Removed OpenGraph functionality (moved to plugin territory as per WordPress guidelines)
* Fixed wp_reset_postdata() placement - moved after endwhile loops for proper query restoration
* Enhanced security with proper data escaping using esc_attr(), esc_url(), esc_html(), and wp_kses_post()
* Removed all error suppression operators (@) for better error handling and debugging
* Added nonce verification to AJAX functions for improved security
* Improved input sanitization with absint() and sanitize_text_field()
* Enhanced translation function calls using esc_html_e() instead of _e()
* Code cleanup and WordPress coding standards compliance
* Removed unwanted .bak files from theme directory


**1.6.4**

fixes esc issues, reducing textarea fields

**1.6.3**

improve keyboard navigation and solve accessbility issues

**1.6.2**
* This update adds accessibility improvements including a skip link for keyboard navigation and fixes content ID issues across template files.
* Added skip link for improved accessibility
* Fixed content ID issues across template files
* Updated theme to work with WordPress 6.0

**1.6.1**
* Improved RTL support
* Fixed mobile menu display issues
* Enhanced search functionality

**1.6.0**
* Added new post display styles (masonry, list)
* Improved responsive design
* Added social media menu

**1.5.0**
* Added support for custom logo
* Enhanced customizer options
* Fixed pagination issues

**1.0.0**

**Initial release**

### Third-Party Resources

1. **Bootstrap**
   - Version: 3.7.7
   - License: MIT
   - Source: https://getbootstrap.com

2. **Font Awesome (Free)**
   - Version: 5.x
   - License: 
     - Font files: SIL Open Font License 1.1
     - CSS/JS: MIT License
   - Source: https://fontawesome.com/license/free

3. **Google Fonts**
   - Fonts used: e.g., "Roboto", "Open Sans"
   - License: SIL Open Font License 1.1
   - Source: https://fonts.google.com/knowledge/glossary/licensing

4. **jQuery**
   - Version: WordPress-bundled
   - License: MIT
   - Source: https://jquery.com/

5. **Images**
   - Images (separ.png, background.png, background-404.gif): Designed by theme author
   - Pictures Used in the screenshot
      -  https://openverse.org/image/bf3ef685-77a4-4386-977f-5d3166307e04?q=animal&p=7
      -  https://openverse.org/image/45f8373f-17d3-4d74-95dd-7e2facf3de61?q=laptop&p=53
      -  https://openverse.org/image/8ac10702-509e-4a62-8b9f-8c24aa16b4c3?q=sport&p=56
      -  https://openverse.org/image/c214cdd4-b5a6-40f5-9d1b-883b6e386095?q=clock&p=3
      - Licenses : https://creativecommons.org/share-your-work/cclicenses/