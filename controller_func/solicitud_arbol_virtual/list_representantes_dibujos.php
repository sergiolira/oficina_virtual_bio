<?php
session_start();

include_once("../../model_class/representante.php");
$obj=new representante();


/*if(trim($_REQUEST["txtruc_buscar"])!=""){
  $txtpatrocinador=$_REQUEST["txtruc_buscar"];
}*/


if(trim($_REQUEST["txtruc_re_dibujar"])!=""){
    $txtpatrocinador=$_REQUEST["txtruc_re_dibujar"];
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

  //$js_json.='{ "id":"1", "Nombres": "'.$fila_n_uno["nombre"]." ".$fila_n_uno["apellidopaterno"]." ".$fila_n_uno["apellidomaterno"].'","img": "https://intranet.prolife.pe/imas/logo/usulider.png", "RUC": "'.$fila_n_uno["ruc"].'","Correo":"'.$fila_n_uno["correo"].'","Celular":"'.$fila_n_uno["telefono"].'","Posicion":"'.$fila_n_uno["posicion"].'","Categoria":"'.$categoria.'"},';
  //$js_json.='<div data-id="'.$fila_n_uno["ruc"].'" data-Nombres="'.$fila_n_uno["nombre"]." ".$fila_n_uno["apellidopaterno"]." ".$fila_n_uno["apellidomaterno"].'" data-RUC="'.$fila_n_uno["ruc"].'" data-Correo="'.$fila_n_uno["correo"].'" data-Celular="'.$fila_n_uno["telefono"].'" data-Posicion="'.$fila_n_uno["posicion"].'" data-Categoria="'.$categoria.'" class="item">'.$fila_n_uno["nombre"]." ".$fila_n_uno["apellidopaterno"]." ".$fila_n_uno["apellidomaterno"].'</div>';
}

