<?php


$getEquipmentLimit = new productDB();

// get for slide
$getEquipmentLimit = $getEquipmentLimit->getProductLimit(2, 15);



?>

<h4 class="horizontalText">
	<i class="fas fa-dumbbell"></i> 
	<span class="textHori"> BEST SELLER </span>
	<i class="fas fa-dumbbell"></i>
</h4>


<div class="owl-carousel owl-theme">
	<?php foreach($getEquipmentLimit as $equipment): ?>
		<div class="item">
			<a href="/casestudy2/masterLayout/productDetail.php?product_code=<?= $equipment['product_code']; ?>"><img src="<?= $equipment['product_image'];?>" alt="12" class="img-fluid"></a>
		</div>
	<?php endforeach; ?>
</div>
<h4 class="horizontalText"></h4>


<div id="bodyHome">
	<div class="container">
		<div class="row justify-content-center">
			<div class="col-md-8 col-md-offset-2 text-center bodyHome-heading animate-box">
				<h2>OUR STORE</h2>
				<p>Here at T.A Fitness, we offer the very best equipment and service for the most affordable price in the industry.</p>
			</div>
		</div>
	</div>
	<div class="container-fluid">
		<div class="row row-bottom-padded-md">
			<div class="col-md-12">
				<ul id="bodyHome-heading-list">

					<li class="one-third animate-box" data-animate-effect="fadeIn" style="background-image: url(image/dumbell.jpg); ">
						<a href="/casestudy2/masterLayout/equipmentsByCat.php?category_id=2">
							<div class="case-studies-summary">
								<span>Dumbbells</span>
								<h2>Strength Equipment</h2>
							</div>
						</a>
					</li>
					<li class="one-third animate-box" data-animate-effect="fadeIn" style="background-image: url(image/rack.jpg); ">
						<a href="/casestudy2/masterLayout/equipmentsByCat.php?category_id=3">
							<div class="case-studies-summary">
								<span>Monster Lite Rack</span>
								<h2>Group Training</h2>
							</div>
						</a>
					</li>
					<li class="two-third animate-box" data-animate-effect="fadeIn" style="background-image: url(image/rowingMachine.jpg); ">
						<a href="/casestudy2/masterLayout/equipmentsByCat.php?category_id=1">
							<div class="case-studies-summary">
								<span>Rowing Machine</span>
								<h2>Cardio Equipment</h2>
							</div>
						</a>
					</li>

					<li class="one-third animate-box" data-animate-effect="fadeIn" style="background-image: url(image/barbellSet.jpg); ">
						<a href="/casestudy2/masterLayout/equipmentsByCat.php?category_id=3">
							<div class="case-studies-summary">
								<span>Warrior Bar & Bumper Set</span>
								<h2>Group Training</h2>
							</div>
						</a>
					</li>
					<li class="two-third animate-box" data-animate-effect="fadeIn" style="background-image: url(image/barbell.jpg); ">
						<a href="/casestudy2/masterLayout/equipmentsByCat.php?category_id=2">
							<div class="case-studies-summary">
								<span>Barbells</span>
								<h2>Strength Equipment</h2>
							</div>
						</a>
					</li>
					<li class="one-third animate-box" data-animate-effect="fadeIn" style="background-image: url(image/treadmill.jpg); ">
						<a href="/casestudy2/masterLayout/equipmentsByCat.php?category_id=1">
							<div class="case-studies-summary">
								<span>Treadmill</span>
								<h2>Cardio Equipment</h2>
							</div>
						</a>
					</li>

				</ul>
			</div>
		</div>
	</div>
</div>


