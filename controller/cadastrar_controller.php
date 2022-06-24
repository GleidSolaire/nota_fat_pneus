<?php 
session_name('sistema_pneu');
session_start();
include ('../database/connect.php');


// verifica se o post vindo da page é vazio (o que não pode)
// evita que o usuario entre diretamente pela url e crie um registro vazio

if(empty ($_POST['numero'])) {

    echo "Erro! <a href='../cadastrar.php'>Voltar</a>";
    exit();
}

$numero_notav = $_POST['numero'];
$observacaov = $_POST['observacao'];
$id_usuariov = $_SESSION['id'];
date_default_timezone_set('America/Sao_Paulo');
$datav = date('d/m/Y h:i:s a', time());

$dir = 'rep/';

$zip = new ZipArchive();
$nome_zip = 'rep/' . uniqid(). '.zip';

if($zip -> open ($nome_zip, ZipArchive::CREATE) !== true) {
    echo   'falha no zip';
}

$count = count($_FILES['arquivo']['name']);

for ($i = 0; $i < $count; $i++) {

if($_FILES['arquivo']['tmp_name'][$i] == '') {
    continue;
} 

$zip ->addFromString($_FILES['arquivo']['name'][$i], file_get_contents($_FILES['arquivo']['tmp_name'][$i]));

move_uploaded_file($_FILES['arquivo']['tmp_name'][$i], $dir);

}
$zip -> close();

   
// verificando se não está inserindo uma nota com numero igual
$query = "SELECT numero_nota FROM nota_fiscal WHERE  numero_nota = '$numero_notav'";
$resultado = mysqli_query($conn, $query) or die ('erro de conexao');

$linha = mysqli_num_rows($resultado);

// se o resultado for diferente de 1, significa que ainda não tem essa nota
if($linha != 1) {

$query2 = "INSERT INTO  nota_fiscal (`numero_nota`, `observacao`, `arquivo`, `id_usuario`, `_data`)
                   VALUES ('$numero_notav', '$observacaov', '$nome_zip', '$id_usuariov', '$datav') ";

if(mysqli_query($conn, $query2)) {

    header('Location: alerta.php');
} else {

    echo mysqli_error($conn);
    echo $linha;
  
} 
} else {
    echo "<br> <h3 style='color:red'> Já existe uma nota com esse número!</h3> <a href='../cadastrar.php'>Voltar</a>";
}



?>