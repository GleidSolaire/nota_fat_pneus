<?php

// verifica se session (não) está vazia 
if (!isset($_SESSION)) {
    session_name('sistema_pneu');
    session_start();
}

// verifica se existe alguma session 'usuario'
if (!$_SESSION['usuario']) {
    header('Location: index.php');

    exit();
}

// verifica se o usuario logado é admin
if ($_SESSION['admin'] != 1) {
    header('Location: acesso.html');
}

?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="public/style.css">
    <script src="public/scriptShowFile.js"></script>
    <script src="public/scriptLoadMenu.js"></script>
    <link rel="shortcut icon" href="assets/icone.ico" />
    <title>Cadastrar Nota</title>

</head>

<body>
    <div id="loadmenu"></div>


    <div class="container-fluid box-main" style="height: 100%;">

        <form action="controller/cadastrar_controller.php" method="POST" enctype="multipart/form-data">

            <div class="row">
                <div class="col-auto ms-5" style="margin-top: 20%;">
                    <div class="input-group">
                        <input type="text" name='' required id='numNotas' onkeypress="return event.charCode > 47 && event.charCode <= 57" class="form-control font" placeholder="Numero da nota">
                        <a id="button1" class="bi bi-plus-circle-fill bg-light input-group-text link-primary  " style="text-decoration: none;" onclick="add_element_to_array()"></a>
                    </div>

                    <span id='Result' class="text-light "></span>
                    <input hidden type="text" id='nota' name="numero">
                    <script>
                        $('#numNotas').keyup(function() {

                            this.value = ('000000000' + this.value).slice(-9)
                        })
                        var x = 0;
                        var array = Array();

                        function add_element_to_array() {

                            // verifica se não o input nao ta vazio ou so com os 0's da mask
                            if (document.getElementById("numNotas").value != "" &&
                                document.getElementById("numNotas").value != '000000000') {
                                array[x] = document.getElementById("numNotas").value;
                                x++;

                                var e = ""
                                var string

                                // verifica se tem apenas um num de nota ou mais
                                for (var y = 0; y < array.length; y++) {

                                    if (array.length > 1) {

                                        e += array[y] + ","
                                    }

                                    if (array.length == 1) {
                                        e += array[y]
                                    }

                                    string = e.toString()
                                }

                                //metodo replace pra retirar a ultima virgula quando tiver n's num
                                document.getElementById("Result").innerHTML = string.replace(/,$/, "")


                                document.getElementById("nota").value = string.replace(/,$/, "")
                            } else {
                                alert("Número de nota vazio ou inválida!")
                            }

                        }
                    </script>
                </div>

                <div class="col-auto " style="margin-top: 20%;">
                    <input type="text" name="observacao" class="form-control font" placeholder="Observação">

                </div>

                <div class="col-auto " style="margin-top: 20%; ">
                    <label for="namearquivo" class="btn btn-secondary font  bi-paperclip">Anexar Arquivo </label>
                    <input type="file" name="arquivo[]" accept="application/PDF, pdf" id="namearquivo" style="display: none" multiple='multiple'>
                    <span id='file-name' class="text-light  fs-6"></span>

                </div>
                <div class="col-auto " style="margin-top: 20%;">
                    <input type="submit" class="btn btn-outline-primary font " value="Salvar">

                </div>

            </div>
        </form>
    </div>

</body>

</html>