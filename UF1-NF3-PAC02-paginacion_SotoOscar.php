<?php
$db = mysqli_connect('localhost', 'root') or die ('Unable to connect. Check your connection parameters.');
mysqli_select_db($db,'boardgamesite') or die(mysqli_error($db));
$noRegistros = 2; //Registros por página
$pagina = 1; //Por defecto pagina = 1
if($_GET['pagina']){
    $pagina = $_GET['pagina']; //Si hay pagina, lo asigna
}
$buskr=$_GET['searchs']; //Palabra a buscar
$empieza=($pagina-1)*$noRegistros; //Las paginas se multiplican en funcion del numero de registros
    
//Utilizo el comando LIMIT para seleccionar el rango de registros por pagina
$sSQL = "SELECT * FROM boardgame WHERE boardgame_name LIKE '%$buskr%' LIMIT $empieza, $noRegistros";
$result = mysqli_query($db,$sSQL) or die(mysqli_error($db));
	
//Exploracion de registros
echo "<table>";
echo "<thead>Numero de registros por pagina: $noRegistros</thead>";
echo "<br/>";
echo "<br/>";
while($row = mysqli_fetch_array($result)) {
	echo "<tr><td height=40 width=40 align=center>";
	echo $row[boardgame_id]."<br>";
	echo "</td>";
	//echo "<td align=center></td>";
	echo "<td>". $row[boardgame_name] ."</td>";
	echo "<td align=right>". $row[boardgame_year] ."</td>";
	echo "</tr>";
}

//Imprimiendo paginacion
$sSQL = "SELECT count(*) FROM boardgame WHERE boardgame_name LIKE '%$buskr%'"; //Cuento el total de registros
$result = mysqli_query($db,$sSQL);
$row = mysqli_fetch_array($result);
$totalRegistros = $row["count(*)"]; //Almaceno el total en una variable

$noPaginas = $totalRegistros/$noRegistros; //Determino la cantidad de paginas

?>
<tr>
    <td colspan="2" align="center" height="40"><?php echo "<strong>Total registros: </strong>".$totalRegistros; ?></td>
    <td colspan="2" align="center"><?php echo "<strong>Pagina: </strong>".$pagina; ?></td>
</tr>
<tr bgcolor="f3f4f1">
    <td colspan="4" align="right" height="40"><strong>Pagina:
<?php
for($i=1; $i<$noPaginas+1; $i++) { //Imprimo las paginas
	if($i == $pagina)
		echo "<font color=red>$i </font>"; //A la pagina actual no le pongo link
	else
		echo "<a href=\"?pagina=".$i."&searchs=".$buskr."\" style=color:#000;> ".$i."</a>";
}
?>
	</strong></td>
</tr>
</table>


