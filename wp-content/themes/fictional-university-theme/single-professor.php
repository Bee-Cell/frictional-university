<!-- from professor page -->

<?php 
 
	get_header();


while (have_posts()) {
	the_post();

//pagebanner function to call

	pageBanner();

	?>
		


	  <div class="container container--narrow page-section">
	  	
	  	<div class="generic-content">
	  		<div class="row group">
	  			<div class="one-third">
	  				<?php the_post_thumbnail('professorPortrait'); ?>
	  			</div>
	  			<div class="two-thirds">
	  				<?php the_content(); ?>
	  			</div>
	  		</div>
	  	</div>

	  	<?php

	  		$relatedPrograms = get_field('related_programs');

	  		if ($relatedPrograms){
	  			echo '<hr class="section-break">';
	  			// print_r($relatedPrograms); //to check what it is php function
		  		//relation from arrary
		  		echo '<h2 class="headline headline--medium"> Subjects taught </h2>';
		  		echo '<ul class="link-list min-list">';
		  		foreach($relatedPrograms as $program) {
		  		?>
		  			<li><a href="<?php echo get_the_permalink($program); ?>"> <?php echo get_the_title($program); ?></a></li>
		  		<?php
		  		}
	  			echo '</ul>';
	  		}
	  			?>
	  		
	  		
	  		

	  </div> <!-- container -->
	<?php
}
get_footer();
?>