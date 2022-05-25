const submitBtn = document.querySelector("#_simulate");
const output = document.querySelector("#output");
const api = document.querySelector("#api");
const name = document.querySelector("#name");
const displayName = document.querySelector("#displayName");
const heightOrScript = document.querySelector("#heightOrScript");
const command = document.querySelector("#command");
const btnHeight = document.querySelector("#HEIGHT");
const btnCommand = document.querySelector("#COMMAND");
const animCheck = document.querySelector("#animInput");
const grafCheck = document.querySelector("#grafInput");

animCheck.addEventListener('change', () => {
    if(animCheck.checked){
        document.getElementById('anim').style.display = 'block';
    }
    else {
        document.getElementById('anim').style.display = 'none';
    }
})
grafCheck.addEventListener('change', () => {
    if(grafCheck.checked){
        document.getElementById('graf').style.display = 'block';
    }
    else {
        document.getElementById('graf').style.display = 'none';
    }
})



api.setAttribute("value", localStorage.getItem("apiKey"));
name.setAttribute("value", localStorage.getItem("name"));
heightOrScript.setAttribute("value",'height');
command.setAttribute("placeholder","Input height r")
displayName.innerHTML = localStorage.getItem("name");
console.log(localStorage.getItem("name"))

var canDraw = true;

btnHeight.addEventListener('click',() =>{
    heightOrScript.setAttribute("value",'height');
    command.setAttribute("placeholder","Input height r")
    canDraw = true;
    document.getElementById("graf").style.display = "block";

})

btnCommand.addEventListener('click',() =>{
    heightOrScript.setAttribute("value",'command');
    command.setAttribute("placeholder","Input comand for Octave without semicolon at the end { ; }");
    canDraw = false;
    document.getElementById("graf").style.display = "none";
})


submitBtn.addEventListener('click' , (e) =>{
    e.preventDefault();
        // https://site112.webte.fei.stuba.sk/zaverecneZadanie/web/public/server.php
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
let myDataX;
let myDataY1;
let myDataY2;
var index;
var index2;
function parse(data){
    myDataX = [];
    myDataY1 = [];
    myDataY2 = [];

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

    var max;
    var min;

    let dopici1 = [];

    for (let i = 0; i < myDataY1.length; i++) {
        dopici1.push(Math.round(Number(myDataY1[i])));
    }
    var dopici2 = [];

    for (let i = 0; i < myDataY2.length; i++) {
        dopici2.push(Math.round(Number(myDataY2[i])));
    }
    var max1 = 0;
    for (let i = 0; i < dopici1.length; i++) {
        if(dopici1[i] > max1){
            max1 = dopici1[i];
        }
    }
    var max2 = 0;
    for (let i = 0; i < dopici2.length; i++) {
        if(dopici2[i] > max2){
            max2 = dopici2[i];
        }
    }

    if(max2 > max1){
        max = max2;
    }
    else {
        max = max1;
    }

    var min1 = 0;
    for (let i = 0; i < dopici1.length; i++) {
        if(dopici1[i] < min1){
            min1 = dopici1[i];
        }
    }
    var min2 = 0;
    for (let i = 0; i < dopici2.length; i++) {
        if(dopici2[i] < min2){
            min2 = dopici2[i];
        }
    }

    if(min2 > min1){
        min = min1;
    }
    else {
        min = min2;
    }

    if(canDraw){
        kresli();
        animate(max + 2, min -2);
    }
}

function kresli(){
    index = 0;
    Plotly.newPlot('graf', [{
        y: [],
        mode: 'lines',
        name: 'Dumper',
        line: {color: '#80CAF6'}
    }, {
        y: [],
        mode: 'lines',
        name: 'Car',
        line: {color: '#DF56F1'}
    }]);
    var cnt = 0;
    var interval = setInterval(function() {

        Plotly.extendTraces('graf', {
            y: [[myDataY2[index]], [myDataY1[index]]]
        }, [0, 1])
        index += 1;
        if(++cnt === 500) {
            clearInterval(interval);
        }
    }, 10);
}

function animate(max, min){
    index2=0;
    Plotly.newPlot('anim', [{
        x: ['simulation'],

        y: [myDataY2[0]],
        type: 'bar',
        name: 'Dumper',
        marker: {color: '#4CCFF7'}
    }, {
        x: ['simulation'],
        y: [myDataY1[0]],
        type: 'bar',
        name: 'Car',
        marker: {color: '#FFDBDB'}
    }],{barmode: 'stack',
        xaxis: {
            showgrid: false,
            showline: false,

        },
        yaxis: {
            range: [min, max],
            showgrid: false,
            showline: false,

        },
        showLegend: false
    });

    var conunt = 0;

    inter = setInterval(function() {
        Plotly.update('anim', {
            y: [[myDataY2[index2]], [myDataY1[index2]]]
        }, [0, 1])
        index2 += 1;
        if(++conunt === 500) {
            clearInterval(inter);
        }
    }, 10);

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


