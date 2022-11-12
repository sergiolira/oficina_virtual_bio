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
  $rs=$obj->listar_representantes_sponsor($patrocinador_directo);
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

      $rs_4=$obj->listar_representantes_sponsor($fila["ruc"]);
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

              $rs_8=$obj->listar_representantes_sponsor($fila_4["ruc"]);
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

                    $rs_16=$obj->listar_representantes_sponsor($fila_8["ruc"]);
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

                        $rs_n6=$obj->listar_representantes_sponsor($fila_16["ruc"]);
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

                            $rs_n7=$obj->listar_representantes_sponsor($fila_n6["ruc"]);
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
                                
                                $rs_n8=$obj->listar_representantes_sponsor($fila_n7["ruc"]);
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
                                    $rs_n9=$obj->listar_representantes_sponsor($fila_n8["ruc"]);
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
                                        $rs_n10=$obj->listar_representantes_sponsor($fila_n9["ruc"]);
                                        while($fila_n10=mysqli_fetch_assoc($rs_n10)){
                                            switch ($fila_n10["id_nivel_categoria"]) {
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
                                            /*Inicio nivel 10*/
                                            $js_json_10.='{"id":"'.$fila_n10["ruc"].'","pid":"'.$fila_n9["ruc"].'","Nombres":"'.$fila_n10["nombre"]." ".$fila_n10["apellidopaterno"]." ".$fila_n10["apellidomaterno"].'","img":"https://intranet.prolife.pe/imas/logo/usulider.png","RUC":"'.$fila_n10["ruc"].'","Correo":"'.$fila_n10["correo"].'","Celular":"'.$fila_n10["telefono"].'","Posicion":"'.$fila_n10["posicion"].'","Categoria":"'.$categoria.'"},';
                                            $rs_n11=$obj->listar_representantes_sponsor($fila_n10["ruc"]);
                                            while($fila_n11=mysqli_fetch_assoc($rs_n11)){
                                                switch ($fila_n11["id_nivel_categoria"]) {
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
                                                $js_json_11.='{"id":"'.$fila_n11["ruc"].'","pid":"'.$fila_n10["ruc"].'","Nombres":"'.$fila_n11["nombre"]." ".$fila_n11["apellidopaterno"]." ".$fila_n11["apellidomaterno"].'","img":"https://intranet.prolife.pe/imas/logo/usulider.png","RUC":"'.$fila_n11["ruc"].'","Correo":"'.$fila_n11["correo"].'","Celular":"'.$fila_n11["telefono"].'","Posicion":"'.$fila_n11["posicion"].'","Categoria":"'.$categoria.'"},';
                                                $rs_n12=$obj->listar_representantes_sponsor($fila_n11["ruc"]);
                                                while($fila_n12=mysqli_fetch_assoc($rs_n12)){
                                                    switch ($fila_n12["id_nivel_categoria"]) {
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
                                                    $js_json_12.='{"id":"'.$fila_n12["ruc"].'","pid":"'.$fila_n11["ruc"].'","Nombres":"'.$fila_n12["nombre"]." ".$fila_n12["apellidopaterno"]." ".$fila_n12["apellidomaterno"].'","img":"https://intranet.prolife.pe/imas/logo/usulider.png","RUC":"'.$fila_n12["ruc"].'","Correo":"'.$fila_n12["correo"].'","Celular":"'.$fila_n12["telefono"].'","Posicion":"'.$fila_n12["posicion"].'","Categoria":"'.$categoria.'"},';
                                                    $rs_n13=$obj->listar_representantes_sponsor($fila_n12["ruc"]);
                                                    while($fila_n13=mysqli_fetch_assoc($rs_n13)){
                                                        switch ($fila_n13["id_nivel_categoria"]) {
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
                                                        $js_json_13.='{"id":"'.$fila_n13["ruc"].'","pid":"'.$fila_n12["ruc"].'","Nombres":"'.$fila_n13["nombre"]." ".$fila_n13["apellidopaterno"]." ".$fila_n13["apellidomaterno"].'","img":"https://intranet.prolife.pe/imas/logo/usulider.png","RUC":"'.$fila_n13["ruc"].'","Correo":"'.$fila_n13["correo"].'","Celular":"'.$fila_n13["telefono"].'","Posicion":"'.$fila_n13["posicion"].'","Categoria":"'.$categoria.'"},';
                                                        //$rs_n13=$obj->listar_representantes_sponsor($fila_n12["ruc"]);
                                                           
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
  }


}
  
$htmlcompleto=$js_json.$js_json_2.$js_json_3.$js_json_4.$js_json_5.$js_json_6.$js_json_7.$js_json_8.$js_json_9.$js_json_10.$js_json_11.$js_json_12.$js_json_13.$js_json_14.$js_json_15.$js_json_16.$js_json_17.$js_json_18.$js_json_19.$js_json_20;
$htmlsincoma = substr($htmlcompleto, 0, -1);

$html='['.$htmlsincoma.']';
echo ($html);
exit();
?>
