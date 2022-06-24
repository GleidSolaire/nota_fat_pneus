
<?php
if(!isset($_SESSION)) 
{ 
   session_name('sistema_pneu');
   session_start();
}

// verifica se existe alguma session 'usuario'
if(!$_SESSION['usuario']) {
   header('Location: ../index.php');
  
    exit();
} 

?>


<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="shortcut icon" href="assets/icone.ico" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <title>Acesso</title>
</head>

<div class="container mt-3">

</div>

<!-- The Modal -->

<div class="modal-dialog">
    <div class="modal-content">

        <!-- Modal Header -->
        <div class="modal-header bg-success ">
            <h4 class="modal-title bi-check-square-fill text-light"> operação realizada com sucesso! </h4>

        </div>

        <!-- Modal body -->


        <!-- Modal footer -->
        <div class="modal-footer ">
            <a class="btn btn-primary  shadow" href="../visualizar.php">OK</a>
        </div>

    </div>
</div>
</div>


</body>

</html>