<?php
include('static/config.php');
if(!isset($_SESSION)){
  session_start();
}
?>

<!DOCTYPE html>
<html>
<head>
  Usuário : <?php echo $_SESSION['cpf'];?>
<center>
<p>
<img src="impc.png" alt="image description" align="midlle"/>
</p>
</center>
	
</head>
<body>

	<?php
  $cpf = $_SESSION['cpf'];
  $sql_code = "SELECT NAMEFILE FROM ARCHIVOS WHERE NAMEFILE = '$cpf'";
  $sql_query = $con->query($sql_code) or die("Falha na execução do codigo SQL: ");

  $quantidade = $sql_query->num_rows;

  if($quantidade == 1){
      ?><center><?php
      echo"Usuário com este cpf já inseriu foto, favor logar com um usuário válido ou entrar em contato com administração.";?>
      <center><?php
  }else{

    
    ?>
    <h2> Ola, seja bem vindo ao portal para registro de fotos, com o proprio nome diz o intuito e registrar fotos, para reconhecimento facial das nossas catracas.
    Abaixo, segue uma imagem modelo de como deve ser a sua postura para retirada da foto, por gentileza, nao usar adornos que possa impedir ou ate prejudicar o reconhecimento
    facial.</h2>


    <center>
    <p>
    <img src="download.jpeg" alt="image description 1" align="midlle"/>
    </p>
    </center>

    <h2> E bem simples, o intuito e recolher os registros de sua face, como um padrao de uma foto 3x4, aquela foto da identidade, sinta se a vontade a sorrir ou nao, 
    Vamos la? Quando estiver pronto basta clicar no botao abaixo.</h2>



    <center>
    <div id="constBtnCam">
      <button id="boton" class="miBtn btnHover mb-3">
        <i class="zmdi zmdi-camera-party-mode" style="color: #333;"></i> 
        <a href="pageInicial.html">Acessar camera

        </button>
        </a><?php
      }
  ?>
    
  
<br>
<p id="duracion" style="display:none;"></p>
<p id="estado"> </p>
</div>
</center>
</body>
</html>
