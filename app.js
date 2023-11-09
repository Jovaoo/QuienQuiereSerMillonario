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
        if (localStorage.getItem("limit")) {
            limit = parseInt(localStorage.getItem("limit"));
            funcionandoLimit();
        }
    }

    function saveTime(){
        inicio = parseInt(localStorage.getItem("inicio"));
        var actual = new Date().getTime();
        var diff = new Date(actual - inicio);
        var result = LeadingZero(diff.getUTCHours()) + ":" + LeadingZero(diff.getUTCMinutes()) + ":" + LeadingZero(diff.getUTCSeconds());
        document.getElementById("totalTime").value = result;
        document.getElementById("totalTime2").value = result;

    }


//
// —————————————————————————— Comodines ———————————————————————————
//
var comodin1 = false;
var comodin3 = 0;
function ponclas(){
    var divElement = document.querySelector('.quests1');
    divElement.classList.add('vis');
}

function establecerComodines() {
    localStorage.setItem("usedComodin1", 0)
    localStorage.setItem("usedComodin2", 0)
    localStorage.setItem("usedComodin3", 0)
    localStorage.setItem("usedComodinCSS", 0)
}

function comodinTiempo() {
    comodin1 = true
}
function obtenerValores(sa) {
    var arraySas = JSON.parse(sa);
    var decodedData = [];
    arraySas.forEach(function (element) {
        decodedData.push(atob(element));
    });
    const divs = document.querySelectorAll('.vis');
    let lastVisibleDivInputs;
    var resps = []
    if (divs.length > 0) {
        const lastDiv = divs[divs.length - 1];
        lastVisibleDivInputs = lastDiv.querySelectorAll('input:not([disabled])');
        lastVisibleDivInputs.forEach((input) => {
            resps.push(input.value)

        });
    }
    var respsdis = []
    console.log(resps)
    do {
        var numran = Math.floor(Math.random() * resps.length)
        if(respsdis.length === 0){
            if(!decodedData.includes(resps[numran])){
                respsdis.push(resps[numran])
            }
        }else{
            if(!respsdis.includes(resps[numran])){
                if(!decodedData.includes(resps[numran])){
                    respsdis.push(resps[numran])
                }            }
        }
    } while (respsdis.length != 2);
    console.log(respsdis)
    respsdis.forEach(element => {
        var inpval = document.querySelectorAll('input:not([disabled])');
        inpval.forEach(element2 => {
            if(element == element2.value){
                element2.disabled = true;
            }
        });
    });
    console.log(decodedData);
}
function comodinPublico() {
    comodin3 += 1;
    document.getElementById('comodinPublicoCSS').style = "color:#6b6b6b; background:rgba(0,0,0,0.2);cursor:not-allowed;";
    localStorage.setItem("usedComodinCSS", 1)

}

