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
    lang = en_us;
    setText();
}

function sk(){
    lang = sk_sk;
    setText();
}

var lang = sk_sk;

function setText(){
    document.title = lang.heading;
    document.getElementById("_heading").innerHTML = lang.heading;
    document.getElementById("_intro-text").innerHTML = lang.intro_text;
    document.getElementById("_name").innerHTML = lang.name;
    document.getElementById("_height").innerHTML = lang.height;
    document.getElementById("_simulate").innerHTML = lang.simulate;
    document.getElementById("_output").innerHTML = lang.output;

}

setText();
