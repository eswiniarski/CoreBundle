# ESCoreBundle
###### Simple symfony2 skieleton bundle

This is core bundle for symfony2 framework which provides basic configuration and features for your new project.
This core bundle should be registered as parent for your bundle.

## What included
- jQuery
- Bootstrap 3
- Font Awesome
- EU cookie info
- Symfny assetic bundle
- Lexik Translation Bundle

## Features
- Configutation for less preprcesor, uglifyjs and uglifycss
- Layout structure
- Locale switcher
- Flash messages support
- Ready to use pagination tmeplate
- Example bootstrap 3 layout

## Instalation

1. In your composer.json file add:
    ```
    "require": {
        ...
        "eswiniarski/core-bundle": "dev-master"
    },
    ```
    and you need to add repositories becouse it's not on packagist yet:
    ```
    "repositories" : [{
       "type" : "git",
       "url" : "https://github.com/eswiniarski/CoreBundle.git"
   }],
   ```
2. Run composer update
3. Add this bundle to your AppKernel.php:
``` php
$bundles = array(
    ...
    new ES\CoreBundle\ESCoreBundle(),
    ...
)
```

4. Import routing:
In app/config/routing.yml add:
``` yaml
es_core:
     resource: "@ESCoreBundle/Resources/config/routing.yml"
```

5. In your app bundle's Resources/public/less/app.less file add:
``` scss
@import "../../../../../../vendor/eswiniarski/core-bundle/Resources/public/less/app.less";
```

6. app/console cache:clear
7. app/console assets:install
8. app/console assetic:dump
9. Try running project in your browser

## Layout structure

This is twig block based template.
- layout.html.twig - main layout file
- Form - forms templates
- Site - specyfic site templates
- Partials - smaller reusable template parts

You can override any part of this bundle by using standard [bundle inheritance ](http://symfony.com/doc/current/bundles/inheritance.html)

## Creating example page
In your app bundle under Resources/views create layout.html.twig file Which extends ESCore bundle's layout.html.twig
then in Resources/views create Site directory and inside this directory create about.html.twig file Which extends your app's layout.html.twig
and in about.html.twig override any block depends on your needs. As example you can see vendor/eswiniarski/core-bundle/Resources/views/Site/index.html.twig

### Using custom javascript and less

#### javascript
Every javascript file in your bundle's Resources/public/js/
will be automaticly loaded

#### less
If you want to add custom less file you shold add it to Resources/public/less/app.less or make import in this file

After createing custom javascript or less file you should run:
```
assetic:dump command
```

## Using EU cookie info

In your javascript file add:
``` js
$(document).euCookieLawPopup().init({
    htmlMarkup : $('.eupopup-markup')
});
```

## License
This bundle is under the MIT license. For more information, see the complete [LICENSE](LICENSE) file in the bundle.
