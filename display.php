<?php
	$jsondata = file_get_contents("shirts.json");
	$json = json_decode($jsondata, true);
	$shirts = $json["shirts"];
	$cont = 0;

	foreach ($shirts as $shirt) {
		if(file_exists($shirt["image"]) && !empty($shirt["image"])){
			$image = $shirt["image"];
		}else{
			$image = "img/error.png";
		}

		if(empty($shirt["title"]) || strlen($shirt["title"])>27){
			$title = "NO TITLE";
		}else{
			$title = $shirt["title"];	
		}

		if(empty($shirt["description"]) || strlen($shirt["description"])>30){
			$des = "NO DESCRIPTION";
		}else{
			$des = $shirt["description"];
		}

		if(empty($shirt["price"]) || strlen($shirt["price"])>10){
			$price = "UNDEFINED";
		}else{
			$price = $shirt["price"];
		}

		$cont++;
		echo '<div class="product">
				<div class="product_image" style="background-image: url('.$image.');"></div>
					<div class="product_details">
						<div class="product_title">
							<h3>
								'.$title.'
							</h3>
							<h4>
								'.$des.'
							</h4>
							<h2>'.$price.'</h2>
			  		    </div>
				    </div>
			    </div>';
		if($cont % 4 == 0){
			echo "<br>";
		}
		if($cont > 11){
			break;
		}
	}
