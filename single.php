<?php get_header(); ?>
	<div id="primary" class="row-fluid">
		<div id="sidebar" role="sidebar" class="sidebarLeft">
			<?php get_sidebar(); ?>
		</div>
		<div id="content" role="main" class="sidebarRight">

			<?php if ( have_posts() ) : ?>

				<?php while ( have_posts() ) : the_post(); ?>

					<article class="post">
					
						<h1 class="title"><?php the_title(); ?></h1>
						<div class="post-meta">
						<div class="post-meta-left">
							<?php the_time('j. F Y'); ?> 
							<?php if( comments_open() ) : ?>
								<span class="comments-link">
									 | <?php comments_popup_link( __( 'Kommentieren', 'slrg' ), __( '1 Kommentar', 'slrg' ), __( '% Kommentare', 'slrg' ) ); 
									?>
								</span>
							<?php endif; ?>
						</div>
						<div class="post-meta-right">
							<div class="category"><h5>
								<?php 
								$anzahl = get_the_category(); 
								if(count($anzahl) == 1){
									echo (esc_html_e( 'Kategorie', 'slrg' ));
								}else{
									echo (esc_html_e( 'Kategorien', 'slrg' ));
								}
								?>:</h5><?php echo get_the_category_list(); ?>
							</div>
						</div>
						</div>
						
						<div class="the-content">
							<?php the_content(); ?>		
							<?php wp_link_pages(); ?>
						</div>
						
					</article>

				<?php endwhile; ?>
				
				<?php
					if ( comments_open() || '0' != get_comments_number() )
						comments_template( '', true );
				?>


			<?php else : ?>
				
				<article class="post error">
					<h1 class="404"><?php esc_html_e( 'Keine News vorhanden', 'slrg' ); ?></h1>
				</article>

			<?php endif; ?>

		</div>
	</div>
<?php get_footer(); ?>
