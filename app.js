// Sonidos 

const cargarSonido = function (fuente) {
    const sonido = document.createElement("audio");
    sonido.src = fuente;
    sonido.setAttribute("preload", "auto");
    sonido.setAttribute("controls", "none");
    sonido.style.display = "none"; // <-- oculto
    document.body.appendChild(sonido);
    return sonido;
};

function audioRespCorrecta() {
    const sonido = cargarSonido("./sounds/correctChoice.wav");
    sonido.play()
}

function audioRespIncorrecta() {
    const sonido = cargarSonido("./sounds/incorrectChoice.wav");
    sonido.play()
}

function audioWinGame() {
    const sonido = cargarSonido("./sounds/winGame.mp3");
    sonido.play()
}

function audioHelpGame() {
    const sonido = cargarSonido("./sounds/help.mp3");
    sonido.play()
}
