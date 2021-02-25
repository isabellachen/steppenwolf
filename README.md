# Steppenwolf

A self-critical WP theme that is mostly an empty shell.
Acutally it's a menu bar and footer, ready for a page builder.

## Installation

Download and zip file and upload to Dashboard > Appearance > Themes
Activate the theme

### Requirements

Steppenwolf requires the following dependencies:

- [Node.js](https://nodejs.org/)
- [Composer](https://getcomposer.org/)

### Setup

You need to install the necessary Node.js and Composer dependencies.

```sh
$ composer install
$ npm install
```

### Menus

#### Header/Primary Menu

- Create the main menu "Header Menu"
- Set Theme Location "Primary" to "Header Menu" in Appearance > Menus > Manage Locaitons

#### Social Menu

- Create a new menu called "Social Menu"
- Set Theme Location "Social" to "Social Menu" in Appearance > Menus > Manage Locaitons
- Add custom links. You can call the Navigation label whatever you want. Steppenwolf uses the URL to deduce the social site and display the appropriate icon using font-awesome

#### Terms Menu (for the footer)

- Create a new menu called "Terms Menu"
- Set Theme Location "Terms" to "Terms Menu" in Appearance > Menus > Manage Locaitons

### Plugins

#### Mailer Subscription

You can display a 'Stay in Touch' form to get folks to sign up to your email list.
You can use any mailer plugin, like SendinBlue or MailChimp.
The area to display the sign-up form is in a widgetized area in the full screen menu.

- Install the [Sendin Blue WP plugin](https://wordpress.org/plugins/mailin/)
- If you want reCaptcha, see [create reCaptcha on Google](https://help.sendinblue.com/hc/en-us/articles/208771869-Create-a-subscription-form-)
- You can display the Sendin Blue Widget in the Menu Widget (menu_widget is activated in functions.php and displayed in header.php)

#### Contact Form 7

You can use any contact form plugin you want.
There is a widget area in the footer right for the contact form.

### Available CLI commands

- `composer lint:wpcs` : checks all PHP files against [PHP Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/php/).
- `composer lint:php` : checks all PHP files for syntax errors.
- `composer make-pot` : generates a .pot file in the `languages/` directory.
- `npm run compile:css` : compiles SASS files to css.
- `npm run compile:rtl` : generates an RTL stylesheet.
- `npm run watch` : watches all SASS files and recompiles them to css when they change.
- `npm run lint:scss` : checks all SASS files against [CSS Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/css/).
- `npm run lint:js` : checks all JavaScript files against [JavaScript Coding Standards](https://developer.wordpress.org/coding-standards/wordpress-coding-standards/javascript/).
- `npm run bundle` : generates a .zip archive for distribution, excluding development and system files.
