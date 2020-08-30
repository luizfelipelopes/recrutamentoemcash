# Aplicação de Recrutamento emCash

Esta aplicação se refere a prova de recrutamento da emCash.
A aplicação consiste em :

Uma API REST que contenha:

<ul>
  <li>Uma rota que permita cadastrar retângulos (recrutamentoemcash/retangulo);</li>
  <li>uma rota que permita cadastrar triângulos (recrutamentoemcash/triangulo);</li>
  <li>uma rota que retorne o valor da soma das áreas de todos os polígonos cadastrados (recrutamentoemcash/poligonos).</li>
</ul>

<h2>Paradigmas de Programação Utilizados:</h2>

<ul>
  <li>Singleton</li>
</ul>


<h2>Modo em que foi desenvolvido a API (index.php)</h2>

<pre>

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

	echo 'Teste API';
	
	// Teste de Execução da API via POST
	// $_POST = [
	// 	'type' => 'retangulo',
	// 	'base' => 3,
	// 	'height' => 3
	// ];

  $api = new Api();
</pre>


<h2>Arquivo de Configuração da Aplicação (config.php):</h2>

<pre>

/**
 * config: arquivo de configuração 
 * responsável pelas configuração da aplicação.
 * */

	/**
	 * Configuraçãoes de acesso ao banco de dados
	 * MySql
	 * */
	define('HOST', 'localhost');
	define('DB', 'emcash');
	define('USER', 'root');
	define('PASS', '');

</pre>

<h2>Configuração do .htaccess</h2>

<pre>
  RewriteEngine On
  RewriteCond %{SCRIPT_FILENAME} !-f
  RewriteCond %{SCRIPT_FILENAME} !-d
  RewriteRule ^(.*)$ index.php?url=$1
</pre>


