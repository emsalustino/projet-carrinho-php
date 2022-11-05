<?php
		$conexao=mysqli_connect("localhost","root","","loja");
        session_start();
        if(!isset($_SESSION['carrinho'])){
            $_SESSION['carrinho']=array();
        }
         // add produto
        if(isset($_GET['acao'])){
            // add carrinho
            if($_GET['acao'] == 'add'){
                $id = intval($_GET['id']);
                if(!isset($_SESSION['carrinho'][$id])){
                    $_SESSION['carrinho'][$id] = 1;
                }else{
                    $_SESSION['carrinho'][$id] += 1;
                }
            }
            // remover carrinho
            if($_GET['acao'] == 'del'){
                $id = intval($_GET['id']);
                if(isset($_SESSION['carrinho'][$id])){
                   unset($_SESSION['carrinho'][$id]);
                }
            }
            //alterar qtd
            if($_GET['acao'] == 'up'){
                if(is_array($_POST['prod'])){
                    foreach($_POST['prod'] as $id => $qtd){
                        $id = intval($id);
                        $qtd = intval($qtd);
                        if(!empty($qtd) || $qtd != 0){
                            $_SESSION['carrinho'][$id] = $qtd;
                        }else{
                            unset($_SESSION['carrinho'][$id]);
                        }
                    }
                   
                }
            }
        }

		
?>
<!DOCTYPE HTML>
<html lang="pt-br">
<head>
	<title>Carrinho</title>
	<meta http-equiv="context=text/httml;charset=UTF-8"/>
	<link rel="stylesheet" href="estilos.css">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
   
    
</head>
<style>
        
        #minhaDiv{
            background-color: black;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            padding: 80px;
            border-radius: 15px;
            color: #fff;
        }
</style>
<?php
#include("conexao.php");
date_default_timezone_set('America/Fortaleza');
?>


<body>
<div class="minhaDiv">
    <center><img src="logo.jpg" width="100%" height="180" align=center></center>
    <br><br>
    <!-- <center><h2> Carrinho Teste!!</h2></center> -->
	<center><table class="table-hover" border=0 align="center" cellpadding="8" cellspacing="0" width="708px">
        
        <!-- <caption>Carrinho de Compras</caption> -->
        <thead>
            <tr width="100px">
                <tr class="car"  >
                    <td bgcolor=#f14646 colspan="4"><center><font color=black  size="6px"><b>Carrinho de Compras</b></font><br></center></td>
                    <td bgcolor=#f14646 colspan="1"align="left">
						<img src="car.png" width="50" height="50">
					</td>
                </tr>

                <!-- <th class="conteudo" bgcolor=#747173 color=#f14646 width="220">Produto</th>            
                <th class="conteudo" bgcolor=#747173 width="50">Quantidade</th>
                <th class="conteudo" bgcolor=#747173 width="80">Preço</th>            
                <th class="conteudo" bgcolor=#747173 width="90">Subtotal</th>
                <th class="conteudo" bgcolor=#747173 width="84">Remover</th>            
                 -->
            </tr>
            
        </thead>
        <table border=1 align="center" cellpadding="8" cellspacing="0" width="708px">
            <tr>
                <th class="conteudo" bgcolor=#747173 width="220">Produto</th>            
                <th class="conteudo" bgcolor=#747173 width="50">Quantidade</th>
                <th class="conteudo" bgcolor=#747173 width="80">Preço</th>            
                <th class="conteudo" bgcolor=#747173 width="90">Subtotal</th>
                <th class="conteudo" bgcolor=#747173 width="84">Remover</th>            
                
            </tr>
        <form action="?acao=up" method="post">
            <tfoot>
                    <tr border=0>
                        <td align="center" colspan="5"><input type="submit" value="Atualizar pagina"/></td>
                    </tr>
                    <tr>
                    <!-- &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -->
                    <td align="center" border=0 colspan="2"><a href="index.php">Continuar Comprando</a></td>
                        <td align="center" border=0 colspan="3"><a href="cadastro.php">Finalizar Compra</a></td>
                        
                    </tr>
                   
                    
            </tfoot>

            <tbody>
                <?php
                    if(count($_SESSION['carrinho'])== 0){
                        echo "<tr><td colspan='5'>Não há produtos no carrinho!</td></tr>";
                    }else{
                        require("conexao.php");
                        $total = 0;
                        foreach($_SESSION['carrinho'] as $id => $qtd){
                            $resultado = mysqli_query($conexao,"select * from produto where id='$id'")
		                    or die("Erro ao realizar busca.".mysqli_error());
                            while($ln = mysqli_fetch_array($resultado)){
                                $nome = $ln['nome'];
                                $preco = number_format($ln['preco'],2,'.','.');
                                $sub = number_format($ln['preco'] * $qtd,2,'.','.');
                                $total += $sub;

                                echo '<tr><td align="center"><b> '.$nome.'</td><td><input type="text" size="15" 
                                name="prod['.$id.']" value="'.$qtd.'"></b></td><td><center>'.$preco.'</center></td>
                                <td><center>'.$sub.'</center></td><td><center><a href="?acao=del&id='.$id.'">Remover</a></center></td></tr>';
                                
                            }

                        }
                        $total = number_format($total,2,'.','.');
                        echo "<tr><td align=center colspan=4><b>TOTAL</b></td>
                        <td><center><b>R$ ".$total."</center></b></td></tr>";
                    }

                    
                ?>
                </table>
            </tbody>
            <tbody>
                <!-- <tr>
                        <td colspan="5">
                            <?php
                                require("conexao.php");
                                $total = 0;
                                //foreach($_SESSION['carrinho'] as $id => $qtd){
                                    $resultado = mysqli_query($conexao,"select * from produto where id='$id'")
                                    or die("Erro ao realizar busca.".mysqli_error());
                                    while($ln = mysqli_fetch_array($resultado)){
                                        $nome = $ln['nome'];
                                        $preco = number_format($ln['preco'],2,'.','.');
                                        $sub = number_format($ln['preco'] * $qtd,2,'.','.');
                                        echo '<tr><td>'.$nome.'</td><td><input type="text" size="10" 
                                            name="prod['.$id.']" value="'.$qtd.'"></td><td>'.$preco.'</td>
                                            <td>'.$sub.'</td><td><a href="?acao=del&id='.$id.'">Finalizar</a></td></tr>';
                                            //print "<script>location.href='cadastro.php'</script>";
                                    }
                               // }
                            ?>
                        </td>
                    </tr> -->
            </tbody>
        </form>
    </table></center>

    
</div>
</body>
  
</html>