/*Validamos sus nros  afialidos*/
if($rs_count_rep_x_pat_dir=="0"){

    $htmlcompleto=$js_json.$js_json_2.$js_json_3.$js_json_4.$js_json_5;
    /*$htmlsincoma = substr($htmlcompleto, 0, -1);    
    $html='['.$htmlsincoma.']';*/
    echo ($htmlcompleto);
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
      //$js_json_2.='{"id":"'.$fila["ruc"].'","pid":"1","Nombres":"'.$fila["nombre"]." ".$fila["apellidopaterno"]." ".$fila["apellidomaterno"].'","img":"https://intranet.prolife.pe/imas/logo/usulider.png","RUC":"'.$fila["ruc"].'","Correo":"'.$fila["correo"].'","Celular":"'.$fila["telefono"].'","Posicion":"'.$fila["posicion"].'","Categoria":"'.$categoria.'"},';
      $js_json_2.='<div id="'.$fila["ruc"].'" data-id="'.$fila["ruc"].'" data-Nombres="'.$fila["nombre"]." ".$fila["apellidopaterno"]." ".$fila["apellidomaterno"].'" data-img="https://intranet.prolife.pe/imas/logo/usulider.png" data-RUC="'.$fila["ruc"].'" data-Correo="'.$fila["correo"].'" data-Celular="'.$fila["telefono"].'" data-Posicion="'.$fila["posicion"].'" data-Categoria="'.$categoria.'" class="item">'.$fila["nombre"]." ".$fila["apellidopaterno"]." ".$fila["apellidomaterno"].'</div>';
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
            //$js_json_3.='{"id":"'.$fila_4["ruc"].'","pid":"'.$fila["ruc"].'","Nombres":"'.$fila_4["nombre"]." ".$fila_4["apellidopaterno"]." ".$fila_4["apellidomaterno"].'","img":"https://intranet.prolife.pe/imas/logo/usulider.png","RUC":"'.$fila_4["ruc"].'","Correo":"'.$fila_4["correo"].'","Celular":"'.$fila_4["telefono"].'","Posicion":"'.$fila_4["posicion"].'","Categoria":"'.$categoria.'"},';
            $js_json_3.='<div id="'.$fila_4["ruc"].'" data-id="'.$fila_4["ruc"].'" data-Nombres="'.$fila_4["nombre"]." ".$fila_4["apellidopaterno"]." ".$fila_4["apellidomaterno"].'" data-img="https://intranet.prolife.pe/imas/logo/usulider.png" data-RUC="'.$fila_4["ruc"].'" data-Correo="'.$fila_4["correo"].'" data-Celular="'.$fila_4["telefono"].'" data-Posicion="'.$fila_4["posicion"].'" data-Categoria="'.$categoria.'" class="item">'.$fila_4["nombre"]." ".$fila_4["apellidopaterno"]." ".$fila_4["apellidomaterno"].'</div>';
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
                    //$js_json_4.='{"id":"'.$fila_8["ruc"].'","pid":"'.$fila_4["ruc"].'","Nombres":"'.$fila_8["nombre"]." ".$fila_8["apellidopaterno"]." ".$fila_8["apellidomaterno"].'","img":"https://intranet.prolife.pe/imas/logo/usulider.png","RUC":"'.$fila_8["ruc"].'","Correo":"'.$fila_8["correo"].'","Celular":"'.$fila_8["telefono"].'","Posicion":"'.$fila_8["posicion"].'","Categoria":"'.$categoria.'"},';
                    $js_json_4.='<div id="'.$fila_8["ruc"].'" data-id="'.$fila_8["ruc"].'" data-Nombres="'.$fila_8["nombre"]." ".$fila_8["apellidopaterno"]." ".$fila_8["apellidomaterno"].'" data-img="https://intranet.prolife.pe/imas/logo/usulider.png" data-RUC="'.$fila_8["ruc"].'" data-Correo="'.$fila_8["correo"].'" data-Celular="'.$fila_8["telefono"].'" data-Posicion="'.$fila_8["posicion"].'" data-Categoria="'.$categoria.'" class="item">'.$fila_8["nombre"]." ".$fila_8["apellidopaterno"]." ".$fila_8["apellidomaterno"].'</div>';
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
                        //$js_json_5.='{"id":"'.$fila_16["ruc"].'","pid":"'.$fila_8["ruc"].'","Nombres":"'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'","img":"https://intranet.prolife.pe/imas/logo/usulider.png","RUC":"'.$fila_16["ruc"].'","Correo":"'.$fila_16["correo"].'","Celular":"'.$fila_16["telefono"].'","Posicion":"'.$fila_16["posicion"].'","Categoria":"'.$categoria.'"},';
                        $js_json_5.='<div id="'.$fila_16["ruc"].'" data-id="'.$fila_16["ruc"].'" data-Nombres="'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'" data-img="https://intranet.prolife.pe/imas/logo/usulider.png" data-RUC="'.$fila_16["ruc"].'" data-Correo="'.$fila_16["correo"].'" data-Celular="'.$fila_16["telefono"].'" data-Posicion="'.$fila_16["posicion"].'" data-Categoria="'.$categoria.'" class="item">'.$fila_16["nombre"]." ".$fila_16["apellidopaterno"]." ".$fila_16["apellidomaterno"].'</div>';
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
                            //$js_json_6.='{"id":"'.$fila_n6["ruc"].'","pid":"'.$fila_16["ruc"].'","Nombres":"'.$fila_n6["nombre"]." ".$fila_n6["apellidopaterno"]." ".$fila_n6["apellidomaterno"].'","img":"https://intranet.prolife.pe/imas/logo/usulider.png","RUC":"'.$fila_n6["ruc"].'","Correo":"'.$fila_n6["correo"].'","Celular":"'.$fila_n6["telefono"].'","Posicion":"'.$fila_n6["posicion"].'","Categoria":"'.$categoria.'"},';
                            $js_json_6.='<div id="'.$fila_n6["ruc"].'" data-id="'.$fila_n6["ruc"].'" data-Nombres="'.$fila_n6["nombre"]." ".$fila_n6["apellidopaterno"]." ".$fila_n6["apellidomaterno"].'" data-img="https://intranet.prolife.pe/imas/logo/usulider.png" data-RUC="'.$fila_n6["ruc"].'" data-Correo="'.$fila_n6["correo"].'" data-Celular="'.$fila_n6["telefono"].'" data-Posicion="'.$fila_n6["posicion"].'" data-Categoria="'.$categoria.'" class="item">'.$fila_n6["nombre"]." ".$fila_n6["apellidopaterno"]." ".$fila_n6["apellidomaterno"].'</div>';
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
                                //$js_json_7.='{"id":"'.$fila_n7["ruc"].'","pid":"'.$fila_n6["ruc"].'","Nombres":"'.$fila_n7["nombre"]." ".$fila_n7["apellidopaterno"]." ".$fila_n7["apellidomaterno"].'","img":"https://intranet.prolife.pe/imas/logo/usulider.png","RUC":"'.$fila_n7["ruc"].'","Correo":"'.$fila_n7["correo"].'","Celular":"'.$fila_n7["telefono"].'","Posicion":"'.$fila_n7["posicion"].'","Categoria":"'.$categoria.'"},';
                                $js_json_7.='<div id="'.$fila_n7["ruc"].'" data-id="'.$fila_n7["ruc"].'" data-Nombres="'.$fila_n7["nombre"]." ".$fila_n7["apellidopaterno"]." ".$fila_n7["apellidomaterno"].'" data-img="https://intranet.prolife.pe/imas/logo/usulider.png" data-RUC="'.$fila_n7["ruc"].'" data-Correo="'.$fila_n7["correo"].'" data-Celular="'.$fila_n7["telefono"].'" data-Posicion="'.$fila_n7["posicion"].'" data-Categoria="'.$categoria.'" class="item">'.$fila_n7["nombre"]." ".$fila_n7["apellidopaterno"]." ".$fila_n7["apellidomaterno"].'</div>';
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
                                    //$js_json_8.='{"id":"'.$fila_n8["ruc"].'","pid":"'.$fila_n7["ruc"].'","Nombres":"'.$fila_n8["nombre"]." ".$fila_n8["apellidopaterno"]." ".$fila_n8["apellidomaterno"].'","img":"https://intranet.prolife.pe/imas/logo/usulider.png","RUC":"'.$fila_n8["ruc"].'","Correo":"'.$fila_n8["correo"].'","Celular":"'.$fila_n8["telefono"].'","Posicion":"'.$fila_n8["posicion"].'","Categoria":"'.$categoria.'"},';
                                    $js_json_8.='<div id="'.$fila_n8["ruc"].'" data-id="'.$fila_n8["ruc"].'" data-Nombres="'.$fila_n8["nombre"]." ".$fila_n8["apellidopaterno"]." ".$fila_n8["apellidomaterno"].'" data-img="https://intranet.prolife.pe/imas/logo/usulider.png" data-RUC="'.$fila_n8["ruc"].'" data-Correo="'.$fila_n8["correo"].'" data-Celular="'.$fila_n8["telefono"].'" data-Posicion="'.$fila_n8["posicion"].'" data-Categoria="'.$categoria.'" class="item">'.$fila_n8["nombre"]." ".$fila_n8["apellidopaterno"]." ".$fila_n8["apellidomaterno"].'</div>';
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
                                        //$js_json_9.='{"id":"'.$fila_n9["ruc"].'","pid":"'.$fila_n8["ruc"].'","Nombres":"'.$fila_n9["nombre"]." ".$fila_n9["apellidopaterno"]." ".$fila_n9["apellidomaterno"].'","img":"https://intranet.prolife.pe/imas/logo/usulider.png","RUC":"'.$fila_n9["ruc"].'","Correo":"'.$fila_n9["correo"].'","Celular":"'.$fila_n9["telefono"].'","Posicion":"'.$fila_n9["posicion"].'","Categoria":"'.$categoria.'"},';
                                        $js_json_9.='<div id="'.$fila_n9["ruc"].'" data-id="'.$fila_n9["ruc"].'" data-Nombres="'.$fila_n9["nombre"]." ".$fila_n9["apellidopaterno"]." ".$fila_n9["apellidomaterno"].'" data-img="https://intranet.prolife.pe/imas/logo/usulider.png" data-RUC="'.$fila_n9["ruc"].'" data-Correo="'.$fila_n9["correo"].'" data-Celular="'.$fila_n9["telefono"].'" data-Posicion="'.$fila_n9["posicion"].'" data-Categoria="'.$categoria.'" class="item">'.$fila_n9["nombre"]." ".$fila_n9["apellidopaterno"]." ".$fila_n9["apellidomaterno"].'</div>';
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
/*$htmlsincoma = substr($htmlcompleto, 0, -1);

$html='['.$htmlsincoma.']';*/
echo $htmlcompleto;
exit();
?>
