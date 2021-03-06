<?php
/**
 *  Template Name: Sidebar
 */
get_header(); ?>

<?php $headerOption = get_post_meta($post->ID, '_slrg-sss-nautilus_header-option', true);
if ($headerOption == 2) {
  $bg_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
  print("</main><div id=\"PageHeader02\" style=\"background-image: url('" . $bg_url . "'\">
		<div id=\"PageHeaderOverlay\"></div><h1 class='title'>");
  the_title();
  print("</h1></div><main class=\"main-fluid\">");
};
if ($headerOption == 3) {
  $bg_url = get_the_post_thumbnail_url(get_the_ID(), 'full');
  print("</main><div id=\"PageHeader03\" style=\"background-image: url('" . $bg_url . "'\">
		</div><main class=\"main-fluid\">");
};
?>
<div id="primary" class="row-fluid sidebarPage">
  <div id="sidebar" role="sidebar" class="sidebarLeft">
    <?php get_sidebar(); ?>
  </div>
  <div id="content" role="main" class="sidebarRight">
    <?php if (have_posts()) : ?>

      <?php while (have_posts()) : the_post(); ?>

        <article class="post">

          <div class="the-content">

            <?php if ($headerOption == 1 || $headerOption == '') {
              print("<h1 class='title'>");
              the_title();
              print("</h1>");
            };
            ?>
            <?php the_content(); ?>
            <?php wp_link_pages(); ?>
          </div>

        </article>

      <?php endwhile; ?>

    <?php else : ?>

      <article class="post error">
        <h1 class="404"><?php esc_html_e('Keine Mitteilung vorhanden', 'slrg-sss-nautilus'); ?></h1>
      </article>

    <?php endif; ?>
  </div>
</div>
<?php get_footer(); ?>
