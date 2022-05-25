<?php
require('fpdf184/fpdf.php');  // MAKE SURE YOU HAVE THIS LINE
require('fpdf184/makefont/makefont.php');

if (isset($_GET['en'])){
    $popis_header = "Instructions for using the site, description of the API created.";
    $popis1 = "        The API we are using uses CAS (Computer Aided System) and Octave for better 
graph rendering. The whole project is run using Docker and has docker-compose file in it. For data storage and processing, we use a local MySQL database, which we 
linked using PHPMyAdmin. We run our project on port:8000.
";
    $popis = "       You can enter your name on the registration page, where after registration it will generate an API key which will be stored in the database and localstorage according 
to which you will be able to enter the application. Once started, it will redirect you to 
a page where you can perform the simulation. After pressing the barrier height button, enter a single number (e.g. 1) in the empty field. After pressing the Command button, 
enter a scroll command (e.g., 5+5) in the blank field. Press the Simulation button, which, when entered correctly, will draw a graph and create an animation. Below it, you will also see the output in values as it was generated.
       On the page you can enter your name and Octave script, which if necessary we will simulate using a graph and animation. Once the simulation is complete, the output will be a graph and animation that will be used to show what values we have obtai-
ned. On the page you have the option to download the logs in CSV format and email them to me in address from config file. In the file you will get the time and date when the data was generated,
whether the command was executed correctly, and if the command failed, you will get information about the error.";


}else{
    $popis_header = "Návod na pouzívanie stránky, popis vytvoreného API.";
    $popis1 = "        API, ktoré pou¾ívame, vyu¾íva CAS (Computer Aided System) a Octave na lep-
¹ie vykresµovanie grafov. Celý projekt sa spú¹»a pomocou nástroja Docker a má v sebe docker-compose subor. Na ukladanie a spracovanie údajov pou¾ívame lokálnu databázu MySQL, ktorú sme prepojili pomocou PHPMyAdmin. Ná¹ projekt spú¹»ame na adrese port:8000.
";
    $popis = "       Na registraènej stránke mô¾ete zada» svoje meno, prièom po registrácii sa vygeneruje kµúè API, ktorý sa ulo¾í do databázy a lokálneho úlo¾iska, podµa ktorého 
budete môc» vstúpi» do aplikácie.Po spustení vás presmeruje na stránku, kde mô¾ete 
vykona» simuláciu. Po stlaèení tlaèidla vý¹ky bariéry zadajte do prázdneho poµa jedno èíslo (napr. 1). Po stlaèení tlaèidla Príkaz zadajte do prázdneho poµa príkaz na posú-
vanie (napr. 5+5). Stlaète tlaèidlo Simulation (Simulácia), ktoré po správnom zadaní 
nakreslí graf a vytvorí animáciu. Pod òou sa zobrazí aj výstup v hodnotách, ako bol vygenerovaný.
       Na stránke máte mo¾nos» stiahnu» si protokoly vo formáte CSV a posla» mi ich e-mailom zadanú v config file. V súbore získate: èas a dátum, kedy boli údaje vygenerované, èi bol príkaz vykonaný správne a v prípade neúspe¹ného príkazu získate informácie o chybe.";
}

    if (isset($_GET['hello'])) {
        $pdf = new FPDF();
        $pdf->AddFont('Arial','','arial.php');
        $pdf->AddPage();
        $pdf->SetFont( 'Arial', 'B', 16 );

        $pdf->Cell(0,10,"$popis_header",1,0,'C');
        $pdf->SetFont( 'Arial', '', 14 );

        $pdf->Write(15,"$popis1");
        $pdf->Write(20, "$popis");

        $pdf->Output("report.pdf", "D");
        unset($_GET['hello']);
    }
?>

