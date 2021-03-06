<?php 

	get_header();

	while (have_posts()) {
		the_post();

    pageBanner();

		?>
		
		

  <div class="container container--narrow page-section">

    <?php 
   
       // echo get_the_ID();//the current page id
        // echo wp_get_post_parent_id(get_the_ID()); //parent page ID

        $theParent = wp_get_post_parent_id(get_the_ID());
        // it return o if page doent have parent page
         //if current page is chld page
        if ($theParent) { ?>
                <div class="metabox metabox--position-up metabox--with-home-link">
                <p><a class="metabox__blog-home-link" href="<?php echo get_permalink($theParent); ?>"><i class="fa fa-home" aria-hidden="true"></i> Back to <?php echo get_the_title($theParent); ?></a> <span class="metabox__main"><?php the_title(); ?></span></p>
        </div>

        <?php
        }
    ?>

    

    <?php

      //return the current page child page ids
      $testArray = get_pages(array(
        'child_of' => get_the_ID()
      ));

      //only if the page have children or relational pages
      if ($theParent or $testArray) {
    ?>
       <!--  menu link for applicatable children pages -->
        <div class="page-links">
          <h2 class="page-links__title"><a href="<?php echo get_permalink($theParent) ?>"><?php echo get_the_title($theParent); ?></a></h2>
          <ul class="min-list">
            <?php

              if($theParent){
                $findChildrenOF = $theParent;
              }
              else{
                //it will b zero so use the current id
                $findChildrenOF = get_the_ID();
              }

              //for listing pages 
            wp_list_pages(array(
              'title_li' => NULL, //no need page ttile"
              'child_of' => $findChildrenOF,
              'sort_column' => 'menu_order'    //custom ordering the list
              )); //provide all pages 
            ?>
          </ul>
        </div>
    <?php
      }
    ?>

    <div class="generic-content">
      <?php the_content(); ?>
    </div>

  </div>



	<?php
	}
	get_footer();
?>