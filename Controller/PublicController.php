<?php
# aaa029
/**
 * Public controller
 */

# aaa050 ArticleManager
$ArticleM = new ArticleManager($pdo);

# var_dump($ArticleM);


# aaa030 create routing login
if(isset($_GET['login'])){


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