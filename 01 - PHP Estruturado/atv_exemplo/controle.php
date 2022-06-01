<?php

	include_once ("modelo.php");

	function rotas($url) {

		$dados = explode("/", $url);

		// CADASTRAR
		if(strcmp($dados[0], "cadastrar") == 0) {
			echo "<script> window.location='viewCadastrar.php' </script>";
		}
		// ALTERAR
		else if(strcmp($dados[0], "alterar") == 0) {
			// Obtem dados do curso escolhido para alteração
			$curso = select_where(trim($dados[1]));

			if($curso == null) {
				echo "<script> alert('Código do curso NÃO ENCONTRADO!') </script>";
			}
			else {		

				$url = "viewAlterar.php?cpf=".trim($dados[1])."&nome=".$curso[0]."&endereço=".$curso[1]."&telefone=".trim($curso[2]);
				echo "<script> window.location='".$url."' </script>";
			}
		}
		// REMOVER
		else if(strcmp($dados[0], "remover") == 0){
			echo "<script> window.location='viewRemover.php?cpf=".$dados[1]."' </script>";
		}
	}

	function cadastrar() {

		// Monta o array
		$dados = array(
			$_POST['cpf'] => array(
				"cpf" => $_POST['cpf'],
				"nome" => $_POST['nome'],
				"endereço" => $_POST['endereço'],
				"telefone" => $_POST['telefone'],
			)
		);

		insert($dados);
		echo "<script> window.location='viewMain.php' </script>";
	}

	function alterar() {
		write_to_console($alterar);
		// Monta o array
		$dados = array(
			$_POST['cpf'] => array(
				"cpf" => $_POST['cpf'],
				"nome" => $_POST['nome'],
				"endereço" => $_POST['endereço'],
				"telefone" => $_POST['telefone']
			)
		);


		update($dados, $_POST['cpf']);
		echo "<script> window.location='viewMain.php' </script>";
	}

	function remover(){
		delete($_POST['cpf']);
		echo "<script> window.location='viewMain.php' </script>";

	}





	function loadCursos() {

		$cursos = select();

		foreach ($cursos as $cpf => $dados) {

			if(!empty($dados)) {
				echo "<tr>";
					echo "<td class='d-none d-md-table-cell'>".$cpf."</td>";

					$cont = 0;
					foreach ($dados as $valor) {
						if($cont == 0)
							echo "<td>".$valor."</td>";
						else 
							echo "<td class='d-none d-md-table-cell'>".$valor."</td>";
						
						$cont++;
					}

					echo "<td>";
						echo "<button type='submit' name='acao' value='alterar/".$cpf."' style='border-radius: 5px; padding: 6px 8px;' class=''>";
							echo "<img height='20px' src='./icon/pencil-svgrepo-com.svg'/>";
							
						echo "</button>";
						echo "&nbsp";
						echo "<button type='submit' name='acao' value='remover/".$cpf."' style='border-radius: 5px; padding: 6px 8px; color: black;' class=''>";
							echo "<span style='font-weight: bold'>X</span>";
						echo "</button>";
					echo "</td>";
				echo "</tr>";
			}
		}
	}
?>
