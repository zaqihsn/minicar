<html>
<head>
<title>View Details</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<script src="script/jquery.js" ></script>
<script type="text/javascript">
function sold(id){
	var res;
	$.post("sold.php",{rowid:id},function(response,status){
			if(status=="success"){alert("Sold successfully.");	
			$("#Intable").html(response);
			}
		else{ alert("Some error occurred."); }});
	
}
</script>
</head>
<body>
<header>
<h1>Mini Car Inventory System</h1>
</header>

<div class="midOuter">
	<div class="leftpane">
		<ul class="menu">
			<li ><a href="index.php">Add Manufacturer</a></li>
			<li ><a href="model.php">Add Car Model</a></li>
			<li class="active"><a href="view.php">View Inventory</a></li>
		</ul>
	</div>
	<div class="rightpane">
		<table class="table table-bordered" id="Intable">
			<tr>
				<th>Sr.</th>
				<th>Manufacturer</th>
				<th>Model</th>
				<th>Unit</th>
				<th></th>
			</tr>
			<?php  
			include("lib.php");
				$mo = new model();
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
		</table>
	</div>
</div>

<!-- <div class="clear"></div> -->

<footer></footer>
</body>
</html>