<?php
# aaa009
/**
 * Admin controller
 */

# aaa086 test session
/*echo "<pre>";
var_dump($_SESSION);
echo "</pre>";*/

# aaa087 Managers
$ArticleM = new ArticleManager($pdo);
$UtilM = new UtilManager($pdo);

# aaa087 deconnect
if(isset($_GET['deconnect'])) {
    $UtilM->deconnect();

# aaa095 create article
}elseif(isset($_GET['post']))   {

    # aaa096 form not submitted
    if(empty($_POST)){
        # aaa097 - view form
        require "View/createArticleAdmin.view.php";
    }else{

    }

# aaa089 homepage admin
}else{
    # aaa091
    require_once "View/indexAdmin.view.php";
}