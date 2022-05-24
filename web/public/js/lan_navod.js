var en_Us = {
    popis: "Instructions for using the site, description of the API created.\n" +
        "\n" +
        "    The API we use uses CAS (Computer Aided System) and Octave for better graph drawing.\n" +
        "    The whole project is run using Docker and has docker-compose in it.\n" +
        "    For storage and data handling we use local MySQL database which we have connected with PHPMyAdmin.\n" +
        "    We are running our project on port:8000.\n" +
        "    On the page you can enter your name and the weight you want to simulate.\n" +
        "    After the simulation, the output will be a graph and an animation, which will be used to show what values we have received.\n" +
        "\n" +
        "    On the page you have the possibility to download the logs in CSV format and send them to me by e-mail. In the file you will get the time and date when the data was generated,\n" +
        "    if the command was run correctly and in case of Failed, you will be given information about the error.\n" +
        "\n" +
        "    You have the possibility to download this manual in PDF format.\n" +
        "    Below you can select the language.\n",
    btn_D: "Download PDF file"
}

var sk_Sk = {
    popis:"Návod na používanie stránky, popis vytvoreného API.\n" +
        "\n" +
        "    Vyuzivana nami API pouziva CAS(Computer Aided System) a Octave pre lepse kreslenie grafa.\n" +
        "    Cely projekt je rozbehany pomocou Docker a ma v sebe docker-compose.\n" +
        "    Pre ukladanie a pracu s udajmi pouzivame lokalnu databazu MySQL aku mame spojenu s PHPMyAdmin.\n" +
        "    Bezi nas projekt na porte:8000.\n" +
        "    Na stranke ste mozete uvediet svoje meno a vahu aku chcete zosimulovat.\n" +
        "    Po Simulacii, vystupom bude sluzit graf a animacia, aka bude sluzit na ukazku ake hodnoty sme dostavali.\n" +
        "\n" +
        "    Na stranke ste mate moznost stahnut logy vo formate CSV a s dalsim odoselanim ma e-mail. V subore ste dostanete cas a datum kedy boli vygenerovane udaje,\n" +
        "    ci spravne bol zbehnuty prikaz a v pripade Failed, bude dana informacia o chybe.\n" +
        "\n" +
        "    Mate v moznosti stahnut tento Navod vo formate PDF.\n" +
        "\n" +
        "    Upozorňujeme, že na správne stiahnutie pdf musíte mať nastavené správne kódovanie na \"ISO-8859-2\".\n" +
        "    Nizsie dasa vybrat jazyk.",
    btn_D: "Stiahnuť PDF subor"
}

function navod_en(){
    document.getElementById("navod_en").style.backgroundColor = "white";
    document.getElementById("navod_en").style.color = "black";
    document.getElementById("navod_sk").style.backgroundColor = "";
    document.getElementById("navod_sk").style.color = "white";
    document.getElementById("link_donwload").setAttribute("href","download.php?hello=true&en");
    lang = en_Us;
    setText();
}

function navod_sk(){
    document.getElementById("navod_en").style.backgroundColor = "";
    document.getElementById("navod_en").style.color = "white";
    document.getElementById("navod_sk").style.backgroundColor = "white";
    document.getElementById("navod_sk").style.color = "black";
    document.getElementById("link_donwload").setAttribute("href","download.php?hello=true&sk");
    lang = sk_Sk;
    setText();
}

var lang = en_Us;

function setText(){
    document.title = lang.popis;
    if(document.getElementById("popis"))     document.getElementById("popis").innerHTML = lang.popis;
    if(document.getElementById("downl_pdf"))     document.getElementById("downl_pdf").innerHTML = lang.btn_D;
}

document.getElementById("navod_en").style.backgroundColor = "white";
document.getElementById("navod_en").style.color = "black";
setText();