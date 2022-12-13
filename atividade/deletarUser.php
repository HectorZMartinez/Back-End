<?php
include("conecta.php");
session_start();
if (!$_SESSION["usuario"]) {
    header("Location: logar.php");
    exit();
}

$id = $_SESSION["usuario"]["idusuario"];

$sql = "delete from usuario
where idusuario = $id";

$result = $conn->query($sql);

if (isset($_COOKIE["usuario"])) {
    setcookie("usuario", "", time() - 3600);
}

session_destroy();
header("Location: logar.php");
