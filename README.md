# Sage

Sage is a documentation generator for PHP code.  Unlike other documentation generators for PHP code, it is easily extended and generally doesn't suck.

![Travis-CI Status](https://travis-ci.org/dotink/Sage.png?branch=master)

## Installation

The easiest way to install sage is to clone the repository and then use composer to install dependencies.

```
git clone --recursive https://github.com/dotink/Sage.git sage
cd sage
composer install
```

_Note: The above code assumes you have composer in your path and it is self-executing without the `.phar` extension_

## Basic Usage

Once you have sage installed, you can run the following command from inside its directory:

```
php sage.php <input> <output>
```

The `input` and `output` arguments should point to directories which represent where you are reading source code from and where you wish to write documentation to, respectively.  When you run Sage, by default it will organize your documentation like this:

```
.
└── Dotink
    └── Sage
        ├── DocumentCollection.md
        ├── Document.md
        ├── Exception.md
        ├── Generator.md
        ├── TokenParser
        │   ├── TokenAuthor.md
        │   ├── TokenCopyright.md
        │   ├── TokenLicense.md
        │   ├── TokenParam.md
        │   └── TokenReturn.md
        └── Writer.md
```

The `.` at the top representing your provided output directory in the original command.  If you do not supply an output directory sage will create all documentation in `sage_output` by default in the current working directory.

## Configuration

There are a few configuration options available for Sage, but for now we will just cover how to create a config and use the most common option.

You can set any options by placing a file called `sage.config.php` at the root of your input directory or source code tree.  This allows you to create custom configuration per source tree and not have to worry about changing config options or specifying loads of parameters.

An example of what this file looks like is found below.  It also shows the most common configuration option which is the `'sort_by_type'` key.  If set to `TRUE` this will force sage to re-organize your documentation output by various structure types.  That is to say that despite Sage using namespaces for directory structure, prior to building the namespaced directory structure it will create directories such as `classes`, `functions`, etc... at the root of your output directory.  Then, within each of these will be only the documentation of those types (still within a namespace folder structure).

```php
<?php return [
    'sort_by_type' => TRUE,
];
```

We will be adding more configuration options, more templates, and more token parsers as time goes on, but currently we primarily only support the key aspects of class documentation.

## Contributing

If you'd like to contribute please contact info@dotink.org with any questions you might have on how to get started.
