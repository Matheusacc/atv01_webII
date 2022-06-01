<?php

	function write_to_console($data) {

	$console = 'console.log(' . json_encode($data) . ');';
	$console = sprintf('<script>%s</script>', $console);
	echo $console;
	}

	function select() {

		$cursos = array();
		$fp = fopen('cursos.txt', 'r');

        if($fp) {
            while(!feof($fp)) {
				$arr = array();
                $cpf = fgets($fp);
				$dados = fgets($fp);
				if(!empty($dados)) {
					$arr = explode("#", $dados);
					$cursos[$cpf] = $arr;
				}
			}
			fclose($fp);
		}

		return $cursos;
	}

	function select_where($cpf) {

		$cursos = select();

		foreach ($cursos as $chave => $dados) {
			// echo "$cpf=$chave<br>";
			if(strcmp($cpf, trim($chave)) == 0) { 
				return $dados;
			}
		}

		return null;	
	}

	function insert($curso) {

		$fp = fopen('cursos.txt', 'a+');

		if ($fp) {
			foreach($curso as $cpf => $dados) {
				
				
				if(!empty($dados)) {
					fputs($fp, $dados['cpf']);
					fputs($fp, "\n");
					$linha=$dados['nome']."#".$dados['endereço']."#".$dados['telefone'];
					fputs($fp, $linha);
					fputs($fp, "\n");
				}
			}
			fclose($fp);
			echo "<script> alert('[OK] Cadastrado com Sucesso!') </script>";
		}
	}

	function update($new, $cpf) {

		$cursos = select();

		$fp = fopen('bkp.txt', 'a+');

		if ($fp) {

			foreach($cursos as $chave => $dados) {
				if(!empty($dados)) {
					fputs($fp, $chave);
					write_to_console($chave);
					if($cpf == trim($chave)){
						foreach($new as $new_cpf => $new_dados) {
							if(!empty($new_dados)) {
								$linha=$new_dados['nome']."#".$new_dados['endereço']."#".$new_dados['telefone']."\n";
								write_to_console($linha);
							}
						}
					}
					else 
						$linha=$dados[0]."#".$dados[1]."#".$dados[2]."#".$dados[3];
					fputs($fp, $linha);
				}
			}
			fclose($fp);
			echo "<script> alert('[OK] Alterado com Sucesso!') </script>";

			unlink("cursos.txt");
			rename("bkp.txt", "cursos.txt");
		}
	}

	function delete($cpf) {

		$cursos = select();

		$fp = fopen('bkp.txt', 'a+');

		if ($fp) {

			foreach($cursos as $chave => $dados) {
				if(!empty($dados)) {
					fputs($fp, $chave);
					$linha="";
				}
			}
			fclose($fp);
			echo "<script> alert('[OK] Alterado com Sucesso!') </script>";

			unlink("cursos.txt");
			rename("bkp.txt", "cursos.txt");
		}


	}

?>
