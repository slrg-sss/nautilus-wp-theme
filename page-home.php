<?php 
/* 
* Template Name: Home Page
*/ 
get_header(); ?>

	<div id="primary" class="row-fluid">
		<div id="content" role="main">
			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<article class="post">

						<?php if (!is_front_page()) : ?>
							<h1 class='title'>
								<?php the_title(); ?>
							</h1>
						<?php endif; ?>
										
						<div class="the-content">
							<?php the_content(); ?>
							<?php wp_link_pages(); ?>
						</div>
						
					</article>

				<?php endwhile; ?>

			<?php else : ?>
				
				<article class="post error">
					<h1 class="404"><?php esc_html_e( 'Kein Inhalt vorhanden', 'slrg' ); ?></h1>
				</article>

			<?php endif; ?>
		</div>
		
	</div>
<?php get_footer(); ?>