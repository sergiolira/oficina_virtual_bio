<?php
session_start();
include_once("../../model_class/representante.php");
include_once("../../model_class/solicitud_arbol_virtual.php");
$obj=new representante();
$obj_s=new solicitud_arbol_virtual();


if(trim($_REQUEST["txtruc_buscar"])!=""){
  $txtpatrocinador=$_REQUEST["txtruc_buscar"];
}

if(trim($_REQUEST["txtnrosoli"])!=""){
    $txtnrosoli=$_REQUEST["txtnrosoli"];
  }

$ruc1='';$ruc1_cat='';
$categoria="";
$js_json="";$js_json_2="";$js_json_3="";$js_json_4="";$js_json_5="";
$js_json_6="";$js_json_7="";$js_json_8="";$js_json_9="";$js_json_10="";
$js_json_11="";$js_json_12="";$js_json_13="";$js_json_14="";$js_json_15="";
$js_json_16="";$js_json_17="";$js_json_18="";$js_json_19="";$js_json_20="";

if(trim($_REQUEST["txtruc_buscar"])==0 && trim($_REQUEST["txtruc_buscar"])==""){
  $html='<h4>RUC NO INGRESADO O NO EXISTE</h4>';
  echo $html;
  die();
}


/**Validar si entre los eliminados, esta el lider */
$obj_s->ruc_usuario=$txtpatrocinador;
$obj_s->nro_solicitud=$txtnrosoli;
$r_val_=$obj_s->validar_exite_lider_solicitud();
if($r_val_>=1){

    $html='[]';
    echo ($html);
    exit();
}

$patrocinador_directo=$txtpatrocinador;

$obj->ruc=$patrocinador_directo;

$rs_n_uno=$obj->dato_representante_nivel_uno($patrocinador_directo);

$obj_s->nro_solicitud=$txtnrosoli;
$rs_count_rep_x_pat_dir=$obj_s->count_rep_x_pat_dir_solicitud($patrocinador_directo);
if($fila_n_uno=mysqli_fetch_assoc($rs_n_uno)){
  $ruc1=$fila_n_uno["ruc"];
  $ruc1_cat=$fila_n_uno["id_nivel_categoria"];
  
  switch ($fila_n_uno["id_nivel_categoria"]) {
    case '1':
        $categoria="Basico";
        break;
    case '2':
        $categoria="Plata";
        break;
    case '3':
        $categoria="Oro";
        break;      
    default:
        $categoria="Diamante";
        break;
  }

  $js_json.='{ "id":"1", "Nombres": "'.$fila_n_uno["nombre"]." ".$fila_n_uno["apellidopaterno"]." ".$fila_n_uno["apellidomaterno"].'","img": "https://intranet.prolife.pe/imas/logo/usulider.png", "RUC": "'.$fila_n_uno["ruc"].'","Correo":"'.$fila_n_uno["correo"].'","Celular":"'.$fila_n_uno["telefono"].'","Posicion":"'.$fila_n_uno["posicion"].'","Categoria":"'.$categoria.'"},';
}

/*Validamos sus nros  afialidos*/
if($rs_count_rep_x_pat_dir=="0"){

    $htmlcompleto=$js_json.$js_json_2.$js_json_3.$js_json_4.$js_json_5;
    $htmlsincoma = substr($htmlcompleto, 0, -1);    
    $html='['.$htmlsincoma.']';
    echo ($html);
    exit();
}


