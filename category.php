<?php get_header(); ?>
<div id="primary" class="row-fluid sidebarPage">
  <div id="sidebar" role="sidebar" class="sidebarLeft">
    <?php if (is_active_sidebar('sidebar-custom-header')) : ?>
      <?php dynamic_sidebar('sidebar-custom-header'); ?>
    <?php endif; ?>
  </div>
  <div id="content" role="main" class="sidebarRight">

    <?php if (have_posts()) : ?>

      <header class="archive-header">
        <h2 class="archive-title"><?php single_cat_title('', true); ?></h2>
      </header>

      <?php while (have_posts()) : the_post(); ?>

        <article class="post">

          <h1 class="title">
            <a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>">
              <?php the_title(); ?>
            </a>
          </h1>
          <div class="post-meta">
            <div class="post-meta-left">
              <?php the_time('j. F Y'); ?>
              <?php if (comments_open()) : ?>
                <span class="comments-link">
									 | <?php comments_popup_link(__('Jetzt kommentieren!', 'slrg-sss-nautilus'), __('1 Kommentar', 'slrg-sss-nautilus'), __('% Kommentare', 'slrg-sss-nautilus'));
                  ?>
								</span>
              <?php endif; ?>
            </div>
            <div class="post-meta-right">
              <div class="category"><h5>
                  <?php
                  $anzahl = get_the_category();
                  if (count($anzahl) == 1) {
                    echo(esc_html_e('Kategorie', 'slrg-sss-nautilus'));
                  } else {
                    echo(esc_html_e('Kategorien', 'slrg-sss-nautilus'));
                  }
                  ?>:</h5><?php echo get_the_category_list(); ?>
              </div>
            </div>
          </div>

          <div class="the-content">
            <?php echo substr(get_the_excerpt(), 0, 240); ?>...
            <div class="h-readmore">
              <div class="wp-block-button"><a href="<?php the_permalink(); ?>" class="wp-block-button__link"><?php esc_html_e('weiterlesen', 'slrg-sss-nautilus'); ?></a></div>
            </div>
          </div>

        </article>

      <?php endwhile; ?>

      <div id="pagination" class="clearfix">
        <div class="past-page"><?php previous_posts_link('Neuere Mitteilungen'); ?></div>
        <div class="next-page"><?php next_posts_link('Ältere Mitteilungen'); ?></div>
      </div>


    <?php else : ?>

      <article class="post error">
        <h1 class="404"><?php esc_html_e('Keine Mitteilung vorhanden', 'slrg-sss-nautilus'); ?></h1>
      </article>

    <?php endif; ?>
  </div>
</div>
<?php get_footer(); ?>
