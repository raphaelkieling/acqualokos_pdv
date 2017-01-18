$(function () {
			$('.dropdown-toggle').dropdown();
		}); 

		$(".aguardo").click(function(){
			alert("Quando esta mensagem aparecer significa que o acqua lokos está verificando sua lista");
		});
		function btnCancela(numero){
			var numeroLista = numero;
			var idCancel    = $("#idCancel").val();
			if(idCancel == "cancelar")
			{
				$.ajax({
					type:'GET',
					url:'sistema/cancelaLista.php',
					data:{lista:numeroLista},
					success:function(retorno){
						$('#'+numeroLista).animate({opacity:0.25},300,function(){
							$(this).remove();
						});
					}
				});
			}else{
				alert("Não esta correto");
			}
		}
		function updateUser(id_user){
			var nome = $("#nome_user"+id_user).val();
			var documento = $("#documento_user"+id_user).val();

			$.ajax({
				type:"GET",
				url:"sistema/modificar_user_acqua.php",
				data:{id:id_user,nome:nome,documento:documento},
				success:function(data)
				{
					n = $("#nome"+id_user);
					d = $("#documento"+id_user);

					n.text(nome);
					d.text(documento);
					 $('#updateUser'+id_user).modal('toggle');
				}
			});
		}