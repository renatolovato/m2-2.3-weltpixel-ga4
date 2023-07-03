# m2-weltpixel-ga4

### Installation

Dependencies:
 - m2-weltpixel-backend

With composer:

```sh
$ composer config repositories.m2-weltpixel-ga4 git git@github.com:Weltpixel/m2-weltpixel-ga4.git
$ composer require weltpixel/module-ga4:dev-master-m2.3
```
Note: Composer installation only available for WeltPixel internal use for the moment as the repositos are not public. However, there is a work around that will allow you to install the product via composer, described in the article below: https://support.weltpixel.com/hc/en-us/articles/115000216654-How-to-use-composer-and-install-Pearl-Theme-or-other-WeltPixel-extensions


Manually:

Copy the zip into app/code/WeltPixel/GA4 directory


#### After installation by either means, enable the extension by running following commands:

```sh
$ php bin/magento module:enable WeltPixel_GA4 --clear-static-content
$ php bin/magento setup:upgrade
```
