/*Tiempo Carga de Datos*/
function cargar_data(){
    let timerInterval
    Swal.fire({
      title: 'Creando Tabla de Datos',
      html: 'Cargando... <b></b>',
      timer: timerInterval,
      onBeforeOpen: () => {
        Swal.showLoading()
    timerInterval = setInterval(() => {
      const content = Swal.getContent()
      if (content) {
        const b = content.querySelector('b')
        if (b) {
          b.textContent = Swal.getTimerLeft()
        }
      }
    }, 100)
      },
      onClose: () => {
        clearInterval(timerInterval)
      }
    }).then((result) => {
      if (
        /* Read more about handling dismissals below */
        result.dismiss === Swal.DismissReason.timer

      ) {
        console.log('Estaba cerrado por el temporizador')
      }
    })
}



function editararbolvirtual_rep(){

    var txtruc_buscar=$("#txtruc_buscar").val();
    var dataString = {"txtruc_buscar":txtruc_buscar}; 

    $.get({url:"controller_func/solicitud_arbol_virtual/consultar_edit.php",data: dataString,type: 'POST'}).done(function (response) {

        var nodes = JSON.parse(response);
        OrgChart.templates.diva.field_number_children = '<circle cx="60" cy="80" r="15" fill="#F57C00"></circle><text fill="#ffffff" x="60" y="85" text-anchor="middle">{val}</text>';
        OrgChart.templates.diva.button = '<button id="undo">Deshacer</button>';
        OrgChart.slinkTemplates.blue.link = '<path class="path1"  stroke-dasharray="4, 2" marker-start="url(#dotSlinkBlue)" marker-end="url(#arrowSlinkBlue)" stroke-linejoin="round" stroke="#039BE5" stroke-width="2" fill="none" d="{d}" />';
        OrgChart.templates.diva.link = '<path stroke-linejoin="round" stroke="#28a745" stroke-width="10" fill="none" d="M{xa},{ya} {xb},{yb} {xc},{yc} L{xd},{yd}"/>' +
        '<path class="path" stroke-width="4" fill="none" stroke="#ffffff" stroke-dasharray="10"  d="M{xa},{ya} {xb},{yb} {xc},{yc} L{xd},{yd}"/>';
        var array = [];
        var movingNode = {}; 
    
        for (var i = 0; i < nodes.length; i++){
            var node = nodes[i];
            switch (node.id) {
                case "1":
                    node.tags = ["Lider"];
                    break;
                default:
                    node.tags = ["Mired"];
                    break;
            }
        }
  
        var iterate = function (c, n, args){
            args.count += n.childrenIds.length;
            for(var i = 0; i < n.childrenIds.length; i++){    
                var node = c.getNode(n.childrenIds[i]);
                iterate(c, node, args);  
            }
        }  
        
        
         
        var chart = new OrgChart(document.getElementById("tree"), {
            
            template: "diva",
            toolbar: {
            layout: true,
            zoom: true,
            fit: true,
            expandAll: false,
            fullScreen:true
            },
            menu: {
            JSONexport: {                
                text: 'Guardar Cambios',
                icon: '<img src="https://easypdf.com/images/easypdf-logo-256.png" height="15" width="20">',
                onClick:JSONexport
            },
            pdfPreview: { 
                text: "PDF Preview", 
                icon: OrgChart.icon.pdf(24,24, '#7A7A7A'),
                onClick: preview
            },
            export_pdf: {
                text: "Export PDF",
                icon: OrgChart.icon.pdf(24, 24, "#7A7A7A"),
                onClick: pdf_lider
            },
            ReDibujar: {
                text: "Re-Dibujar Red",
                icon: OrgChart.icon.pdf(24, 24, "#7A7A7A"),
                onClick: re_dibujar_red
            } 
            
            },
            layout: OrgChart.normal,        
            align: OrgChart.ORIENTATION,
            scaleInitial: OrgChart.match.boundary,
            enableDragDrop: true,                
            nodeBinding: {
                field_0: "Nombres",
                field_1: "RUC",
                img_0: "img",
                field_number_children:  function (sender, node) {	
                var args = {count: 0 };
                iterate(sender, node, args);
                return args.count + 1;
                }
            },
            nodeMenu: {
            remove: { text: "Eliminar Representante"},
            export_pdf: {
                text: "Export PDF",
                icon: OrgChart.icon.pdf(24, 24, "#7A7A7A"),
                onClick: pdf_redes
            },
            ReDibujar: {
                text: "Re-Dibujar Red",
                icon: OrgChart.icon.pdf(24, 24, "#7A7A7A"),
                onClick: re_dibujar_red
            }   
            },
            nodes: nodes,
            slinks: [{from: 0, to: 1, template: 'blue'}, {from: 5, to: 7, template: 'blue'}]
        });      

        var tempNode = {};

        var getNodeData = function(tempNode, node) {
            tempNode.id = node.id;
            tempNode.pid = node.pid;
            tempNode.Nombres = node.Nombres;
            tempNode.RUC = node.RUC;
            tempNode.Correo = node.Correo;
            tempNode.Celular = node.Celular;
            tempNode.Posicion = node.Posicion;
            tempNode.Categoria = node.Categoria;
            tempNode.img = node.img;
            tempNode.tags = node.tags;
        }
        
        /**Intercambiar RUC */
        document.querySelector('#swap').addEventListener('click', function(){
            
            //alert("asas");
            var node1_RUC = document.getElementById("sltruc1").value;
            var node2_RUC = document.getElementById("sltruc2").value;
            var node1="";var node2="";

            for(var i=0;i<nodes.length;i++){
                //console.log(nodes[i].RUC);
                if(nodes[i].RUC==node1_RUC){
                    /*console.log("Primer Select");     
                    console.log(nodes[i].Nombres);     
                    console.log(nodes[i].RUC);     
                    console.log(nodes[i].pid);*/       
                    node1=i;
                    node1_pid=nodes[i].pid;
                    
                }
            }

            for(var i2=0;i2<nodes.length;i2++){
                //console.log(nodes[i2].RUC);
                if(nodes[i2].RUC==node2_RUC){
                    /*console.log("Segundo Select");     
                    console.log(nodes[i2].Nombres);     
                    console.log(nodes[i2].RUC);     
                    console.log(nodes[i2].pid);*/ 
                    node2=i2;
                    node2_pid=nodes[i2].pid;
                }
            }            
            //console.log("_________________________________"); 

            for(var ih1=0;ih1<nodes.length;ih1++){                
                if(nodes[ih1].pid==node1_RUC && nodes[ih1].RUC!=node1_RUC && nodes[ih1].RUC!=node2_RUC){
                    //console.log(nodes[ih1].Nombres);                                           
                    //console.log("su nuevo seria: "+node2_RUC);
                    nodes[ih1].pid=node2_RUC;
                }else if(nodes[ih1].pid==node2_RUC && nodes[ih1].RUC!=node2_RUC && nodes[ih1].RUC!=node1_RUC){
                    //console.log(nodes[ih1].Nombres);                    
                    //console.log("su nuevo seria: "+node1_RUC);
                    nodes[ih1].pid=node1_RUC;
                }                
            }

            
            if(nodes[node1].RUC==node2_pid){
                //console.log("su 1 seria: "+ nodes[node1].Nombres +"seria su pid:"+ node2_RUC);
                nodes[node1].pid=node2_RUC;
            }else{
                //console.log("su 1 seria: "+ nodes[node1].Nombres +"seria su pid:"+ node2_pid);
                nodes[node1].pid=node2_pid;
            }

            if(nodes[node2].RUC==node1_pid){
                //console.log("su 2 seria: "+ nodes[node2].Nombres +"seria su pid:"+ node1_RUC);
                nodes[node2].pid=node1_RUC;
            }else{
                //console.log("su 2 seria: "+ nodes[node2].Nombres +"seria su pid:"+ node1_pid);
                nodes[node2].pid=node1_pid;
            }
            
            chart.draw();
        }); 

        save_arbol_edit_back(chart.config.nodes);

        chart.on('exportstart', function(sender, args){         
            args.styles += '<link href="https://fonts.googleapis.com/css?family=Gochi+Hand" rel="stylesheet">';
            args.styles += document.getElementById('myStyles').outerHTML;
        });
      
        chart.on('remove', function (sender, nodeId, newPidsAndStpidsForIds) {
            // your code goes here 
            // return false; to cancel the operation;
            var nodeData = chart.get(nodeId);        
            var RUC = nodeData["RUC"];
            var Nombres = nodeData["Nombres"];
            var Posicion = nodeData["Posicion"];
            var pat = nodeData["pid"];
            console.log(nodeData);
            if(sender.nodes[nodeId]["children"].length>=2){
                toastr.error(Nombres+' tiene una red mayor a 2, elimine o mueva sus otros referidos');
                return false;
            }else{
                delete_ruc_arbol_virtual(Nombres,RUC,Posicion,pat);        
                return true;        
            }        
        }); 
  
        /**Esto elimina el texto de  field_number_children*/
        chart.editUI.on('field', function(sender, args){
            if (String(args.name).includes('args.count + 1')){
                        return false;
            }
        });
  
        chart.on('drag', function (sender, draggedNodeId) {                      
            var node = chart.get(draggedNodeId);
            draggedNodePid = node.pid;
            draggedNombres = node.Nombres;
            draggedRUC = node.RUC;
            draggedCorreo = node.Correo;
            draggedCelular = node.Celular;
            draggedPosicion = node.Posicion;
            draggedCategoria = node.Categoria;
            draggedimg = node.img;
            draggedtags = node.tags;        
            movingNode = {draggedNodeId, draggedNodePid, draggedNombres, draggedRUC, draggedCorreo, draggedCelular, draggedPosicion, draggedCategoria, draggedimg, draggedtags};
        });
  
        chart.on('drop', function (sender, draggedNodeId, droppedNodeId) {
            var node = chart.get(droppedNodeId);
            if(node.Categoria!="Diamante" && sender.nodes[droppedNodeId]["children"].length<=1){
                array.push(movingNode);
            }else if(node.Categoria!="Diamante" && sender.nodes[droppedNodeId]["children"].length<=2){
                array.push(movingNode);
            }else if(node.Categoria=="Diamante" && sender.nodes[droppedNodeId]["children"].length<=3){
                array.push(movingNode);
            }else{
                toastr.error('Representante es '+node.Categoria+', y tiene sus '+sender.nodes[droppedNodeId]["children"].length+' afiliados, mueva sus afiliados o proceda a eliminar');
                return false;
            }
            
        });
  
        function JSONexport(){      
            //console.log(JSON.stringify(chart.config.nodes));
            save_arbol_edit_rep(chart.config.nodes);    
        }
    
        function pdf_redes(nodeId) {
            var hoy = new Date();
            var fecha = hoy.getDate() + '' + ( hoy.getMonth() + 1 ) + '' + hoy.getFullYear();
            var hora = hoy.getHours() + '_' + hoy.getMinutes() + '_' + hoy.getSeconds();
            var nodeData = chart.get(nodeId);
            var Nombres = nodeData["Nombres"];
            var filename='Red-'+Nombres+'_'+fecha+'_'+hora+'.pdf';
            chart.exportPDF({
                format:'fit',
                header:'<img  src="https://prolife.pe/logo/logo.png" width="150px" height="100px" />',
                footer:'Pagina {current-page} de {total-pages}',
                filename:filename, 
                margin:[90, 20, 60, 20],
                expandChildren: true,
                nodeId: nodeId
            });
        }
  
        function pdf_lider() {
            var hoy = new Date();
            var fecha = hoy.getDate() + '' + ( hoy.getMonth() + 1 ) + '' + hoy.getFullYear();
            var hora = hoy.getHours() + '_' + hoy.getMinutes() + '_' + hoy.getSeconds();
            
            //console.log(nodes[0]["Nombres"]);
            var filename='Red-'+nodes[0]["Nombres"]+'_'+fecha+'_'+hora+'.pdf';
            chart.exportPDF({
                format:'fit',
                header:'<img  src="https://prolife.pe/logo/logo.png" width="150px" height="100px" />',
                footer:'Pagina {current-page} de {total-pages}',
                filename:filename, 
                margin:[90, 20, 60, 20],
                expandChildren: true
            });
        }
  
        function preview(){
            var hoy = new Date();
            var fecha = hoy.getDate() + '' + ( hoy.getMonth() + 1 ) + '' + hoy.getFullYear();
            var hora = hoy.getHours() + '_' + hoy.getMinutes() + '_' + hoy.getSeconds();
            var filename='Red-'+nodes[0]["Nombres"]+'_'+fecha+'_'+hora+'.pdf';         

            OrgChart.pdfPrevUI.show(chart, {
                format: 'A4',
                header: '<img  src="https://prolife.pe/logo/logo.png" width="150px" height="100px" />',
                margin: [90, 20, 60, 20],
                footer: 'Pagina {current-page} de {total-pages}',
                expandChildren: true,
                filename:filename
            });
        }

        function re_dibujar_red(nodeId){
            var nodeData = chart.get(nodeId);
            var RUC = nodeData["RUC"];
            $("#txtruc_re_dibujar").val(RUC);
            $("#frmedit_con_arbol_virtual_redibujar").submit();
             
        }
      
      
        var title = document.createElement("Button");
        //title.appendTo='#undo';      
        title.setAttribute("id", "undo");     
        title.style.position = 'absolute';
        title.style.top = '95.1%';
        title.style.right = '1%';
        title.style.width = '6%';
        title.style.height = '5%';
        title.style.textAlign = 'center';
        title.style.color = '#757575';
        title.innerHTML = 'Deshacer';          
        chart.element.appendChild(title);
                
        /**Deshacer Cambios */
        document.querySelector('#undo').addEventListener('click', function(){
            if (array.length > 0) {
                var undoNode = array.pop();
                //console.log(undoNode);
                var id = undoNode.draggedNodeId;
                var pid = undoNode.draggedNodePid;
                var Nombres = undoNode.draggedNombres;
                var RUC = undoNode.draggedRUC;
                var Correo = undoNode.draggedCorreo;
                var Celular = undoNode.draggedCelular;
                var Posicion = undoNode.draggedPosicion;
                var Categoria = undoNode.draggedCategoria;
                var img = undoNode.draggedimg;
                var tags = undoNode.draggedtags;
                chart.updateNode({id, pid, Nombres, RUC, Correo, Celular, Posicion, Categoria, img, tags});
            }
        });

    
      
    });   
    

}



