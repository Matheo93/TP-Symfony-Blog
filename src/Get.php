<?php 

namespace App;

class Get
{
    private $idGet = 1;
    private $title = null;
    private $content = null;

    public function __construct()
    {
        echo "Hello from Get class";
    }

    public function getIdGet()
    {
        return $this->idGet;
    }

    public function setIdGet($idGet)
    {
        $this->idGet = $idGet;
        return $this;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function setTitle($title)
    {
        $this->title = $title;
        return $this;
    }

    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
        return $this;
    }
}