<?php
/**
 * The template for displaying content in the single.php template
 * @package WordPress
 * @subpackage CALSv1
 * @since CALS 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<div class="facultyImage">
		<?php 

$image = get_field('profile_photo');
$size = 'medium'; // (thumbnail, medium, large, full or custom size)

if( $image ) {

	echo wp_get_attachment_image( $image, $size );

}

?>
		</div>
		<div class="facultyMainInfo">
		<h1 class="entry-title"><?php the_title(); ?></h1>
	
		
		

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
		<div class="clear"></div>

		<?php if ( 'post' == get_post_type() ) : ?>
		<div class="entry-meta">
			<?php twentyeleven_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content"> <?php the_content(); ?>
		
		
		
		
		
	</div><!-- .entry-content -->

	<div class="publicationsContainer" style="display: none;" >
		<h3>Publications</h3>
		<div class="publicationsCheck">
			<?php the_field('publications'); ?>
		</div>
	</div>

	
</article><!-- #post-<?php the_ID(); ?> -->
