<?php
$args = array(
	'post_type' => 'slider',
	'tax_query' => array(
		array(
			'taxonomy' => 'posicion',
			'field'    => 'slug',
			'terms'    => 'derecha',
		),
	),
);
	// The Query
	$the_query = new WP_Query( $args );
	
	// The Loop using flexslider
	/*
	if ( $the_query->have_posts() ) { ?>
		<div id="slider" class="flexslider">
        <ul class="slides">
		<?php
		while ( $the_query->have_posts() ) {
			$the_query->the_post();
			$images = get_field('galeria_slider');
			//var_dump ($images);
				if( $images ): ?>
						<?php foreach( $images as $image ): ?>
							<li>
								<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
								<!--<p><?php echo $image['caption']; ?></p> -->
							</li>
						<?php endforeach; 					
				 endif; 
			
		}?>
		</ul>
		</div>
				
		<?php
		/* Restore original Post Data *//*
		wp_reset_postdata();
	} else {
		// no posts found
	}
	*/
	
	
		
	// The Loop using w3school
	
	if ( $the_query->have_posts() ) { ?>
		<div class="w3-content w3-section" >
		<?php
		while ( $the_query->have_posts() ) {
			$the_query->the_post();
			$images = get_field('galeria_slider');
			$i=0;
			$efect=array('w3-animate-fading', 'w3-animate-fading');
			//var_dump ($images);
				if( $images ): ?>	
						<?php foreach( $images as $image ): ?>
								<img class="mySlides <?php echo $efect[$i] ;?>" src="<?php echo $image['sizes']['newsmag-single-post']; ?>" alt="<?php echo $image['alt']; ?>" >
								<span class="textcaptioon leter-information-slider text-center">Hasta <?php echo $image['caption'];?> </span>
						<?php $i++; endforeach; 					
				 endif; 
			
		}?>
		</div>				
		<?php
		/* Restore original Post Data */
		wp_reset_postdata();
	} else {
		// no posts found
	}
?>

<script>
var myIndex = 0;
carouselito();

function carouselito() {
    var i;
    var x = document.getElementsByClassName("mySlides");
	var y = document.getElementsByClassName("textcaptioon");
    
	for (i = 0; i < x.length; i++) {
       x[i].style.display = "none";
	   y[i].style.display = "none"; 	   
    }
    myIndex++;
    if (myIndex > x.length) {myIndex = 1}    
    x[myIndex-1].style.display = "block";  
	y[myIndex-1].style.display = "block";
    setTimeout(carouselito, 4000);    
}
</script>
