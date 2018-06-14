<?php
/**
 * Front controller
 */

// session
session_start();

// dependance
require_once "config.php";

// autoload
spl_autoload_register(function($nameClass){
    require_once "Model/$nameClass.class.php";
});

// pre routing
// if connected
if(isset($_SESSION['monid'])&&$_SESSION['monid']==session_id()){

    require_once "Controller/AdminController.php";

// if public
}else{

    require_once "Controller/PublicController.php";

}