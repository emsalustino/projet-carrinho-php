<?php $conexao=mysqli_connect("localhost","root","","loja");
        session_start();
		$_SESSION['carrinho']=array();
?>
<!DOCTYPE HTML>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<title>Formulário Clientes </title>
	<link rel="stylesheet" href="estilos.css">
</head>

<body>
<blockquote>
		<center><img src="logo.jpg" width="100%" height="180" align=center></center>
		<br>
		<?php
			if(isset($_POST['button'])){
				$nome = $_POST['nome'];
				$cpf = $_POST['cpf'];
				$rg = $_POST['rg'];
				$cid = $_POST['cid'];
				$end = $_POST['end'];

				if($nome == ''){
					echo "<center><font color=#f14646  size='5'><b>Por favor, digite o Nome!</b></font></center>";
				}
				else if($cpf == ''){
					echo "<center><font color=#f14646  size='5'><b> Por favor, digite o CPF!</b></font></center>";
				}
				else if($rg == ''){
					echo "<center><font color=#f14646  size='5'><b>Por favor, digite o RG! </b></font></center>";
				}
				else if($cid == ''){
					echo "<center><font color=#f14646  size='5'><b>Por favor, digite o Cidade! </b></font></center>";
				}
				else if($end == ''){
					echo "<center><font color=#f14646  size='5'><b> Por favor, digite o Endereço! </b></font></center>";
				}
				else{ 
					print "<script>alert('Compra realizada com sucesso!!')</script>";
					print "<script>location.href='index.php'</script>";
					//echo "<script>Compra realizada com sucesso!!</script>";
				}
        	}


      ?>
		
	<br/>
	<center><h2>Formulário das Compras do Cliente</h2></center>
	<div class="cadast">
	
	<form action=" " method="post">
	<fieldset align=center>
		<!-- <legend><b>Dados dos Clientes</b></legend> -->
		<table cellspacing="2" cellpadding="5" align=center>
		
			<tr id="tab">
			
					<td align="left">
						<b><label for="nome">Nome: </label></b>
						
					</td>
					<td align="left">
						<input type="text" name="nome" placeholder="Nome">
					</td>
			</tr>
				
			<tr id="tab">
					<td align="left">
						<b><label for="cpf">CPF: </label></b>
					</td>
					<td align="left">
						<input type="text" name="cpf" placeholder="CPF">
					</td>
			</tr>
		
			<tr id="tab">
					<td align="left">
						<b><label for="rg">RG:</label></b>
					</td>
					<td align="left">
						<input type="text" name="rg" placeholder="RG">
					</td>
			</tr>
					
			<tr id="tab">
					<td align="left">
						<b><label for="tel">Telefone: </label></b>
					</td>
					<td align="left">
						<input type="tel" placeholder="(XX)XXXX-XXXX" pattern="^\(?\d{2}\)\d{4}[-\s]\d{4}.*?$">
					</td>
			</tr>

			<tr id="tab">
				<td align="left">
					<b><p>Selecione o Estado:</p></b>
				</td>
				<td align="left">
					<select>
						<br/>
						<optgroup label="SUL">
							<option value="Parana">Paraná</option>
							<option value="Santa Catarina">Santa Catarina</option>
							<option value="Rio Grande do Sul">Rio Grande do Sul</option>
						</optgroup>
						
						<optgroup label="SUDESTE">
							<option value="Sao Paulo">São Paulo</option>
							<option value="Rio de Janeiro">Rio de Janeiro</option>
							<option value="Espírito Santo">Espírito Santo</option>
							<option value="Minas Gerais">Minas Gerais</option>
						</optgroup>
						
						<optgroup label="CENTRO-OESTE">
							<option value="Mato Grosso">Mato Grosso</option>
							<option value="Mato Grosso do Sul">Mato Grosso do Sul</option>
							<option value="Goiás">Goiás</option>
						</optgroup>
						
						<optgroup label="NORDESTE">
							<option value="Maranhão">Maranhão</option>
							<option value="Piauí">Piauí</option>
							<option value="Ceará ">Ceará </option>
							<option value="Rio Grande do Norte">Rio Grande do Norte</option>
							<option value="Pernambuco">Pernambuco</option>
							<option value="Paraíba ">Paraíba </option>
							<option value="Sergipe">Sergipe</option>
							<option value="Alagoas">Alagoas</option>
							<option value="Bahia">Bahia</option>
						</optgroup>
						
						<optgroup label="NORTE">
							<option value="Amazonas">Amazonas</option>
							<option value="Roraima">Roraima</option>
							<option value="Amapá">Amapá</option>
							<option value="Pará">Pará</option>
							<option value="Tocantins ">Tocantins</option>
							<option value="Rondônia">Rondônia</option>
							<option value="Acre">Acre</option>
						</optgroup>
						
					</select>
					
				</td>
			</tr>
			<tr id="tab">
				<td align="left">
						<b><label for="cid">Cidade:</label></b>
				</td>
				<td align="left">
						<input type="text" name="cid" placeholder="Cidade">
				</td>
			</tr>
			<tr>
					<td align="left">
						<b><label for="end">Endereço:</label></b>
					</td>
					<td align="left">
						<input type="text" name="end" placeholder="Endereço">
					</td>
						
					
			</tr>
			<tr id="tab">
					<td align="left">
						<b><label for="sx">Sexo:</label></b>
					</td>
					<td align="left">
						<input type=  "radio"  name="sx" value = "Feminino" checked>Feminino
						<input type=  "radio"  name="sx" value = "Masculino">Masculino
						<input type=  "radio"  name="sx" value = "Outro">Outro
					</td>
					
			</tr>
		
			<tr id="tab">
					<td align="left">
						<b><label for="civil">Estado Civil:</label></b>
					</td>
					<td align="left">
						<input type=  "radio"  name="civil" value = "casado" checked>Casado
						<input type=  "radio"  name="civil" value = "solteiro">Solteiro
						<input type=  "radio"  name="civil" value = "viúvo">Viúvo
					</td>
			</tr>

			<tr id="tab">
					<td align="left">
						<b><label for="pag">Forma de Pagamento:</label></b>
					</td>
					<td align="left">
						<input type=  "radio"  name="pag" value = "Cartao" checked>Cartão
						<input type=  "radio"  name="pag" value = "Boleto">Boleto
						<input type=  "radio"  name="pag" value = "Pix">Pix
					</td>
			</tr>
		
			
			<tr id="tab">
				<td colspan=2 align="center">
					<br/>
					<input type="submit" name ="button"  value="Finalizar" face="Aria Black">
					<!-- <label><input type="submit" size="50"></label> -->
					<?php unset($_SESSION['carrinho']);?>
				</td>
			</tr>
			
		</table>
		
	</fieldset>	
		
	</form>
		</div>
</blockquote>
	
</body>
  
</html>