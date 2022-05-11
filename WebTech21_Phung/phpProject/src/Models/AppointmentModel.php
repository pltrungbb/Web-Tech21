<?php
  class Appointment 
  {
    private $fullname  = "";
    private $email = "";
    private $phoneNumber = "";
    private $appointment_at="" ;
    private $message = "";
   
    public function __get($attr){
      return $this->$attr;
    }

    public function __set($attr, $val){
      return $this->$attr = $val;
    }
  }