<?php

// verifica se session (não) está vazia 
if(!isset($_SESSION)) 
{ 
   session_start();
}
// verifica se existe alguma session 'usuario'
if(!$_SESSION['usuario']) {
   header('Location: index.php');
  
    exit();
} 



include 'database/connect.php';

$pesquisar = $_POST['busca'] ?? '';

$query = "SELECT  id_nota, numero_nota, _data, observacao, arquivo, user.usuario, id_usuario, nota_fiscal.check FROM nota_fiscal JOIN user 
ON nota_fiscal.id_usuario = user.id WHERE numero_nota  LIKE '%$pesquisar%' ORDER BY  id_nota desc LIMIT 50 ";



?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="120">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
    <script src="public/scriptLoadMenu.js"></script>
    <script src="public/check_state.js"></script>
    <link rel="stylesheet" href="public/style.css">
   

    <link rel="shortcut icon" href="assets/icone.ico" />

    <title>Visualizar Notas</title>
</head>

<body>
    <div id="loadmenu"></div>

    <div class="container-fluid box-main">
        <div class=" row ">
            <div class=" col col-12 mt-2  ">

            <form action="visualizar.php"  method="POST">
            <div class=" mt-1 shadow-sm input-group w-25 rounded">
                    <input type="text" name="busca" class="form-control text-light font bg-transparent" placeholder="Buscar nota" id="">
                    <button type="submit" class="input-group-text bg-transparent link-primary bi-search "></button>
                </div>

            </form>
                <table class=" table  text-light  table-borderless " id="table">
                    <thead class="border-bottom ">
                        <tr >
                            <th scope="col" class="bi-check2-square "> Marcar</th>
                            <th scope="col" class="bi-file-text"> Numero Nota</th>
                            <th scope="col" class="bi-calendar-date"> Data</th>
                            <th scope="col" class="bi-card-text"> Observação</th>
                            <th scope="col" class="bi-arrow-down">Baixar</th>
                            <th scope="col" class="bi-person">Criador</th>
                            <th scope="col"></th>
                        </tr> 
                    </thead>
                    <tbody >

                    <?php 

                    
                        $resultado = mysqli_query($conn, $query) or die ("Erro na conexao");

                        while($linha = mysqli_fetch_assoc($resultado)) {

                            $numero_notav = $linha['numero_nota'];
                            $datav = $linha['_data'];
                            $observacaov = $linha['observacao'];
                            $arquivov = $linha['arquivo'];
                            $usuariov =$linha['usuario'];
                            $id_notav = $linha['id_nota'];
                            $id_usuariov = $linha['id_usuario'];
                            $checkv  = $linha['check'];



                            if ($checkv != 1) {
                                echo" <tr>

                                <td >
                                <form action='controller/check_controller.php?nota=$id_notav' method='post' >
                                 <input type='checkbox' onchange='this.form.submit()' name='check' value='1'  class='ms-3 form-check-input ' >
                                
                                 </form>
                                 </td>";
                            } else {

                                echo " <tr>

                                <td >
                                
                                 <input type='checkbox'   class='ms-3 form-check-input ' checked >
                                
                                 </form>
                                 </td>";

                            }

                            echo "
                           
                            <td >
                               $numero_notav
                            </td>

                            <td>
                               $datav
                            </td>
                            <td >
                            <a href='' id='obs' data-bs-toggle='tooltip' data-bs-placement='top' title='$observacaov'  class='m-5 bi-eye'>
                              
                            </td>
                            <td>
                               <a href='controller/$arquivov'  target='_blank'  class='m-4 bi-arrow-down-circle'>
                            </td>
                            <td class=''>
                               $usuariov
                            </td>
                           ";

                           if($_SESSION['admin'] == '1' ) {
                               if ($_SESSION['usuario'] == 'jhon.silva') {
                                echo"
                                <td>
                                <a href='acesso.html'   class='m-4 bi-trash text-danger ' >
                                
                               </td>";
                               } else {
                                echo"
                                <td>
                                <a href='controller/delete_nota.php?nota=$id_notav&iu=$id_usuariov'   class='m-4 bi-trash text-danger'>
                                
                               </td>";
                               }
                         
                           } 
                        }

                       
                    
                    
                    ?>

                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</body>

</html>