<?php
require('fpdf184/fpdf.php');  // MAKE SURE YOU HAVE THIS LINE
require('fpdf184/makefont/makefont.php');

if (isset($_GET['en'])){
    $popis_header = "Instructions for using the site, description of the API created.";
    $popis = "Instructions on how to use the page, description of the API created.

    The API we are using uses CAS (Computer Aided System) and Octave for better graph rendering.
    The whole project is run using Docker and has docker-compose in it.
    For data storage and processing, we use a local MySQL database, which we linked using PHPMyAdmin.
    We run our project on port:8000.
    On the page you can enter your name and Octave script, which if necessary we will simulate using a graph and animation.
    Once the simulation is complete, the output will be a graph and animation that will be used to show what values we have obtained.

    On the page you have the option to download the logs in CSV format and email them to me. In the file you will get the time and date when the data was generated,
    whether the command was executed correctly, and if the command failed, you will get information about the error.

    You have the option to download this guide in PDF format.
    You can choose your language below.";

}else{
    $popis_header = "N�vod na pou��vanie str�nky, popis vytvoren�ho API.";
    $popis = "N�vod na pou��vanie str�nky, opis vytvoren�ho rozhrania API.

    API, ktor� pou��vame, vyu��va CAS (Computer Aided System) a Octave na lep�ie vykres�ovanie grafov.
    Cel� projekt sa sp���a pomocou n�stroja Docker a m� v sebe docker-compose.
    Na ukladanie a spracovanie �dajov pou��vame lok�lnu datab�zu MySQL, ktor� sme prepojili pomocou PHPMyAdmin.
    N� projekt sp���ame na adrese port:8000.
    Na str�nke m��ete zada� svoje meno a Octave script, ktor� v pripade pruznosti nasimulujeme pomocou grafu a animacii.
    Po skon�en� simul�cie bude v�stupom graf a anim�cia, ktor� bude sl��i� na zobrazenie toho, ak� hodnoty sme z�skali.

    Na str�nke m�te mo�nos� stiahnu� si protokoly vo form�te CSV a posla� mi ich e-mailom. V s�bore z�skate �as a d�tum, kedy boli �daje vygenerovan�,
    �i bol pr�kaz vykonan� spr�vne a v pr�pade ne�spe�n�ho pr�kazu z�skate inform�cie o chybe.

    M�te mo�nos� stiahnu� si tento n�vod vo form�te PDF.
    Ni��ie si m��ete vybra� jazyk.";
}

//$utf8_string = utf8_encode($popis_header);
//$utf8_string = mb_convert_encoding($popis_header, 'UTF-8', 'iso-8859-2');

    if (isset($_GET['hello'])) {
        $pdf = new FPDF();

        $pdf->AddFont('Arial','','arial.php');
        $pdf->AddPage();
        $pdf->SetFont( 'Arial', '', 20 );

//        echo $popis_header;
        $pdf->Cell(0,10,"$popis_header",1,0,'C');

//        $pdf->Cell(10,10," ",1,1,'C');

        $pdf->Write(15, "$popis");

        $pdf->Output("report.pdf", "I");
        unset($_GET['hello']);
    }
?>
