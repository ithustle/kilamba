<?php

class Login {
    
    private $User;
    private $Password;
	private $Nome;
   
    public function getUser() {
        return $this->User;
    }

    public function setUser($User) {
        $this->User = $User;
    }

    public function getPassword() {
        return $this->Password;
    }

    public function setPassword($Password) {
        $this->Password = $Password;
    }
	
	public function getNome() {
        return $this->Nome;
    }

    public function setNome($Nome) {
        $this->Nome = $Nome;
    }

    public function loginAcesso($idLogin, $Pass){
        
        $this->conexao = new Conexao();
        $sqlIDLogin = "SELECT Usuario FROM loginadmin WHERE Usuario = {$idLogin}";
        $loginA = $this->conexao->query($sqlIDLogin);

        if ($loginA == TRUE){
            $sqlPass = "SELECT * FROM loginadmin WHERE Usuario = {$idLogin} AND senha = '{$Pass}'";
            $loginPasse = $this->conexao->query($sqlPass);
            $resultado = $loginPasse->fetch(PDO::FETCH_OBJ);
            if ($resultado == TRUE){
                header("Location: painel.php");
            } else {
                header("Location: admin/?login=fail");
            }
        } else {
			header("Location: admin/?login=fail");
		}
    }
    
    public function registarUtilizador(){
        
        $this->conexao = new Conexao();
        $sql = "INSERT INTO loginadmin (Nome, Usuario, senha) VALUES (:Nome, :usuario, :senha)";
        $inserir = $this->conexao->prepare($sql);
        $inserir->bindValue(":usuario", $this->getId());
        $inserir->bindValue(":senha", $this->getEmail());
		$inserir->bindValue(":Nome", $this->getNome());
        $inserir->execute();
    }
}

?>
