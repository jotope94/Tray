<?php

function BD_Cadastrar_Seller( $conexao,$nome_seller,$email_seller)
{
	
	$sql = sprintf("INSERT INTO seller (nome,email) VALUES ('%s', '%s')", $nome_seller, $email_seller);
	
	
	$resultado = mysqli_query($conexao, $sql) or die( mysqli_error($conexao) );
	
	return $resultado;
	
}


function BD_Mostrar_Seller($conexao)
{
	
	$sql = sprintf("SELECT codigo,nome,email FROM seller");
	$resultado = mysqli_query($conexao, $sql);
	return $resultado;
}

function BD_Login_Seller($conexao,$nome)
{
	
	$sql = sprintf("SELECT codigo,nome,email FROM seller where nome='%s' ",$nome);
	$resultado = mysqli_query($conexao, $sql);
	return $resultado;
}

function BD_Mostrar_Seller_Codigo($conexao,$nome)
{
	
	$sql = sprintf("SELECT codigo FROM seller where nome='%s' ",$nome);
	$resultado = mysqli_query($conexao, $sql);
    return $resultado;
}

function BD_Cadastrar_Product( $conexao,$nome_produto,$preco_produto,$estoque_produto,$id_vendedor)
{
	
	$sql = sprintf("INSERT INTO product(nome_produto,preco,estoque,id_vendedor) VALUES ('%s', %f,%d,%d)", $nome_produto, $preco_produto,    $estoque_produto,$id_vendedor);
	
	
	$resultado = mysqli_query($conexao, $sql) or die( mysqli_error($conexao) );
	
	return $resultado;
}	

function BD_Mostrar_Product($conexao,$seller)
{
	
	$sql = sprintf("SELECT * FROM product where id_vendedor=%d ",$seller);
	$resultado = mysqli_query($conexao, $sql);
	return $resultado;
}

