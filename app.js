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

// Función scroll automático
function scrollToBottom(timedelay=0) {
    var scrollId;
    var height = 0;
    var minScrollHeight = 500;
    scrollId = setInterval(function () {
        if (height <= document.body.scrollHeight) {
            window.scrollBy(0, minScrollHeight);
        }
        else {
            clearInterval(scrollId);
        }
        height += minScrollHeight;
    }, timedelay);           
}



// —————————————— Cronómetro ——————————————

    var inicio = 0;
    var timeout = 0;

    function empezarDetener() {
        if (timeout == 0) {
            var storedInicio = localStorage.getItem("inicio");
            
            if (storedInicio) {
                inicio = parseInt(storedInicio);
            } else {
                inicio = new Date().getTime();
                localStorage.setItem("inicio", inicio);
            }

            funcionando();

        } else {
            clearTimeout(timeout);
            localStorage.removeItem("inicio");
            timeout = 0;
        }
    }

    function funcionando() {
        var actual = new Date().getTime();
        var diff = new Date(actual - inicio);
        var result = LeadingZero(diff.getUTCHours()) + ":" + LeadingZero(diff.getUTCMinutes()) + ":" + LeadingZero(diff.getUTCSeconds());
        document.getElementById('crono').innerHTML = result;
        timeout = setTimeout(funcionando, 1000);
    }

    function LeadingZero(Time) {
        return (Time < 10) ? "0" + Time : Time;
    }

    function resetTime() {
        inicio = new Date().getTime();
        localStorage.setItem("inicio", inicio);
        localStorage.setItem("rcValue", 0)
    }

    window.onload = function() {
        if (localStorage.getItem("inicio")) {
            inicio = parseInt(localStorage.getItem("inicio"));
            funcionando();
        }
    }

    function saveTime(){
        inicio = parseInt(localStorage.getItem("inicio"));
        var actual = new Date().getTime();
        var diff = new Date(actual - inicio);
        var result = LeadingZero(diff.getUTCHours()) + ":" + LeadingZero(diff.getUTCMinutes()) + ":" + LeadingZero(diff.getUTCSeconds());
        document.getElementById("totalTime").value = result;
    }

    
    // —————————————— Funciones comprobar respuestas ——————————————


function checkans(element,encodedQuf,encodedCr,n,cpc){
    var qv = atob(encodedQuf);
    var aa = atob(encodedCr);
    let num = parseInt(n)
    num = num + 1
    let rc = 0
    if(cpc == 1){
        rc = num - 2;
    }else{
        rc = ((cpc -1 ) * 3 ) + (num - 2)
    }
    if(qv === aa){

        document.getElementById('pregac').value= rc
        console.log(document.getElementById('pregac').value)
        element.style.backgroundColor = 'green'
        const sonido = cargarSonido("./sounds/correctChoice.wav")
        sonido.play()

        let div = "quests" + (num)
        if(num <= 3){
        document.getElementById(div).style.display = "block"
        }
        if(num == 4){
            document.getElementsByClassName('next')[0].style.display = "block";
        }
        let parentDiv = element.closest('.quests' + n)
        let buttons = parentDiv.getElementsByClassName('btnpr');
        for (let i = 0; i < buttons.length; i++) {
            buttons[i].disabled = true;
        }
        
        localStorage.setItem("rcValue", rc+1); // Guarda las respuestas correctas
        scrollToBottom()
}
    else{
        saveTime()
        document.getElementById('pregac').value= rc
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

        clearTimeout(timeout);

        // Eliminamos el valor inicial guardado
        localStorage.removeItem("inicio");
        timeout=0;
    }
}

function totalCorrectAnswers() {
    var rcValue = localStorage.getItem("rcValue");
    var rtcElements = document.getElementsByClassName("rtc");
    rtcElements[0].innerHTML = rcValue ;

    var pctCorrectas = (rcValue / 18) * 100;

    document.documentElement.style.setProperty('--verdePantano', '#A8C030');
    document.documentElement.style.setProperty('--crema', '#F0F0D8');
    circlePct = document.getElementsByClassName("circle");
    circlePct[0].style.backgroundImage = `conic-gradient(var(--verdePantano) ${pctCorrectas}%, var(--crema) ${pctCorrectas}% 100%)`;
}
console.log(1);
document.getElementById("btnplayind").style.display = "block";
document.getElementById("jsno").style.display = "none";
