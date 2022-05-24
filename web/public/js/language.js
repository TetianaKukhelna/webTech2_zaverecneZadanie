var en_us = {
    heading:"Suspension simulation",
    intro_text:"Please enter your obstacle height or command!",
    name: "Hi",
    height: "Height",
    simulate: "Simulate",
    output: "Output",
    anim: "Animation",
    graf: "Graf"
}

var sk_sk = {
    heading:"Simulácia pruženia",
    intro_text:"Prosím zadajte výšku prekážky alebo príkaz!",
    name: "Ahoj",
    height: "Výška",
    simulate: "Simuluj",
    output: "Výstup",
    anim: "Animácia",
    graf: "Graf"
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
    if(document.getElementById("_heading"))     document.getElementById("_heading").innerHTML = lang.heading;
    if(document.getElementById("_intro-text"))  document.getElementById("_intro-text").innerHTML = lang.intro_text;
    if(document.getElementById("_name"))        document.getElementById("_name").innerHTML = lang.name;
    if(document.getElementById("_height"))      document.getElementById("_height").innerHTML = lang.height;
    if(document.getElementById("_simulate"))    document.getElementById("_simulate").innerHTML = lang.simulate;
    if(document.getElementById("_output"))      document.getElementById("_output").innerHTML = lang.output;
    if(document.getElementById("_anim"))        document.getElementById("_anim").innerHTML = lang.anim;
    if(document.getElementById("_graf"))        document.getElementById("_graf").innerHTML = lang.graf;
}

document.getElementById("EN").style.backgroundColor = "white";
document.getElementById("EN").style.color = "black";
setText();
