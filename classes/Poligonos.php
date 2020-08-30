<?php 

use classes\Connect;
namespace classes;

/**
 * Polígonos: Classe responsável por realizar as operações 
 * de cadastro das áreas do triângulo, retângulo 
 * e retorno da soma das áreas dos polígonos 
 * cadastrados.
 * */
class Poligonos
{

	private $db;

	/**
	 * Recupera a conexão da aplicação
	 * */
	public function __construct()
	{
		$this->db = Connect::getConnect();
	}


	/**
	 * totalAreaPoligonos(): retorna a soma total
	 * da área dos polígonos cadastrados.
	 * */
	public function totalAreaPoligonos()
	{
		$areatotal = 0;	

		$data = $this->db->prepare("SELECT area FROM poligonos ORDER BY id");
		
		if(!$data->execute()){
			throw new Exception("Erro ao buscar dados", 1);
		}

		while($areas = $data->fetch(\PDO::FETCH_ASSOC)){
			$areatotal += $areas['area'];
		}

		return $areatotal;
	}


	/**
	 * createPoligono(): cadastra a área do polígono (triângulo/retângulo) 
	 * de acordo com as informações de tipo e dimensões
	 * informadas.
	 * */
	public function createPoligono(string $type, float $base, float $height)
	{
		$area = $this->calcArea($type, $base, $height);

		$data = $this->db->prepare("INSERT INTO poligonos (type, base, height, area) 
			values ('".$type."', " .$base. ", " . $height. ", ".$area.")");
	
		if(!$data->execute()){
			throw new Exception("Erro ao cadastrar polígonos", 1);
		}

		return true;
	}


	/**
	 * calcArea(): retorna o cálculo da área de acordo com
	 * o tipo de polígono informado via parâmetro.
	 * */
	private function calcArea(string $type, float $base, float $height)
	{
		$area = 0;

		switch ($type) {
			case 'triangulo':
				$area = ($base * $height) / 2;
				break;
			case 'retangulo':
				$area = $base * $height;
			break;	
			
			default:
				$area = null;
				break;
		}

		return $area;
	}

}

?>