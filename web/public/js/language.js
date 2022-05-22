var en_us = {
    heading:"Suspension simulation",
    intro_text:"Please enter your name and obstacle height",
    name: "Name",
    height: "Height",
    simulate: "Simulate",
    output: "Output"
}

var sk_sk = {
    heading:"Simulácia pruženia",
    intro_text:"Prosím zadajte svoje meno a výšku prekážky",
    name: "Meno",
    height: "Výška",
    simulate: "Simuluj",
    output: "Výstup"
}

function en(){
    document.getElementById("EN").style.backgroundColor = "white";
    document.getElementById("EN").style.color = "black";
    document.getElementById("SK").style.backgroundColor = "";
    document.getElementById("SK").style.color = "white";
    lang = en_us;
    setText();
}

function sk(){
    document.getElementById("EN").style.backgroundColor = "";
    document.getElementById("EN").style.color = "white";
    document.getElementById("SK").style.backgroundColor = "white";
    document.getElementById("SK").style.color = "black";
    lang = sk_sk;
    setText();
}

var lang = en_us;

function setText(){
    document.title = lang.heading;
    document.getElementById("_heading").innerHTML = lang.heading;
    document.getElementById("_intro-text").innerHTML = lang.intro_text;
    document.getElementById("_name").innerHTML = lang.name;
    document.getElementById("_height").innerHTML = lang.height;
    document.getElementById("_simulate").innerHTML = lang.simulate;
    document.getElementById("_output").innerHTML = lang.output;
}

document.getElementById("EN").style.backgroundColor = "white";
document.getElementById("EN").style.color = "black";
setText();
