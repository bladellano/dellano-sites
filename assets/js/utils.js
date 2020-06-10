
/**
 * Efeito máquina de escrever (inverso)
 * Criador: Caio Dellano
 */
 function removeCaracter(elem){

 	const fraseArray = elem.html().split('');	
 	let fraseNova  = '';
 	let copyArray = fraseArray.slice();

 	fraseArray.forEach((letra, i)=>{
 		setTimeout(function(){
 			copyArray.pop();
 			fraseNova = copyArray.join('');
 			elem.html(fraseNova);
 		},15 * i)

 	});
 	setTimeout(()=>{
 		elem.html( fraseArray.join('') ).hide();
 	},1500)
}

/**
 * Efeito máquina de escrever
 * Criador: Origamid
 */
	function typeWriter(elem,retirar=false,seg){
		elem.delay(600).slideDown('slow');
		const textoArray = elem.html().split('');
		elem.html('');
		let frase ='';
		textoArray.forEach((letra,i)=>{
			setTimeout(function(){
				frase += letra;
				elem.html(frase);
			},75 * i)
		});

		if(retirar == true){//Verifica se retira a frase.
			setTimeout(()=>{
				removeCaracter(elem);
			},seg);
		}

	}

 /**
 * MASCARA TELEFONE
 * Criador: William Bruno
 */
 function mascara(o,f){
 	v_obj=o
 	v_fun=f
 	setTimeout("execmascara()",1)
 }
 function execmascara(){
 	v_obj.value=v_fun(v_obj.value)
 }
 function mtel(v){
    v=v.replace(/\D/g,""); //Remove tudo o que não é dígito
    v=v.replace(/^(\d{2})(\d)/g,"($1) $2"); //Coloca parênteses em volta dos dois primeiros dígitos
    v=v.replace(/(\d)(\d{4})$/,"$1-$2"); //Coloca hífen entre o quarto e o quinto dígitos
    return v;
}