<?php
	include("lib.php");
?>
<tr>
	<th>Sr.</th>
	<th>Manufacturer</th>
	<th>Model</th>
	<th>Unit</th>
	<th></th>
</tr>
<?php  
	$mo = new model();
	if(!empty($_POST["rowid"])){
	$mo->soldCar($_POST['rowid']);
	}
	$rdata = $mo->listAllmodels();
	$count=0;
	while($fetch = mysqli_fetch_array($rdata)){
		$count=$count+1;
	?>
	<tr>
		<td><?php echo $count; ?></td>
		<td><?php echo $fetch[0]; ?></td>
		<td><?php echo $fetch[1]; ?></td>
		<td><?php echo $fetch[2]; ?></td>
		<td > <label class="sold" onclick="sold(<?php echo $fetch[3]; ?>)">Sold</label> </td>
	</tr>
<?php }
		?>