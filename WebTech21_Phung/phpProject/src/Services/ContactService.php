<?php
require __DIR__ . '/../../configDB.php';

  class contactService {    
    private $pdo;

    public function connect(){
      $connect_str = "mysql:host=".DB_HOST.";dbname=".DB_NAME;

      $pdo = new PDO($connect_str, DB_USER, DB_PASSWORD);

      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $this->pdo = $pdo;
    }

    public function getAll(){
      $sql = "SELECT * FROM contact;";
      $this->connect();

      $stmt = $this->pdo->query($sql);

      $this->pdo = null;
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function add(Contact $contact){
      $sql = "INSERT INTO contact values(:fullname,:email,:message);";
      
      $this->connect();

      $stmt = $this->pdo->prepare($sql);

      $res = $stmt->execute(array(
        'fullname' => $contact->__get('fullname'),
        'email'  => $contact->__get('email'),
        'message'  => $contact->__get('message'),
        )
      );      
    }
   
  }