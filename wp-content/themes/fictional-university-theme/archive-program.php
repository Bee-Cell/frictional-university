<!-- from archive proram all -->


<?php 
 
  get_header(); ?>

  <div class="page-banner">
    <div class="page-banner__bg-image" style="background-image: url(<?php echo get_theme_file_uri("/assets/images/ocean.jpg") ?>);"></div>
    <div class="page-banner__content container container--narrow">
      <h1 class="page-banner__title"> All programs</h1>
      <div class="page-banner__intro">
        <p>The is something for veyone. have a loook around</p>
      </div>
    </div>  
  </div>

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