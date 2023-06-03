function mostrarFormulario(opcao) {
    var cartaoDiv = document.getElementById("cartaoDiv");
    var pixDiv = document.getElementById("pixDiv");

    if (opcao === "cartao") {
        cartaoDiv.style.display = "block";
        pixDiv.style.display = "none";
    } else if (opcao === "pix") {
        cartaoDiv.style.display = "none";
        pixDiv.style.display = "block";
    }
}