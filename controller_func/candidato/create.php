<?php
session_start();
setlocale(LC_ALL,"es_ES@euro","es_PE","esp");
date_default_timezone_set('America/Lima');
setlocale(LC_TIME, 'es_PE.utf8');
include_once("../../model_class/candidato.php");
include_once("../../model_class/ubigeo_peru_departments.php");
include_once("../../model_class/ubigeo_peru_provinces.php");
include_once("../../model_class/ubigeo_peru_districts.php");
include_once("../../model_class/tipo_documento.php");
include_once("../../model_class/genero.php");
include_once("../../model_class/estado_candidato.php");

$obj_d=new ubigeo_peru_departments();
$obj_p=new ubigeo_peru_provinces();
$obj_dis=new ubigeo_peru_districts();
$obj=new candidato();
$obj_t_d=new tipo_documento();
$obj_gen= new genero();
$obj_e_c=new estado_candidato();
$obj->id_candidato=$_REQUEST["id"];
$obj->consult();
?>
<div class="row">
    <input type="hidden" name="id" value="<?php echo $obj->id_candidato; ?>">
  <div class="col-4">
    <label for="txtnombre">Nombres <i class="text-danger" title="Complete este campo">*</i><label class="text-danger msj-txtnombre"></label></label>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="far fa-user"></i></span>
        </div>
        <input type="hidden" name="es" id="es" value="1">
        <input type="hidden" name="tiuser" id="tiuser" value="1">
        <input type="hidden" name="hdnid" id="hdnid" value="<?php echo $_GET["id"];?>">
        <input type="text" class="form-control" placeholder="Enter Nombre" id="txtnombre" name="txtnombre" value="<?php echo $obj->nombre;?>">
    </div>
  </div>
  <div class="col-4">
    <label for="txtapep">Apellido paterno <i class="text-danger" title="Complete este campo">*</i><label class="text-danger msj-txtapep"></label></label>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="far fa-user"></i></span>
        </div>
        <input type="text" class="form-control" placeholder="Enter Apellido paterno" id="txtapep" name="txtapep" 
        value="<?php echo $obj->apellidopaterno;?>">
    </div>
  </div>
  <div class="col-4">
    <label for="txtapem">Apellido materno <i class="text-danger" title="Complete este campo">*</i><label class="text-danger msj-txtapem"></label></label>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="far fa-user"></i></span>
        </div>
        <input type="text" class="form-control" placeholder="Enter Apellido materno" id="txtapem" name="txtapem" 
        value="<?php echo $obj->apellidomaterno;?>">
    </div>
  </div>
  <div class="col-4">
        <label for="slt_t_d">Tipo de documento <i class="text-danger" title="Seleccione Tipo documento">*</i> </label>
        <label class="text-danger msj-slt_t_d"></label>
        <div class="input-group mb-2">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
        </div>
        <select class="form-control select_select" name="slt_t_d" id="slt_t_d">
            <option value="0">SELECIONAR</option>
            <?php $rs_tipo_document=$obj_t_d->combo();
                while($fila=mysqli_fetch_assoc($rs_tipo_document)){
            ?>
            <option <?php if($obj->id_tipo_documento==$fila["id_tipo_documento"]){ echo "selected";}?> value="<?php echo $fila["id_tipo_documento"]?>"><?php echo $fila["tipo_documento"]?></option>
                <?php }?>
        </select>
        </div>
    </div>
  <div class="col-4">
    <label for="txtnro_doc">Nro documento<i class="text-danger" title="Complete este campo">*</i><label class="text-danger msj-txtdni"></label></label>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fas fa-at"></i></span>
        </div>
        <input type="number" class="form-control" placeholder="Enter Nro doc" id="txtnro_doc" name="txtnro_doc" value="<?php echo $obj->nro_documento;?>">
    </div>
  </div>

  <div class="col-4">
    <label for="txttelefono">Teléfono<i class="text-danger" title="Complete este campo">*</i><label class="text-danger msj-txttelefono"></label></label>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fas fa-at"></i></span>
        </div>
        <input type="number" class="form-control" placeholder="Enter Telefono" id="txttelefono" name="txttelefono" value="<?php echo $obj->telefono;?>">
    </div>
  </div>

  <div class="col-4">
    <label for="txtcorreo">Correo electronico<i class="text-danger" title="Complete este campo">*</i><label class="text-danger msj-txtcorreo"></label></label>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fas fa-at"></i></span>
        </div>
        <input type="email" class="form-control" placeholder="Enter Correo" id="txtcorreo" name="txtcorreo" value="<?php echo $obj->correo;?>">
    </div>
  </div>

  <div class="col-4" >
      <label for="sltdepartamento" >Departamento<i class="text-danger" title="Complete este campo">*</i><label class="text-danger msj-sltdepartamento"></label></label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>               
          </div>           
          <select class="form-control select_dep" id="sltdepartamento" name="sltdepartamento" style="width: 70%;">
            <option  value="0" >.::Elige::.</option>
            <?php
              $rs_d=$obj_d->combo();
              while($fila_d=mysqli_fetch_assoc($rs_d)){
              ?>
              <option  value="<?php echo $fila_d["id"]?>" <?php if($obj->id_dep==$fila_d["id"]){echo "selected ";}?>><?php echo $fila_d["name"]?></option>
            <?php }?>
          </select>
          
      </div>
    </div>

    <div class="col-4">
      <label for="sltprovincia" >Provincia<i class="text-danger" title="Complete este campo">*</i><label class="text-danger msj-sltprovincia"></label></label>
      <div class="input-group mb-3">   
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>               
          </div>           
          <select class="form-control select_pro" id="sltprovincia" name="sltprovincia" style="width: 70%;">
            <option  value="0" >.::Elige::.</option>
              <?php
                $obj_p->department_id=$obj->id_dep;
                $rs_p=$obj_p->combo();
                while($fila_p=mysqli_fetch_assoc($rs_p)){
                ?>
                <option  value="<?php echo $fila_p["id"]?>" <?php if($obj->id_pro==$fila_p["id"]){echo "selected ";}?>><?php echo $fila_p["name"]?></option>
              <?php }?>
          </select>              
      </div>
    </div>

    <div class="col-4" >
      <label for="sltdistrito" >Distrito <i class="text-danger" title="Complete este campo">*</i><label class="text-danger msj-sltdistrito"></label></label>
      <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="fas fa-map-marker-alt"></i></span>               
          </div>              
          <select class="form-control select_dis" id="sltdistrito" name="sltdistrito" style="width: 70%;">
            <option  value="0" >.::Elige::.</option>
                <?php
                  $obj_dis->department_id=$obj->id_dep;
                  $obj_dis->province_id=$obj->id_pro;
                  $rs_dis=$obj_dis->combo();
                  while($fila_dis=mysqli_fetch_assoc($rs_dis)){
                  ?>
                  <option  value="<?php echo $fila_dis["id"]?>" <?php if($obj->id_dis==$fila_dis["id"]){echo "selected ";}?>><?php echo $fila_dis["name"]?></option>
                <?php }?>
          </select>
          
      </div>
    </div>    

    <div class="col-4">
          <label for="sltgenero">Genero<i class="text-danger" title="Ingrese el slt genero">*</i></label>
          <label class="text-danger msj_txt_sltgenero"></label>
        <div class="input-group mb-2">
            <div class="input-group-prepend">
                <span class="input-group-text"><i class="fas fa-align-left"></i></span>
            </div>
            <select class="form-control " name="sltgenero" id="sltgenero" >
            <option value="0">SELECCIONAR</option>
            <?php $res= $obj_gen->combo();
                  while($fila= mysqli_fetch_assoc($res)){  ?>
                  <option <?php if($obj->id_genero==$fila["id_genero"]){
                      echo "selected"; }?> value="<?php echo $fila["id_genero"]; ?>"><?php echo $fila["genero"]; ?></option>
                      <?php }?>
                      
            </select>
          </div>
  </div>

  <div class="col-3">
    <label for="txtfechanac">Fecha nacimiento<i class="text-danger" title="Complete este campo">*</i>
    <label class="text-danger msj-txtfechanac"></label></label>
    <div class="input-group mb-3">                        
        <div class="input-group-prepend">
          <span class="input-group-text" id="span_rango_fecha">
            <i class="far fa-calendar-alt text-info "></i>
          </span>
        </div>    
          <?php  if($obj->fecha_nacimiento=="1900-01-01" || $obj->fecha_nacimiento==""){?>                  
          <input type="text" class="form-control float-right" id="txtfechanac" name="txtfechanac" autocomplete="off" 
          placeholder="00-00-0000" value="01-01-1990">          
        <?php }else{?>
          <input type="text" class="form-control float-right" id="txtfechanac" name="txtfechanac" 
          autocomplete="off" placeholder="AAAA-MM-DD" value="<?php echo date('d-m-Y',strtotime($obj->fecha_nacimiento));?>"> 
        <?php }?>  
    </div>
  </div>   

 
 
    <div class="col-4" id="divsltrel">
    <label for="sltrelacion">¿Relación del candidato con el reclutador? <i class="text-danger" title="Complete este campo">*</i>
    <label class="text-danger msj-sltrelacion"></label></label>
      <div class="input-group mb-3">
        <div class="input-group-prepend">
              <span class="input-group-text"><i class="fas fa-users-cog"></i></span>
            </div>
            <select class="form-control select_rel" style="width: 80%;" id="sltrelacion" name="sltrelacion">
              <option  value="0" <?php if($obj->relacion_candidato_reclutador=="" || $obj->relacion_candidato_reclutador=="0"){echo "selected";}?>
              >.::Elige::.</option>                  
              <option  value="Familiar" <?php if($obj->relacion_candidato_reclutador=="Familiar"){echo "selected";}?>>Familiar</option>                  
              <option  value="Amical" <?php if($obj->relacion_candidato_reclutador=="Amical"){echo "selected";}?>>Amical</option>                  
              <option  value="Referido" <?php if($obj->relacion_candidato_reclutador=="Referido"){echo "selected";}?>>Referido</option>                  
              <option  value="(Ex) compañeros de trabajo" <?php if($obj->relacion_candidato_reclutador=="(Ex) compañeros de trabajo"){echo "selected";}?>>
              (Ex) compañeros de trabajo</option>       
              <option  value="Otro" <?php if($obj->relacion_candidato_reclutador!="Familiar" && $obj->relacion_candidato_reclutador!="Amical" &&
              $obj->relacion_candidato_reclutador!="Referido" && $obj->relacion_candidato_reclutador!="(Ex) compañeros de trabajo" && 
              $obj->relacion_candidato_reclutador!="" && $obj->relacion_candidato_reclutador!="0"){echo "selected";}?>>Otro</option>             
            </select>
      </div>
    </div>

    <div class="col-3" id="divtxtrel">
      <label for="txtrelacion">Detalle una breve descripción <i class="text-warning" title="Complete este campo">*</i>
      <label class="text-danger msj-txtrelacion"></label></label>
      <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="far fa-user"></i></span>
          </div>
          <input type="hidden" name="es" id="es" value="1">
          <input type="hidden" name="tiuser" id="tiuser" value="1">
          <input type="hidden" name="hdnid" id="hdnid" value="<?php echo $_GET["id"];?>">
          <?php if($obj->relacion_candidato_reclutador!="Familiar" && $obj->relacion_candidato_reclutador!="Amical" &&
              $obj->relacion_candidato_reclutador!="Referido" && $obj->relacion_candidato_reclutador!="(Ex) compañeros de trabajo" && 
              $obj->relacion_candidato_reclutador!="" && $obj->relacion_candidato_reclutador!="0"){?>
          <input type="text" class="form-control" placeholder="¿Relación del candidato con el reclutador?" id="txtrelacion" 
          name="txtrelacion" value="<?php echo $obj->relacion_candidato_reclutador;?>">
          <?php }else{?>          
          <input type="text" class="form-control" disabled placeholder="¿Relación del candidato con el reclutador?" id="txtrelacion" 
          name="txtrelacion" value="">
          <?php }?>
      </div>
    </div>

    <div class="col-5" >
      <label for="txt_motiva_negocio">¿Qué motiva a tu candidato a formar parte de tu negocio?<i class="text-danger" title="Complete este campo">*</i>
      <label class="text-danger msj-txt_motiva_negocio"></label></label>
      <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="far fa-user"></i></span>
          </div>    
          <input type="text" class="form-control" placeholder="Detalle" id="txt_motiva_negocio" name="txt_motiva_negocio" 
          value="<?php echo $obj->motiva_negocio;?>">
      </div>
    </div>

    <div class="col-4" id="divsltexpcomer">
      <label for="slt_experiencia_comercial">¿Qué experiencia comercial tiene tu candidato?<i class="text-danger" title="Complete este campo">*</i>
      <label class="text-danger msj-slt_experiencia_comercial"></label></label>
      <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="far fa-user"></i></span>
          </div>    
          <select class="form-control select_expcom" style="width: 80%;" id="slt_experiencia_comercial" name="slt_experiencia_comercial">
              <option  value="0" <?php if($obj->experiencia_comercial=="" || $obj->experiencia_comercial=="0"){echo "selected";}?>
              >.::Elige::.</option>                  
              <option  value="Venta de seguros" <?php if($obj->experiencia_comercial=="Venta de seguros"){echo "selected";}?>>Venta de seguros</option>                  
              <option  value="Venta de creditos y tarjetas" <?php if($obj->experiencia_comercial=="Venta de creditos y tarjetas"){echo "selected";}?>>
              Venta de creditos y tarjetas</option>                  
              <option  value="Otro" <?php if($obj->experiencia_comercial!="Venta de seguros" && $obj->experiencia_comercial!="Venta de creditos y tarjetas"
               && $obj->experiencia_comercial!="" && $obj->experiencia_comercial!="0"){echo "selected";}?>>Otros</option>             
            </select>
      </div>
    </div>


    <div class="col-3" id="divtxtexpcomer">
      <label for="txt_experiencia_comercial">Detalle una breve descripción <i class="text-warning" title="Complete este campo">*</i>
      <label class="text-danger msj-txt_experiencia_comercial"></label></label>
      <div class="input-group mb-3">
          <div class="input-group-prepend">
            <span class="input-group-text"><i class="far fa-user"></i></span>
          </div>
          <?php if($obj->experiencia_comercial!="Venta de seguros" && $obj->experiencia_comercial!="Venta de creditos y tarjetas"
               && $obj->experiencia_comercial!="" && $obj->experiencia_comercial!="0"){?>
          <input type="text" class="form-control" placeholder="¿Qué experiencia comercial tiene tu candidato?" id="txt_experiencia_comercial" 
          name="txt_experiencia_comercial" value="<?php echo $obj->experiencia_comercial;?>">
          <?php }else{?>          
          <input type="text" class="form-control" disabled placeholder="¿Qué experiencia comercial tiene tu candidato?" id="txt_experiencia_comercial" 
          name="txt_experiencia_comercial" value="">
          <?php }?>
      </div>
    </div>

    <div class="col-12">
      <div class="card card-outline card-success"></div>
    </div> 

    <div class="col-5" >
      <label for="r_cartera_cliente_entorno">¿Tu candidato cuenta con cartera de clientes y/o entorno?
        <i class="text-danger" title="Complete este campo">*</i>
      <label class="text-danger msj-r_cartera_cliente_entorno"></label></label>
      <div class="input-group mb-3">
          <!-- radio -->
          <div class="form-group clearfix ">
              <div class="icheck-success d-inline">
                <?php if($obj->cartera_cliente_entorno=="Si"){?>
                <input type="radio" name="r_cartera_cliente_entorno" checked id="r_cartera_cliente_entorno_1" value="Si">
                <?php  }else{?>
                <input type="radio" name="r_cartera_cliente_entorno" id="r_cartera_cliente_entorno_1" value="Si">
                <?php }?>
                <label for="r_cartera_cliente_entorno_1">                
                  Si
                </label>
              </div>
              <div class="icheck-success d-inline">
                <?php if($obj->cartera_cliente_entorno=="No"){?>
                <input type="radio" name="r_cartera_cliente_entorno" checked id="r_cartera_cliente_entorno_2" value="No">
                <?php  }else{?>
                <input type="radio" name="r_cartera_cliente_entorno" id="r_cartera_cliente_entorno_2" value="No">
                <?php }?>   
                <label for="r_cartera_cliente_entorno_2">
                  No
                </label>
              </div>
          </div>
      </div>
    </div>


    <div class="col-7" >
      <label for="r_disponibilidad_gestion_negocio">¿Tu candidato cuenta con disponibilidad de tiempo para gestionar tu negocio?
        <i class="text-danger" title="Complete este campo">*</i>
      <label class="text-danger msj-r_disponibilidad_gestion_negocio"></label></label>
      <div class="input-group mb-3">
          <!-- radio -->
          <div class="form-group clearfix ">
              <div class="icheck-success d-inline">
                <?php if($obj->disponibilidad_gestion_negocio=="Si"){?>
                <input class="r_disponibilidad_gestion_negocio" type="radio" name="r_disponibilidad_gestion_negocio" 
                checked id="r_disponibilidad_gestion_negocio_1" value="Si">
                <?php  }else{?>
                <input class="r_disponibilidad_gestion_negocio" type="radio" name="r_disponibilidad_gestion_negocio" 
                id="r_disponibilidad_gestion_negocio_1" value="Si">
                <?php }?>
                <label for="r_disponibilidad_gestion_negocio_1">
                  Si
                </label>
              </div>
              <div class="icheck-success d-inline">
                <?php if($obj->disponibilidad_gestion_negocio=="No"){?>
                <input class="r_disponibilidad_gestion_negocio" type="radio" name="r_disponibilidad_gestion_negocio" 
                checked id="r_disponibilidad_gestion_negocio_2" value="No">
                <?php  }else{?>
                <input class="r_disponibilidad_gestion_negocio" type="radio" name="r_disponibilidad_gestion_negocio" 
                id="r_disponibilidad_gestion_negocio_2" value="No">
                <?php }?>
                <label for="r_disponibilidad_gestion_negocio_2">
                  No
                </label>
              </div>
          </div>
      </div>
    </div>

    <div class="col-12" >
      <label for="checkbox_horario_gestion_negocio">¿En qué horario gestionarás con tu invitado tu negocio? (puede marcar más de una opción)
        <i class="text-warning" title="Complete este campo">*</i>
      <label class="text-danger msj-checkbox_horario_gestion_negocio"></label></label>
      <div class="input-group mb-3">
          <div class="form-group clearfix">
            <?php if($obj->disponibilidad_gestion_negocio=="Si"){?>
                <div class="icheck-success d-inline">
                  <?php if($obj->horario_gestion_negocio=="M" || $obj->horario_gestion_negocio=="MT" || $obj->horario_gestion_negocio=="MN" 
                  || $obj->horario_gestion_negocio=="MTN"){?>
                  <input type="checkbox" id="checkbox_horario_gestion_negocio_1" name="checkbox_horario_gestion_negocio_1" checked value="M">
                  <?php  }else{?>
                  <input type="checkbox" id="checkbox_horario_gestion_negocio_1" name="checkbox_horario_gestion_negocio_1" value="M">
                  <?php  }?>
                  <label for="checkbox_horario_gestion_negocio_1">
                    Mañana
                  </label>
                </div>
                <div class="icheck-success d-inline">
                  <?php if($obj->horario_gestion_negocio=="T" || $obj->horario_gestion_negocio=="MT" || $obj->horario_gestion_negocio=="TN" 
                  || $obj->horario_gestion_negocio=="MTN"){?>
                  <input type="checkbox" id="checkbox_horario_gestion_negocio_2" name="checkbox_horario_gestion_negocio_2"  checked value="T">
                  <?php  }else{?>
                  <input type="checkbox" id="checkbox_horario_gestion_negocio_2" name="checkbox_horario_gestion_negocio_2"  value="T">
                  <?php  }?>
                  <label for="checkbox_horario_gestion_negocio_2">
                    Tarde
                  </label>
                </div>
                <div class="icheck-success d-inline">
                  <?php if($obj->horario_gestion_negocio=="N" || $obj->horario_gestion_negocio=="MN" || $obj->horario_gestion_negocio=="TN" 
                  || $obj->horario_gestion_negocio=="MTN"){?>
                  <input type="checkbox"  id="checkbox_horario_gestion_negocio_3" name="checkbox_horario_gestion_negocio_3"  checked value="N">
                  <?php  }else{?>
                  <input type="checkbox"  id="checkbox_horario_gestion_negocio_3" name="checkbox_horario_gestion_negocio_3"  value="N">
                  <?php  }?>
                  <label for="checkbox_horario_gestion_negocio_3">
                    Noche
                  </label>
                </div>
             <?php  }else{?>

                <div class="icheck-success d-inline">
                  <?php if($obj->horario_gestion_negocio=="M" || $obj->horario_gestion_negocio=="MT" || $obj->horario_gestion_negocio=="MN" 
                  || $obj->horario_gestion_negocio=="MTN"){?>
                  <input type="checkbox" id="checkbox_horario_gestion_negocio_1" name="checkbox_horario_gestion_negocio_1" checked value="M" disabled>
                  <?php  }else{?>
                  <input type="checkbox" id="checkbox_horario_gestion_negocio_1" name="checkbox_horario_gestion_negocio_1" value="M" disabled>
                  <?php  }?>
                  <label for="checkbox_horario_gestion_negocio_1">
                    Mañana
                  </label>
                </div>
                <div class="icheck-success d-inline">
                  <?php if($obj->horario_gestion_negocio=="T" || $obj->horario_gestion_negocio=="MT" || $obj->horario_gestion_negocio=="TN" 
                  || $obj->horario_gestion_negocio=="MTN"){?>
                  <input type="checkbox" id="checkbox_horario_gestion_negocio_2" name="checkbox_horario_gestion_negocio_2" checked value="T" disabled>
                  <?php  }else{?>
                  <input type="checkbox" id="checkbox_horario_gestion_negocio_2" name="checkbox_horario_gestion_negocio_2" value="T" disabled>
                  <?php  }?>
                  <label for="checkbox_horario_gestion_negocio_2">
                    Tarde
                  </label>
                </div>
                <div class="icheck-success d-inline">
                  <?php if($obj->horario_gestion_negocio=="N" || $obj->horario_gestion_negocio=="MN" || $obj->horario_gestion_negocio=="TN" 
                  || $obj->horario_gestion_negocio=="MTN"){?>
                  <input type="checkbox"  id="checkbox_horario_gestion_negocio_3" name="checkbox_horario_gestion_negocio_3" checked value="N" disabled>
                  <?php  }else{?>
                  <input type="checkbox"  id="checkbox_horario_gestion_negocio_3" name="checkbox_horario_gestion_negocio_3" value="N" disabled>
                  <?php  }?>
                  <label for="checkbox_horario_gestion_negocio_3">
                    Noche
                  </label>
                </div>

              <?php  }?>

          </div>
      </div>
    </div>

    <div class="col-12">
      <div class="card card-outline card-success"></div>
    </div> 
    
    

    <div class="col-8">
    <label for="txtobservacion">Observación </label>
    <div class="input-group mb-3">
        <div class="input-group-prepend">
          <span class="input-group-text"><i class="fas fa-at"></i></span>
        </div>
        <input type="email" class="form-control" placeholder="Enter" id="txtobservacion" name="txtobservacion" value="<?php echo $obj->observacion;?>">
    </div>
  </div>

</div>           
<!-- page script -->
<script>
  
  $(function () {
    moment.locale('es');
    //Initialize Select2 Elements
    $('.select_dep').select2({theme: 'bootstrap4'});$('.select_pro').select2({theme: 'bootstrap4'});
    $('.select_dis').select2({theme: 'bootstrap4'});$('#sltgenero').select2({theme: 'bootstrap4'});
    $('.select_lid').select2({theme: 'bootstrap4'});$('.select_rec').select2({theme: 'bootstrap4'});
    $('.select_rel').select2({theme: 'bootstrap4'});$('#slt_e_c').select2({theme: 'bootstrap4'});
    $('.select_expcom').select2({theme: 'bootstrap4'});    
    
    $('#txtfechanac').daterangepicker({
      autoUpdateInput: false,
      singleDatePicker: true,
      showDropdowns: true,
      minYear: 1950,
      maxYear: 2002
    });

    $('#txtfechanac').on('apply.daterangepicker', function(ev, picker) {
      $(this).val(picker.startDate.format('DD-MM-YYYY'));
    });

  });

</script>