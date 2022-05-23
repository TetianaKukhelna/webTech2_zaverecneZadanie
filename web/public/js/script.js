
    const submitBtn = document.querySelector("#_simulate");
    const output = document.querySelector("#output");



    submitBtn.addEventListener('click' , (e) =>{
        console.log("-------------------")
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