/**Lista Eliminados Solicitud arbol virtual  */
function delete_ruc_arbol_virtual(Nombres,ruc,posicion,pat){
    var ruc=ruc;
    var posicion=posicion;
    var Nombres=Nombres;
    var pat=pat;  
    var txtruc_buscar=$("#txtruc_buscar").val();
    var txtnrosoli=$("#txtnrosoli").val();  
    var dataString = {"usuario":ruc,
                        "patrocinador":pat,
                        "posicion":posicion,
                        "nrosolicitud":txtnrosoli,
                        "txtruc_buscar":txtruc_buscar}

    $.ajax({
        type: 'POST',
        url:"controller_func/solicitud_arbol_virtual/delete_ruc.php",
        data: dataString
        }).done(function(info){
            if(info.trim()=="true"){
                list_eliminados();          
                toastr.success('Se elimino a '+ Nombres +' de  Ruc '+ ruc);            
            }else if(info.trim()=="auto"){     
                toastr.error('Accion no validada, comuniquese con el soporte Prolife');  
            }
            else{
                toastr.error('Error comuniquese con el soporte Prolife');
            }
        });    
}
  

/**Save Arbol Edit */
function save_arbol_edit_rep(datos_json){

    var txtruc_buscar=$("#txtruc_buscar").val();
    var txtnrosoli=$("#txtnrosoli").val();  
    $.ajax({
    type: 'POST',
    dataType: 'json',
    url:"controller_func/solicitud_arbol_virtual/save.php",
    data:{'datos':JSON.stringify(datos_json),"txtruc_buscar":txtruc_buscar,"txtnrosoli":txtnrosoli},
    beforeSend:function(){
        cargar_data();
        },
    complete:function(){
        Swal.close();
        },
    }).done(function(info){
        //console.log(info)
        if(info==true){           
            toastr.success('Se envio la solicitud correctamente, los datos pasaran a validación');
            window.location.replace('mis-solicitudes.php');      
        }else{
            toastr.error('Error comuniquese con el soporte Prolife');
        }
    });
}

