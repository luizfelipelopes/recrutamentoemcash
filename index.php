	<?php 

	/**
	 * Arquivo index resposável por chamar a API 
	 */
	
	require_once __DIR__ . '/config.php';
	require_once __DIR__ . '/classes/Connect.php';
	require_once __DIR__ . '/classes/Poligonos.php';
	require_once __DIR__ . '/classes/Api.php';

	use classes\Connect;
	use classes\Poligonos;
	use classes\Api;

	echo '<h1>Teste API</h1>';
	
	// Teste de Execução da API via POST
	// $_POST = [
	// 	'type' => 'retangulo',
	// 	'base' => 3,
	// 	'height' => 3
	// ];
	
	$api = new Api();

?>