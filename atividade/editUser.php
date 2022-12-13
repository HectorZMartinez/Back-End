<?php
include("conecta.php");
session_start();
if (!$_SESSION["usuario"] || !$_POST["nome"]) {
    header("Location: logar.php");
    exit();
}

$erro = [];
$nome = $_POST["nome"];
$senha = $_POST["senha"];
$id = $_SESSION["usuario"]["idusuario"];

if (validarFormulario($nome, $senha, $erro)) {

    if ($nome && !empty($senha)) {

        $sql = "update usuario
                set nome = '$nome'
                ,senha = '$senha'
                where idusuario = $id";
        $result = $conn->query($sql);
    }

    if (!empty($nome) && empty($senha)) {
        $sql = "update usuario
                set nome = '$nome'
                where idusuario = $id";
        $result = $conn->query($sql);
    }

    $sql = "select * from usuario where idusuario = $id";
    $result = $conn->query($sql);

    $usuario = $result->fetch_assoc();
    $_SESSION["usuario"] = $usuario;

    if (isset($_COOKIE["usuario"])) {
        $hour = time() + 3600 * 24 * 30;
        setcookie("usuario", json_encode($usuario), $hour);
    }

    header("Location:select.php?success=1");
    exit;
} else {
    $arr = json_encode($erro);
    header("Location:select.php?erro=$arr");
    exit;
}



function validarFormulario($nome, $senha, &$erro)
{
    $eValido = true;
    if (strlen($nome) == 0) {
        $eValido = false;
        $erro["nomeError"] = "O nome informado não é válido. \n";
    } else if (strlen($nome) < 3 || strlen($nome) > 50) {
        $eValido = false;
        $erro["nomeError"] = "O nome informado não é válido EX: deve conter no min 3 e Max de 50 caracteres.\n";
    }

    if (strlen($senha) == 0) {
        $eValido = false;
        $erro["senhaError"] = "A senha informada não é válida.\n";
    } else if (!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[$*&@#])[0-9a-zA-Z$*&@#]{8,}$/", $senha)) {
        $eValido = false;
        $erro["senhaError"] = "A senha informada não é válida EX: Min 8 dígitos contendo letras maiúsculas e minúsculas, números, caracteres especiais e não conter sequências. \n";
    }

    return $eValido;
}
