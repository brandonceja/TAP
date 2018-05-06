<?php 
	$counter = $_POST['shirtNewCount'];
	$jsondata = file_get_contents("shirts.json");
	$json = json_decode($jsondata, true);
	$shirts = $json["shirts"];
	$cont = 0;
	while ($cont < $counter) {
		if(file_exists($shirts[$cont]["image"]) && !empty($shirts[$cont]["image"])){
			$image = $shirts[$cont]["image"];
		}else{
			$image = "img/error.png";
		}

		if(empty($shirts[$cont]["title"]) || strlen($shirts[$cont]["title"])>27){
			$title = "NO TITLE";
		}else{
			$title = $shirts[$cont]["title"];	
		}

		if(empty($shirts[$cont]["description"]) || strlen($shirts[$cont]["description"])>30){
			$des = "NO DESCRIPTION";
		}else{
			$des = $shirts[$cont]["description"];
		}

		if(empty($shirts[$cont]["price"]) || strlen($shirts[$cont]["price"])>10){
			$price = "UNDEFINED";
		}else{
			$price = $shirts[$cont]["price"];
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
		if($cont >= sizeof($shirts)){
			break;
		}
	}