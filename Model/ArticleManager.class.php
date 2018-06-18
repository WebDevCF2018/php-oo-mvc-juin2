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
        // $get = $this->db->query("SELECT a.* FROM article a ORDER BY a.thedate DESC;");

        # aaa060 - replace a38 recup all articles with JOIN util
        $get = $this->db->query("SELECT a.*,
          u.idutil,u.thelogin,u.thename 
          FROM article a INNER JOIN util u 
            ON a.utilIdutil = u.idutil
          ORDER BY a.thedate DESC;");

        # aaa039 => one or more result
        if($get->rowCount()){

            # aaa041 - return array assoc's in array index
            return $get->fetchAll(PDO::FETCH_ASSOC);

        }else{
            # aaa040 => no result => return false
            return false;
        }
    }
    # aaa063 get one article
    public function oneArticle(int $id){
        $sql = "SELECT a.*,
          u.idutil,u.thelogin,u.thename 
          FROM article a INNER JOIN util u 
            ON a.utilIdutil = u.idutil
          WHERE a.idarticle=?";
        $request = $this->db->prepare($sql);
        $request->bindValue(1,$id,PDO::PARAM_INT);
        $request->execute();
        if($request->rowCount()){
            return $request->fetch(PDO::FETCH_ASSOC);
        }else{
            return false;
        }
    }

    # aaa094 Create (Crud)
    public function createArticle(Article $datas){

    }

}