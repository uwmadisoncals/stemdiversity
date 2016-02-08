<?php
/*
Template Name: Faculty Page
*/

get_header(); ?>

	<div id="primary" class="content-area <?php $image = get_field('hero_image_pages'); if($image) { echo "heroImage"; } ?>">
		<main id="main" class="site-main" role="main">
			<div class="cf pagePadding">
				
				<?php
					$member_group_terms = get_terms( 'stafftypes' );
				?>
				
				<?php
				foreach ( $member_group_terms as $member_group_term ) {
				    $member_group_query = new WP_Query( array(
				        'post_type' => 'faculty',
				        'posts_per_page' => '200',
				        'tax_query' => array(
				            array(
				                'taxonomy' => 'stafftypes',
				                'field' => 'slug',
				                'terms' => array( $member_group_term->slug ),
				                'operator' => 'IN'
				            )
				        ),
				        'meta_key' => 'last_name', 'orderby' => 'meta_value', 'order' => 'ASC'
				    ) );
				    ?>
				    <h2 class="taxonomy_title"><?php echo $member_group_term->name; ?></h2>
				    
				    <?php
				    if ( $member_group_query->have_posts() ) : while ( $member_group_query->have_posts() ) : $member_group_query->the_post(); ?>
				        <div class="faculty">
							
							
								<div class="personPhoto">
    			
								<a href="<?php the_permalink(); ?>">
    				
				    				<?php 

$image = get_field('profile_photo');
$size = 'medium'; // (thumbnail, medium, large, full or custom size)

if( $image ) {

	echo wp_get_attachment_image( $image, $size );

} else { ?>
				 
											<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/avatarplaceholder.jpg" alt=" ">
				
 <?php } ?>

				
								</a>
				    		</div>
				    		
				<div class="text">
    			
    			<div class="titleheading">
    			<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
    			<!--<div class="workingTitle"><?php the_field('working_title'); ?></div>-->
				
    			
    			
    			
    				<div class="contactInfo">
    			
	    				<div class="officeLocation">
	    					<?php the_field('office'); ?>
	    				</div>
	    				
	    				<div class="officePhone">
	    					<?php the_field('phone'); ?>
	    				</div>
	    				
	    				<div class="officeEmail">
	    					<a href="mailto:<?php the_field('email'); ?>"><?php the_field('email'); ?></a>
	    				</div>
    				</div>
	    		
    			</div>
    			
    			
    			
    			
    			    			
					
					
    		</div>
    		
    		
								
								
								
								
								
							
						</div>
				    <?php endwhile; endif; ?>
				    
				    <?php
				    // Reset things, for good measure
				    $member_group_query = null;
				    wp_reset_postdata();
				}
				?>

				
			
			</div>

		</main><!-- #main -->
	</div><!-- #primary -->

	
<?php get_footer(); ?>
