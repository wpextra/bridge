# [Bridge](https://wpextra.co/bridge/)
[![Packagist](https://img.shields.io/packagist/vpre/roots/sage.svg?style=flat-square)](https://packagist.org/packages/wpextra/bridge)

Bridge is a WordPress starter theme with a modern development workflow.

## Features

* Sass for stylesheets
* Modern JavaScript
* [Gulp]
* [Twig]  as a templating engine
* [Bridge MVC](https://github.com/wpextra/bridge) for passing data to handle custom functions
* CSS framework: [Bootstrap 4](https://getbootstrap.com/)

See a working example at [https://demo.wpextra.co/bridge](https://demo.wpextra.co/bridge).

## Requirements

Make sure all dependencies have been installed before moving on:

* [WordPress](https://wordpress.org/) >= 4.7
* [PHP](https://secure.php.net/manual/en/install.php) >= 7.1.3 (with [`php-mbstring`](https://secure.php.net/manual/en/book.mbstring.php) enabled)
* [Composer](https://getcomposer.org/download/)
* [Node.js](http://nodejs.org/) >= 6.9.x
* [Yarn](https://yarnpkg.com/en/docs/install) / NPM

## Theme installation

Install Sage using Composer from your WordPress themes directory (replace `your-theme-name` below with the name of your theme):

```shell
# @ app/themes/ or wp-content/themes/
$ composer create-project wpextra/bridge your-theme-name
```

To install the latest development version of Sage, add `dev-master` to the end of the command:

```shell
$ composer create-project wpextra/bridge your-theme-name dev-master
```

During theme installation you will have options to update `style.css` theme headers, select a CSS framework, and configure Browsersync.

## Theme structure

```shell
themes/your-theme-name/   # → Root of your Sage based theme
├── app/                  # → Theme PHP
│   ├── apis/      		  # → Controller files
│   ├── controllers/      # → Controller files
│   ├── models/      	  # → Controller files
│   ├── repository/       # → Controller files
│   ├── persistent/       # → Controller files
│   ├── elements/         # → Your element block
│   │   ├── blocks/       # → 
│   │   ├── header/       # → 
│   │   ├── footer/       # → 
│   │   └── popups/       # → 
│   ├── config.php        # → Theme customizer setup
│   ├── filters.php       # → Theme filters
│   ├── helpers.php       # → Helper functions
│   ├── kernel.php        # → Helper functions
│   └── setup.php         # → Theme setup
├── composer.json         # → Autoloading for `app/` files
├── composer.lock         # → Composer lock file (never edit)
├── dist/                 # → Built theme assets (never edit)
├── node_modules/         # → Node.js packages (never edit)
├── package.json          # → Node.js dependencies and scripts
├── resources/            # → Theme assets and templates
│   ├── assets/           # → Front-end assets
│   │   ├── config.json   # → Settings for compiled assets
│   │   ├── fonts/        # → Theme fonts
│   │   ├── images/       # → Theme images
│   │   ├── scripts/      # → Theme JS
│   │   └── scss/         # → Theme stylesheets
│   ├── functions.php     # → Composer autoloader, theme includes
│   ├── index.php         # → Never manually edit
│   ├── screenshot.png    # → Theme screenshot for WP admin
│   ├── style.css         # → Theme meta information
│   └── views/            # → Theme templates
│       ├── layouts/      # → Base templates
│       └── partials/     # → Partial templates
└── index.php             # → 
└── archive.php           # → 
└── page.php              # → 
└── single.php            # → 
└── 404.php               # → 
└── functions.php         # → 
└── style.scss            # → 
└── vendor/               # → Composer packages (never edit)
```

## Theme setup

Edit `app/setup.php` to enable or disable theme features, setup navigation menus, post thumbnail sizes, and sidebars.

## Theme development

* Run `yarn` from the theme directory to install dependencies
* Update `resources/assets/config.json` settings:


### Build commands

* `yarn start` — Compile assets when file changes are made, start Browsersync session
* `yarn build` — Compile and optimize the files in your assets directory
* `yarn build:production` — Compile assets for production

## Documentation

* [Sage documentation](https://wpextra.co/bridge/docs/)
* [Bridge documentation](https://github.com/bridge/docs)

## Contributing

Contributions are welcome from everyone. 

## Gold sponsors

Help support our open-source development efforts by :


## Community

Keep track of development and community news.
