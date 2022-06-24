<?php


if (!isset($_SESSION)) {
  session_name('sistema_pneu');
  session_start();
}

?>





<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.1/font/bootstrap-icons.css">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

  <script src="public/scriptAnimate.js"></script>

  <link rel="stylesheet" href="public/style.css">
  <link rel="shortcut icon" href="assets/icone.ico" />
  <title>Notas Faturadas</title>
</head>

<body>


  <div class="right-half-box">
    <img src="assets/draw_sis_notas.svg" class="bg-img" alt="">
  </div>
  <div id="animated">
    <img src="assets/Logo-autoamerica-1.png" class="my-4" alt="">
 

    <div class=" col-md-3 mt-5 " >
      <form action="controller/login.php" method="POST" class="">
        <?php
        if (isset($_SESSION['nao_autenticado'])) :
        ?>
          <div class="fs-6 alert alert-danger ">
            <span class="small bi-exclamation-triangle" role="alert"> Falha no login, tente novamente</span>
          </div>
        <?php
        endif;
        unset($_SESSION['nao_autenticado']);
        ?>
        <div id='loadnatal'></div>
        <div class="mt-3 mb-4  shadow-sm input-group ">
          <input type="text " class="form-control font " name="usuario" placeholder="Usuario ">
          <span class="input-group-text bg-light bg-opacity-50 icon-input-span "><i class="bi bi-person "></i></span>
        </div>
        <div class=" mb-4 shadow-sm input-group  rounded ">
          <input type="password" name="senha" class="form-control font " placeholder="Senha" id="">
          <span class="input-group-text bg-light   "><i class="bi bi-key "></i></span>
        </div>

        <span class="icon-input-btn">
          
        
          <input type="submit" class="btn btn-outline-danger font  rounded  " style="margin-left:100% ;" value="Entrar">
        </span>

      </form>
    </div>

  </div>


</body>
<footer>
<p class="mb-2">Sistema de Notas Faturadas V:1.2 Ambiente: Pneu </p>
  <p class=" text-muted small"> 2022 © Todos os direitos reservados
    <strong class="small">Autoamerica Ltda</strong>
    <span class="text-muted small"> | Desenvolvido por: Gleidson Almeida</span> <span> <img src="https://cdn-icons-png.flaticon.com/512/1466/1466134.png" width="1.8%" class="mb-2" alt=""> </span>
  </p>

</footer>

</html>