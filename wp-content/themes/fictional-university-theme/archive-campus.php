<!-- from archive campus -->




<?php 
 
  get_header(); 
  pageBanner(array(
    'title' => 'Our Capuses',
    'subtitle'=> 'campuses are all arounf the globe .....'
  ));

  ?>



  <div class="container container--narrow page-section">

  	<div class="acf-map">
    <?php
    	//adjusting some wp_query in functions

      while (have_posts()){
        the_post(); 
        $mapLocation = get_field('map_location');
        ?>

      	<div class="marker" data-lat="<?php echo $mapLocation['lat'];  ?>" data-lng="<?php echo $mapLocation['lng']; ?>">
      		
      	</div>

    <?php
      }

      //pagination links
      echo paginate_links();
    ?>

    </div>
  </div>



<?php
  get_footer();
?>