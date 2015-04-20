<?php namespace zgldh\QiniuStorage;

use Storage;
use League\Flysystem\Filesystem;
use Illuminate\Support\ServiceProvider;

class QiniuFilesystemServiceProvider extends ServiceProvider{
    
    public function boot()
    {
        Storage::extend('qiniu', function($app, $config)
        {
            $qiniu_adapter = new QiniuAdapter($config['AccessKey'], $config['SecretKey']);

            return new Filesystem($qiniu_adapter);
        }
    }

    public function register()
    {
        //
    }
}