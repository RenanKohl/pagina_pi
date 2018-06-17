$(document).ready( function(){
	var number = Math.random() * (10 - 1) + 10;
	//console.log(number);
	$('#gerar').click(function(){
			for(var i = 0; i < 7; i++){
				
				number = Math.random() * (90 - 1) + 10;
				$('#campo'+i).val(number);
				//FAZER MÁSCARA PARA 3 DIGITOS
				console.log(number);
				
			}	

	});
	
	
	$('#botao').click(function(){						
				
		var result = $('#formulario').serialize();
		console.log(result);

		$.ajax({
	      url:'captura_dados.php',
	      method: 'POST',
	      data: result,
	      dataType:'json',
	      success: function(data){
	      	alert(data); 
	        //$('#campo1').val(data);  
	      }
	     });	
	});
	
});