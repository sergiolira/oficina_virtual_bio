<?php
session_start();
include_once("../../model_class/representante.php");
include_once("../../model_class/trama_registro_ventas.php");
include_once("../../model_class/cabecera_registro_venta.php");
include_once("../../model_class/detalle_registro_venta.php");
include_once("../../model_class/cabecera_comisiones_venta.php");
include_once("../../model_class/detalle_comisiones_venta.php");
$obj_rep=new representante();
$obj_trama=new trama_registro_ventas();
$obj_cabecera=new cabecera_registro_venta();
$obj_detalle=new detalle_registro_venta();
$obj_cabecera_comisiones=new cabecera_comisiones_venta();
$obj_detalle_comisiones=new detalle_comisiones_venta();


$html="";
$obj_cabecera_comisiones->anio=$_REQUEST["slt_anio"];
$obj_cabecera_comisiones->mes=$_REQUEST["slt_mes"];
$obj_cabecera_comisiones->semana_detalle=$_REQUEST["slt_semana"];
$obj_trama->anio_detalle=$_REQUEST["slt_anio"];
$obj_trama->mes_detalle=$_REQUEST["slt_mes"];
$obj_trama->semana_detalle=$_REQUEST["slt_semana"];

$rs_v_c=$obj_cabecera_comisiones->validate_comisiones();

