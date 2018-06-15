<?php
# aaa032
/**
 * Manager class Article
 */

class ArticleManager
{
    # aaa033
    private $db;

    # aaa034
    public function __construct(PDO $connect)
    {
        # aaa035
        $this->db = $connect;
    }

    # aaa036 Read for article (cRud)

    # aaa037 list all articles
    public function listArticle(){

        # aaa038 - recup all articles without util at the moment
        $get = $this->db->query("SELECT a.* FROM article a ORDER BY a.thedate DESC;");

        # aaa039 => one or more result
        if($get->rowCount()){

            # aaa41 - return array assoc's in array index
            return $get->fetchAll(PDO::FETCH_ASSOC);

        }else{
            # aaa040 => no result => return false
            return false;
        }
    }

}