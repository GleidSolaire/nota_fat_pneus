<?php 

session_start();
include ('../database/connect.php');


if(empty ($_POST['usuario']) || empty($_POST['senha'])) {
    header('location: ../index.php');
    exit();
}

$usuario = mysqli_real_escape_string($conn,$_POST['usuario']);
$senha = mysqli_real_escape_string($conn,$_POST['senha']);

 $query ="SELECT id, usuario, senha, administrador FROM user WHERE usuario = '{$usuario}' and senha = '{$senha}' ";

$resultado = mysqli_query($conn,$query );
$linha = mysqli_num_rows($resultado);

$captura = mysqli_fetch_assoc($resultado);
$admin = $captura['administrador'];
$id = $captura['id'];



if ($linha ==1) {
    $_SESSION ['usuario']  = $usuario;
    $_SESSION['admin'] = $admin;
    $_SESSION['id'] = $id;
    
    header('location: ../visualizar.php');
    exit();

} else {
$_SESSION['nao_autenticado'] = true;
 header('location: ../index.php');
 exit();
}




?>