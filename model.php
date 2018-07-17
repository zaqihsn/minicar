<html>
<head>
<title>Model</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<script src="script/jquery.js" ></script>
<script type="text/javascript">
$(document).ready(function(){
	$("#submitMan").click(function(){
		var xname = $("#model_name").val();
		if(xname==""){
			$("#model_name").addClass("warn");
		}
		if($("#mname").val()==""){
			$("#mname").addClass("warn");
		}
		if($("#mname").val()!="" & xname!="" ){
			var mid=$("#mname").val();
			$("#model_name").removeClass("warn");
			$("#mname").removeClass("warn");
			$.post("addModel.php",{modelname:xname,manid:mid},function(response,status){
			if(status=="success"){alert("Model name successfully added.");}
			$("form")[0].reset();
			});
		}
	});
	
});
</script>
</head>
<body>
<header>
<h1>Mini Car Inventory System</h1>
</header>

<div class="midOuter">
	<div class="leftpane">
		<ul class="menu">
			<li><a href="index.php">Add Manufacturer</a></li>
			<li class="active"><a href="model.php">Add Car Model</a></li>
			<li><a href="view.php">View Inventory</a></li>
		</ul>
	</div>
	<div class="rightpane">
		<form class="form-inline">
			<div class="form-group">
			<label for="model_name">&nbsp;&nbsp;Model Name : &nbsp;&nbsp;</label><input type="text" id="model_name" name="name" value="" class="form-control" placeholder="Model Name" required>
			</div>
			<label for="mname">&nbsp;&nbsp;&nbsp;Select Manufacturer :&nbsp;&nbsp;&nbsp;</label>
			<select class="form-control" style="width:180px;" id="mname" required>
			<option value=""> Manufacturer </option>
				<?php 
				$con = mysqli_connect('localhost', 'root', '', 'minicar');
					if (!$con) {
					echo "Error: " . mysqli_connect_error();
					exit();
					}
				$sql='SELECT * FROM manufacturer';
				$query 	= mysqli_query($con, $sql);
				while ($row = mysqli_fetch_array($query))
				{
					
				
				?>
				<option value="<?php echo $row['id']; ?>"><?php echo $row['man_name']; ?> </option>
				<?php 
				}
					// Close connection
					mysqli_close($con);
				
				?>
			</select>
			</form>
			<button style="float:right;margin-right:30px;" type="button" name="save" id="submitMan" class="btn btn-info">Save</button>
			</div>
	</div>
</div>

<!-- <div class="clear"></div> -->

<footer></footer>
</body>
</html>