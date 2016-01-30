# Laravel 5.2 Attachfiles

[![Latest Version on Packagist][ico-version]][link-packagist]
[![Software License][ico-license]](LICENSE.md)
[![Build Status][ico-travis]][link-travis]
[![Coverage Status][ico-scrutinizer]][link-scrutinizer]
[![Quality Score][ico-code-quality]][link-code-quality]
[![Total Downloads][ico-downloads]][link-downloads]

## Intro

   Developed for easy work with the administration panel, such as Sleeping-Owl admin where all downloaded files are stored in a single folder and are not deleted if the record is not saved.
   
   Attahfiles creates a link between a record of any model and a collection of downloaded files. He keeps them in the Storage assigning unique names, creates a new folder for each month, and day and deletes the originals from the shared folder upload.

   When you remove attach,  file is deleted from Storage.
   
   You can add a file field Title, Alt, and Description. If the field Alt while maintaining empty, it is taken as the original file name.

## Install

Via Composer

``` bash
$ composer require angrydeer/attachfiles
```

after that add to config/app.php:

``` php

'providers' => [

        /*
         * Laravel Framework Service Providers...
         */
         Angrydeer\Attachfiles\AttachfilesServiceProvider::class,
         // ...
     ],

```

console:

``` bash
$ php artisan vendor:publish
$ php artisan migrate
```




## Usage

In model:

``` php

// beginning omitted
  
use Angrydeer\Attachfiles\AttachableTrait;
use Angrydeer\Attachfiles\AttachableInterface;

class SomeModel extends Model implements AttachableInterface
{

   use AttachableTrait;
   
   public function myfunc()
   {

       $model = SomeModel::find(1);
    
       $model->updateOrNewAttach($filename, $title, $alt, $desc);
    
       $model->removeAttach($filename);
       
       $all_attach_files = $model->attaches;
       
       $filearray = [ 'file1', 'file12', 'file3' ]
       
       /*
       * as example, in $all_attach_files now attaches with  'file2', 'file3', 'file4'    
       *
       */
       
       $model->keepOnly($filearray);
       $all_attach_files = $model->attaches;
       
       //  'file2', 'file3' included. file4 removed.
  
   }
  
}

```

in route.php you can write for images as example:

``` php

    Route::get('attaches/{date}/{filename}', function ($date,$filename) {
        return Storage::get('attaches/'.$date.'/'.$filename);
    });
    
```

in view:

``` php

        @foreach($model->attaches as $attach)
            <img src="{{URL::to($attach->filename)}}" alt="{{$attach->alt}}" title="{{$attach->title}}">
        @endforeach
    
```

## Change log

Please see [CHANGELOG](CHANGELOG.md) for more information what has changed recently.


## Contributing

Please see [CONTRIBUTING](CONTRIBUTING.md) and [CONDUCT](CONDUCT.md) for details.

## issues

If you discover any related issues, please using the issue tracker.

## Credits

- [AngryDeer][http://angrydeer.ru]
<!--- [All Contributors][link-contributors]-->

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/:vendor/:package_name.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/:vendor/:package_name/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/:vendor/:package_name.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/:vendor/:package_name.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/:vendor/:package_name.svg?style=flat-square

[link-packagist]: https://packagist.org/packages/:vendor/:package_name
[link-travis]: https://travis-ci.org/:vendor/:package_name
[link-scrutinizer]: https://scrutinizer-ci.com/g/:vendor/:package_name/code-structure
[link-code-quality]: https://scrutinizer-ci.com/g/:vendor/:package_name
[link-downloads]: https://packagist.org/packages/:vendor/:package_name
[link-author]: https://github.com/:author_username
[link-contributors]: ../../contributors
