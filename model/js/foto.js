let foto = document.getElementById('preview-foto');
let file = document.getElementById('foto');
let fotoAnterior = foto.src;

foto.addEventListener('click', () => {
  file.click();
});

file.addEventListener('change', () => {
  if (file.files.length > 0) {
    let reader = new FileReader();

    reader.onload = () => {
      foto.src = reader.result;
    };

    reader.readAsDataURL(file.files[0]);
  } else {
    foto.src = fotoAnterior;
  }
});
