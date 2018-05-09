<?php
    $conexion = mysqli_connect('localhost', 'root', '', 'adidas');
	$cont = 0;

				$sql="SELECT * from product";
				$result= mysqli_query($conexion, $sql);


		while ($mostrar=mysqli_fetch_array($result)){
			if(file_exists($mostrar["image"]) && !empty($mostrar["image"])){
			$image = $mostrar["image"];
		}else{
			$image = "img/error.png";
		}
		
		if(empty($mostrar["title"]) || strlen($mostrar["title"])>27){
			$title = "NO TITLE";
		}else{
			$title = $mostrar["title"];	
		}
		

		if(empty($mostrar["description"]) || strlen($mostrar["description"])>30){
			$des = "NO DESCRIPTION";
		}else{
			$des = $mostrar["description"];
		}

		if(empty($mostrar["price"]) || strlen($mostrar["price"])>10){
			$price = "UNDEFINED";
		}else{
			$price = $mostrar["price"];
		}
		if ($cont == 0) {
		echo '<div class="CHINGADAMADRE"> <h4 border="1">SHIRTS</h4> </div>';
		
	
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
							<h2>£'.$price.'.00</h2>
			  		    </div>
				    </div>
			    </div>';
		if($cont % 4 == 0){
			echo "<br>";
		}
		
		if ($cont == 4) {
		echo '<div class="CHINGADAMADRE"> <h4 border="1">SHOES</h4> </div>';	
		}

		if ($cont == 8) {
		echo '<div class="CHINGADAMADRE"> <h4 border="1">PANTS</h4> </div>';	
		}
		if ($cont == 12) {
		echo '<div class="CHINGADAMADRE"> <h4 border="1">ACCESORIES</h4> </div>';	
		}

		if($cont > 15){
			break;
		}
	}
