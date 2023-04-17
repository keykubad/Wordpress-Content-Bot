<?php

require_once('../wp-load.php');
include "sBotClass.php";
		$baslik=$_POST["baslik"];
		$resim =$_POST["resim"];
		$kategori =$_POST["kategori"];
		$etiket =$_POST["etiket"];
		$icerik =$_POST["icerik"];
		
		
		
		
		$sBot = new sBotClass();
		$sBot->title=$baslik;
		$sBot->thumbnail = $resim; 
		$etiketler=$etiket;
		$sBot->content=$icerik;
		$sBot->tags=$etiket;

		/*
		status kısmının ala bileceği değerler
		 ---------------
		 * Taslak : draft 
		 * Açık / Yayında :  publish 
		 * Beklemede :  pending
		 * Zamanlanmış : future ( eğer zamanlamış iseniz "time" değişkenine taslağın yayınlanacağı tarihi giriniz örnek 2014-07-27 18:00:00 )
		 * Özel : private
		 */
		$sBot->status="pending";
	

		$sBot->cat=$kategori;
		$sBot->author=1;
		$sBot->thumbnail = $sBot->download_image($resim);
		$sBot->metas=array(
			'gorsel'=>$resim
			);
			/*
		* Birinci parametre true gider ise all in one seo alanları otomatik dolar
		* ikinci alan true gider ise aynı içerikten var ise eklemez eğer false veya boş giderse aynı içerikten olsa dahi ekler
		*/

		echo $sBot->addPost(true,true); // eklenen yazının numarasını geri çevirip ekrana yazdırır. 

?>