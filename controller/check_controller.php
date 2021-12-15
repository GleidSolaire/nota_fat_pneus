<?php 



session_start();

if($_SESSION['usuario'] == 'expedicao') {




include ('../database/connect.php');


$cap_check = $_POST['check'];
$cap_nota = $_GET['nota'];

$query = "UPDATE nota_fiscal SET `check` = '$cap_check' WHERE id_nota = '$cap_nota' ";

if(mysqli_query($conn, $query)) {

header('Location: ../visualizar.php');
} else {

echo mysqli_error($conn);

 }

} else {

 
    echo "<script type='text/javascript'>alert('Check habilitado somente para expedicao'); 
        window.location.href='../visualizar.php'
     </script>";
}








?>