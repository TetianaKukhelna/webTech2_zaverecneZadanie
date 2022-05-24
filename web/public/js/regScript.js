const regSubButton = document.querySelector("#reg_sub");
const nextPage = document.querySelector("#next_page");
const alert = document.querySelector("#alert");


nextPage.addEventListener('click', ()=>{
    if(localStorage.getItem('apiKey') === null){
        alert.innerHTML = 'Please register to create API key';
    }else {

    }
})

regSubButton.addEventListener('click' , (e) =>{
    e.preventDefault();

    fetch('http://localhost:8000/register.php', {
        method:'POST',
        mode:"cors",
        body:new FormData(document.querySelector('#form'))
    }).then(res=>res.json())
        .then(data =>{
            localStorage.setItem('apiKey', data.apiKey);
            localStorage.setItem('name', data.name);
            console.log(data);
        })
        .catch(err=>console.log(err));

})