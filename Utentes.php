<?php

	class Utentes {
		
		private $nome;
		private $morada;
		private $bi;
		private $nc;
		private $anexoBI;
		private $anexoCC;
		private $anexoDS;
		private $anexoURS;
		private $anexoINSS;
		
		public function getNome() {
			return $this->nome;
		}

		public function setNome($nome) {
			$this->nome = $nome;
		}
		
		public function getMorada() {
			return $this->morada;
		}

		public function setMorada($morada) {
			$this->morada = $morada;
		}
		
		public function getBI() {
			return $this->bi;
		}

		public function setBI($bi) {
		
			$this->bi = $bi;
		}
		
		public function getNC() {
			return $this->nc;
		}

		public function setNC($nc) {
			$this->nc = $nc;
		}
		
		public function getAnexoBI() {
			return $this->anexoBI;
		}

		public function setAnexoBI($anexoBI) {
			$this->anexoBI = $anexoBI;
		}
		
		public function getAnexoCC() {
			return $this->anexoCC;
		}

		public function setAnexoCC($anexoCC) {
			$this->anexoCC = $anexoCC;
		}
		
		public function getAnexoDS() {
			return $this->anexoDS;
		}

		public function setAnexoDS($anexoDS) {
			$this->anexoDS = $anexoDS;
		}
		
		public function getAnexoURS() {
			return $this->anexoURS;
		}

		public function setAnexoURS($anexoURS) {
			$this->anexoURS = $anexoURS;
		}
	
		public function getAnexoINSS() {
			return $this->anexoINSS;
		}

		public function setAnexoINSS($anexoINSS) {
			$this->anexoINSS = $anexoINSS;
		}
	
		public function inscreverUtente(){
			
			$this->cnn = new Conexao();
			$sql = "INSERT INTO Utentes (Nome, morada, bi, Ncontribuinte, anexoBI, anexoCC, AnexoDV, anexoURV, anexoINSS) 
                            VALUES (:nome, :morada, :bi, :contribuinte, :anexoBI, :anexoCC; :anexoDV, :anexoURV, :anexoINSS)";
			$query = $this->cnn->prepare($sql);

			$query->bindValue(':nome', $this->getNome());
			$query->bindValue(':morada', $this->getMorada());
			$query->bindValue(':bi', $this->getBI());
			$query->bindValue(':contribuinte', $this->getNC());
			$query->bindValue(':anexoBI', $this->getAnexoBI());
			$query->bindValue(':anexoCC', $this->getAnexoCC());
			$query->bindValue(':anexoDV', $this->getAnexoDS());
			$query->bindValue(':anexoURV', $this->getAnexoURS());
			$query->bindValue(':anexoINSS', $this->getAnexoINSS());
			$query->execute();
		
		}
	}
?>