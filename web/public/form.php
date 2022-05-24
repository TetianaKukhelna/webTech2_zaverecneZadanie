<?php

require('fpdf184/fpdf.php');  // MAKE SURE YOU HAVE THIS LINE

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
                        <a id="link_donwload" href='download.php?hello=true&en'><button id="downl_pdf" class="btn btn-outline-light btn-lg px-5" >Download PDF</button></a>
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
