<?php

$passo = (isset($_GET['p']))? $_GET['p'] : "";
session_start();

switch($passo) {
	case "cadastrar_product":
	{
		 Cadastrar_Product();
		 	
		break;
	}
	case "mostrar_product":
     	Mostrar_Product();
     	break;	
		

	default:
		# code...
		break;
}


function Cadastrar_Product()
{
	require("conexaobd.php");
	require("servicosdb.php");

  
 	$nome = $_POST['nome_produto'];
 	$preco = $_POST['preco'];
 	$estoque = $_POST['estoque'];
    $seller=$_SESSION['Seller'];//$_POST['id_seller'];
    $aux= BD_Mostrar_Seller_Codigo($conexao,$seller);
    $id_seller=mysqli_fetch_assoc($aux);

	 $resultado=BD_Cadastrar_Product( $conexao,$nome,$preco,$estoque,$id_seller['codigo']);
	 echo("produto cadastrado com sucesso");
	 require("cadastrar_product.php");
	 
}


function Mostrar_Product()
{
	require("conexaobd.php");
	require("servicosdb.php");

	$seller=$_SESSION['Seller'];
    $aux= BD_Mostrar_Seller_Codigo($conexao,$seller);
    $id_seller=mysqli_fetch_assoc($aux);

	$resultado=BD_Mostrar_Product($conexao,$id_seller);
	require("cadastrar_product.php");
	echo ('<br>');
	echo("<h3>produtos cadastrados do seller<h3>");


	  echo ("<table>");
	  echo("<td>");
	  echo ('codigo produto| ');
	  echo("</td>");
	  echo("<td>");
	  echo ('|nome produto| ');
	  echo("</td>");
	  echo("<td>");
	  echo ('|preco| ');
	  echo("</td>");
	  echo("<td>");
	  echo ('|estoque| ');
	  echo("</td>");
	  echo("<td>");
	  echo ('|id vendedor|');
	  echo("</td>");
	  echo ('<br>');
	  echo ("<tr>");
	while($row = mysqli_fetch_assoc($resultado))
	{

	  echo("<td>");
	  echo $row['codigo_produto'];
	  echo("</td>");
	  echo("<td>");
	  echo $row['nome_produto'];
	  echo("</td>");
	  echo("<td>");
	  echo $row['preco'];
	  echo("</td>");
	  echo("<td>");
	  echo $row['estoque'];
	  echo("</td>");
	  echo("<td>");
	  echo $row['id_vendedor'];
	  echo("</td>");
	  echo ("<tr>");
	}
	echo ("</table>");
}