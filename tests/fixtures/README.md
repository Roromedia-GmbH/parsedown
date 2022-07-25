# Twig Query

A module for querying content inside TWIG-Templates

- [Installation](#installation)
- [Usage and Cheatsheet](#usage-and-cheatsheet)
  - [Fetch data](#fetch-data)
  - [Conditions](#conditions)
    - [.where()](#where)
      - [String and Object notation](#string-and-object-notation)
    - [.orderBy()](#orderby)
    - [.limit()](#limit)
    - [.group()](#group)
      - [and](#and)
      - [or](#or)

# Installation

1. Install with composer:

```shell
composer require drupal/twig_query
```

If you want to specify a version you can find all the tags under `Source code` on [https://www.drupal.org/project/twig_query](https://www.drupal.org/project/twig_query)

2. Enable the module inside the terminal with drush:

```shell
drush en twig_query
```

# Usage and Cheatsheet

Once your module is installed you are now able to access the global `query` variable inside your TWIG templates.

Because examples often say more than a thousand words and at the same time make a good reference work, there is now an
example with a brief explanation for each function of this module.

## Fetch data

```
{% set projects = query.entries.type('project').all() %}
{% set tags = query.taxonomy.type('tags').all() %}
```

The `projects` variable will contain any Nodes of type of `project`.<br>
The `tags` variable will contain any Terms of type `tag`.

## Conditions

Everything in this chapter applies to both nodes and taxonomies.

### .where()

The `.where()` notation comes in different spellings.

##### string and object notation

In both of the following statements you are querying all nodes by type project with a specific title of `Stargate`.

```
{% set stargate = query.entries
  .type('project')
  .where({title: 'Stargate'})
  .all() %}

{% set stargate = query.entries
  .type('project')
  .where('title Stargate')
  .all() %}
```

> At the moment the string notation is only possible when the searched value can be expressed in just one word or
> number.

### .orderBy()

```
{% set projects = query.entries
  .type('project')
  .orderBy('created DESC')
  .all() %}
```

### .limit()

```
{% set projects = query.entries
  .type('project')
  .limit(2)
  .all() %}
```

### .group()

It is possible to group where conditions.

### and

```
{% set projects = query.entries
.type('project')
.group([{title: 'Stargate'}, {description: 'my description'}])
.all() %}
```

### or

```
{% set projects = query.entries
.type('project')
.group([{title: 'Stargate'}, {title: 'Gamma'}], 'or')
.all() %}
```
