				<tr>
				<?php 
					if($listas['status']==0){						
						echo "<td colspan='9' class='aguardo'><center><div class='label label-warning '>Aguardando Aprovação do Acqua Lokos</div></center></td>";
					}else if($listas['status']==1){
						echo "<td colspan='9'><center><div class='label label-success'>Lista Confirmada!</div></center></td>";
					}else{
						echo "<td colspan='9'><center><div class='label label-danger'>Lista Cancelada</div></center></td>";
					}
				 ?>					
				</tr>
			</table>
		</div> 
		<!-- Fechamendo da tabela responsiva -->
	</div> 
	<!-- Fechamento da panel body-->
</div>
<!-- Fechamento do panel todo -->