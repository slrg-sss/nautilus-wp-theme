<?php if ( ! dynamic_sidebar( 'sidebar' ) ) : ?>
	<aside id="archives" class="widget">
		<h3 class="side-title"><?php _e( 'Archives', 'slrg' ); ?></h3>
		<ul>
			<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
		</ul>
	</aside>

	<aside id="meta" class="widget">
		<h3 class="side-title"><?php _e( 'Meta', 'slrg' ); ?></h3>
		<ul>
			<?php wp_register(); ?>
			<li><?php wp_loginout(); ?></li>
			<?php wp_meta(); ?>
		</ul>
	</aside>

<?php endif;?>