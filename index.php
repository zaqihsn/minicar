<html>
<head>
<title>View Details</title>
<link rel="stylesheet" type="text/css" href="css/style.css">
<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
<script src="script/jquery.js" ></script>
<!--<link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css"></link>-->
<!--<script src="https://code.jquery.com/jquery-1.12.4.min.js"  integrity="sha256-ZosEbRLbNQzLpnKIkEdrPv7lOy9C27hHQ+Xp8a4MxAQ="  crossorigin="anonymous"></script>-->
<script type="text/javascript">
$(document).ready(function(){
	$("#submitMan").click(function(){
		var x=$("#mname");
		//$("#mname").addClass("warn");
		//alert(x.val());
		var xname = x.val();
		if(xname==""){
			x.addClass("warn");
		}
		else{
			x.removeClass("warn");
			$.post("addManufacturer.php",{name:xname},function(response,status){ 
			if(response=="OK"){alert("Manufacturer name successfully added.");}
			else{ alert("Some error occurred."); }
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
			<li class="active"><a href="index.php">Add Manufacturer</a></li>
			<li ><a href="model.php">Add Car Model</a></li>
			<li><a href="view.php">View Inventory</a></li>
		</ul>
	</div>
	<div class="rightpane">
		<form class="form-default" method="post">
			<div class="form-group">
			<label for="mname">Manufacturer Name : </label>
			<input type="mname" id="mname" name="name" value="" class="form-control" placeholder="Manufacturer Name" required>
			</div>
			
			<button type="button" name="save" id="submitMan" class="btn btn-info">Submit</button>
		</form>
	</div>
</div>

<!-- <div class="clear"></div> -->

<footer></footer>
</body>
</html>