# Parsedown with superpowers

This library is a small layer on top of [erusev/parsedown-extra](https://github.com/erusev/parsedown-extra).

[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/Roromedia-GmbH/parsedown/badges/quality-score.png?b=main)](https://scrutinizer-ci.com/g/Roromedia-GmbH/parsedown/?branch=main)
[![Code Coverage](https://scrutinizer-ci.com/g/Roromedia-GmbH/parsedown/badges/coverage.png?b=main)](https://scrutinizer-ci.com/g/Roromedia-GmbH/parsedown/?branch=main)
[![Total Downloads](http://poser.pugx.org/roromedia/parsedown/downloads)](https://packagist.org/packages/roromedia/parsedown)
[![License](http://poser.pugx.org/roromedia/parsedown/license)](https://packagist.org/packages/roromedia/parsedown)

It currently adds support for:

- [Menu links](#menu-links)

## Installation

`composer require roromedia/parsedown`

## Usage

```php
new Parsedown())->text('your Markdown here')
```

## Menu links

You can define your Menu links on top of your markdown pages. Normally these links would not work because the ids are
missing from the associated headings.

This library solves the problem and connects them.

As an example:

```markdown
# Twig Query

A module for querying content inside TWIG-Templates

- [Installation](#installation)

# Installation

1. Install with composer:

```

... gets converted to:

```html
<h1>Twig Query</h1>
<p>A module for querying content inside TWIG-Templates</p>
<ul>
    <li><a href="#installation">Installation</a></li>
</ul>
<h1 id="installation">Installation</h1>
```

As you can see - `<h1 id="installation">Installation</h1>` has the correct `id` and therefore the menu list is working
again.
