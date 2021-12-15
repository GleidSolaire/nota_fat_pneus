
    <?php 

     session_start();

if (!$_SESSION['usuario']) {
    header('Location: index.php');

    exit();
}



if (empty($_GET['nota'])   ) {

  echo "Erro! <a href='../agendar.php'>Voltar</a>";

  exit();
}
    
    include  "../database/connect.php";
   
     $id = $_GET['nota'];
     $iu = $_GET['iu'];
     $id_usuario = $_SESSION['id'];

if ($id_usuario == $iu) {



     $sql =  "DELETE FROM nota_fiscal  WHERE id_nota = '$id' AND id_usuario = '$id_usuario'";


  if(mysqli_query($conn, $sql) ) {
     
   
   header('Location: alerta.php');
   
  } else {
      echo "Erro ao deletar! ";
      echo mysqli_error($conn);
     
  }
} else {

    echo "<br> <h3 style='color:red'> Erro ao Deletar, divergência de dados </h3> <a href='../cadastrar.php'>Voltar</a>";
}

  ?>