<?php
header("Access-Control-Allow-Origin:*");
require_once 'Connection.php';

$rawData = file_get_contents('php://input');
$order = json_decode($rawData);

$date = new DateTime();
$now = $date->format('Y-m-d');

// 9. Generar la sentencia SQL para insertar los valores del id de la orden y la variable now en la tabla orders

// --
// 9. Realizar la consulta a la base de datos y guardar su resultado en la variable $result

// --
if($result === null){
    echo "Error al crear el pedido";
}
$orderId = $connection->getLastId();

foreach($order->products as $product){
    $query = "INSERT INTO order_details (orderId, productId, quantity)
        VALUES($orderId, {$product->id}, 1)";
    $connection->query($query);
}


echo( json_encode(["message" => "Se ha registrado el usuario"]) );
