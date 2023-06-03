function confereSenha(){
    let senha = document.getElementById("senhacad");
    let confirmSenha = document.getElementById("confirmSenhacad");
    if(senha.value != confirmSenha.value){
        document.querySelector(".alerta-senha").innerHTML = "*As senhas diferem!";
        document.querySelector(".submit-form").style.display = "none";
        document.querySelector(".submit-div").style.display = "block";
    }else{
        document.querySelector(".alerta-senha").innerHTML = "";
        document.querySelector(".submit-form").style.display = "block";
        document.querySelector(".submit-div").style.display = "none";
    }
}