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
            parse(data.result);
        })
        .catch(err=>console.log(err));

})

let myDataX = [];
let myDataY1 = [];
let myDataY2 = [];
var index = 0;
function parse(data){
    result = data;
    result = result.split("\n");

    var count = 0;

    for (let i = 0; i < result.length; i++) {
        if(result[i] === ""){
            count++;
        }
        if(count === 3){
            if (result[i].length > 2){
                myDataX.push(result[i].trim());
            }
        }
        if(count === 5){
            if (result[i].length > 2) {
                let temp;
                let line;
                temp = result[i].replace(/  +/g, ' ');
                line = temp.split(" ");

                myDataY1.push(line[1]);

                myDataY2.push(line[2]);
            }
        }
    }
    kresli();
}

function kresli(){
    Plotly.newPlot('graf', [{
        y: [],
        mode: 'lines',
        line: {color: '#80CAF6'}
    }, {
        y: [],
        mode: 'lines',
        line: {color: '#DF56F1'}
    }]);
    var cnt = 0;
    var interval = setInterval(function() {

        Plotly.extendTraces('graf', {
            y: [[myDataY2[index]], [myDataY1[index]]]
        }, [0, 1])
        index+=1;
        if(++cnt === 510) clearInterval(interval);
    }, 50);

}

//animacia
let spring;
let piston1;
let piston2;
let canvas;

function start() {
    canvas = new fabric.Canvas('canvas');

    spring = new fabric.Rect({
        left: 100,
        top: 115,
        fill: 'black',
        width: 60,
        height: 5
    });

    piston1 = new fabric.Rect({
        left: 120,
        top: 100,
        fill: 'blue',
        width: 20,
        height: 40
    });

    piston2 = new fabric.Rect({
        left: 160,
        top: 100,
        fill: 'red',
        width: 20,
        height: 40
    });

    canvas.add(spring);
    canvas.add(piston1);
    canvas.add(piston2);
}

let count = 0;
function anim(){
    count++;
    spring.animate('width', 200, {
        onChange: canvas.renderAll.bind(canvas),
        fixedduration: 1000,
    });

    piston1.animate('left', 180, {
        onChange: canvas.renderAll.bind(canvas),
        fixedduration: 1000,
    });

    piston2.animate('left', 280, {
        onChange: canvas.renderAll.bind(canvas),
        fixedduration: 1000,
    });
    setTimeout(function(){
        spring.animate('width', 60, {
            onChange: canvas.renderAll.bind(canvas),
            fixedduration: 1000,
        });

        piston1.animate('left', 120, {
            onChange: canvas.renderAll.bind(canvas),
            fixedduration: 1000,
        });

        piston2.animate('left', 160, {
            onChange: canvas.renderAll.bind(canvas),
            fixedduration: 1000,
        });
        if(count < 3) {
            anim();
        }
    }, 1000);


}

function play(){
    anim();
}


