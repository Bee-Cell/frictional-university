<!-- from archive proram all -->


<?php 
 
  get_header(); 
  pageBanner(array(
    'title' => 'All Programs',
    'subtitle'=> 'The is something for veyone. have a loook around..'
  ));

  ?>



  <div class="container container--narrow page-section">

  	<ul class="link-list min-list">
    <?php
    	//adjusting some wp_query in functions



      while (have_posts()){
        the_post(); ?>

      	<li><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></li>

    <?php
      }

      //pagination links
      echo paginate_links();
    ?>

    </ul>
  </div>



<?php
  get_footer();
?>