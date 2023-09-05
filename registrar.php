<?php

$Nombre = isset($_POST['Nombre']) ? $_POST['Nombre'] : '';
$Apellido = isset($_POST['Apellido']) ? $_POST['Apellido'] : '';
$UCorreo = isset($_POST['UCorreo']) ? $_POST['UCorreo'] : '';
$Contraseña = isset($_POST['Contraseña']) ? $_POST['Contraseña'] : '';

try {

    $conexion = new PDO("mysql:host=localhost;port=3310;dbname=datos", "root", "");
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);

    $pdo = $conexion->prepare('INSERT INTO clientes(Nombre, Apellido, UCorreo, Contraseña) VALUES(?, ?, ?, ?)');
    $pdo->bindParam(1, $Nombre);
    $pdo->bindParam(2, $Apellido);
    $pdo->bindParam(3, $UCorreo);
    $pdo->bindParam(4, $Contraseña);
    $pdo->execute() or die(print($pdo->errorInfo()));

    echo json_encode('true');

} catch(PDOException $error) {
    echo $error->getMessage();
    die();
}