function sleep(ms) {
    return new Promise(resolve => setTimeout(resolve, ms));
}
function randompie(qp){
    let nummil = [] 
    if(qp == 2){
        let num1, num2
        do {
            num1 = Math.floor(Math.random() * 41) + 60; // Número entre 60 y 100
            num2 = 100 - (num1);
            nummil.push(num1,num2) 
        } while (num2 <= 0);
        return nummil
    }else{
        let num1, num2, num3, num4;
        do {
            num1 = Math.floor(Math.random() * 41) + 60; // Número entre 60 y 100
            num2 = Math.floor(Math.random() * (101 - num1));
            num3 = Math.floor(Math.random() * (101 - num1 - num2));
            num4 = 100 - (num1 + num2 + num3);
            nummil.push(num1,num2,num3,num4) 
        } while (num4 <= 0);
        return nummil
    }
}
function animacionComodin3(sa) {
    60
    if (localStorage.getItem("usedComodin3") == 0) {
        var arraySas = JSON.parse(sa);
        var decodedData = [];
        arraySas.forEach(function (element) {
            decodedData.push(atob(element));
        });
        localStorage.setItem("usedComodin3", 1);
        const anim1 ="<div id='contenedor'><div class='contenedor-loader'><div class='loader1'></div><div class='loader2'></div><div class='loader3'></div><div class='loader4'></div></div><div class='cargando'>El público está votando...</div></div>"
        document.getElementById("cP"+currentDiv).innerHTML = anim1;
        const sonido = cargarSonido("./sounds/epicmusic.mp3");
        sonido.play()
        sleep(7000).then(() => {
            const divs = document.querySelectorAll('.vis');
            let lastVisibleDivInputs;
            var resps = []
            if (divs.length > 0) {
                const lastDiv = divs[divs.length - 1];
                lastVisibleDivInputs = lastDiv.querySelectorAll('input:not([disabled])');
                lastVisibleDivInputs.forEach((input) => {
                    resps.push(input.value)

                });
            }
            const randomNumber = 2
            if (randomNumber === 5) {
                if(resps.length == 2){
                    let cor
                    let arrin = []
                    numpor = randompie(resps.length);
                    console.log(decodedData)
                    resps.forEach(element => {
                        if(decodedData.includes(element)){
                            cor = element;
                        }else{
                            arrin.push(element)
                        }
                    });
                    console.log(resps)
                    document.getElementById("contenedor").style = "display:none;" // ESTOS PORCENTAJES SON LOS QUE HABRA QUE CAMBIAR POR LA VARIABLE  \/
                    const anim11 =`<div class='circleMain'><div id='circlePublic'></div></div><div id='answersPublic'><h1>${numpor[0]}% ${arrin[0]}</h1><h1>${numpor[1]}%${cor}</h1></div>`;
                    document.getElementById("circlePublicMain"+currentDiv).innerHTML = anim11;
                    document.getElementById("circlePublicMain"+currentDiv).style.display = "flex";
                    document.documentElement.style.setProperty('--color1', '#fab567');
                    document.documentElement.style.setProperty('--color2', '#f98cc1');
                    document.documentElement.style.setProperty('--color3', '#b2d5eb');
                    document.documentElement.style.setProperty('--color4', '#fcd793');
                    circlePublic = document.getElementById("circlePublic"); // ESTOS PORCENTAJES SON LOS QUE HABRA QUE CAMBIAR POR LA VARIABLE  \/ 
                    circlePublic.style.backgroundImage = `conic-gradient(var(--color1) ${numpor[1]}%, var(--color2) ${numpor[1]}% 100%)`;

                }else{
                    let cor
                    let arrin = []
                    numpor = randompie(resps.length);
                    console.log(decodedData)
                    resps.forEach(element => {
                        if(decodedData.includes(element)){
                            cor = element;
                        }else{
                            arrin.push(element)
                        }
                    });
                    console.log(resps)
                    document.getElementById("contenedor").style = "display:none;" // ESTOS PORCENTAJES SON LOS QUE HABRA QUE CAMBIAR POR LA VARIABLE  \/
                    const anim11 =`<div class='circleMain'><div id='circlePublic'></div></div><div id='answersPublic'><h1>${numpor[0]}% ${arrin[0]}</h1><h1>${numpor[1]}% ${arrin[1]}</h1><h1>${numpor[2]}% ${arrin[2]}</h1><h1>${numpor[3]}%${cor}</h1></div>`;
                    document.getElementById("circlePublicMain"+currentDiv).innerHTML = anim11;
                    document.getElementById("circlePublicMain"+currentDiv).style.display = "flex";
                    document.documentElement.style.setProperty('--color1', '#fab567');
                    document.documentElement.style.setProperty('--color2', '#f98cc1');
                    document.documentElement.style.setProperty('--color3', '#b2d5eb');
                    document.documentElement.style.setProperty('--color4', '#fcd793');
                    circlePublic = document.getElementById("circlePublic"); // ESTOS PORCENTAJES SON LOS QUE HABRA QUE CAMBIAR POR LA VARIABLE  \/ 
                    circlePublic.style.backgroundImage = `conic-gradient(var(--color1) ${numpor[0]}%, var(--color2) ${numpor[0]}% ${ numpor[0] + numpor[1]}%, var(--color3) ${ numpor[0] + numpor[1]}% ${numpor[0] +  numpor[1] + numpor[2]}%, var(--color4) ${numpor[0] +  numpor[1] + numpor[2]}% 100%)`;
                }
            } else {
                if(resps.length == 2){
                    let cor
                    let arrin = []
                    numpor = randompie(resps.length);
                    console.log(decodedData)
                    resps.forEach(element => {
                        if(decodedData.includes(element)){
                            cor = element;
                            console.log(cor)
                        }else{
                            arrin.push(element)
                        }
                    });
                    console.log(resps)
                    document.getElementById("contenedor").style = "display:none;" // ESTOS PORCENTAJES SON LOS QUE HABRA QUE CAMBIAR POR LA VARIABLE  \/
                    const anim11 =`<div class='circleMain'><div id='circlePublic'></div></div><div id='answersPublic'><h1>${numpor[0]}%${cor}</h1><h1>${numpor[1]}% ${arrin[0]}</h1></div>`;
                    document.getElementById("circlePublicMain"+currentDiv).innerHTML = anim11;
                    document.getElementById("circlePublicMain"+currentDiv).style.display = "flex";
                    document.documentElement.style.setProperty('--color1', '#fab567');
                    document.documentElement.style.setProperty('--color2', '#f98cc1');
                    document.documentElement.style.setProperty('--color3', '#b2d5eb');
                    document.documentElement.style.setProperty('--color4', '#fcd793');
                    circlePublic = document.getElementById("circlePublic"); // ESTOS PORCENTAJES SON LOS QUE HABRA QUE CAMBIAR POR LA VARIABLE  \/ 
                    circlePublic.style.backgroundImage = `conic-gradient(var(--color1) ${numpor[1]}%, var(--color2) ${numpor[1]}% 100%)`;

                }else{
                    let cor
                    let arrin = []
                    numpor = randompie(resps.length);
                    console.log(decodedData)
                    resps.forEach(element => {
                        if(decodedData.includes(element)){
                            cor = element;
                        }else{
                            arrin.push(element)
                        }
                    });
                    console.log(resps)
                    document.getElementById("contenedor").style = "display:none;" // ESTOS PORCENTAJES SON LOS QUE HABRA QUE CAMBIAR POR LA VARIABLE  \/
                    const anim11 =`<div class='circleMain'><div id='circlePublic'></div></div><div id='answersPublic'><h1>${numpor[0]}%${cor}</h1><h1>${numpor[1]}% ${arrin[0]}</h1><h1>${numpor[2]}% ${arrin[1]}</h1><h1>${numpor[3]}% ${arrin[2]}</h1></div>`;
                    document.getElementById("circlePublicMain"+currentDiv).innerHTML = anim11;
                    document.getElementById("circlePublicMain"+currentDiv).style.display = "flex";
                    document.documentElement.style.setProperty('--color1', '#fab567');
                    document.documentElement.style.setProperty('--color2', '#f98cc1');
                    document.documentElement.style.setProperty('--color3', '#b2d5eb');
                    document.documentElement.style.setProperty('--color4', '#fcd793');
                    circlePublic = document.getElementById("circlePublic"); // ESTOS PORCENTAJES SON LOS QUE HABRA QUE CAMBIAR POR LA VARIABLE  \/ 
                    circlePublic.style.backgroundImage = `conic-gradient(var(--color1) ${numpor[0]}%, var(--color2) ${numpor[0]}% ${ numpor[0] + numpor[1]}%, var(--color3) ${ numpor[0] + numpor[1]}% ${numpor[0] +  numpor[1] + numpor[2]}%, var(--color4) ${numpor[0] +  numpor[1] + numpor[2]}% 100%)`;
                }            }
            console.log(resps)

        });
    }

}

