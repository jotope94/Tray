<html>
	<head>
		<title>Bem vindo:<?php session_start();   echo $_SESSION['Seller'] ?></title>
		<script src="js/vue.min.js"></script>
		<script src="vue.js"></script>

		<!--Import Google Icon Font-->
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
      <!--Import materialize.css-->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0-rc.2/css/materialize.min.css">

	  <style>
                nav{
                    border: 1px;
                    height: 100px;
                    width:  3000px;
                    margin-top: 0vh;
                    background-color: gray ;
                }
               .open > nav{
                height: 0px;
                }
                
                DIV.container {
                    border: 5px;
                    height: 600px;
                    width:  500px;
                    margin-top: 10vh;
                }
        </style>
	</head>

	<body>
  
	<div id="app" :class="{'open': open}">
	<my-nav @toggle="update"></my-nav> 
        <div class="container">
		<img src="imagens/tray.png"/>
		<p>Escolha o que quer fazer:</p>
		<p>Cadastrar ou verificar seller</p>
		<form enctype="multipart/form-data" action="cadastrar_seller" method="post">
			<input type="submit" value="seller"/>
		</form>

		<p>Cadastrar ou verificar produto</p>
		
		<form enctype="multipart/form-data" action="cadastrar_product.php" method="post">
			<input type="submit" value="product"/>
		</form>
	</div>
	</div>
	<script type="text/javascript">
       
	   Vue.component('my-nav', {
		   template: `<nav> <button @click="$emit('toggle')">{{botao}}</button> bem vindo seller:  {{ aux}} </nav>`,
			   data: () => ({
			   aux: '<?php  echo $_SESSION['Seller'] ?>',
			   botao:'^'
	   })
	   })
	   Vue.component('my-main', {
		   template: ``,
	   })
	   new Vue({
			el: '#app',
			data:{
				open:false
			},

		   methods: {
			   update() {
				   this.open = !this.open
			   }
		   }
	  })
	  
    </script>
	</body>
</html>
 