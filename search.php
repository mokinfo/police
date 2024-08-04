<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Recherche</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
	<div class="container" style="50%;">
		<div class="text-center mt-5 mb-4">
			<h2>Dossier patient</h2>
		</div>
		<input type="text" name="rech" class="form-control" id="live_search" autocomplete="off" placeholder="Recherchez ...">
	</div>
	<div id="searchresult"></div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
			$("#live_search").keyup(function(){
				var input = $(this).val();
				//alert(input);
				if(input != ""){
					$.ajax({
						url:"livesearch.php",
						method:"POST",
						data:{input:input},

						success:function(data){
							$("#searchresult").html(data);
						}
					});
				}else{
					$("#searchresult").css("display","none");
				}
			});
		});
	</script>
</body>
</html>