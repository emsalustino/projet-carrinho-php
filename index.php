<!DOCTYPE HTML>
<html lang="pt-br">
<head>
	<title>Projeto Carrinho</title>
	<meta http-equiv="context=text/httml;charset=UTF-8"/>
	<link rel="stylesheet" href="estilos.css">
</head>
<?php
#include("conexao.php");
date_default_timezone_set('America/Fortaleza');
?>
<body>
    <!-- <h2 class="title"> Carrinho de Compras</h2> -->
	
		<center><img src="logo.jpg" width="100%" height="180" align=center></center>
	<br>
	<div class="carrinho-container">
	<div class="produto">
	<table class="tab" border=0 align="center" cellpadding="30" cellspacing="2">
        <!-- <caption>Carrinho de Compras</caption> -->
        <thead>
            <tr >
				<td colspan="4" ><font color=#f14646  size="15"><b>Tênis em Liquidação</b></font><br><br></td>
                <!-- <th width="150px"></th>            
                <th width="150">Preço</th>
                <th width="250">Preço</th>            
                <th width="200">Subtotal</th> -->
                            
                
            </tr>
        </thead>
		<tbody text-align="center">
			<?php
				require("conexao.php");
				$resultado = mysqli_query($conexao,"select * from produto")
				or die(mysqli_error());

					while($ln = mysqli_fetch_array($resultado)){
						echo '<tr><td><b>'.$ln['nome'].'</b></td>';
						echo "<td><b>Preço: <br> R$".number_format($ln['preco'],2,',','.')."</b></td>";
						echo '<td><img src="'.$ln['imagem'].'"/></td>';
						//echo '<a href="carrinho.php">Compre aqui</a>';
						echo '<td><a href="carrinho.php?acao=add&id='.$ln['id'].'">Comprar</a></td></tr>';
						//echo '<br><hr>';
					}
				
				
			?>
		</tbody>
	</table>
	</div>
	</div>


</body>
  
</html>