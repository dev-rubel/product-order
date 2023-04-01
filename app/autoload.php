<?php
if(!session_id()) session_start();

spl_autoload_register('MLoader::ClassLoader');
spl_autoload_register('MLoader::LibraryLoader');
spl_autoload_register('MLoader::HelperLoader');
spl_autoload_register('MLoader::DatabaseLoader');

class MLoader
{
    public static function ClassLoader($className)
    {
          self::reuse('app/Classes', $className);
    }


    public static function LibraryLoader($className)
    {
         self::reuse('app/Library', $className);
    }


    public static function HelperLoader($className)
    {
         self::reuse('app/Helper', $className);
    }


    public static function DatabaseLoader($className)
    {
         self::reuse('app/Database', $className);
    }

    public static function reuse($folder, $className)
    {
        $path = $folder.'/';
        $extension = '.php';
        $fileName = $path . $className . $extension;

        if(!file_exists($fileName)) {
               return false;
          }

          include_once $fileName;
    }

}