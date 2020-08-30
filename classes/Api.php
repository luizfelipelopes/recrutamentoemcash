<?php

namespace classes;

/**
 * Api: responsável por realizar as rotas de cadastro
 * de triângulos, retângulos e retorno da soma das
 * áreas do polígonos cadastrados.
 **/
class Api
	{

		private $dados;

		/**
		 * Inicializa a classe Polígonos
		 * e verifica qual resource está sendo 
		 * executado (GET, POST)
		 * */
		public function __construct()
		{
			$this->dados = new Poligonos();

			// rota: api/poligonos
			if(isset($_GET['url']) && $_GET['url'] == 'poligonos'){
				$this->poligonos();
			}

			// rota: api/triangulo
			if(isset($_POST['type']) &&  $_POST['type'] == 'triangulo'){
				$this->triangulo();
			}

			// rota: api/retangulo
			if(isset($_POST['type']) && $_POST['type'] == 'retangulo'){
				$this->retangulo();
			}

		}

		/**
		 * triangulo(): retorna o cadastro da área do triângulo
		 * via POST
		 * rota: api/triangulo
		 * */
		public function triangulo()
		{
			$type = $_POST['type'];
			$base = $_POST['base'];
			$height = $_POST['height'];

			try {
				$retorno = $this->dados->createPoligono($type, $base, $height);
				echo json_encode(array('status' => 'Ok', 'message' => 'triangulo cadastrado com sucesso!'));	
			} catch (Exception $e) {
				echo json_encode(array('status' => 'Erro', 'message' => 'Erro ao cadastrar triangulo'));
			}

		}


		/**
		 * retangulo(): retorna o cadastro da área do retângulo
		 * rota: api/retangulo
		 * via POST
		 * */
		public function retangulo()
		{
			$type = $_POST['type'];
			$base = $_POST['base'];
			$height = $_POST['height'];

			try {
				$retorno = $this->dados->createPoligono($type, $base, $height);
				echo json_encode(array('status' => 'Ok', 'message' => 'Retangulo cadastrado com sucesso!'));	
			} catch (Exception $e) {
				echo json_encode(array('status' => 'Erro', 'message' => 'Erro ao cadastrar retêngulo'));
			}
		}


		/**
		 * poligonos(): retorna a soma das áreas dos polígonos
		 * cadastrados
		 * rota: api/poligonos
		 * via GET
		 * */
		public function poligonos()
		{

			try {
				$retorno = $this->dados->totalAreaPoligonos();
				echo json_encode(array('status' => 'Ok', 'message' => 'Área total dos polígonos: ' . $retorno));	
			} catch (Exception $e) {
				echo json_encode(array('status' => 'Erro', 'message' => 'Erro ao retornar área total de polígonos'));
			}
			
		}

	}	


?>