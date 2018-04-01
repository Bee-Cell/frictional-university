<!-- this is archive  -->
<?php 
  get_header(); 
  pageBanner(array(
    'title' => get_the_archive_title(),
    'subtitle' => get_the_archive_description()
  ));

  ?>

 
      	<?php

        //refrence for me only 
//       	 if (is_category()){
//       		// echo "catagory name will go here";
//       		single_cat_title()
// ;     	 } 
//      	 if(is_author()){
//      	 	// echo "author name will go here";
//      	 	echo 'Posts by ';the_author();
//      	 }

      	//for all dates, catagerories, year, auhtor all new function
      	?>

  <div class="container container--narrow page-section">
    <?php
      while (have_posts()){
        the_post(); ?>

        <div class="post-item">
          <h2 class="headline headline--medium headline--post-title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h2>

          <div class="metabox">
            <p>Posted By <?php the_author_posts_link(); ?> on <?php the_time('n.j.y'); ?> in <?php echo get_the_category_list(', ') ?></p>
          </div>

          <div class="generic-content">
            <?php the_excerpt(); ?>
            <p><a class="btn btn--blue" href="<?php echo the_permalink(); ?>">countinue reading &raquo;</a></p>
        </div>

      </div>

    <?php
      }

      //pagination links
      echo paginate_links();
    ?>
  </div>



<?php
  get_footer();
?>