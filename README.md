# Hijri date shortcodes
Creates Wordpress shortcodes for converting between Gregorian and Hijri dates.

This plugin is simply a shortcode wrapper for [geniusts/hijri-dates](https://packagist.org/packages/geniusts/hijri-dates).

## Installation
1. Clone or download the repository to your computer.
2. Fetch the dependencies using composer:
```
$ cd hijri-date-shortcodes
$ composer update
```
3. Upload to your Wordpress plugins folder.

## Usage
1. Now
Prints the current Hijri date and time\
`[hijri_date]` (default)\
`[hijri_date rel="Now"]`
2. Relative
Prints the relative Hijri date\
`[hijri_date rel="Yesterday"]`\
`[hijri_date rel="Today"]`\
`[hijri_date rel="Tomrrow"]`
3. Conversion
From Gregorian to Hijri:\
`[hijri_date gdate="2022-12-31"]` (yyyy-MM-dd)\
From Hijri to Gregorian:\
`[hijri_date gdate="1443-12-30"]` (yyyy-MM-dd)
