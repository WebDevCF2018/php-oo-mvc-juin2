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
            }
        }
    }


    // 5 Setters

    public function setIdutil($idutil)
    {
        $this->idutil = $idutil;
    }

    public function setThelogin($thelogin)
    {
        $this->thelogin = $thelogin;
    }

    public function setThename($thename)
    {
        $this->thename = $thename;
    }

    public function setThepwd($thepwd)
    {
        $this->thepwd = $thepwd;
    }

    public function setThemail($themail)
    {
        $this->themail = $themail;
    }



}

// $array=["idutil"=>5,"thename"=>"coucou","thelulu"=>5];