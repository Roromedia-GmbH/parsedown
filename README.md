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

## Menu links

You can define your Menu links on top of your markdown pages. Normally these links would not work because the ids are
missing from the associated headings.

This library solves the problem and connects them.

As an example:

```markdown
# Twig Query

A module for querying content inside TWIG-Templates

- [Installation](#installation)
```

... gets converted to:

```html
<h1>Twig Query</h1>
<p>A module for querying content inside TWIG-Templates</p>
<ul>
    <li><a href="#installation">Installation</a></li>
</ul>
<h1 id="installation">Installation</h1>
<ol>
    <li>Install with composer:</li>
</ol>
<pre><code class="language-shell">composer require drupal/twig_query</code></pre>
<p>If you want to specify a version you can find all the tags under <code>Source code</code> on <a
        href="https://www.drupal.org/project/twig_query">https://www.drupal.org/project/twig_query</a></p>
```

As you can see - `<h1 id="installation">Installation</h1>` has the correct `id` and therefore the menu list is working again.
