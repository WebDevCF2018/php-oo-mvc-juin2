<?php
# aaa029
/**
 * Public controller
 */

# aaa050 ArticleManager
$ArticleM = new ArticleManager($pdo);

# var_dump($ArticleM);


# aaa030 create routing login
if(isset($_GET['login'])) {


# aaa062 create routing for single article
}elseif (isset($_GET['detail'])&&ctype_digit($_GET['detail'])){ // integer positive in a string (ctype_digit)

    $idArticle = (int) $_GET['detail'];

    # aaa064 recup one article
    $recup = $ArticleM->oneArticle($idArticle);

    if(!$recup){
        $oneView = "Article supprimé ou non existant";
    }else{
        $item = new Article($recup);
        //var_dump($item);
    }

    # aaa065 - require_once View/detail.view.php
    require_once "View/detail.view.php";

    
# aaa031 create routing homepage
}else{

    # aaa051 ArticleManager->listArticle()
    $recup = $ArticleM->listArticle();

    // if 1 or more article(s)
    if($recup){

        # aaa052 list and create table with object Article
        foreach ($recup as $item){
            $listView[] = new Article($item);
        }
    }else{ // if false
        $listView = "Il n'y a pas encore d'article.";
    }

    # aaa053 require_once View/index.view.php
    require_once "View/index.view.php";

}