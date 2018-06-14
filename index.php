<?php
/**
 * Front controller
 */

// dependance
require_once "config.php";

// autoload
spl_autoload_register(function($nameClass){
    require_once "Model/$nameClass.class.php";
});
