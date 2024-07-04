<?php
include("libreria/motor.php");
include_once("libreria/libro_i.php");
session_start();
$str_b =  $_POST['b'];
//echo $str_b;
//$lib=Libro_d::buscar($str_b);
$lib=Libro_i::buscar($objConexion->enlace,$str_b);

?>
<?php
if (isset($lib)){
?>
<div class="panel panel-default" >
 
  <div class="panel-heading">Publicaciones Encontradas</div> 
	 <div style="overflow: scroll;height: 350px;">  
	  <table class="tabla_edicion table table-hover">
	  <thead>
			  <tr>
			  <th>Titulo</th>
			  <th>Autor</th>
			  <th>Tipo</th>
			  
			  
			  </tr>
		  </thead>
	  <tbody>
	  <?php
		  foreach($lib as $libros){
		   echo "
		   <tr>
		   <td><a href='libros_i/".$libros['Archivo']."' target='_blank' >$libros[Titulo]</a></td>
		   <td>$libros[Autor]</td>
		   <td>$libros[Tipo]</td>";
		 
	     $file_l=$libros['Archivo'] ;
		 if (isset($_SESSION['username']) && $_SESSION['rol']=='administrador'){
		 echo '<td><button class="btn btn-primary btn-xs" onclick="prestar(' . $libros['id_libro'] . ')" >Prestar</button></td>';
		 echo '<td><button class="btn btn-primary btn-xs" onclick="devolver(' . $libros['id_libro'] . ')" >Devolver</button></td>';
		 

		 }
		 else{
		 echo '<td><button class="btn btn-primary btn-xs" onclick="ver_info(' . $libros['id_libro'] . ')" >Info</button></td>';
		 }
		 echo '<td><button class="btn btn-primary btn-xs" onclick="cargar_pdf(\'#capa_d\',\'' .$file_l . '\')" >Min</button></td>';
         
		  echo " </tr> ";
		   }
	  ?>
	  </tbody>
	  </table>
	  </div>
	  </div></div>
	  
<?php
}
?>