<?php
get_header();
global $wp_query;
?>
<div class="wapper">
  <div class="contentarea clearfix">
    <div class="content">
      <div class="search-header">
        <h1 class="search-title"><?php esc_html_e('Suchresultate', 'slrg-sss-nautilus'); ?></h1>
        <p><?php
          printf(esc_html(_n(
            'Es wurde %d Resultat zum Stichwort «%s» gefunden.',
            'Es wurden %d Resultate zum Stichwort «%s» gefunden.',
            (int)$wp_query->found_posts,
            'slrg-sss-nautilus'
          )), (int)$wp_query->found_posts, get_search_query(false)); ?>
        </p>
      </div>

      <?php if (have_posts()) { ?>

        <ul>

          <?php while (have_posts()) {
            the_post(); ?>

            <li>
              <h3><a href="<?php echo get_permalink(); ?>">
                  <?php the_title(); ?>
                </a></h3>
              <?php echo substr(get_the_excerpt(), 0, 240); ?>...
              <div class="h-readmore">
                <div class="wp-block-button"><a href="<?php the_permalink(); ?>" class="wp-block-button__link"><?php esc_html_e('weiterlesen', 'slrg-sss-nautilus'); ?></a></div>
              </div>
            </li>

          <?php } ?>

        </ul>
        <div class="search-pageing">
          <?php echo paginate_links(); ?>
        </div>

      <?php } ?>

      <div class="search-footer">
        <p><?php esc_html_e('Nicht das gefunden, nach dem du gesucht hast?', 'slrg-sss-nautilus'); ?></p>
        <h3><?php esc_html_e('Nochmals suchen...', 'slrg-sss-nautilus'); ?></h3>
        <?php get_search_form(); ?>
      </div>

    </div>
  </div>
</div>
<?php get_footer(); ?>
