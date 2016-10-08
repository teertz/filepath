# Filepath Generator

## Introduction

Teertz Filepath provides a simple way to generate random paths for static files (like user images) to serve them on server.

The generated path is like this: BASE_DIR.'/vrt/ssd/tgh/';

### Basic Usage

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
        
        return $filepath->getFullPath().$filename;

    }
}
```
You will get the random path like: /var/www/static/images/ddr/ggs/rrt/{filename}

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
        
        return $filepath->getGeneratedPath().$filename;

    }
}
```
You will get the random path like: /ddr/ggs/rrt/{filename}

## License

Teertz Filepath is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)