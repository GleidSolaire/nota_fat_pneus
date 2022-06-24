<?php 




session_name('sistema_pneu');
session_start();

if($_SESSION['usuario'] == 'expedicao') {




include ('../database/connect.php');


$cap_check = $_GET['check'];
$cap_nota = $_GET['nota'];
$cap_arqv = $_GET['arq'];


$query = "UPDATE nota_fiscal SET `check` = '$cap_check' WHERE id_nota = '$cap_nota' ";

if(mysqli_query($conn, $query)) {

    echo "  <body   id='redirect'  > 

    <script> 
       document.getElementById('redirect').onload = function  () {
          
        var link = document.createElement('a');
        link.href = './$cap_arqv'
        link.download = '';
        link.dispatchEvent(new MouseEvent('click'));
        window.location.href='../visualizar.php'

        }

    </script>
"; 
} else {

echo mysqli_error($conn);

 }

} else {

 
    echo "<script type='text/javascript'>alert('Check habilitado somente para expedicao'); 
        window.location.href='../visualizar.php'
     </script>";
}


     


?>