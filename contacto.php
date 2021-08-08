<?php

//Aqui se reciben los datos del formulario

$nombre=$_POST['nombre'];
$direccion=$_POST['direccion'];
$correo=$_POST['correo'];
$mensaje=$_POST['mensaje'];

function val($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
//Son los parametros necesarios para conectarse con la BD
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "tienda_regalos";

// create connection
$conn = new mysqli($servername, $username, $password, $dbname);

//check connection
if ($conn->connect_error){
	die("Connection failed: " . $conn->connect_error);
}

$sql = "INSERT INTO datos_contacto VALUES ('$nombre','direccion','$correo','mensaje')";

if ($conn->query($sql) === TRUE) {
	echo "Datos enviados <br><a href='index.html'>Volver a la pagina principal</a>";
} else {
	echo "Error: " . $sql . "<br>" . $conn->error;
}
	
$conn->close();

