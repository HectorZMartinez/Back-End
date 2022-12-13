function validarInputs(event) {
    var error = false;
    var campoNome = document.querySelector("#nome")
    var campoSenha = document.querySelector("#senha")

    if (campoNome.value.length < 3 || campoNome.value.length > 50) {
        document.querySelector("#erroNome").style.display = "flex"

        campoNome.style.border = "1px solid red"
        error = true;
    } else {
        document.querySelector("#erroNome").style.display = "none"

        campoNome.style.border = "1px solid green"

    }

    if (!campoSenha.checkValidity()) {

        document.querySelector("#erroSenha").style.display = "flex"

        campoSenha.style.border = "1px solid red"
        error = true;
    } else {

        document.querySelector("#erroSenha").style.display = "none"

        campoSenha.style.border = "1px solid green"


    }
}