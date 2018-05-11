<?php
    $conexion = mysqli_connect('localhost', 'root', 'starwars', 'adidas');
	

				$sql="SELECT * FROM product INNER JOIN category ON product.id_category = category.id_category WHERE category.description = \"shirt\"";
				$result= mysqli_query($conexion, $sql);

				$sql1="SELECT * FROM product INNER JOIN category ON product.id_category = category.id_category WHERE category.description = \"shoes\"";
				$result1= mysqli_query($conexion, $sql1);

				$sql2="SELECT * FROM product INNER JOIN category ON product.id_category = category.id_category WHERE category.description = \"pants\"";
				$result2= mysqli_query($conexion, $sql2);

				$sql3="SELECT * FROM product INNER JOIN category ON product.id_category = category.id_category WHERE category.description = \"accessory\"";
				$result3= mysqli_query($conexion, $sql3);

      echo '<div class="CHINGADAMADRE"> <h4>SHIRTS</h4> </div>';
////SHIRTS
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
	}
echo '<div class="CHINGADAMADRE"> <h4>SHOES</h4> </div><br>';
	///SHOES
while ($mostrar=mysqli_fetch_array($result1)){
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
	}

echo '<div class="CHINGADAMADRE"> <h4 border="1">PANTS</h4> </div><br>';
	////PANTS
	while ($mostrar=mysqli_fetch_array($result2)){
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
	}
echo '<div class="CHINGADAMADRE"> <h4>ACCESORIES</h4> </div><br>';
	////ACCESORIES
	while ($mostrar=mysqli_fetch_array($result3)){
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
	}