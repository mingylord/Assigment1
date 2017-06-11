<?php

	require_once('mysql.php');
	
	$db = new MySQL();
	$ip = $_SERVER['REMOTE_ADDR'];

	$sql = $db->prepare("INSERT INTO `logged_actions` (`action`, `ip`) VALUES (?, ?)");
	$sql->execute(array("Entered the site.. he!", $ip));
	
?>

<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"> 

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
	
	<script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4=" crossorigin="anonymous"></script>
	<script src=" https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	<style>
	
	.unicorn-container {
		position: relative;
		top: 25px;;
	}
	.unicorn-container p {
		max-width: 750px;
	}
	
	.unicorn-img {
		max-width: 350px;
	}
	
	/* Remove the navbar's default margin-bottom and rounded borders */ 
	.navbar {
	  margin-bottom: 0;
	  border-radius: 0;
	}

	/* Set height of the grid so .sidenav can be 100% (adjust as needed) */
	.row.content {height: 450px}

	/* Set gray background color and 100% height */
	.sidenav {
	  padding-top: 20px;
	  background-color: #f1f1f1;
	  height: 100%;
	}

	/* Set black background color, white text and some padding */
	footer {
	  background-color: #555;
	  color: white;
	  padding: 15px;
	}

	/* On small screens, set height to 'auto' for sidenav and grid */
	@media screen and (max-width: 767px) {
	  .sidenav {
		height: auto;
		padding: 15px;
	  }
	  .row.content {height:auto;} 
	}
	</style>
  
	<!-- FUNCTIONS.. -->
	<script>
	function fetchUnicornList()
	{
		var getUnicorns = $.get("apihelper.php", function() {
			
			var unicornList = JSON.parse(getUnicorns.responseJSON);		
			unicornList = $.map(unicornList, function(list) { return list });
			
			for (i = 0; i < unicornList.length; i++)
			{
				$("#unicornList").append("<p><a href='#' onClick='fetchUnicornData("+unicornList[i].id+")'>"+unicornList[i].name+"</a></p>");
			}
			
		});
	}
	
	function fetchUnicornData(id)
	{
		var getUnicorn = $.get("apihelper.php?id=" + id, function() {
			var unicornData = JSON.parse(getUnicorn.responseJSON);
			
			/* Print unicorndata to placeholders.. */
			$(".unicorn-img").attr("src", unicornData.image);
			$(".unicorn-name").text("("+unicornData.id+") " + unicornData.name);
			$(".unicorn-desc").text(unicornData.description);
		});
	}
	
	$(document).ready( function() {
		fetchUnicornList();
	});	
	</script>
  
</head>
<body>

<nav class="navbar navbar-inverse">
	<div class="container-fluid">
		<div class="navbar-header">
		</div>
	</div>
</nav>
  
<div class="container-fluid text-center">    
	<div class="row content">
		<div id="unicornList" class="col-sm-2 sidenav">
		
		<!--
		<p><a href="#" onClick="fetchUnicornData(1)">De va en häst</a></p>
		<p><a href="#" onClick="fetchUnicornData(2)">Den andra hästen</a></p>
		-->
		
		</div>
		<div class="col-sm-8 text-left unicorn-container"> 
		
			<img src="" class="unicorn-img" />
			<p class="unicorn-name"></p>
			<p class="unicorn-desc"></p>
			<p class="unicorn-reportedBy"></p>
			
			
		</div>
		<div class="col-sm-2 sidenav">
		</div>
	</div>
</div>

<footer class="container-fluid text-center">
	<p>&copy; Balder Christensen <?php echo date('Y'); ?></p>
</footer>



</body>
</html>