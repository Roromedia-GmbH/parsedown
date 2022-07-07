# Parsedown with superpowers

This library is a small layer on top of [erusev/parsedown-extra](https://github.com/erusev/parsedown-extra).

It currently adds support for:

- [Menulinks](#menulinks)

## Installation

`composer require roromedia/parsedown`

## Menulinks

You can define your Menulinks on top of your markdown pages. Normally these links would not work because the Id's are missing from the associated headings. 

This library solves the problem and connects them automatically.