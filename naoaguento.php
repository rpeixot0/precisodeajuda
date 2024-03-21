<?php
// Selo Peixoto de segurança (que não vale de nada), projeto feito totalmente e unicamente para um projeto escolar qualquer erro grave nesse código deverá ser desconsiderado  
 $tabela  =  (isset($_POST['tabela'])) ? unserialize($_POST['tabela']) : [];
 
 if(isset($_POST['exc']) && $_POST['exc']!=""){
	 
	array_splice( $tabela , intval($_POST['exc']),1); 
		 
 } else if(isset($_POST['car']) && $_POST['car']!=""){
	
	$atu=$_POST['car']; 
	$mesa = $tabela[ intval($_POST['car']) ]['mesa']; 
	$pedido = $tabela[ intval($_POST['car']) ]['pedido'];
	$valor = $tabela[ intval($_POST['car']) ]['valor'];

 }
  else if(isset($_POST['atu']) && $_POST['atu']!=''){
	
	$novo = [];
	$novo['mesa']=$_POST['mesa'];
	$novo['pedido']=$_POST['pedido'] ?? '';
	$novo['valor']=$_POST['valor'] ?? '';

	$tabela[intval($_POST['atu'])]=$novo; 
 } else if(isset($_POST['mesa']) && $_POST['mesa']!=""){
	 
	$novo = [];
	$novo['mesa']=$_POST['mesa'];
	$novo['pedido']=$_POST['pedido'] ?? '';
	$novo['valor']=$_POST['valor'] ?? '';
	$tabela[]=$novo;

 }


 
?>
<html>
<head>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js" integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous"></script>
	<script>
		var bt,exc,car;
		
		function inicializar(){
			
			bt = document.querySelector("[type=submit]");	
			exc = document.querySelector("[name=exc]");		
			car = document.querySelector("[name=car]");		

			document.querySelector("[name=mesa]").focus();	

		}
		
		function excluir(i){
			exc.value=i;
			bt.click(); 
		}
		
		function alterar(i){
			car.value=i;
			bt.click()
		}

		function carregar(i){
			car.value=i;
			bt.click();
		}
		
		function cmp($i, $e) {
			if ($i == $e) {
			return 0;
			}
			return ($i < $e) ? -1 : 1;
		}
		
	</script>

	<style>
		input.clear{
			display: block;
			margin-bottom: 3px;
		}
		form{
			padding-left:3px;
			padding-top:3px;
		}
		input[name=numero]{
			width:5em;
		}
		input[name=uf]{
			width:2em;
		}
		input[name=mesa],input[name=pedido],input[name=valor	]{
			width:30em;
		}
		input[name=mesa],input[name=numero],input[name=valor],input[name=uf] {
			display: inline-block;
		}
		input[type=submit]{
			background-color: LightGreen;
		}
		input[type=button]{
			background-color: AliceBlue;
		}
	</style>
</head>
<body onload="inicializar()">
	<form action="prova1" method="POST">
		<h3>Cadastro de Endereços </h3>
		<input type="hidden" name="exc" />
		<input type="hidden" name="car" />
		
		<input class="clear" type="hidden" name="atu" value="<?=$atu ?? ''?>" />
		
		<input type="hidden" name="tabela" value="<?=htmlspecialchars(serialize($tabela))?>" />
		
		<input class="clear" placeholder="N° Mesa" name="mesa" value="<?=$mesa ?? '' ?>" />
		<input class="clear" placeholder="Pedido:" name="pedido" value="<?=$pedido ?? '' ?>" />
		<input class="clear" placeholder="Valor:" name="valor"  value="<?=$valor ?? '' ?>"/>
		
		<input type="submit" value="Salvar" />
	</form>
	<table class="table table-striped table-bordered m-2">
		<thead>
			<th>Mesa</th>
			<th>Valor</th>
			<th>Opções</th>
		</thead>
		<tbody>
			<?php 
			
			foreach($tabela as $i=>$e){  ?>
			<tr>
				<td onclick="carregar(<?=$i?>)" ><?=$e['mesa']?></td>
				
				<td onclick="carregar(<?=$i?>)"><?=$e['valor']?></td>
				
				<td>
					<button type="button" onclick="excluir(<?=$i?>)">
						x
					</button>
					<button onclick="alterar(<?=$i?>)">Alterar</button>
				</td>
			</tr>
			<?php } ?>
		</tbody>
	</table>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
<!-- // Selo Peixoto de segurança (que não vale de nada), projeto feito totalmente e unicamente para um projeto escolar qualquer erro grave nesse código deverá ser desconsiderado   -->

</html>