# Sage

[![Join the chat at https://gitter.im/dotink/sage](https://badges.gitter.im/Join%20Chat.svg)](https://gitter.im/dotink/sage?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)

Sage is a documentation generator for PHP code.  Unlike other documentation generators for PHP code, it is easily extended and generally doesn't suck.

[![Build Status](https://travis-ci.org/dotink/Sage.png?branch=master)](https://travis-ci.org/dotink/Sage)

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

## Contributing

If you'd like to contribute please contact info@dotink.org with any questions you might have on how to get started.
