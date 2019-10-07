
<?php 
	echo "<pre>";
	print_r ($usuario);
	echo "</pre>";
 ?>
<form method="POST">
<label>ID de usuario a invalidar</label>
<input type="number" name="invalidar" required="true">
</form>

 <table class="table">
 	<thead class="thead-dark">
 		<th scope="col">#</th>
 		<th scope="col">nombre</th>
 		<th scope="col">correo</th>
 	</thead>
 	<tbody>
 		<?php 
			foreach ($usuario as $key => $value) {
				echo "<tr>";
				echo("<th scope='row'>".$value->id_usuario."</th>");
				echo("<td>".$value->nombre."</th>");
				echo("<td>".$value->correo."</th>");
				echo "</tr>";
			}
		?>
 	</tbody>
 </table>