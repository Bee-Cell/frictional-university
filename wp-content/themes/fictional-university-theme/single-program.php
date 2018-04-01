<!-- from single programs -->

<?php 
 
	get_header();


while (have_posts()) {
	the_post();
	?>
		<div class="page-banner">
	    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri("/assets/images/ocean.jpg") ?>);"></div>
	    <div class="page-banner__content container container--narrow">
	      <h1 class="page-banner__title"><?php the_title(); ?></h1>
	      <div class="page-banner__intro">
	        <p>DONT FORGET TO REPLACE ME LETTER.</p>
	      </div>
	    </div>  
	  </div>



	  <div class="container container--narrow page-section">
	  	<div class="metabox metabox--position-up metabox--with-home-link">
                <p><a class="metabox__blog-home-link" href="<?php echo get_post_type_archive_link('program'); ?>"><i class="fa fa-home" aria-hidden="true"></i>All programs</a> <span class="metabox__main"><?php the_title(); ?></span></p>
      </div>

	  	<div class="generic-content">
	  		<?php the_content();  ?>
	  	</div>

	  <hr class="section-break ">


	  	 <?php
       //related profressor
          $relatedProfressors = new WP_Query(array(
              'posts_per_page' => -1, 
              'post_type' => 'professor',
              'orderby' => 'title',
              'order' => 'ASC', 
              'meta_query' => array(
                  array(
                    'key' => 'related_programs',
                    'compare' => 'LIKE',
                    'value' => '"'.get_the_ID().'"'
                  )
                  
                )
          ));
          if ($relatedProfressors->have_posts()){
             echo  '<hr class="section-break ">';
             echo  '<h2 class="headline headline--medium">'. get_the_title().' professor</h2>';

             echo '<ul class="professor-cards">';

            while ($relatedProfressors->have_posts()) {
                $relatedProfressors->the_post() ?>

                <li class="professor-card__list-item">

                  <a class="professor-card" href="<?php the_permalink(); ?>"> 

                    <img class="professor-card__image" src="<?php the_post_thumbnail_url('professorLandscape'); ?>">
                    <span class="professor-card__name"><?php the_title(); ?></span>
                      
                    </a>
                </li>
      <?php
              } 
              echo "</ul>";
          } wp_reset_postdata();


        //for  upcoming events

          $today = date('Ymd');

          $relatedUpcomingEvents = new WP_Query(array(
            'posts_per_page' => -1, //-1 will give all details
            'post_type' => 'event',
            'meta_key' => 'event_date',
            //meta data is extra custom data asocated with post 
            'orderby' => 'meta_value_num', //meta_value is only for alphabate
            //default 'post_date' is we switch random  'rand'
            'order' => 'ASC', //DESC is default 
            //meta_query for custom 
            'meta_query' => array(
                array(
                  'key' => 'event_date', //only event_date
                  'compare' => '>=', //is greater then or eqaul to 
                  'value' => $today, //today date
                  'type' => 'numeric'
                ),
                array(
                	'key' => 'related_programs',
                	'compare' => 'LIKE',
                	'value' => '"'.get_the_ID().'"'
                )
                
              )
          ));
          
	        if ($relatedUpcomingEvents->have_posts()){

	        	 echo  '<hr class="section-break">';
	           echo  '<h2 class="headline headline--medium">Upcoming <?php get_the_title(); ?> Events</h2>';
        

          while ($relatedUpcomingEvents->have_posts()) {
              $relatedUpcomingEvents->the_post() ?>

              <div class="event-summary">
                <a class="event-summary__date t-center" href="<?php the_permalink(); ?>">
                  <span class="event-summary__month"><?php 

                    
                    $eventDate = new DateTime(get_field('event_date'));
                    echo $eventDate->format('M');
                    

                   ?></span>
                  <span class="event-summary__day"><?php echo $eventDate->format('d'); ?></span>  
                </a>
                <div class="event-summary__content">
                  <h5 class="event-summary__title headline headline--tiny"><a href="<?php the_permalink(); ?>"><?php the_title();  ?></a></h5>
                  <p><?php 

                      if( has_excerpt()){
                        echo get_the_excerpt();
                      }else{
                        echo wp_trim_words(get_the_content(), 18);
                      }

                   ?>
                   <a href="<?php the_permalink(); ?>" class="nu gray">Learn more</a></p>
                </div>
              </div>


       <?php

          } //end while
       }//end if
        wp_reset_postdata();

       ?>
	  </div> <!-- container -->
	<?php
}
get_footer();
?>