<?php

/**
 * Created by .
 * User: Pierre
 * Date: 11/12/2015
 * Time: 16:08
 */
class Autoload
{
    private static $_instance = null;

    public static function load()
    {
        if (null !== self::$_instance)
        {
            throw new RuntimeException(sprintf('%s is running',__CLASS__ ));
        }
        self::$_instance = new self();
        if(!spl_autoload_register(array(self::$_instance,'_autoload'),false))
        {
            throw new RuntimeException(sprintf('%s could not be load as autoload',__CLASS__));
        }
    }

    public static function shutDown()
    {
        if (null !== self::$_instance)
        {
            if(!spl_autoload_unregister(array(self::$_instance),'_autoload'))
            {
                throw new RuntimeException('autoload can\'t be disabled' );
            }
            self::$_instance = null;
        }
    }

    private static function _autoload($class)
    {
        global $rep;
        $filename = $class.'.php';
        $dir = array('Config/','Controller/','Gateway/','Images/','Model/','View/');
        foreach($dir as $directory)
        {
            $file = $rep.$directory.$filename;
            if (file_exists($file))
            {
                include $file;
            }
        }
    }
}