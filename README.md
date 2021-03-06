
[![Software License](https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square)](LICENSE)

## Tao Te Ching
Laravel artisan command to display selected or random chapters from the Tao Te Ching.

## Install
Add to your `composer.json` file:
```json
"repositories": [
    {
        "type": "vcs",
        "url": "https://github.com/devayes/Tao"
    }
 ],
```
`composer require devayes/tao:1.0`

## Usage
`php artisan tao:chapter`

`php artisan tao:chapter --chapter=14`

`echo tao($chapter, $format = 'text');`

## Example
[Chapter 14](https://github.com/devayes/Tao/blob/main/src/example/chapter_14.png)

### About
The Tao Te Ching is a Chinese classic text written around 400 BC and traditionally credited to the sage Laozi. The text's authorship, date of composition and date of compilation are debated.
