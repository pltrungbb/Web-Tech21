<?php
require __DIR__ . '/../../configDB.php';

  class appointmentService {    
    private $pdo;

    public function connect(){
      $connect_str = "mysql:host=".DB_HOST.";dbname=".DB_NAME;

      $pdo = new PDO($connect_str, DB_USER, DB_PASSWORD);

      $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

      $this->pdo = $pdo;
    }

    public function getAll(){
      $sql = "SELECT * FROM appointment;";
      $this->connect();

      $stmt = $this->pdo->query($sql);

      $this->pdo = null;
      return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }


    public function add(Appointment $appointment){
      $sql = "INSERT into appointment values(:fullname,:email,:phoneNumber,:appointment_at,:message);";
      
      $this->connect();

      $stmt = $this->pdo->prepare($sql);

      $res = $stmt->execute(array(
        'fullname' => $appointment->__get('fullname'),
        'email'  => $appointment->__get('email'),
        'message'  => $appointment->__get('message'),
        'phoneNumber'  => $appointment->__get('phoneNumber'),
        'appointment_at'  => $appointment->__get('appointment_at'),
        )
      );      
    }
   
  }