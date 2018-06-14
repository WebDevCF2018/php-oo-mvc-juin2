<?php
/**
 * Mapping table article
 */

class Article
{
    private $idarticle, $thetitle, $thetext, $thedate, $utilIdutil;

    public function __construct(array $datas)
    {
        $this->hydrate($datas);
    }

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


    public function setIdarticle($idarticle)
    {
        $this->idarticle = (int) $idarticle;
    }

    public function setThetitle(string $thetitle)
    {
        $check = trim(htmlspecialchars(strip_tags($thetitle),ENT_QUOTES));
        if(!empty($check)) {
            $this->thetitle = $check;
        }
    }

    public function setThetext(string $thetext)
    {
        $check = trim(htmlspecialchars(strip_tags($thetext),ENT_QUOTES));
        if(!empty($check)) {
            $this->thetext = $check;
        }
    }

    public function setThedate($thedate)
    {
        if(!empty($thedate)) {
            // regex ok
            preg_match("/^(\d{4})-([0]\d|[1][0-2])\-([0-2]\d|[3][0-1]) ([0-1]\d|[2][0-3]):([0-5][0-9]):([0-5][0-9])/",$thedate,$sort);
            if(!empty($sort)){
                $this->thedate = $thedate;
            }else{
                $this->thedate = date("Y-m-d H:i:s");
            }
        }else{
            $this->thedate = date("Y-m-d H:i:s");
        }
    }

    public function setUtilIdutil($utilIdutil)
    {
        $this->utilIdutil = (int) $utilIdutil;
    }


    public function getIdarticle()
    {
        return $this->idarticle;
    }

    public function getThetitle()
    {
        return html_entity_decode($this->thetitle);
    }

    public function getThetext()
    {
        return html_entity_decode($this->thetext);
    }

    public function getThedate()
    {
        return $this->thedate;
    }

    public function getUtilIdutil()
    {
        return $this->utilIdutil;
    }

}
/*
$test = new Article(["idarticle"=>16, "thetitle"=>"Titre", "thetext"=>"Bonjour à tous", "thedate"=>"2018-05-24 21:12:25", "utilIdutil"=>5]);
echo "<pre>";
var_dump($test);
echo "</pre>";
*/