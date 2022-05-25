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
    $popis_header = "N�vod na pouz�vanie str�nky, popis vytvoren�ho API.";
    $popis1 = "        API, ktor� pou��vame, vyu��va CAS (Computer Aided System) a Octave na lep-
�ie vykres�ovanie grafov. Cel� projekt sa sp���a pomocou n�stroja Docker a m� v sebe docker-compose subor. Na ukladanie a spracovanie �dajov pou��vame lok�lnu datab�zu MySQL, ktor� sme prepojili pomocou PHPMyAdmin. N� projekt sp���ame na adrese port:8000.
";
    $popis = "       Na registra�nej str�nke m��ete zada� svoje meno, pri�om po registr�cii sa vygeneruje k��� API, ktor� sa ulo�� do datab�zy a lok�lneho �lo�iska, pod�a ktor�ho 
budete m�c� vst�pi� do aplik�cie.Po spusten� v�s presmeruje na str�nku, kde m��ete 
vykona� simul�ciu. Po stla�en� tla�idla v��ky bari�ry zadajte do pr�zdneho po�a jedno ��slo (napr. 1). Po stla�en� tla�idla Pr�kaz zadajte do pr�zdneho po�a pr�kaz na pos�-
vanie (napr. 5+5). Stla�te tla�idlo Simulation (Simul�cia), ktor� po spr�vnom zadan� 
nakresl� graf a vytvor� anim�ciu. Pod �ou sa zobraz� aj v�stup v hodnot�ch, ako bol vygenerovan�.
       Na str�nke m�te mo�nos� stiahnu� si protokoly vo form�te CSV a posla� mi ich e-mailom zadan� v config file. V s�bore z�skate: �as a d�tum, kedy boli �daje vygenerovan�, �i bol pr�kaz vykonan� spr�vne a v pr�pade ne�spe�n�ho pr�kazu z�skate inform�cie o chybe.";
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

