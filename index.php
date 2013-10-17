<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Eleven
 */

get_header(); ?>

		<div id="primary">
		  <div id="content" role="main">
          <div id="home">
<div class="infobox">
  <?php if (!dynamic_sidebar('sidebar-3')) : ?>
           <?php _e('sidebar-3', 'twentyeleven'); ?>
			<?php endif; //end of sidebar-1 ?> 
            <div class="clearfix"></div>    
</div>

<div class="bannerdiv">
<div class="bannertop"></div>
<div class="bannermid">

    <?php
   if ( function_exists( 'get_wp_parallax_content_slider' ) ) { get_wp_parallax_content_slider(); }
    ?>
      
    </div>
   <div class="bannerbot"></div>
</div>

          
          
<div class="newshome">
  <?php if (!dynamic_sidebar('sidebar-2')) : ?>
           <?php _e('sidebar-2', 'twentyeleven'); ?>
			<?php endif; //end of sidebar-2 ?>
            <div id="newswrapper">
           
            <div id="container" class="js-masonry"
  data-masonry-options='{ "columnWidth": 280, "itemSelector": ".item" }'>
                          
        <?php
 
// The Query
query_posts( array ( 'post_type' => 'nyheder', 'posts_per_page' => 4 ) );
 
// The Loop
while ( have_posts() ) : the_post();
	echo '<div>'; ?>
    <div class="item">
	<div class="newswrap"><div class="newstop"></div><div class="newsmid"><div class="newsimage"><a href="<?php the_permalink() ?>"><?php
echo (types_render_field( "nyhedesfoto", array( "alt" => "Image",
     "proportional" => "true" ) ));
?></a></div>
		<div class="statusnews">
		<a href="<?php the_permalink() ?>"><h3><?php the_title(); ?></h3></a>
		</div></div>
		<div class="newschange"></div>
		<div class="newsresume"><?php the_excerpt(); ?></div>
		<div class="newsend"></div>
		</div>
        </div>
		
	<?php echo '</div>';
endwhile;
 
// Reset Query
wp_reset_query();
 
?>
    
           </div>
           
           </div>
</div>

<div class="adds"><?php if (!dynamic_sidebar('sidebar-1')) : ?>
           <?php _e('sidebar-1', 'twentyeleven'); ?>
			<?php endif; //end of sidebar-1 ?> 
            <div class="clearfix"></div></div>
<?php if ( have_posts() ) : ?>

			  <?php twentyeleven_content_nav( 'nav-above' ); ?>

			  <?php /* Start the Loop */ ?>
			  <?php while ( have_posts() ) : the_post(); ?>

					

			  <?php endwhile; ?>

			  

			<?php else : ?>

			  <article id="post-0" class="post no-results not-found">
					<header class="entry-header">
						<h1 class="entry-title"><?php _e( 'Nothing Found', 'twentyeleven' ); ?></h1>
					</header><!-- .entry-header -->

					<div class="entry-content">
						<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'twentyeleven' ); ?></p>
						
				  </div><!-- .entry-content -->
				</article><!-- #post-0 -->

			<?php endif; ?>
</div>
			</div><!-- #content -->
		</div><!-- #primary -->


<?php get_footer(); ?>