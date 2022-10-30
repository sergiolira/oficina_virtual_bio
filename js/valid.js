
function controlTag(e) {
    tecla = (document.all) ? e.keyCode : e.which;
    if (tecla==8) return true; 
    else if (tecla==0||tecla==9)  return true;
    patron =/[0-9\s+]/;
    n = String.fromCharCode(tecla);
    return patron.test(n); 
}

function testText(txtString){
    var stringText = new RegExp(/^[a-zA-ZÑñÁáÉéÍíÓóÚúÜü\s]+$/);
    if(stringText.test(txtString)){
        return true;
    }else{
        return false;
    }
}
function txtNum(txtSpecial){
    var stringSpecial = new RegExp(/^[a-zA-Z0-9%ÑñÁáÉéÍíÓóÚúÜü\s.,-:]+$/);

    if(stringSpecial.test(txtSpecial)){
        return true;
    }else{
        return false;
    }
}

function testEntero(intCant){
    var intCantidad = new RegExp(/^([0-9])*$/);
    if(intCantidad.test(intCant)){
        return true;
    }else{
        return false;
    }
}
function testEnteroDecimal(intCantD){
    var intCantidad = new RegExp(/^([0-9+.,-])*$/);
    if(intCantidad.test(intCantD)){
        return true;
    }else{
        return false;
    }
}

function fntEmailValidate(email){
    var stringEmail = new RegExp(/^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/);
    if (stringEmail.test(email) == false){
        return false;
    }else{
        return true;
    }
}

function fntValidText(){
	let validText = document.querySelectorAll(".validText");
    validText.forEach(function(validText) {
        validText.addEventListener('keyup', function(){
			let inputValue = this.value;
			if(!testText(inputValue.trim())){
				this.classList.add('is-invalid');
				$('.msj_'+this.name).empty();
				$('.msj_'+this.name).append('Ingrese solo texto');
				//document.getElementById('btn_save').disabled = true;
			}else{
				$('.msj_'+this.name).empty();
				this.classList.remove('is-invalid');
				this.classList.add('is-valid');
				//document.getElementById('btn_save').disabled = false;
			}				
		});
	});
}

function fntValidTextSpecial(){
	let validSpecialText = document.querySelectorAll(".ValidTextSpecial");
    validSpecialText.forEach(function(validSpecialText) {
        validSpecialText.addEventListener('keyup', function(){
			let inputValue = this.value;
			if(!txtNum(inputValue)){
				this.classList.add('is-invalid');
				$('.msj_'+this.name).empty();
				$('.msj_'+this.name).append('Caracteres no permitidos');
				//document.getElementById('btn_save').disabled = true;
			}else{
				$('.msj_'+this.name).empty();
				this.classList.remove('is-invalid');
				this.classList.add('is-valid');
				//document.getElementById('btn_save').disabled = false;
			}				
		});
	});
}

function fntValidNumber(){
	let validNumber = document.querySelectorAll(".validNumber");
    validNumber.forEach(function(validNumber) {
        validNumber.addEventListener('keyup', function(){
			let inputValue = this.value;
			if(!testEntero(inputValue)){
				this.classList.add('is-invalid');
				$('.msj_'+this.name).empty();
				$('.msj_'+this.name).append('Solo puedes usar numeros');
				//document.getElementById('btn_save').disabled = true;
			}else{
				$('.msj_'+this.name).empty();
				this.classList.remove('is-invalid');
				this.classList.add('is-valid');
				//document.getElementById('btn_save').disabled = false;
			}				
		});
	});
}
function fntValidNumberDecimal(){
	let validNumberD = document.querySelectorAll(".validNumberD");
    validNumberD.forEach(function(validNumberD) {
        validNumberD.addEventListener('keyup', function(){
			let inputValue = this.value;
			if(!testEnteroDecimal(inputValue)){
				this.classList.add('is-invalid');
				$('.msj_'+this.name).empty();
				$('.msj_'+this.name).append('Solo puedes usar (, .) y numeros');
				//document.getElementById('btn_save').disabled = true;
			}else{
				$('.msj_'+this.name).empty();
				this.classList.remove('is-invalid');
				this.classList.add('is-valid');
				//document.getElementById('btn_save').disabled = false;
			}				
		});
	});
}

function fntValidEmail(){
	let validEmail = document.querySelectorAll(".validEmail");
    validEmail.forEach(function(validEmail) {
        validEmail.addEventListener('keyup', function(){
			let inputValue = this.value;
			if(!fntEmailValidate(inputValue.trim())){
				this.classList.add('is-invalid');
				$('.msj_'+this.name).empty();
				$('.msj_'+this.name).append('Ingrese un correo correcto');
				//document.getElementById('btn_save').disabled = true;
			}else{
				$('.msj_'+this.name).empty();
				this.classList.remove('is-invalid');
				this.classList.add('is-valid');
				//document.getElementById('btn_save').disabled = false;
			}				
		});
	});

}
