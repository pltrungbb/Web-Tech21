<?php
  class Contact 
  {
    private $fullname  = "";
    private $email = "";
    private $message = "";

    public function __get($attr){
      return $this->$attr;
    }

    public function __set($attr, $val){
      return $this->$attr = $val;
    }
  }