/**Save Arbol Edit Back */
function save_arbol_edit_back(datos_json){
    var txtruc_buscar=$("#txtruc_buscar").val();
    var txtnrosoli=$("#txtnrosoli").val();  
    $.ajax({
    type: 'POST',
    dataType: 'json',
    url:"controller_func/solicitud_arbol_virtual/save_back.php",
    data:{'datos':JSON.stringify(datos_json),"txtruc_buscar":txtruc_buscar,"txtnrosoli":txtnrosoli}
    }).done(function(info){
        //console.log(info)
        if(info==true){           
            toastr.success('Arbol Virtual respaldado (backup)');      
        }else{
            toastr.error('Error comuniquese con el soporte Prolife');
        }
    });
}

/**List de Eliminados */
function list_eliminados(){
    var txtruc_buscar=$("#txtruc_buscar").val();
    var txtnrosoli=$("#txtnrosoli").val();  
    var dataString = {"txtruc_buscar":txtruc_buscar,"txtnrosoli":txtnrosoli}

    $.ajax({
        type: 'POST',
        url:"controller_func/solicitud_arbol_virtual/list_eliminados.php",
        data: dataString
        }).done(function(info){
            $('.tbody_list_elim').empty();
            $(".tbody_list_elim").append(info);
        });
}

