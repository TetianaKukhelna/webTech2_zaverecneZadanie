<?php
require('fpdf184/fpdf.php');  // MAKE SURE YOU HAVE THIS LINE
require('fpdf184/makefont/makefont.php');

if (isset($_GET['en'])){
    $popis_header = "Instructions for using the site, description of the API created.";
    $popis1 = "        The API we are using uses CAS (Computer Aided System) and Octave for better 
graph rendering. The whole project is run using Docker and has docker-compose file in it. For data storage and processing, we use a local MySQL database, which we 
linked using PHPMyAdmin. We run our project on port:8000.
";
    $popis = "       On the page you can enter your name and Octave script, which if necessary we will simulate using a graph and animation. Once the simulation is complete, the output will be a graph and animation that will be used to show what values we have obtai-
ned. On the page you have the option to download the logs in CSV format and email them to me. In the file you will get the time and date when the data was generated,
whether the command was executed correctly, and if the command failed, you will get information about the error.";


}else{
    $popis_header = "Návod na pouzívanie stránky, popis vytvoreného API.";
    $popis1 = "        API, ktoré pou¾ívame, vyu¾íva CAS (Computer Aided System) a Octave na lep-
¹ie vykresµovanie grafov. Celý projekt sa spú¹»a pomocou nástroja Docker a má v sebe docker-compose subor. Na ukladanie a spracovanie údajov pou¾ívame lokálnu databázu MySQL, ktorú sme prepojili pomocou PHPMyAdmin. Ná¹ projekt spú¹»ame na adrese port:8000.
";
    $popis = "       Na stránke mô¾ete zada» svoje meno a Octave script, ktorý v pripade pruznosti nasimulujeme pomocou grafu a animacii. Po skonèení simulácie bude výstupom graf 
a animácia, ktorá bude slú¾i» na zobrazenie toho, aké hodnoty sme získali. Na strá-
nke máte mo¾nos» stiahnu» si protokoly vo formáte CSV a posla» mi ich e-mailom. V súbore získate: èas a dátum, kedy boli údaje vygenerované, èi bol príkaz vykonaný 
správne a v prípade neúspe¹ného príkazu získate informácie o chybe.";
}

//$utf8_string = utf8_encode($popis_header);
//$utf8_string = mb_convert_encoding($popis_header, 'UTF-8', 'iso-8859-2');

    if (isset($_GET['hello'])) {
        $pdf = new FPDF();

        $pdf->AddFont('Arial','','arial.php');
        $pdf->AddPage();
        $pdf->SetFont( 'Arial', 'B', 16 );
//        $pdf->SetTextColor(50,60,100);

//        echo $popis_header;
        $pdf->Cell(0,10,"$popis_header",1,0,'C');
        $pdf->SetFont( 'Arial', '', 14 );
//        $pdf->Ln(10);
        $pdf->Write(15,"$popis1");
        $pdf->Write(20, "$popis");

        $pdf->Output("report.pdf", "I");
        unset($_GET['hello']);
    }
?>

