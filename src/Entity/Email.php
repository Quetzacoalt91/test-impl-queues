<?php

namespace App\Entity;

class Email
{
    protected $content;
    
    public function getContent()
    {
        return $this->content;
    }

    public function setContent($content)
    {
        $this->content = $content;
    }

}
