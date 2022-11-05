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
    <h2 class="title"> Carrinho de Compras</h2>
	<div class="carrinho-container">
	<div class="produto">
	<center><table border=2>
        <caption>Carrinho de Compras</caption>
        <thead>
            <tr>
                <th width="244">Produto</th>            
                <th width="79">Quantidade</th>
                <th width="89">Preço</th>            
                <th width="100">Subtotal</th>
                           
                
            </tr>
        </thead>
		<tbody>
			<?php
				require("conexao.php");
				$resultado = mysqli_query($conexao,"select * from produto")
				or die(mysqli_error());

					while($ln = mysqli_fetch_array($resultado)){
						echo '<h2>'.$ln['nome'].'</h2><br/>';
						echo "<b>Preço: R$".number_format($ln['preco'],2,',','.')."<br></b>";
						echo '<img src="'.$ln['imagem'].'"/><br>';
						//echo '<a href="carrinho.php">Compre aqui</a>';
						echo '<a href="carrinho.php?acao=add&id='.$ln['id'].'">Comprar</a>';
						echo '<br><hr>';
					}
				
				
			?>
		</tbody>
	</table></center>
	</div>
	</div>


</body>
  
</html>