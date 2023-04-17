<!DOCTYPE html>

<html>

<head>

  <title>KampKaravan WP Botu</title>

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</head>

<body>



<?php


	echo '<div class="container> 
	  <div class="row">
	<form method="post" action="bot.php">
	<div class="form-group col-sm-6">
    <label for="exampleFormControlSelect2">Site seçiniz</label>
    <select name="secim" multiple class="form-control" id="exampleFormControlSelect2">
      <option value="https://www.kampusulasi.com/">Kamp Pusulası</option>
<option value="https://www.yoldabiblog.com/">Yoldabiblog</option>
    </select>
  <select name="sayfa" class="form-control">';
       
				for($x=1;$x<50;$x++){
					echo "<option value=\"$x\">$x Sayfa</option>";
				}

echo '
          </select>
  </div>

 <input type="submit" class="btn btn-primary" value="SEÇ"></form>
 </div>
 </div>';
	
	

?>
</body>

</html>