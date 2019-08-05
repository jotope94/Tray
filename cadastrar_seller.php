<html>
	<head>
		<title>cadastrar seller</title>
		<script src="js/vue.min.js"></script>
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
		<div id="app":class="{'open': open}">
		<my-nav @toggle="update"></my-nav> 
        <div class="container">
		<img src="imagens/tray.png"/>
     <p>Cadastrar Seller!</p>
	
		<form enctype="multipart/form-data" action="seller.php?p=cadastrar_seller" method="post">
			<p>Seller:</p>
			<input type="text" name="Seller" />
			
			<p>Email:</p>
			<input type="text" name="Email" />
			
			
			<input type="submit" value="Botao Cadastrar"/>
		</form>


		<p>mostrar seller</p>
		
		<form enctype="multipart/form-data" action="seller.php?p=mostrar_seller" method="post">
			<input type="submit" value="Botao mostrar"/>
		</form>

		<form enctype="multipart/form-data" action="escolha.php" method="post">
		 <input type="submit" value="voltar"/>
		</form>	
		</div>
    </div>
	<script type="text/javascript">
       
	   Vue.component('my-nav', {
		   template: `<nav> <button @click="$emit('toggle')">{{botao}}</button> bem vindo seller:  {{aux}} </nav>`,
			   data: () => ({
			   aux: '<?php session_start();   echo $_SESSION['Seller'] ?>',
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
 