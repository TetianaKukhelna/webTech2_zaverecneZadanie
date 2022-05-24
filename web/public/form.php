<?php

require('fpdf184/fpdf.php');  // MAKE SURE YOU HAVE THIS LINE

$popis = "Návod na používanie stránky, popis vytvoreného API.

        Vyuzivana nami API pouziva CAS(Computer Aided System) a Octave pre lepse kreslenie grafa.
        Cely projekt je rozbehany pomocou Docker a ma v sebe docker-compose.
        Pre ukladanie a pracu s udajmi pouzivame lokalnu databazu MySQL aku mame spojenu s PHPMyAdmin.
        Bezi nas projekt na poste:8000.
        Na stranke ste mozete uvediet svoje meno a vahu aku chcete zosimulovat.
        Po Simulacii, vystupom bude sluzit graf a animacia, aka bude sluzit na ukazku ake hodnoty sme dostavali.

        Na stranke ste mate moznost stahnut logy vo formate CSV a s dalsim odoselanim ma e-mail. V subore ste dostanete cas a datum kedy boli vygenerovane udaje,
        ci spravne bol zbehnuty prikaz a v pripade Failed, bude dana informacia o chybe.

        Mate v moznosti stahnut tento Navod vo formate PDF.
        Nizsie dasa vybrat jazyk.";

if (isset($_POST['download_pdf'])) {

    $pdf = new FPDF();
    $pdf->AddPage();
    $pdf->SetFont( 'Arial', '', 20 );
    $pdf->Cell(0,10,"Popis vytvoreného API a návod na používanie stránky",1,0,'C');
    $pdf->Cell(0,10,"Pouzivame CAS (Computer Aided System)",1,0,'C');

    $pdf->Cell(0,10,"Zaciatok ",1,0,'C');
    $pdf->Write(15, "$popis");

    $pdf->Output("report.pdf", "D");
}

?>

<!doctype html>
<html lang="sk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="stylesheet.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <title>Navod</title>
</head>
<body>
<section class="vh-100 gradient-custom">
    <div class="container-fluid py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <p id="popis">

                        </p>
                    </div>
                    <div class="mb-md-5 mt-md-4 text-center">
                        <a id="link_donwload" href='download.php?hello=true&en'><button class="btn btn-outline-light btn-lg px-5" >Run PHP Function</button></a>
<!--                        <form action="download.php" method="post">-->
                            <button id="navod_en" type="submit" name="en" class="btn btn-outline-light btn-lg px-5" onclick="navod_en()">EN</button>
                            <button id="navod_sk" type="submit" name="sk" class="btn btn-outline-light btn-lg px-5" onclick="navod_sk()">SK</button>
<!--                        </form>-->
                    </div>


                </div>
            </div>
        </div>
    </div>
</section>

<script src="./js/lan_navod.js"></script>
</body>
</html>
