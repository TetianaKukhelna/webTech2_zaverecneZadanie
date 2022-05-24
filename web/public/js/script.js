
    const submitBtn = document.querySelector("#_simulate");
    const output = document.querySelector("#output");
    const api = document.querySelector("#api");
    const name = document.querySelector("#name");
    const displayName = document.querySelector("#displayName");

    api.setAttribute("value", localStorage.getItem("apiKey"));
    name.setAttribute("value", localStorage.getItem("name"));
    displayName.innerHTML = localStorage.getItem("name");
    console.log(localStorage.getItem("name"))


    submitBtn.addEventListener('click' , (e) =>{
        e.preventDefault();

        fetch('http://localhost:8000/server.php', {
            method:'POST',
            mode:"cors",
            body:new FormData(document.querySelector('#sim_form'))
        }).then(res=>res.json())
            .then(data =>{
                output.innerHTML = data.result;
                console.log(data);
            })
            .catch(err=>console.log(err));

    })


