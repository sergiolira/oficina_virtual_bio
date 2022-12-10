<?php
session_start();

include_once("../../model_class/representante.php");
$obj=new representante();


if(trim($_REQUEST["txtruc_buscar"])!=""){
  $txtpatrocinador=$_REQUEST["txtruc_buscar"];
}

$ruc1='';$ruc1_cat='';
$categoria="";
$js_json="";$js_json_2="";$js_json_3="";$js_json_4="";$js_json_5="";
$js_json_6="";$js_json_7="";$js_json_8="";$js_json_9="";$js_json_10="";
$js_json_11="";$js_json_12="";$js_json_13="";$js_json_14="";$js_json_15="";
$js_json_16="";$js_json_17="";$js_json_18="";$js_json_19="";$js_json_20="";
$count=0;$count2=0;$count3=0;$count4=0;$count5=0;$count6=0;$count7=0;$count8=0;$count9=0;$count10=0;$count11=0;
$count=0;$count2_=0;$count3_=0;$count4_=0;$count5_=0;$count6_=0;$count7_=0;$count8_=0;$count9_=0;$count10_=0;$count11=0;
if(trim($_REQUEST["txtruc_buscar"])==0 && trim($_REQUEST["txtruc_buscar"])==""){
  $html='<h4>RUC NO INGRESADO O NO EXISTE</h4>';
  echo $html;
  die();
}
$patrocinador_directo=$txtpatrocinador;

$obj->ruc=$patrocinador_directo;

