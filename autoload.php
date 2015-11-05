<?php
  
/**
 * Package Autoloader
 *
 * Autoloads all Classes within the application/src directory
 *
 * @author Benjamin J. Anderson <andeb2804@gmail.com>
 * @package Global
 * @since 1.0.0
 * @version v1.0.1
 */
   
require_once 'src/config.php';

spl_autoload_register(function($class){
  $class = strtolower(preg_replace('/\B([A-Z])/', '_$1', str_replace(ACTIVE_SUPPORT_NAMESPACE, '', $class)));
  $file = ACTIVE_SUPPORT .
    implode( '', 
      array_map( 
        function($fragment) use ($class){
          return "/$fragment";
        }, explode( '\\', $class )
      )
    ).'.php';
    if(file_exists($file))
    {
      require_once $file;
    }
});