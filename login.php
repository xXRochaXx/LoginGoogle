<?php

require __DIR__ . '/vendor/autoload.php';

use Google\Client as GoogleClient;
use App\Session\User;

if(!isset($_POST['credential']) || !isset($_POST['g_csrf_token'])) {
    header('location: index.php');
    exit;
}

$cookie = $_COOKIE['g_csrf_token'] ?? '';

if ($_POST['g_csrf_token'] != $cookie) {
    header('location: index.php');
    exit;
}
$CLIENT_ID = "AQUI VAI SEU CLIENT ID";
$id_token = $_POST['credential'];

$client = new GoogleClient(['client_id' => $CLIENT_ID]);  // Specify the CLIENT_ID of the app that accesses the backend
$payload = $client->verifyIdToken($id_token);
if ($payload) {
   User::login($payload['name'], $payload['email']);
   header('location: index.php');
   exit;
}

die('Problemas ao consultar API');