$rs_n_uno=$obj->dato_representante_nivel_uno($patrocinador_directo);
$rs_count_rep_x_pat_dir=$obj->count_rep_x_pat_dir($patrocinador_directo);
if($fila_n_uno=mysqli_fetch_assoc($rs_n_uno)){
  $ruc1=$fila_n_uno["nro_documento"];
  $ruc1_cat=$fila_n_uno["id_nivel_categoria"];
  
  switch ($fila_n_uno["id_nivel_categoria"]) {
    case '1':
        $categoria="Unilevel";
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

  //$js_json.='{ "id":"1", "Nombres": "'.$fila_n_uno["nombre"]." ".$fila_n_uno["apellidopaterno"]." ".$fila_n_uno["apellidomaterno"].'","img": "https://intranet.prolife.pe/imas/logo/usulider.png", "RUC": "'.$fila_n_uno["nro_documento"].'","Correo":"'.$fila_n_uno["correo"].'","Celular":"'.$fila_n_uno["telefono"].'","Posicion":"'.$fila_n_uno["posicion"].'","Categoria":"'.$categoria.'"},';
  //$js_json='';
}

/*Validamos sus nros  afialidos*/
if($rs_count_rep_x_pat_dir=="0"){

    /*$htmlcompleto=$js_json.$js_json_2.$js_json_3.$js_json_4.$js_json_5;
    $htmlsincoma = substr($htmlcompleto, 0, -1);    */
    $html='<option value="ninguno">Ninguno</option>';
    echo ($html);
    die();
}
$js_json_2='<option value="ninguno">Seleccionar Representante</option>';

/*Si tiene afiliados directos */
if($rs_count_rep_x_pat_dir!="0"){
  /**Inicio por nivel 2 */
  $rs=$obj->listar_representantes_sponsor($patrocinador_directo);
  while($fila=mysqli_fetch_assoc($rs)){
    $count++;
    switch ($fila["id_nivel_categoria"]) {
        case '1':
            $categoria="Unilevel";
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
      //$js_json_2.='{"id":"'.$fila["nro_documento"].'","pid":"1","Nombres":"'.$fila["nombre"]." ".$fila["apellidopaterno"]." ".$fila["apellidomaterno"].'","img":"https://intranet.prolife.pe/imas/logo/usulider.png","RUC":"'.$fila["nro_documento"].'","Correo":"'.$fila["correo"].'","Celular":"'.$fila["telefono"].'","Posicion":"'.$fila["posicion"].'","Categoria":"'.$categoria.'"},';
      $js_json_2.='<option value="'.$fila["nro_documento"].'">'.$fila["nombre"]." ".$fila["apellidopaterno"]." ".$fila["apellidomaterno"].'</option>';
      /**Fin  nivel 2*/

      $rs_4=$obj->listar_representantes_sponsor($fila["nro_documento"]);
      while ($fila_4=mysqli_fetch_assoc($rs_4)) {    
            $count++;
            switch ($fila_4["id_nivel_categoria"]) {
                case '1':
                    $categoria="Unilevel";
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
            //$js_json_3.='{"id":"'.$fila_4["nro_documento"].'","pid":"'.$fila["nro_documento"].'","Nombres":"'.$fila_4["nombre"]." ".$fila_4["apellidopaterno"]." ".$fila_4["apellidomaterno"].'","img":"https://intranet.prolife.pe/imas/logo/usulider.png","RUC":"'.$fila_4["nro_documento"].'","Correo":"'.$fila_4["correo"].'","Celular":"'.$fila_4["telefono"].'","Posicion":"'.$fila_4["posicion"].'","Categoria":"'.$categoria.'"},';
            $js_json_3.='<option value="'.$fila_4["nro_documento"].'">'.$fila_4["nombre"]." ".$fila_4["apellidopaterno"]." ".$fila_4["apellidomaterno"].'</option>';
            /*Fin nivel 3*/

              $rs_8=$obj->listar_representantes_sponsor($fila_4["nro_documento"]);
              while ($fila_8=mysqli_fetch_assoc($rs_8)) {
                    $count++;
                    switch ($fila_8["id_nivel_categoria"]) {
                        case '1':
                            $categoria="Unilevel";
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
                    //$js_json_4.='{"id":"'.$fila_8["nro_documento"].'","pid":"'.$fila_4["nro_documento"].'","Nombres":"'.$fila_8["nombre"]." ".$fila_8["apellidopaterno"]." ".$fila_8["apellidomaterno"].'","img":"https://intranet.prolife.pe/imas/logo/usulider.png","RUC":"'.$fila_8["nro_documento"].'","Correo":"'.$fila_8["correo"].'","Celular":"'.$fila_8["telefono"].'","Posicion":"'.$fila_8["posicion"].'","Categoria":"'.$categoria.'"},';
                    $js_json_4.='<option value="'.$fila_8["nro_documento"].'">'.$fila_8["nombre"]." ".$fila_8["apellidopaterno"]." ".$fila_8["apellidomaterno"].'</option>';
                    /*Fin nivel 4*/

                    $rs_16=$obj->listar_representantes_sponsor($fila_8["nro_documento"]);
                    while ($fila_16=mysqli_fetch_assoc($rs_16)) {
                        $count++;
                        switch ($fila_16["id_nivel_categoria"]) {
                            case '1':
                                $categoria="Unilevel";
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
                        //$js_json_5.='{"id":"'.$fila_16["nro_documento"].'","pid":"'.$fila_8["nro_documento"].'","Nombres":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"https://intranet.prolife.pe/imas/logo/usulider.png","RUC":"'.$fila_16["nro_documento"].'","Correo":"'.$fila_16["correo"].'","Celular":"'.$fila_16["telefono"].'","Posicion":"'.$fila_16["posicion"].'","Categoria":"'.$categoria.'"},';
                        $js_json_5.='<option value="'.$fila_16["nro_documento"].'">'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'</option>';
                        /*Fin nivel 5*/ 

                        $rs_n6=$obj->listar_representantes_sponsor($fila_16["nro_documento"]);
                        while ($fila_n6=mysqli_fetch_assoc($rs_n6)) {
                            $count++;
                            switch ($fila_n6["id_nivel_categoria"]) {
                                case '1':
                                    $categoria="Unilevel";
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
                            //$js_json_6.='{"id":"'.$fila_n6["nro_documento"].'","pid":"'.$fila_16["nro_documento"].'","Nombres":"'.$fila_n6["nombre"]." ".$fila_n6["apellidopaterno"]." ".$fila_n6["apellidomaterno"].'","img":"https://intranet.prolife.pe/imas/logo/usulider.png","RUC":"'.$fila_n6["nro_documento"].'","Correo":"'.$fila_n6["correo"].'","Celular":"'.$fila_n6["telefono"].'","Posicion":"'.$fila_n6["posicion"].'","Categoria":"'.$categoria.'"},';
                            $js_json_6.='<option value="'.$fila_n6["nro_documento"].'">'.$fila_n6["nombre"]." ".$fila_n6["apellidopaterno"]." ".$fila_n6["apellidomaterno"].'</option>';
                            /*Fin nivel 6*/

                            $rs_n7=$obj->listar_representantes_sponsor($fila_n6["nro_documento"]);
                            while ($fila_n7=mysqli_fetch_assoc($rs_n7)) {
                                $count++;
                                switch ($fila_n7["id_nivel_categoria"]) {
                                    case '1':
                                        $categoria="Unilevel";
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
                                //$js_json_7.='{"id":"'.$fila_n7["nro_documento"].'","pid":"'.$fila_n6["nro_documento"].'","Nombres":"'.$fila_n7["nombre"]." ".$fila_n7["apellidopaterno"]." ".$fila_n7["apellidomaterno"].'","img":"https://intranet.prolife.pe/imas/logo/usulider.png","RUC":"'.$fila_n7["nro_documento"].'","Correo":"'.$fila_n7["correo"].'","Celular":"'.$fila_n7["telefono"].'","Posicion":"'.$fila_n7["posicion"].'","Categoria":"'.$categoria.'"},';
                                $js_json_7.='<option value="'.$fila_n7["nro_documento"].'">'.$fila_n7["nombre"]." ".$fila_n7["apellidopaterno"]." ".$fila_n7["apellidomaterno"].'</option>';
                                /*Fin nivel 6*/
                                
                                $rs_n8=$obj->listar_representantes_sponsor($fila_n7["nro_documento"]);
                                while ($fila_n8=mysqli_fetch_assoc($rs_n8)) {
                                    $count++;
                                    switch ($fila_n8["id_nivel_categoria"]) {
                                        case '1':
                                            $categoria="Unilevel";
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
                                    //$js_json_8.='{"id":"'.$fila_n8["nro_documento"].'","pid":"'.$fila_n7["nro_documento"].'","Nombres":"'.$fila_n8["nombre"]." ".$fila_n8["apellidopaterno"]." ".$fila_n8["apellidomaterno"].'","img":"https://intranet.prolife.pe/imas/logo/usulider.png","RUC":"'.$fila_n8["nro_documento"].'","Correo":"'.$fila_n8["correo"].'","Celular":"'.$fila_n8["telefono"].'","Posicion":"'.$fila_n8["posicion"].'","Categoria":"'.$categoria.'"},';
                                    $js_json_8.='<option value="'.$fila_n8["nro_documento"].'">'.$fila_n8["nombre"]." ".$fila_n8["apellidopaterno"]." ".$fila_n8["apellidomaterno"].'</option>';
                                    /*Fin nivel 6*/
                                    $rs_n9=$obj->listar_representantes_sponsor($fila_n8["nro_documento"]);
                                    while ($fila_n9=mysqli_fetch_assoc($rs_n9)) {
                                        $count++;
                                        switch ($fila_n9["id_nivel_categoria"]) {
                                            case '1':
                                                $categoria="Unilevel";
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
                                        //$js_json_9.='{"id":"'.$fila_n9["nro_documento"].'","pid":"'.$fila_n8["nro_documento"].'","Nombres":"'.$fila_n9["nombre"]." ".$fila_n9["apellidopaterno"]." ".$fila_n9["apellidomaterno"].'","img":"https://intranet.prolife.pe/imas/logo/usulider.png","RUC":"'.$fila_n9["nro_documento"].'","Correo":"'.$fila_n9["correo"].'","Celular":"'.$fila_n9["telefono"].'","Posicion":"'.$fila_n9["posicion"].'","Categoria":"'.$categoria.'"},';
                                        $js_json_9.='<option value="'.$fila_n9["nro_documento"].'">'.$fila_n9["nombre"]." ".$fila_n9["apellidopaterno"]." ".$fila_n9["apellidomaterno"].'</option>';
                                        /*Fin nivel 6*/
                                        $rs_n10=$obj->listar_representantes_sponsor($fila_n9["nro_documento"]);
                                        while ($fila_n10=mysqli_fetch_assoc($rs_n10)){
                                            $count++;
                                            switch ($fila_n10["id_nivel_categoria"]) {
                                                case '1':
                                                    $categoria="Unilevel";
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
                                            //$js_json_9.='{"id":"'.$fila_n9["nro_documento"].'","pid":"'.$fila_n8["nro_documento"].'","Nombres":"'.$fila_n9["nombre"]." ".$fila_n9["apellidopaterno"]." ".$fila_n9["apellidomaterno"].'","img":"https://intranet.prolife.pe/imas/logo/usulider.png","RUC":"'.$fila_n9["nro_documento"].'","Correo":"'.$fila_n9["correo"].'","Celular":"'.$fila_n9["telefono"].'","Posicion":"'.$fila_n9["posicion"].'","Categoria":"'.$categoria.'"},';
                                            $js_json_10.='<option value="'.$fila_n10["nro_documento"].'">'.$fila_n10["nombre"]." ".$fila_n10["apellidopaterno"]." ".$fila_n10["apellidomaterno"].'</option>';
                                            /*Fin nivel 6*/
                                            $rs_n11=$obj->listar_representantes_sponsor($fila_n10["nro_documento"]);
                                            while ($fila_n11=mysqli_fetch_assoc($rs_n11)){
                                                $count++;
                                                switch ($fila_n11["id_nivel_categoria"]) {
                                                    case '1':
                                                        $categoria="Unilevel";
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
                                                //$js_json_9.='{"id":"'.$fila_n9["nro_documento"].'","pid":"'.$fila_n8["fila_n11"].'","Nombres":"'.$fila_n9["nombre"]." ".$fila_n9["apellidopaterno"]." ".$fila_n9["apellidomaterno"].'","img":"https://intranet.prolife.pe/imas/logo/usulider.png","RUC":"'.$fila_n9["nro_documento"].'","Correo":"'.$fila_n9["correo"].'","Celular":"'.$fila_n9["telefono"].'","Posicion":"'.$fila_n9["posicion"].'","Categoria":"'.$categoria.'"},';
                                                $js_json_11.='<option value="'.$fila_n11["nro_documento"].'">'.$fila_n10["nombre"]." ".$fila_n11["apellidopaterno"]." ".$fila_n11["apellidomaterno"].'</option>';
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
  }


}
  
$htmlcompleto=$js_json.$js_json_2.$js_json_3.$js_json_4.$js_json_5.$js_json_6.$js_json_7.$js_json_8.$js_json_9.$js_json_10.$js_json_11.$js_json_12.$js_json_13.$js_json_14.$js_json_15.$js_json_16.$js_json_17.$js_json_18.$js_json_19.$js_json_20;
//$htmlsincoma = substr($htmlcompleto, 0, -1);

//$html='['.$htmlsincoma.']';
echo ($htmlcompleto);
die();
?>
