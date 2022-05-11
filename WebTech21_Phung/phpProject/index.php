<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

require './vendor/autoload.php';
require './src/Models/AppointmentModel.php';
require './src/Models/ContactModel.php';

require './src/Services/AppointmentService.php';
require './src/Services/ContactService.php';


$app = new \Slim\App;


$app->get('/contacts', function (Request $request, Response $response) {    
  try {
    // picking books from database 
    $contactService = new contactService();
    $contacts = $contactService->getAll();

    // custom json response
    $response->withStatus(200);
    $response->withHeader('Content-Type', 'application/json');
    return $response->withJson($contacts);

  } catch (PDOException $e) {
    $response->withStatus(500);
    $response->withHeader('Content-Type', 'application/json');
    $error['err'] = $e->getMessage();
    return $response->withJson($error);
  }
});

$app->get('/appointments', function (Request $request, Response $response) {    
    try {
      // picking books from database 
      $appointmentService = new appointmentService();
      $appointment = $appointmentService->getAll();
  
      // custom json response
      $response->withStatus(200);
      $response->withHeader('Content-Type', 'application/json');
      return $response->withJson($appointment);
  
    } catch (PDOException $e) {
      $response->withStatus(500);
      $response->withHeader('Content-Type', 'application/json');
      $error['err'] = $e->getMessage();
      return $response->withJson($error);
    }
  });



$app->post('/appointments', function (Request $request, Response $response) { 
  try {
    $appointment = new Appointment();    
    $appointment->__set('fullname', $request->getParam('fullname'));
    $appointment->__set('email', $request->getParam('email'));
    $appointment->__set('message', $request->getParam('message'));
    $appointment->__set('phoneNumber', $request->getParam('phoneNumber'));
    $appointment->__set('appointment_at', $request->getParam('appointment_at'));

    // adding book in db
    $appointmentService = new appointmentService();
    $appointmentService->add($appointment);

    // custom json response
    $response->withStatus(200);
    $response->withHeader('Content-Type', 'application/json');
    $message['ok'] = "appointment added successfully";
    return $response->withJson($message);

  } catch (PDOException $e) {
    $response->withStatus(500);
    $response->withHeader('Content-Type', 'application/json');
    $error['err'] = $e->getMessage(); 
    return $response->withJson($error);
  }
});


$app->post('/contacts', function (Request $request, Response $response) { 
    try {
      $contact = new Contact();    
      $contact->__set('fullname', $request->getParam('fullname'));
      $contact->__set('email', $request->getParam('email'));
      $contact->__set('message', $request->getParam('message'));
  
      // adding book in db
      $contactService = new contactService();
      $contactService->add($contact);
  
      // custom json response
      $response->withStatus(200);
      $response->withHeader('Content-Type', 'application/json');
      $message['ok'] = "Contact added successfully";
      return $response->withJson($message);
  
    } catch (PDOException $e) {
      $response->withStatus(500);
      $response->withHeader('Content-Type', 'application/json');
      $error['err'] = $e->getMessage(); 
      return $response->withJson($error);
    }
  });


$app->run();