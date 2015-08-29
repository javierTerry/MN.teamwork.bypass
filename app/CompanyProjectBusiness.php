<?php 
require_once dirname(dirname(__FILE__)).'/vendor/autoload.php';
require_once (dirname(dirname(__FILE__)).'/conf/config.local.php');
/*
 * 
 */
 
use Masnegocio\teamwork\Recurso\CategoryProject;
use Monolog\Logger;
use Monolog\Handler\StreamHandler;

try{
	// create a log channel
	$log = new Logger(basename(__File__, ".php"));
	$log->pushHandler(new StreamHandler(dirname(dirname(__FILE__)).'/logs/your.log', Logger::DEBUG));
	
/*	$log->pushProcessor(function ($record) {
	    $record['extra']['dummy'] = 'Hello world!';
	
	    return $record;
	});
	
 * 
 */// add records to the log
	$log->info('Inicializando proceso ', array("linea " => __LINE__));

	
	$pdo = new \Slim\PDO\Database(DSN_, USR_, PASSWD_);
	$compania = new CategoryProject();
	$compania -> __set("apiKey", APIKEY_);

	$compania -> obtener();
	$response = $compania -> __get("response");
	
	if ( $response['status'] == 'exito' ){
		if (count($response["body"]) > 0){
			foreach ($response["body"] as $key => $obj) {
				$log->info(print_r($obj,true));	
				/*
				$insertStatement = $pdo->insert(array('id', 'name', 'industry', 'website', 'country', 'countrycode', 'cid',   'tagid','parent_type','parentid'))
			                   ->into('lkp_companies')
			                   ->values(array($obj -> id ,$obj -> name, $obj -> industry,$obj -> website , $obj -> country,$obj -> countrycode, $obj -> cid, 123, 'lkp_companies', $obj -> id ));
			
				$insertId = $insertStatement->execute();	
				 * 
				 */	
			}
		} else {
			$log -> info("No exite resultado");
		}
		
		$log->info("Proceso Completo");
	} else {
		$log -> error("Respuesta erronea");
		$log -> error($response['message']);
	}
			
} catch(\PDOException $e) {
	$log -> error($e->getMessage());
} catch(Exception $e) {
	$log -> error($e->getMessage());
}
$log->info("Proceso Finalizado");

?>