function combo_representantes_opcion_1(){
    var txtruc_buscar=$("#txtruc_buscar").val();
    var dataString = {"txtruc_buscar":txtruc_buscar}; 
    $.ajax({
    type: 'POST',
    url:"controller_func/solicitud_arbol_virtual/combo_representantes_opcion1.php",
    data: dataString,
    }).done(function(info){
      $('#sltruc1').empty();
      $("#sltruc1").append(info);
    })
}

$(document).on('change', '#sltruc1', function() {
    var txtruc_buscar=$("#txtruc_buscar").val();
    var sltruc1=$("#sltruc1").val();
    var dataString = {"txtruc_buscar":txtruc_buscar,"sltruc1":sltruc1}; 
    $.ajax({
    type: 'POST',
    url:"controller_func/solicitud_arbol_virtual/combo_representantes_opcion2.php",
    data: dataString,
    }).done(function(info){
      $('#sltruc2').empty();
      $("#sltruc2").append(info);
    })
});

$(document).on('click', '.consult-dni-contratante-gestion', function() {
    var txtdni=$("#txtdni_gestion").val();
    var url='controller_func/validar/validar_dni_dinersclub.php';
    var dataString = {"txtdni":txtdni}  
    
    if(txtdni.trim()=="" || txtdni.length!=8){
          $('#txtdni_gestion').attr('class','form-control is-invalid');
          $('.msj-txtdni_gestion').empty();
          $('.msj-txtdni_gestion').append("- N° DNI debe ser de 8 numeros");
          window.setTimeout(function() { $('.msj-txtdni_gestion').html("");$('#txtdni_gestion').attr('class','form-control');}, 3000);
          return false;
    }else{
      $.ajax({
      type: 'POST',
      url: url,
      data: dataString,
      beforeSend:function(){     
        $('.consult-dni-contratante-gestion').html("Validando...");
        $('.consult-dni-contratante-gestion').prop('disabled', true);
        },
      complete:function(){
        $('.consult-dni-contratante-gestion').html("Consultar y validar");
        $('.consult-dni-contratante-gestion').prop('disabled', false);
        },
      }).promise().done(function(data) {      
          var content = JSON.parse(data);      
          if(content[0].en_sistema=="true"){
            $('#txtdni_gestion').attr('class','form-control is-valid');
            $('#lblestado_dni').attr('class','form-control is-valid');
            $('#lblestado_dni').empty();
            $('#lblestado_dni').append("Aprobado");
            $('#lblproducto_dni').empty();          
            $('#lblproducto_dni').append(content[0].producto);
            $('#lbltasa_dni').empty();
            $('#lbltasa_dni').append(content[0].tasapor);
          }else if(content[0].en_sistema=="false"){
            $('#txtdni_gestion').attr('class','form-control is-invalid');
            $('#lblestado_dni').attr('class','form-control is-invalid');
            $('#lblestado_dni').empty();
            $('#lblestado_dni').append("No incluido en campaña");
            $('#lblproducto_dni').empty();
            $('#lblproducto_dni').append("---");          
            $('#lbltasa_dni').empty();
            $('#lbltasa_dni').append("---");
          }
        })
    }
  });