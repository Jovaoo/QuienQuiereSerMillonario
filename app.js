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

function audioWinGame() {
    const sonido = cargarSonido("./sounds/winGame.mp3");
    sonido.play()
}

function audioHelpGame() {
    const sonido = cargarSonido("./sounds/help.mp3");
    sonido.play()
}

// Funciones comprobar respuestas   

function checkans(element,qv,aa,n){
    if(qv === aa){
        element.style.backgroundColor = 'green'

        const sonido = cargarSonido("./sounds/correctChoice.wav");
        sonido.play()
        
        let num = parseInt(n)
        num = num + 1
        let div = "quests" + (num)
        if(num <= 3){
        document.getElementById(div).style.display = "block"
        }
        if(num == 4){
            document.getElementsByClassName('next')[0].style.display = "block";
        }
        let parentDiv = element.closest('.quests' + n)
        console.log(parentDiv)
        let buttons = parentDiv.getElementsByClassName('btnpr');
        for (let i = 0; i < buttons.length; i++) {
            buttons[i].disabled = true;
        }

}
    else{
        element.style.backgroundColor = 'red';
        const sonido = cargarSonido("./sounds/incorrectChoice.wav");
        sonido.play()
        let parentDiv = element.closest('.quests' + n);
        let buttons = parentDiv.getElementsByClassName('btnpr');
        for (let i = 0; i < buttons.length; i++) {
            if (buttons[i].value === aa) {
                buttons[i].style.backgroundColor = 'green'
            }
            buttons[i].disabled = true;
            document.getElementsByClassName('return')[0].style.display = "block";
        }
    }
}