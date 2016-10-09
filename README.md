# Filepath Generator

## Introduction

Teertz Filepath provides a simple way to generate random paths for serving big amount of static files on the server (like user images)

The generated path is like this: `BASE_DIR.'/vrt/ssd/tgh/'`;

### Basic Usage

To get started with Teertz Filepath, add to your `composer.json` file as a dependency:

    composer require teertz/filepath

#### Get the full path
```php
<?php

use Teertz\Filepath\Generator as FilepathGenerator;

class SomeClass
{
    public function uploadSomePhoto($filename)
    {
        /* some work before */
        $filepath = new FilepathGenerator('/var/www/static/images/');
        /* some work after */
        
        return $filepath->getFullPath().$filename;

    }
}
```
You will get the `BASE_DIR` + random path like: `/var/www/static/images/ddr/ggs/rrt/{filename}`

#### Get generated path only
```php
<?php

use Teertz\Filepath\Generator as FilepathGenerator;

class SomeClass
{
    public function uploadSomePhoto($filename)
    {
        /* some work before */
        $filepath = new FilepathGenerator('/var/www/static/images/');
        /* some work after */
        
        return $filepath->getGeneratedPath().$filename;

    }
}
```
You will get the random path like: `/fth/asf/bkf/{filename}`

## License

Teertz Filepath is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)