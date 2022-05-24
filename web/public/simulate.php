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
    <script src="./js/plotly-2.12.1.min.js"></script>
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
                        <form method="post" action="simulate.php" class="mb-md-5 mt-md-4 pb-5" id="sim_form">

                            <input type="hidden" id="api"  name="api">
                            <input type="hidden" id="name" name="name">
                            <input type="hidden" id="heightOrScript" name="heightOrScript">

                            <h2 id="_heading" class="fw-bold mb-2 text-uppercase">Suspension simulation</h2>
                            <h4 id="_name" class="text-white-50">Hi</h4>
                            <h4 id="displayName" class="text-white-100 font-weight-bold mb-5"></h4>

                            <div class="form-outline form-white mb-4">
                                <h6 id="_intro-text" class="form-label" >Please enter your obstacle height or command!</h6>
                                <button id="HEIGHT" class="btn btn-outline-light btn-lg px-5" type="button">Obstacle height</button>
                                <button id="COMMAND" class="btn btn-outline-light btn-lg px-5" type="button">Command</button>
                            </div>

                            <div class="form-outline form-white mb-4">
                                <textarea id="command" name="command" class="form-control form-control-lg" ></textarea>
                            </div>

                            <button id="_simulate" class="btn btn-outline-light btn-lg px-5" type="submit">Simulate</button>

                        </form>
                        <div class="mb-md-2 mt-md-2 pb-3">

                                <div class="form-outline form-white mb-4">
                                    <textarea class="form-control form-control-lg" id="output" name="output"></textarea>
                                    <label id="_output" class="form-label" for="output">Output</label>
                                </div>

                        </div>
                        <div class="row mb-md-2 mt-md-2 pb-3">
                            <a class="col" href="log.csv" download><button id="_download" class="btn btn-outline-light btn-lg px-5" type="button">Download log.csv</button></a>
                            <form class="col" action="form.php" method="post">
                                <button id="_navod" name="submit_pdf" class="btn btn-outline-light btn-lg px-5" type="submit">Instruction</button>
                            </form>
                        </div>
                        <div id="graf"></div>
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


