<?php
use App\Controller\PersonController;
include '../app/vendor/autoload.php';

if ((isset($_POST['command']) && !empty($_POST['command'])) && (isset($_POST['name']) && !empty($_POST['name']))) {
    $output = "";
    echo exec('octave-cli --eval '.'"pkg load control;'.$_POST['command'].'"' , $output);
    $output = implode("\n",$output);


    $log = new PersonController();
    $logId = $log->insertSimulation($_POST['name'], $_POST['command'], "SUCCESS", "NONE");
    $file = fopen("log.csv", 'w');
    $array = $log->getSimulation($logId);
    $array = array_unique($array);
    fputcsv($file, array_keys($array), ';');
    fputcsv($file, $array, ';');
}



?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="stylesheet.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <title>Suspension simulation</title>
</head>
<body>
<section class="vh-100 gradient-custom">
    <div class="container-fluid py-5 h-100">
        <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5">
                <div class="card bg-dark text-white" style="border-radius: 1rem;">
                    <div class="card-body p-5 text-center">
                        <button id="EN" class="btn btn-outline-light btn-lg px-5" onclick="en()">EN</button>
                        <button id="SK" class="btn btn-outline-light btn-lg px-5" onclick="sk()">SK</button>
                        <form method="post" action="index.php" class="mb-md-5 mt-md-4 pb-5">

                            <h2 id="_heading" class="fw-bold mb-2 text-uppercase">Suspension simulation</h2>
                            <p id="_intro-text" class="text-white-50 mb-5">Please enter your name and obstacle height!</p>

                            <div class="form-outline form-white mb-4">
                                <input type="text" id="name" name="name" class="form-control form-control-lg" />
                                <label id="_name" class="form-label" for="name">Name</label>
                            </div>

                            <div class="form-outline form-white mb-4">
                                <textarea id="command" name="command" class="form-control form-control-lg" ></textarea>
                                <label id="_height" class="form-label" for="command">Height</label>
                            </div>

                            <button id="_simulate" class="btn btn-outline-light btn-lg px-5" type="submit">Simulate</button>

                        </form>
                        <div class="mb-md-5 mt-md-4 pb-3">
                            <?php
                            if(isset($output) && !empty($output)){?>
                                <div class="form-outline form-white mb-4">
                                    <textarea class="form-control form-control-lg" id="output" name="output"> <?php echo $output;?> </textarea>
                                    <label id="_output" class="form-label" for="output">Output</label>
                                </div>
                                <a href="log.csv" download><button id="_download" class="btn btn-outline-light btn-lg px-5" type="button">Download log.csv</button></a>
                        <?php
                        }
                        ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<script src="./js/language.js"></script>
<script src="./js/script.js"></script>
</body>
</html>


