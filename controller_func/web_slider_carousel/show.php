<?php
include_once("../../model_class/web_slider_carousel.php");
$obj_web_slider_carousel = new web_slider_carousel();
$obj_web_slider_carousel->id_web_slider_carousel=$_REQUEST["id"];
$obj_web_slider_carousel->consult();
if($obj_web_slider_carousel->estado == 1){
  $estado="Activo";
  $ico='<i class="fas fa-toggle-on"></i>';
} else {
  $estado="Inactivo";
  $ico='<i class="fas fa-toggle-off"></i>';
} 
?>
<div class="row"> 
                <input type="hidden" name="id" value="<?php echo $obj_web_slider_carousel->id_web_slider_carousel; ?>">
                <div class="col-4">
                    <label for="slt_posicion_imagen">Posición Imagen<i class="text-danger" title="Seleccione Posición Imagen">*</i> </label>
                    <label class="text-danger msj-slt_posicion_imagen"></label>
                    <div class="input-group mb-2">
                    <div class="input-group-prepend">
                        <span class="input-group-text"><i class="fab fa-product-hunt"></i></span>
                    </div>
                    <select class="form-control" name="slt_posicion_imagen" id="slt_posicion_imagen">
                        <option value="0">SELECCIONAR POSICIÓN IMAGEN</option> 
                        <option <?php if ($obj_web_slider_carousel->posicion_imagen==1){ echo "selected"; }?> value="1">Izquierda</option>
                        <option <?php if ($obj_web_slider_carousel->posicion_imagen==2){ echo "selected"; }?> value="2">Derecha</option>
                    </select>
                    </div>
                </div>
                <div class="col-4">
                    <label for="txt_titulo_h1">Título H1<i class="text-danger"></i></label>
                    <label class="text-danger msj_txt_titulo_h1"></label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                        </div>
                        <input type="text" class="form-control valid fntValidTextSpecial"  id="txt_titulo_h1" name="txt_titulo_h1" value="<?php echo $obj_web_slider_carousel->h1; ?>"/>
                    </div>
                </div>
                <div class="col-4">
                    <label for="txt_span">Span<i class="text-danger"></i></label>
                    <label class="text-danger msj_txt_span"></label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                        </div>
                        <input type="text" class="form-control valid fntValidTextSpecial"  id="txt_span" name="txt_span" value="<?php echo $obj_web_slider_carousel->span; ?>"/>
                    </div>
                </div>
                <div class="col-4">
                    <label for="txt_parrafo">Párrafo<i class="text-danger"></i></label>
                    <label class="text-danger msj_txt_parrafo"></label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                        </div>
                        <input type="text" class="form-control valid fntValidTextSpecial"  id="txt_parrafo" name="txt_parrafo" value="<?php echo $obj_web_slider_carousel->parrafo; ?>"/>
                    </div>
                </div>
                <div class="col-4">
                    <label for="txt_desc_boton_1">Descripción del boton 1<i class="text-danger"></i></label>
                    <label class="text-danger msj_txt_desc_boton_1"></label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                        </div>
                        <input type="text" class="form-control valid fntValidTextSpecial"  id="txt_desc_boton_1" name="txt_desc_boton_1" value="<?php echo $obj_web_slider_carousel->boton_1_desc; ?>"/>
                    </div>
                </div>
                <div class="col-4">
                    <label for="txt_desc_boton_2">Descripción del boton 2<i class="text-danger"></i></label>
                    <label class="text-danger msj_txt_desc_boton_2"></label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                        </div>
                        <input type="text" class="form-control valid fntValidTextSpecial"  id="txt_desc_boton_2" name="txt_desc_boton_2" value="<?php echo $obj_web_slider_carousel->boton_2_desc; ?>"/>
                    </div>
                </div>
                <div class="col-4">
                    <label for="txt_enlace_boton_1">Enlace Boton 1<i class="text-danger"></i></label>
                    <label class="text-danger msj_txt_enlace_boton_1"></label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                        </div>
                        <input type="text" class="form-control valid fntValidTextSpecial"  id="txt_enlace_boton_1" name="txt_enlace_boton_1" value="<?php echo $obj_web_slider_carousel->boton_1_enlace; ?>"/>
                    </div>
                </div>
                <div class="col-4">
                    <label for="txt_enlace_boton_2">Enlace Boton 2<i class="text-danger"></i></label>
                    <label class="text-danger msj_txt_enlace_boton_2"></label>
                    <div class="input-group mb-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-align-left"></i></span>
                        </div>
                        <input type="text" class="form-control valid fntValidTextSpecial"  id="txt_enlace_boton_2" name="txt_enlace_boton_2" value="<?php echo $obj_web_slider_carousel->boton_2_enlace; ?>"/>
                    </div>
                </div>
                <div class="col-4">
                        <label for="txt_estado">Estado<label class="text-danger msj-txt-inf"></label>  </label>
                        <div class="input-group mb-2">
                        <div class="input-group-prepend ">
                        <span class="input-group-text"><?php echo $ico; ?></i></span>
                        </div>
                            <input type="text" class="form-control" value="<?php echo $estado; ?>"/>
                        </div>
                </div>

                <div class="col-4">
                        <label >Última actualización</label>
                        
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            </div>
                            <input type="text" class="form-control"  
                            value="<?php echo $obj_web_slider_carousel->fechaactualiza; ?>"/>
                        </div>
                </div>

                <div class="col-4">
                        <label >Fecha creación</label>
                        
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="fas fa-calendar"></i></span>
                            </div>
                            <input type="text" class="form-control"  
                            value="<?php echo $obj_web_slider_carousel->fecharegistro; ?>"/>
                        </div>
                </div>

                <div class="col-4">
                        <label >Actualizado por</label>
                        
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control"  
                            value="<?php echo $obj_web_slider_carousel->id_usuarioactualiza; ?>"/>
                        </div>
                </div>
                
                <div class="col-4">
                        <label >Creado por</label>
                        
                        <div class="input-group mb-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text"><i class="far fa-user"></i></span>
                            </div>
                            <input type="text" class="form-control"  
                            value="<?php echo $obj_web_slider_carousel->id_usuarioregistro; ?>"/>
                        </div>
                </div>  
</div>