/*Si tiene afiliados directos */
if($rs_count_rep_x_pat_dir!="0"){
  /**Inicio por nivel 2 */
  $rs=$obj_s->listar_representantes_sponsor_solicitud($patrocinador_directo);
  while($fila=mysqli_fetch_assoc($rs)){
    switch ($fila["id_nivel_categoria"]) {
        case '1':
            $categoria="Basico";
            break;
        case '2':
            $categoria="Plata";
            break;
        case '3':
            $categoria="Oro";
            break;      
        default:
            $categoria="Diamante";
            break;
      }
      /**Inicio  nivel 2*/
      $js_json_2.='{"id":"'.$fila["ruc"].'","pid":"1","Nombres":"'.$fila["nombre"]." ".$fila["apellidopaterno"]." ".$fila["apellidomaterno"].'","img":"https://intranet.prolife.pe/imas/logo/usulider.png","RUC":"'.$fila["ruc"].'","Correo":"'.$fila["correo"].'","Celular":"'.$fila["telefono"].'","Posicion":"'.$fila["posicion"].'","Categoria":"'.$categoria.'"},';
      /**Fin  nivel 2*/

      $rs_4=$obj_s->listar_representantes_sponsor_solicitud($fila["ruc"]);
      while ($fila_4=mysqli_fetch_assoc($rs_4)) {
            switch ($fila_4["id_nivel_categoria"]) {
                case '1':
                    $categoria="Basico";
                    break;
                case '2':
                    $categoria="Plata";
                    break;
                case '3':
                    $categoria="Oro";
                    break;      
                default:
                    $categoria="Diamante";
                    break;
            }
            /*Inicio nivel 3*/
            $js_json_3.='{"id":"'.$fila_4["ruc"].'","pid":"'.$fila["ruc"].'","Nombres":"'.$fila_4["nombre"]." ".$fila_4["apellidopaterno"]." ".$fila_4["apellidomaterno"].'","img":"https://intranet.prolife.pe/imas/logo/usulider.png","RUC":"'.$fila_4["ruc"].'","Correo":"'.$fila_4["correo"].'","Celular":"'.$fila_4["telefono"].'","Posicion":"'.$fila_4["posicion"].'","Categoria":"'.$categoria.'"},';
            /*Fin nivel 3*/

              $rs_8=$obj_s->listar_representantes_sponsor_solicitud($fila_4["ruc"]);
              while ($fila_8=mysqli_fetch_assoc($rs_8)) {
                    switch ($fila_8["id_nivel_categoria"]) {
                        case '1':
                            $categoria="Basico";
                            break;
                        case '2':
                            $categoria="Plata";
                            break;
                        case '3':
                            $categoria="Oro";
                            break;      
                        default:
                            $categoria="Diamante";
                            break;
                    }
                    /*Inicio nivel 4*/                
                    $js_json_4.='{"id":"'.$fila_8["ruc"].'","pid":"'.$fila_4["ruc"].'","Nombres":"'.$fila_8["nombre"]." ".$fila_8["apellidopaterno"]." ".$fila_8["apellidomaterno"].'","img":"https://intranet.prolife.pe/imas/logo/usulider.png","RUC":"'.$fila_8["ruc"].'","Correo":"'.$fila_8["correo"].'","Celular":"'.$fila_8["telefono"].'","Posicion":"'.$fila_8["posicion"].'","Categoria":"'.$categoria.'"},';
                    /*Fin nivel 4*/

                    $rs_16=$obj_s->listar_representantes_sponsor_solicitud($fila_8["ruc"]);
                    while ($fila_16=mysqli_fetch_assoc($rs_16)) {
                        switch ($fila_16["id_nivel_categoria"]) {
                            case '1':
                                $categoria="Basico";
                                break;
                            case '2':
                                $categoria="Plata";
                                break;
                            case '3':
                                $categoria="Oro";
                                break;      
                            default:
                                $categoria="Diamante";
                                break;
                          }
                        /*Inicio nivel 5*/
                        $js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$fila_8["ruc"].'","Nombres":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"https://intranet.prolife.pe/imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","Correo":"'.$fila_16["correo"].'","Celular":"'.$fila_16["telefono"].'","Posicion":"'.$fila_16["posicion"].'","Categoria":"'.$categoria.'"},';
                        /*Fin nivel 5*/ 

                        $rs_n6=$obj_s->listar_representantes_sponsor_solicitud($fila_16["ruc"]);
                        while ($fila_n6=mysqli_fetch_assoc($rs_n6)) {
                            switch ($fila_n6["id_nivel_categoria"]) {
                                case '1':
                                    $categoria="Basico";
                                    break;
                                case '2':
                                    $categoria="Plata";
                                    break;
                                case '3':
                                    $categoria="Oro";
                                    break;      
                                default:
                                    $categoria="Diamante";
                                    break;
                              }
                            /*Inicio nivel 6*/
                            $js_json_6.='{"id":"'.$fila_n6["ruc"].'","pid":"'.$fila_16["ruc"].'","Nombres":"'.$fila_n6["nombre"]." ".$fila_n6["apellidopaterno"]." ".$fila_n6["apellidomaterno"].'","img":"https://intranet.prolife.pe/imas/logo/usulider.png","RUC":"'.$fila_n6["ruc"].'","Correo":"'.$fila_n6["correo"].'","Celular":"'.$fila_n6["telefono"].'","Posicion":"'.$fila_n6["posicion"].'","Categoria":"'.$categoria.'"},';
                            /*Fin nivel 6*/

                            $rs_n7=$obj_s->listar_representantes_sponsor_solicitud($fila_n6["ruc"]);
                            while ($fila_n7=mysqli_fetch_assoc($rs_n7)) {
                                switch ($fila_n7["id_nivel_categoria"]) {
                                    case '1':
                                        $categoria="Basico";
                                        break;
                                    case '2':
                                        $categoria="Plata";
                                        break;
                                    case '3':
                                        $categoria="Oro";
                                        break;      
                                    default:
                                        $categoria="Diamante";
                                        break;
                                  }
                                /*Inicio nivel 6*/
                                $js_json_7.='{"id":"'.$fila_n7["ruc"].'","pid":"'.$fila_n6["ruc"].'","Nombres":"'.$fila_n7["nombre"]." ".$fila_n7["apellidopaterno"]." ".$fila_n7["apellidomaterno"].'","img":"https://intranet.prolife.pe/imas/logo/usulider.png","RUC":"'.$fila_n7["ruc"].'","Correo":"'.$fila_n7["correo"].'","Celular":"'.$fila_n7["telefono"].'","Posicion":"'.$fila_n7["posicion"].'","Categoria":"'.$categoria.'"},';
                                /*Fin nivel 6*/
                                
                                $rs_n8=$obj_s->listar_representantes_sponsor_solicitud($fila_n7["ruc"]);
                                while ($fila_n8=mysqli_fetch_assoc($rs_n8)) {
                                    switch ($fila_n8["id_nivel_categoria"]) {
                                        case '1':
                                            $categoria="Basico";
                                            break;
                                        case '2':
                                            $categoria="Plata";
                                            break;
                                        case '3':
                                            $categoria="Oro";
                                            break;      
                                        default:
                                            $categoria="Diamante";
                                            break;
                                    }
                                    /*Inicio nivel 6*/
                                    $js_json_8.='{"id":"'.$fila_n8["ruc"].'","pid":"'.$fila_n7["ruc"].'","Nombres":"'.$fila_n8["nombre"]." ".$fila_n8["apellidopaterno"]." ".$fila_n8["apellidomaterno"].'","img":"https://intranet.prolife.pe/imas/logo/usulider.png","RUC":"'.$fila_n8["ruc"].'","Correo":"'.$fila_n8["correo"].'","Celular":"'.$fila_n8["telefono"].'","Posicion":"'.$fila_n8["posicion"].'","Categoria":"'.$categoria.'"},';
                                    /*Fin nivel 6*/
                                    $rs_n9=$obj_s->listar_representantes_sponsor_solicitud($fila_n8["ruc"]);
                                    while ($fila_n9=mysqli_fetch_assoc($rs_n9)) {
                                        switch ($fila_n9["id_nivel_categoria"]) {
                                            case '1':
                                                $categoria="Basico";
                                                break;
                                            case '2':
                                                $categoria="Plata";
                                                break;
                                            case '3':
                                                $categoria="Oro";
                                                break;      
                                            default:
                                                $categoria="Diamante";
                                                break;
                                        }
                                        /*Inicio nivel 6*/
                                        $js_json_9.='{"id":"'.$fila_n9["ruc"].'","pid":"'.$fila_n8["ruc"].'","Nombres":"'.$fila_n9["nombre"]." ".$fila_n9["apellidopaterno"]." ".$fila_n9["apellidomaterno"].'","img":"https://intranet.prolife.pe/imas/logo/usulider.png","RUC":"'.$fila_n9["ruc"].'","Correo":"'.$fila_n9["correo"].'","Celular":"'.$fila_n9["telefono"].'","Posicion":"'.$fila_n9["posicion"].'","Categoria":"'.$categoria.'"},';
                                        /*Fin nivel 6*/
                                    }
                                }
                            }

                        }

                    }
              }
      }
  }


}
  
$htmlcompleto=$js_json.$js_json_2.$js_json_3.$js_json_4.$js_json_5.$js_json_6.$js_json_7.$js_json_8.$js_json_9.$js_json_10.$js_json_11.$js_json_12.$js_json_13.$js_json_14.$js_json_15.$js_json_16.$js_json_17.$js_json_18.$js_json_19.$js_json_20;
$htmlsincoma = substr($htmlcompleto, 0, -1);

$html='['.$htmlsincoma.']';
echo ($html);
exit();
?>
