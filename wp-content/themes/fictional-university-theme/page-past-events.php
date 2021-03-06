<!-- from page past- events -->


<?php 
 
  get_header(); 
  pageBanner(array(
    'title'=> 'Past Events',
    'subtitle'=> 'Recap of our past event...'
  ));

  ?>



  <div class="container container--narrow page-section">
    <?php
    	//custom queriss is needed 

    	$today = date('Ymd');

          $pastEVents = new WP_Query(array(
          	'paged' => get_query_var('paged', 1),
          	// 'posts_per_page' => 1,
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
                  'compare' => '<', //is greater then or eqaul to 
                  'value' => $today, //today date
                  'type' => 'numeric'
                )
              )
          ));

      while ($pastEVents->have_posts()){
        $pastEVents->the_post();
        get_template_part('template-parts/content-event');
      }

      //pagination links for ustom queries and custom page
      echo paginate_links(array(
      	'total' => $pastEVents->max_num_pages
      ));
    ?>
  </div>



<?php
  get_footer();
?>