<?php

$passo = (isset($_GET['p']))? $_GET['p'] : "";


switch($passo) {
	case "cadastrar_seller":
	{
		If($_POST['Seller']=='' || $_POST['Email']=='')
		{
			echo ('é necessario preencher os campos');
     		require("cadastrar_seller.php");
		}
		else
		{
		 Cadastrar_Seller();	
		  echo('cadastro feito com sucesso, já pode se logar');
		  require("index.html");
		}

		break;
	}
	case "mostrar_seller":
     	 Mostrar_Seller();
     	break;	
	case "login":
	{
     	Login();
		 if(isset($_SESSION['Seller']))
		  require("escolha.php");
		  
        else
        {
         echo ('usuario ou senha invalida');
         require("index.html");
        }
     	break;	
	}
	default:
		
		break;
}


Function Login()
{

    require("conexaobd.php");
	require("servicosdb.php");
	

	$seller = $_POST['Seller'];
	$email = $_POST['Email'];
  

 	$resultado=BD_Login_Seller( $conexao,$seller);
    $row=mysqli_fetch_row($resultado);

   if($email===$row[2])
 	{
 		session_start();
		$_SESSION['Seller'] = $_POST['Seller'] ;
		$auxiliar= $_POST['Seller'];
        
 	}

}


function Cadastrar_Seller()
{
	require("conexaobd.php");
	require("servicosdb.php");

  
 	$nome = $_POST['Seller'];
 	$email = $_POST['Email'];

    $aux=BD_Login_Seller( $conexao,$nome);
    $row=mysqli_fetch_assoc($aux);

   if($email===$row['email'])
 	{
 		echo ('seller já existente');
     	require("cadastrar_seller.php");
 	}
 	else
 	{
 		$resultado=BD_Cadastrar_Seller( $conexao,$nome,$email);
 		
 	}
}	


function Mostrar_Seller()
{
	require("conexaobd.php");
	require("servicosdb.php");
	$resultado=BD_Mostrar_Seller($conexao);
	require("cadastrar_seller.php");
	echo("<h3>seller cadastrado<h3>");
      echo ("<table>");
	  echo("<td>");
	  echo ('codigo seller| ');
	  echo("</td>");
	  echo("<td>");
	  echo ('|nome| ');
	  echo("</td>");
	  echo("<td>");
	  echo ('|email| ');
	  echo("</td>");
	  echo ("<tr>");
	while($row = mysqli_fetch_assoc($resultado))
	{
	  echo("<td>");
	  echo $row['codigo'];
	  echo("</td>");
	  echo("<td>");
	  echo $row['nome'];
	  echo("</td>");
	  echo("<td>");
	  echo $row['email'];
	  echo("</td>");

	  echo ("<tr>");
	}
	echo ("</table>");
}