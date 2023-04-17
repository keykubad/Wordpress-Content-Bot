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

include '../wp-includes/wp-db.php';
require_once('../wp-load.php');
include "sBotClass.php";


$site=$_POST["secim"];
$sayfa=$_POST["sayfa"];


function wordpressKategori(){
		$kategoriler = get_categories(array("hide_empty" => 0));
		foreach($kategoriler as $kategori){
			$kategoriliste .= "<option value=\"$kategori->cat_ID\">$kategori->name</option>";
		}
		echo $kategoriliste;
	}

// bu kısım json çekim
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	
			curl_setopt($ch, CURLOPT_URL,$site.'wp-json/wp/v2/posts?_embed&page='.$sayfa.'');

        $result=curl_exec($ch);
        $posts = json_decode($result, true);
        foreach ($posts as $post) {
			
		$etiket	=str_replace(" ",",",$post['title']['rendered']);
?>
<form method="post" action="kaydet.php" enctype="multipart/form-data">
   <div class="form-group">
    <label for="exampleFormControlInput1">Resim</label>
   <img src="<?php echo $post["_embedded"]["wp:featuredmedia"][0]["source_url"]; ?>" width="300" height="300">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput1">Başlık</label>
    <input type="text" name="baslik" class="form-control" id="exampleFormControlInput1" value="<?php echo $post['title']['rendered']; ?>">
  </div>
   <div class="form-group">
    <label for="exampleFormControlInput1">Resim</label>
   <input type="text" name="resim" class="form-control" id="exampleFormControlInput1" value="<?php echo $post["_embedded"]["wp:featuredmedia"][0]["source_url"]; ?>">
  </div>
   <div class="form-group">
   <label for="exampleFormControlInput1">Kategori Seç</label>
          <select name="kategori" class="form-control">
             <?php echo wordpressKategori(); ?>
          </select>
        </div>
   <div class="form-group">
    <label for="exampleFormControlInput1">Etiketler</label>
    <input type="text" name="etiket" class="form-control" id="exampleFormControlInput1" value="<?php echo $etiket; ?>">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">İÇERİK </label>
    <textarea name="icerik" class="form-control" id="exampleFormControlTextarea1" rows="10"><?php echo $post['content']['rendered']; ?></textarea>
  </div>
 <input type="submit" class="btn btn-primary" value="EKLE"><br><hr></form>
<?php
		}

?>

</body>

</html>