if($rs_v_c>0){
    $comision_nivel_1=0.25;$comision_nivel_2=0.1;$comision_nivel_3=0.03;$comision_nivel_4=0.02;$comision_nivel_5=0.01;
    $rs_cab_com=$obj_cabecera_comisiones->read_x_anio_mes_semana();
    while($fila_cab_com=mysqli_fetch_assoc($rs_cab_com))
    {
        $id_cabecera_comision=$fila_cab_com["id_cabacera_comisiones_venta"];
        //TODO:Lista de representantes nivel 1
        $rs_rep_nivel_1=$obj_rep->listar_representantes_sponsor($fila_cab_com["nro_documento"]);
        while($fila_rep_nivel_1=mysqli_fetch_assoc($rs_rep_nivel_1))
        {
            $obj_trama->nro_documento=$fila_rep_nivel_1["nro_documento"];
            //TODO: Consulta de ventas por representante nivel 1
            $rs_ventas_nivel_1=$obj_trama->consultar_ventas_x_nro_documento_anio_mes_semana();
            while($fila_ventas_nivel_1=mysqli_fetch_assoc($rs_ventas_nivel_1))
            {                        
                /*Insertamos datos en el detalle oncosalud recaudos*/
                $obj_detalle_comisiones->id_cabacera_comisiones_venta=$id_cabecera_comision;
                $obj_detalle_comisiones->nro_documento=$fila_ventas_nivel_1["nro_documento"];
                $obj_detalle_comisiones->patrocinador=$fila_ventas_nivel_1["patrocinador"];
                $obj_detalle_comisiones->patrocinador_directo=$fila_ventas_nivel_1["patrocinador_directo"];
                $obj_detalle_comisiones->nivel="1";
                $obj_detalle_comisiones->id_tipo_venta=$fila_ventas_nivel_1["id_tipo_venta"];
                $obj_detalle_comisiones->id_paquete=$fila_ventas_nivel_1["id_paquete"];
                $obj_detalle_comisiones->id_producto=$fila_ventas_nivel_1["id_producto"];
                $obj_detalle_comisiones->precio_unitario=$fila_ventas_nivel_1["precio_unitario"];
                $obj_detalle_comisiones->cantidad=$fila_ventas_nivel_1["cantidad"];
                $obj_detalle_comisiones->sub_total=$fila_ventas_nivel_1["total_sin_costo_envio"];
                $obj_detalle_comisiones->comision=$comision_nivel_1;
                $obj_detalle_comisiones->comision_subtotal=number_format(($fila_ventas_nivel_1["total_sin_costo_envio"]*$comision_nivel_1),2,'.','');
                $obj_detalle_comisiones->id_usuarioregistro=$_SESSION["id_usuario"];
                $obj_detalle_comisiones->id_usuarioactualiza=$_SESSION["id_usuario"];
                $obj_detalle_comisiones->create();                     
            }

            //TODO:Lista de representantes nivel 2
            $rs_rep_nivel_2=$obj_rep->listar_representantes_sponsor($fila_rep_nivel_1["nro_documento"]);
            while($fila_rep_nivel_2=mysqli_fetch_assoc($rs_rep_nivel_2))
            {
                $obj_trama->nro_documento=$fila_rep_nivel_2["nro_documento"];
                //TODO: Consulta de ventas por representante nivel 2
                $rs_ventas_nivel_2=$obj_trama->consultar_ventas_x_nro_documento_anio_mes_semana();
                while($fila_ventas_nivel_2=mysqli_fetch_assoc($rs_ventas_nivel_2))
                {                        
                    /*Insertamos datos en el detalle oncosalud recaudos*/
                    $obj_detalle_comisiones->id_cabacera_comisiones_venta=$id_cabecera_comision;
                    $obj_detalle_comisiones->nro_documento=$fila_ventas_nivel_2["nro_documento"];
                    $obj_detalle_comisiones->patrocinador=$fila_ventas_nivel_2["patrocinador"];
                    $obj_detalle_comisiones->patrocinador_directo=$fila_ventas_nivel_2["patrocinador_directo"];
                    $obj_detalle_comisiones->nivel="2";
                    $obj_detalle_comisiones->id_tipo_venta=$fila_ventas_nivel_2["id_tipo_venta"];
                    $obj_detalle_comisiones->id_paquete=$fila_ventas_nivel_2["id_paquete"];
                    $obj_detalle_comisiones->id_producto=$fila_ventas_nivel_2["id_producto"];
                    $obj_detalle_comisiones->precio_unitario=$fila_ventas_nivel_2["precio_unitario"];
                    $obj_detalle_comisiones->cantidad=$fila_ventas_nivel_2["cantidad"];
                    $obj_detalle_comisiones->sub_total=$fila_ventas_nivel_2["total_sin_costo_envio"];
                    $obj_detalle_comisiones->comision=$comision_nivel_2;
                    $obj_detalle_comisiones->comision_subtotal=number_format(($fila_ventas_nivel_2["total_sin_costo_envio"]*$comision_nivel_2),2,'.','');
                    $obj_detalle_comisiones->id_usuarioregistro=$_SESSION["id_usuario"];
                    $obj_detalle_comisiones->id_usuarioactualiza=$_SESSION["id_usuario"];
                    $obj_detalle_comisiones->create();                     
                }
                //TODO:Lista de representantes nivel 3
                $rs_rep_nivel_3=$obj_rep->listar_representantes_sponsor($fila_rep_nivel_2["nro_documento"]);
                while($fila_rep_nivel_3=mysqli_fetch_assoc($rs_rep_nivel_3))
                {
                    $obj_trama->nro_documento=$fila_rep_nivel_3["nro_documento"];
                    //TODO: Consulta de ventas por representante nivel 3
                    $rs_ventas_nivel_3=$obj_trama->consultar_ventas_x_nro_documento_anio_mes_semana();
                    while($fila_ventas_nivel_3=mysqli_fetch_assoc($rs_ventas_nivel_3))
                    {                        
                        /*Insertamos datos en el detalle oncosalud recaudos*/
                        $obj_detalle_comisiones->id_cabacera_comisiones_venta=$id_cabecera_comision;
                        $obj_detalle_comisiones->nro_documento=$fila_ventas_nivel_3["nro_documento"];
                        $obj_detalle_comisiones->patrocinador=$fila_ventas_nivel_3["patrocinador"];
                        $obj_detalle_comisiones->patrocinador_directo=$fila_ventas_nivel_3["patrocinador_directo"];
                        $obj_detalle_comisiones->nivel="3";
                        $obj_detalle_comisiones->id_tipo_venta=$fila_ventas_nivel_3["id_tipo_venta"];
                        $obj_detalle_comisiones->id_paquete=$fila_ventas_nivel_3["id_paquete"];
                        $obj_detalle_comisiones->id_producto=$fila_ventas_nivel_3["id_producto"];
                        $obj_detalle_comisiones->precio_unitario=$fila_ventas_nivel_3["precio_unitario"];
                        $obj_detalle_comisiones->cantidad=$fila_ventas_nivel_3["cantidad"];
                        $obj_detalle_comisiones->sub_total=$fila_ventas_nivel_3["total_sin_costo_envio"];
                        $obj_detalle_comisiones->comision=$comision_nivel_3;
                        $obj_detalle_comisiones->comision_subtotal=number_format(($fila_ventas_nivel_3["total_sin_costo_envio"]*$comision_nivel_3),2,'.','');
                        $obj_detalle_comisiones->id_usuarioregistro=$_SESSION["id_usuario"];
                        $obj_detalle_comisiones->id_usuarioactualiza=$_SESSION["id_usuario"];
                        $obj_detalle_comisiones->create();                     
                    }
                    //TODO:Lista de representantes nivel 4
                    $rs_rep_nivel_4=$obj_rep->listar_representantes_sponsor($fila_rep_nivel_3["nro_documento"]);
                    while($fila_rep_nivel_4=mysqli_fetch_assoc($rs_rep_nivel_4))
                    {
                        $obj_trama->nro_documento=$fila_rep_nivel_4["nro_documento"];
                        //TODO: Consulta de ventas por representante nivel 4
                        $rs_ventas_nivel_4=$obj_trama->consultar_ventas_x_nro_documento_anio_mes_semana();
                        while($fila_ventas_nivel_4=mysqli_fetch_assoc($rs_ventas_nivel_4))
                        {                        
                            /*Insertamos datos en el detalle oncosalud recaudos*/
                            $obj_detalle_comisiones->id_cabacera_comisiones_venta=$id_cabecera_comision;
                            $obj_detalle_comisiones->nro_documento=$fila_ventas_nivel_4["nro_documento"];
                            $obj_detalle_comisiones->patrocinador=$fila_ventas_nivel_4["patrocinador"];
                            $obj_detalle_comisiones->patrocinador_directo=$fila_ventas_nivel_4["patrocinador_directo"];
                            $obj_detalle_comisiones->nivel="4";
                            $obj_detalle_comisiones->id_tipo_venta=$fila_ventas_nivel_4["id_tipo_venta"];
                            $obj_detalle_comisiones->id_paquete=$fila_ventas_nivel_4["id_paquete"];
                            $obj_detalle_comisiones->id_producto=$fila_ventas_nivel_4["id_producto"];
                            $obj_detalle_comisiones->precio_unitario=$fila_ventas_nivel_4["precio_unitario"];
                            $obj_detalle_comisiones->cantidad=$fila_ventas_nivel_4["cantidad"];
                            $obj_detalle_comisiones->sub_total=$fila_ventas_nivel_4["total_sin_costo_envio"];
                            $obj_detalle_comisiones->comision=$comision_nivel_4;
                            $obj_detalle_comisiones->comision_subtotal=number_format(($fila_ventas_nivel_4["total_sin_costo_envio"]*$comision_nivel_4),2,'.','');
                            $obj_detalle_comisiones->id_usuarioregistro=$_SESSION["id_usuario"];
                            $obj_detalle_comisiones->id_usuarioactualiza=$_SESSION["id_usuario"];
                            $obj_detalle_comisiones->create();                     
                        }
                        //TODO:Lista de representantes nivel 5
                        $rs_rep_nivel_5=$obj_rep->listar_representantes_sponsor($fila_rep_nivel_4["nro_documento"]);
                        while($fila_rep_nivel_5=mysqli_fetch_assoc($rs_rep_nivel_5))
                        {
                            $obj_trama->nro_documento=$fila_rep_nivel_5["nro_documento"];
                            //TODO: Consulta de ventas por representante nivel 5
                            $rs_ventas_nivel_5=$obj_trama->consultar_ventas_x_nro_documento_anio_mes_semana();
                            while($fila_ventas_nivel_5=mysqli_fetch_assoc($rs_ventas_nivel_5))
                            {                        
                                /*Insertamos datos en el detalle oncosalud recaudos*/
                                $obj_detalle_comisiones->id_cabacera_comisiones_venta=$id_cabecera_comision;
                                $obj_detalle_comisiones->nro_documento=$fila_ventas_nivel_5["nro_documento"];
                                $obj_detalle_comisiones->patrocinador=$fila_ventas_nivel_5["patrocinador"];
                                $obj_detalle_comisiones->patrocinador_directo=$fila_ventas_nivel_5["patrocinador_directo"];
                                $obj_detalle_comisiones->nivel="5";
                                $obj_detalle_comisiones->id_tipo_venta=$fila_ventas_nivel_5["id_tipo_venta"];
                                $obj_detalle_comisiones->id_paquete=$fila_ventas_nivel_5["id_paquete"];
                                $obj_detalle_comisiones->id_producto=$fila_ventas_nivel_5["id_producto"];
                                $obj_detalle_comisiones->precio_unitario=$fila_ventas_nivel_5["precio_unitario"];
                                $obj_detalle_comisiones->cantidad=$fila_ventas_nivel_5["cantidad"];
                                $obj_detalle_comisiones->sub_total=$fila_ventas_nivel_5["total_sin_costo_envio"];
                                $obj_detalle_comisiones->comision=$comision_nivel_5;
                                $obj_detalle_comisiones->comision_subtotal=number_format(($fila_ventas_nivel_5["total_sin_costo_envio"]*$comision_nivel_5),2,'.','');
                                $obj_detalle_comisiones->id_usuarioregistro=$_SESSION["id_usuario"];
                                $obj_detalle_comisiones->id_usuarioactualiza=$_SESSION["id_usuario"];
                                $obj_detalle_comisiones->create();                     
                            }
                        }
                    }

                }
            }
        }
    }
}

echo "true";
die();
?>