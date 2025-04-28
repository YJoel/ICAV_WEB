<?php

header('Content-Type: application/json');

echo json_encode([
  "SERVER[HOST]" => $_SERVER['HTTP_HOST'], // IMPORTANTE PARA BLOCKEAR PETICIONES DE OTROS DOMINIOS
  "SERVER[REQUEST_METHOD]" => $_SERVER['REQUEST_METHOD'],
  "SERVER[HTTP_REFERER]" => $_SERVER['HTTP_REFERER'],
]);

// {
// // Iniciar una nueva sesión cURL
// $ch = curl_init();

// // Establecer la URL del endpoint
// $url = "http://localhost:3000/api/users/";

// // Configurar opciones cURL
// curl_setopt($ch, CURLOPT_URL, $url);
// curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

// // Ejecutar la petición y almacenar la respuesta
// $response = curl_exec($ch);

// // Imprimir la respuesta
// echo $response;

// // Cerrar la sesión cURL
// curl_close($ch);}


// Dirección IP del cliente
// $client_ip = $_SERVER['REMOTE_ADDR'];

// Método de la solicitud (GET, POST, etc.)
// $request_method = $_SERVER['REQUEST_METHOD'];

// URL de la página que realizó la solicitud
// $referer = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : 'No se especificó un referer';

// Agente de usuario (información sobre el navegador del cliente)
// $user_agent = $_SERVER['HTTP_USER_AGENT'];

// echo "Dirección IP del cliente: $client_ip<br>";
// echo "Método de la solicitud: $request_method<br>";
// echo "Referer: $referer<br>";
// echo "Agente de usuario: $user_agent<br>";
?>