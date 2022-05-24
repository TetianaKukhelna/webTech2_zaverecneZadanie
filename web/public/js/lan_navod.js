var en_Us = {
    popis: "Instructions for using the site, description of the API created.\n" +
        "\n" +
        "    The API we use uses CAS (Computer Aided System) and Octave for better graph drawing.\n" +
        "    The whole project is run using Docker and has docker-compose in it.\n" +
        "    For storage and data handling we use local MySQL database which we have connected with PHPMyAdmin.\n" +
        "    We are running our project on port:8000.\n" +
        "    You can enter your name on the registration page, where after registration it will generate an API key which will be stored in the database and localstorage according to which you will be able to enter the application.\n" +
        "   Once started, it will redirect you to a page where you can perform the simulation.\n" +
        "   After pressing the barrier height button, enter a single number (e.g. 1) in the empty field.\n" +
        "   After pressing the Command button, enter a scroll command (e.g., 5+5) in the blank field.\n" +
        "   Press the Simulation button, which, when entered correctly, will draw a graph and create an animation.\n" +
        "   Below it, you will also see the output in values as it was generated.\n" +
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
        "    Na registračnej stránke môžete zadať svoje meno, pričom po registrácii sa vygeneruje kľúč API, ktorý sa uloží do databázy a lokálneho úložiska, podľa ktorého budete môcť vstúpiť do aplikácie.\n" +
        "    Po spustení vás presmeruje na stránku, kde môžete vykonať simuláciu.\n" +
        "    Po stlačení tlačidla výšky bariéry zadajte do prázdneho poľa jedno číslo (napr. 1).\n" +
        "    Po stlačení tlačidla Príkaz zadajte do prázdneho poľa príkaz na posúvanie (napr. 5+5).\n" +
        "    Stlačte tlačidlo Simulation (Simulácia), ktoré po správnom zadaní nakreslí graf a vytvorí animáciu.\n" +
        "    Pod ňou sa zobrazí aj výstup v hodnotách, ako bol vygenerovaný.\n" +
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