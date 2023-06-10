function confereSenha(formId) {
    event.preventDefault(); // Impede o envio do formulário
    let senha = document.getElementById(formId).querySelector("#senhacad");
    let confirmSenha = document.getElementById(formId).querySelector("#confirmSenhacad");
    if (senha.value != confirmSenha.value) {
        document.querySelector("#" + formId + " .alerta-senha").innerHTML = "*As senhas diferem!";
    } else {
        document.querySelector("#" + formId + " .alerta-senha").innerHTML = "";
        document.getElementById(formId).submit(); // Envia o formulário manualmente
    }
}

