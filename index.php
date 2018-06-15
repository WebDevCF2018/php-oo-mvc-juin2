<?php
# aaa002
/**
 * Front controller
 */

// session
session_start();

# aaa003
// dependance
require_once "config.php";

# aaa005
// autoload
spl_autoload_register(function($nameClass){
    require_once "Model/$nameClass.class.php";
});

// pre routing # aaa006
// if connected
if(isset($_SESSION['monid'])&&$_SESSION['monid']==session_id()){

    require_once "Controller/AdminController.php";

// if public # aaa007
}else{

    require_once "Controller/PublicController.php";

}