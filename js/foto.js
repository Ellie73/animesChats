let foto = document.getElementById('preview-foto');
let file = document.getElementById('foto');
let fotoAnterior = foto.src;

foto.addEventListener('click', () =>{
    file.click();
});

file.addEventListener('change',() =>{
    let reader = new FileReader();

    reader.onload = () =>{
        foto.src = reader.result;
    }
    if(typeof file.files[0] == 'object'){
        reader.readAsDataURL(file.files[0]);
    }else {
        foto.src = fotoAnterior;
    }
    
});