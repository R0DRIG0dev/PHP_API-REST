<?php  

//headers:
header('access-control-allow-origin: *');
header('content-type: application/json');
header('access-control-allow-methods:POST');
header('access-control-allow-headers:access-control-allow-headers,content-type,access-control-allow-methods,authorization,x-requested-with');
//initialize our api
include_once('../core/initialize.php');
//instancie post
$ventas=new ventas($db);
//get raw posted data
$data=json_decode(file_get_contents("php://input"));

// die(var_dump($data));
$ventas->ventas_nroPedido							=$data->ventas_nroPedido;	
$ventas->ventas_cliente_nombre				=$data->ventas_cliente_nombre;
$ventas->ventas_moneda								=$data->ventas_moneda;
$ventas->ventas_importe								=$data->ventas_importe;
$ventas->ventas_marca									=$data->ventas_marca;
$ventas->ventas_fechatransaccion			=(isset($data->ventas_fechatransaccion))?$data->ventas_fechatransaccion:'default';
$ventas->ventas_fechaliquidacion			=(isset($data->ventas_fechaliquidacion))?$data->ventas_fechaliquidacion:'default';
$ventas->ventas_estado								=(isset($data->ventas_estado))?$data->ventas_estado:'default';
$ventas->ventas_codigo_comercio				=$data->ventas_codigo_comercio;
$ventas->ventas_idtransaccion_visanet	=$data->ventas_idtransaccion_visanet;
$ventas->ventas_cliente_email					=$data->ventas_cliente_email;
$ventas->ventas_codigo_accion					=$data->ventas_codigo_accion;
$ventas->ventas_motivo_denegacion			=$data->ventas_motivo_denegacion;
$ventas->ventas_fechaanulacion				=(isset($data->ventas_fechaanulacion))?$data->ventas_fechaanulacion:'default';
$ventas->ventas_nombre_comercio				=$data->ventas_nombre_comercio;
$ventas->ventas_cliente_documento			=$data->ventas_cliente_documento;
$ventas->ventas_cliente_tarjeta				=$data->ventas_cliente_tarjeta;
$ventas->ventas_codigo_autorizacion		=$data->ventas_codigo_autorizacion;
$ventas->ventas_codigo_eci						=$data->ventas_codigo_eci;
$ventas->ventas_canal									=$data->ventas_canal;	
if ($ventas->create()) {
	echo json_encode( array('message' => 'Post created')  );
}else{
	echo json_encode( array('message' => 'Post not created')  );
}

?>