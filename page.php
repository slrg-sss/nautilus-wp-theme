<?php
/**
 * The template for displaying any single page.
 */

get_header(); ?>

<?php $meta = get_post_meta( $post->ID, '_slrg_meta_key', true );
	if($meta == 1){
		print("<div id=\"PageHeader01\"><h1 class='title'>");
		the_title();
		print("</h1></div>");
	};
	if($meta == 2){
		$bg_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
		print("</main><div id=\"PageHeader02\" style=\"background-image: url('".$bg_url."'\">
		<div id=\"PageHeaderOverlay\"></div><h1 class='title'>");
		the_title();
		print("</h1></div><main class=\"main-fluid\">");
	};
	if($meta == 3){
		$bg_url = get_the_post_thumbnail_url(get_the_ID(),'full'); 
		print("</main><div id=\"PageHeader03\" style=\"background-image: url('".$bg_url."'\">
		</div><main class=\"main-fluid\">");
	};
?>
	<div id="primary" class="row-fluid">
		<div id="content" role="main">

			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<article class="post">
						
						<div class="the-content">
							<?php the_content(); ?>
							<?php wp_link_pages(); ?>
						</div>
						
					</article>

				<?php endwhile; ?>

			<?php else : ?>
				
				<article class="post error">
					<h1 class="404"><?php esc_html_e( 'Kein Inhalt vorhanden', 'slrg-sss-nautilus' ); ?></h1>
				</article>

			<?php endif; ?>

		</div>
	</div>
<?php get_footer(); ?>