//
// —————————————— Cronómetro descendiente (preguntas) ——————————————
//
    let countdown = 30;
    let timerInterval;
    let currentDiv = 1;
    let colorFlag = true;

    function startCountdown() {
        if (localStorage.getItem("usedComodin1") == 1) {
            document.getElementById('comodinTiempoCSS').style = "color:#6b6b6b; background:rgba(0,0,0,0.2);cursor:not-allowed;";
        }
        if (localStorage.getItem("usedComodinCSS") == 1) {
            document.getElementById('comodinPublicoCSS').style = "color:#6b6b6b; background:rgba(0,0,0,0.2);cursor:not-allowed;";
        }
        if(localStorage.getItem("rcValue") >= 3) {
            timerInterval = setInterval(function () {
                // deja 5 seg - cambiar despues con los segs que dura la animacion
                if (comodin3 > 0 && comodin3 < 8) {
                    comodin3 += 1;
                } else {
                    countdown--;    

                    if (comodin1 && localStorage.getItem("usedComodin1") == 0 ) {
                        countdown = countdown + 30;
                        usedComodin = true;
                        localStorage.setItem("usedComodin1", 1);
                        document.getElementById('comodinTiempoCSS').style = "color:#6b6b6b; background:rgba(0,0,0,0.2);cursor:not-allowed;";
                    } else {
                        const minutes = Math.floor(countdown / 60);
                        const seconds = countdown % 60;
                        const formattedTime = `${minutes.toString().padStart(2, '0')}:${seconds.toString().padStart(2, '0')}`;
        
                        if (countdown < 10) {
                            if (colorFlag) {
                                document.getElementById('cronoLimite' + currentDiv).style = "color:red;font-size:50px;";
                            } else {
                                document.getElementById('cronoLimite' + currentDiv).style.color = "white";
                            }
                            colorFlag = !colorFlag;
                        }
        
                        document.getElementById('cronoLimite'+currentDiv).textContent = formattedTime;
        
                        if (countdown === 0) {
                            saveTime();
                            document.getElementById('pregac').value = localStorage.getItem("rcValue");
                            clearTimeout(timeout);

                            // Eliminamos el valor inicial guardado
                            localStorage.removeItem("inicio");
                            timeout=0;
                            document.getElementById('returnForm').submit();
                        }
                    }   
                }
                
            }, 1000);
        } else {
            document.getElementById('cronoLimite1').style = "display:none";
            document.getElementById('comodinTiempoCSS').style = "color:#6b6b6b; background:rgba(0,0,0,0.2);cursor:not-allowed;";
            document.getElementById('cronoLimite2').style = "display:none";
            document.getElementById('cronoLimite3').style = "display:none";

        }
    }

    function stopCountdown() {
        clearInterval(timerInterval);
        countdown = 30; 
    }

    function showNextDiv() {
        stopCountdown();
        if (currentDiv > 3) {
            currentDiv = 0
        }
        startCountdown();
        currentDiv++;
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
        element.style.backgroundColor = 'green'
        const sonido = cargarSonido("./sounds/correctChoice.wav")
        sonido.play()

        let div = "quests" + (num)
        if(num <= 3){
        document.getElementById(div).style.display = "block"
        document.getElementById(div).classList.add('vis');
        }
        localStorage.setItem("rcValue", rc+1); // Guarda las respuestas correctas

        if(num == 4 && rc != 17){
            document.getElementsByClassName('next')[0].style.display = "block";
        } else if (rc === 17 ) {
            saveTime();
            document.getElementById('pregac2').value = localStorage.getItem("rcValue");
            document.getElementsByClassName('winRed')[0].style.display = "block";
        }   
        
        scrollToBottom();

        showNextDiv();
}
    else{
        saveTime()
        stopCountdown();
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


document.getElementById("btnplayindjs").style.display = "block";
document.getElementById("jsno").style.display = "none";
