<?php
include("validarLog.php");

$display = "none";
if (isset($_GET["erro"])) {
    $erro = json_decode($_GET["erro"]);
}

if (isset($_GET["OK"])) {
    $OK = json_decode($_GET["OK"]);
}
?>

<!DOCTYPE html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="script/style.css">
    <title>Login</title>
</head>

<body>
    <div class="container mx-auto bg-light mt-4 w-80" style="max-width: 550px; box-shadow: rgba(0, 0, 0, 0.24) 0px 8px 15px;">
        <main class="col-12 pt-4">
            <h2 id="formulario">Suas informações cadastradas</h2>
            <?php
            if (isset($_GET["OK"])) :
            ?>
                <div style="color: green;">
                    USUÁRIO EDITADO!
                </div>
            <?php
            endif;
            ?>

            <form method="post">

                <div class="form-group row">
                    <label for="nome" class="col-sm-2 col-form-label col-form-label-sm">Nome</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control form-control-sm" placeholder="Digite seu nome" name="nome" id="nome" value="<?php echo $_SESSION["usuario"]["nome"] ?>" required minlength="3" required maxlength="50" required>
                        <span class="error" style="display: none;" id="erroNome" value="<?php if (isset($erro) && isset($erro->nome)) echo  $erro->nome ?>">O campo nome deve conter entre 3 a 50 caracteres</span>
                    </div>

                </div>

                <div class="form-group row">
                    <label for="senha" class="col-sm-2 col-form-label col-form-label-sm">Senha</label>
                    <div class="col-sm-10">
                        <input type="password" class="form-control form-control-sm" name="senha" id="senha" placeholder="Digite sua senha" pattern="^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*[!@#$%^&*_=+-]).{8,}$" required>
                        <span class="error" style="display: none;" id="erroSenha">O campo senha deve conter no mínimo 8 caracteres
                            com letras maiúsculas e minúsculas, números, caracteres especiais e não conter sequências</span>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="email" class="col-sm-2 col-form-label col-form-label-sm">Seu <br>E-mail</br></label>
                    <div class="col-sm-10">
                        <input class="form-control form-control-sm" value="<?php echo $_SESSION["usuario"]["email"] ?>" class="form-control" disabled><br>
                    </div>
                </div>

                <div style="margin-left: 90px;">
                    <button type="submit" onclick="validarInputs(event)" formaction="editUser.php" class="btn btn-info" value="LOGAR">Editar</button>
                    <button type="submit" onclick="validarInputs(event)" formaction="deletarUser.php" class="btn btn-danger">Deletar</button>
                    <a class="btn btn-warning" href="deslogar.php">Sair</a>
                </div>
            </form>

            <div style="padding-bottom: 1rem;">
                <a href="usuarios.php" class="btn btn-ok">Lista de usuários</a>
            </div>

            <footer class="row" style="padding-top: 1rem;">
                <div class="col-12">
                    <p>Copyright © 2022</p>
                </div>
            </footer>
        </main>
    </div>

    <script src="script/script3.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    <noscript>Atualize seu navegador</noscript>

</body>

</html>