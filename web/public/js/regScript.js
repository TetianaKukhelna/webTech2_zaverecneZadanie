const regSubButton = document.querySelector("#reg_sub");
const nameR = document.querySelector("#nameR");

regSubButton.addEventListener('click' , (e) =>{
    console.log(nameR.value);
    if(nameR.value == "") return;

    else {
    e.preventDefault();

    fetch('https://site112.webte.fei.stuba.sk/zaverecneZadanie/web/public/server.php', {
        method:'POST',
        mode:"cors",
        body:new FormData(document.querySelector('#form'))
    }).then(res=>res.json())
        .then(data =>{
            localStorage.setItem('apiKey', data.apiKey);
            localStorage.setItem('name', data.name);
            console.log(data);
            window.location.replace("https://site112.webte.fei.stuba.sk/zaverecneZadanie/web/public/simulate.php");
        })
        .catch(err=>console.log(err));

    }
})