<?php
	require 'Utentes.php';
	require 'Conexao.php';
	
	$utentes = new Utentes();
	
	//Criar pasta do Utente
	if (isset($_POST['nome']) && isset($_POST['bi'])){
		$pasta = $_POST['nome']."_".$_POST['bi'];
	}
	
	mkdir("documentos/$pasta/");
	
	// ANEXAR ARQUIVOS
	
	// DEFINIÇÕES
	// Numero de campos de upload
	$numeroCampos = 5;
	// Tamanho máximo do arquivo (em bytes)
	$tamanhoMaximo = 10000000000;
	// Extensões aceitas
	$extensoes = array(".doc", ".txt", ".pdf", ".docx");
	// Caminho para onde o arquivo será enviado
	$caminho = "documentos/".$pasta."/";
	// Substituir arquivo já existente (true = sim; false = nao)
	$substituir = false;
	 
	for ($i = 0; $i < $numeroCampos; $i++) {
	 
		// Informações do arquivo enviado
		if (isset($_FILES["arquivo"])){
			$nomeArquivo = $_FILES["arquivo"]["name"][$i];
			$tamanhoArquivo = $_FILES["arquivo"]["size"][$i];
			$nomeTemporario = $_FILES["arquivo"]["tmp_name"][$i];
		}
	 
		// Verifica se o arquivo foi colocado no campo
		if (!empty($nomeArquivo)) {
	 
			$erro = false;
	 
			// Verifica se o tamanho do arquivo é maior que o permitido
			if ($tamanhoArquivo > $tamanhoMaximo) {
				$erro = "O arquivo " . $nomeArquivo . " não deve ultrapassar " . $tamanhoMaximo. " bytes";
			} 
			// Verifica se a extensão está entre as aceitas
			elseif (!in_array(strrchr($nomeArquivo, "."), $extensoes)) {
				$erro = "A extensão do arquivo <b>" . $nomeArquivo . "</b> não é válida";
                                echo '<script>alert ("Extensão de ficheiros inválidos!"); window.location = "index.html"; </script>';
			} 
			// Verifica se o arquivo existe e se é para substituir
			elseif (file_exists($caminho . $nomeArquivo) and !$substituir) {
				$erro = "O arquivo <b>" . $nomeArquivo . "</b> já existe";
                                echo '<script>alert ("Os ficheiros já existem!"); window.location = "index.html"; </script>';
                                
			}
	 
			// Se não houver erro
			if (!$erro) {
				// Move o arquivo para o caminho definido
				move_uploaded_file($nomeTemporario, ($caminho . $nomeArquivo));
				// Mensagem de sucesso
				echo "O arquivo <b>".$nomeArquivo."</b> foi enviado com sucesso. <br />";
                                $utentes->setNome($_POST['nome']);
                                $utentes->setMorada($_POST['morada']);
                                $utentes->setBI($_POST['bi']);
                                $utentes->setNC($_POST['ncontr']);
                                $utentes->setAnexoBI($_FILES["arquivo"]["name"][0]);
                                $utentes->setAnexoCC($_FILES["arquivo"]["name"][1]);
                                $utentes->setAnexoDS($_FILES["arquivo"]["name"][2]);
                                $utentes->setAnexoURS($_FILES["arquivo"]["name"][3]);
                                $utentes->setAnexoINSS($_FILES["arquivo"]["name"][4]);


                                $utentes->inscreverUtente();

                                echo '<script>window.location = "imprimirRecibo.html"; </script>';
			} 
			// Se houver erro
			else {
                            // Mensagem de erro
                            echo $erro . "<br />";
			}
		}
			
	}
	
?>