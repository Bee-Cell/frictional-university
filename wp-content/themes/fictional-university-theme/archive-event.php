<!-- for showing the all events in another pages -->
<?php 
 
  get_header(); 
  pageBanner(array(
    'title' => 'All Events',
    'subtitle'=> 'See what is going in our world...'
  ));

  ?>


  <div class="container container--narrow page-section">
    <?php

      //we dont need custom query but we can do with wp default url based query but we need twik and change
      while (have_posts()){
          the_post(); 
          get_template_part('template-parts/content-event');
      }

      //pagination links
      echo paginate_links();
    ?>
    <hr class="section-break">

    <p>looking for a recap of past events ? <a href="<?php echo site_url('/past-events') ?>"> check  out our past events archive</a> </p>
  </div>



<?php
  get_footer();
?>