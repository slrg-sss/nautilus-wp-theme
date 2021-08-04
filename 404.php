<?php
/**
 * The template for displaying 404 pages (not found)
 */

get_header(); ?>

	<div id="primary" class="row-fluid">
		<div id="content" role="main">

			<section class="error-404 not-found">
				<h1 class="404"><?php esc_html_e( 'Seite nicht gefunden [404]', 'slrg' ); ?></h1>
				<div class="page-content">
					<p><?php esc_html_e( 'Es tut uns leid, aber die von Ihnen angeforderte Seite konnte nicht gefunden werden!', 'slrg' ); ?></p>
					<?php get_search_form(); ?>
				</div>
			</section>

		</div>
	</div>

<?php get_footer(); ?>