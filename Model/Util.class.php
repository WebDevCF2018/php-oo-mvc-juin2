<?php
/**
 * Mapping table util
 */

class Util
{
    // 1
    private $idutil, $thelogin, $thename, $thepwd, $themail;

    // 2
    public function __construct(Array $datas)
    {
        // 4
        $this->hydrate($datas);
    }

    // 3
    private function hydrate(Array $theDatas){
        foreach ($theDatas as $thekey => $thevalue){
            $createNameSetter = "set".ucfirst($thekey);
            if(method_exists($this,$createNameSetter)){
                $this->$createNameSetter($thevalue);
            }else{
                echo "The setter: $createNameSetter don't exist<br>";
            }
        }
    }


    // 5 Setters

    public function setIdutil($idutil)
    {
        // 7 protected setters
        $this->idutil = (int) $idutil;
    }

    public function setThelogin(string $thelogin)
    {
        $data = trim(htmlspecialchars(strip_tags($thelogin)),ENT_QUOTES);
        if(!empty($data)) {
            $this->thelogin = $data;
        }
    }

    public function setThename(string $thename)
    {
        $data = trim(htmlspecialchars(strip_tags($thename)),ENT_QUOTES);
        if(!empty($data)) {
            $this->thename = $data;
        }
    }

    public function setThepwd(string $thepwd)
    {
        $this->thepwd = hash("sha256",$thepwd);
    }

    public function setThemail(string $themail)
    {
        $mail = filter_var($themail,FILTER_VALIDATE_EMAIL);
        if($mail) {
            $this->themail = $themail;
        }
    }

    // 6 getters

    public function getIdutil()
    {
        return $this->idutil;
    }

    public function getThelogin()
    {
        return $this->thelogin;
    }

    public function getThename()
    {
        return $this->thename;
    }

    public function getThepwd()
    {
        return $this->thepwd;
    }

    public function getThemail()
    {
        return $this->themail;
    }

}
/*
$array= new Util(["idutil"=>5,"thename"=>"coucou","thelulu"=>5]);
$array2 = new Util(["idutil"=>"3","thelogin"=>"pouD<br>d","thename"=>"Pierre","thepwd"=>"admin","themail"=>"gggg@dd.com"]);
echo "<pre>";
var_dump($array,$array2);
echo "</pre>";
*/