<?php 
if(!isset($_SESSION)) 
{ 
    session_name('sistema_pneu');
   session_start();
}

if(!$_SESSION['usuario']) {
   header('Location: index.php');
  
    exit();
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

    <link rel="shortcut icon" href="assets/icone.ico" />
    <title>Menu</title>
</head>

<body>
    <nav class="navbar navbar-light bg-transparent ">

        <div class="container-fluid">
            <a href="#">
                <img src="assets/logo-aa.svg" alt="" class="" width="100%">
            </a>

            <div class="justify-content-end ">

                <a href="./visualizar.php" class="btn btn-danger  font ">Visualizar Notas</a>
                <a href="./cadastrar.php" class="btn btn-danger  font">Cadastrar Nota</a>
                <div class="btn-group" role="group">
                <a   class="btn btn-danger  name-login font  bi-person-fill"  >
                Olá,<?php  echo $_SESSION['usuario'] ?></a>
                
                <a class="btn btn-danger font bi-box-arrow-right" href="./controller/logout.php"> Sair</a>
            </div>
        </div>
    </nav>

</body>

</html>