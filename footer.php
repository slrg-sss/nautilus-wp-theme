</main>

<?php 
	$actLang = substr( get_bloginfo ( 'language' ), 0, 2 );
	if( $actLang != "de" && $actLang != "fr" && $actLang != "it"){
		$actLang = "de";
	}
?>

<footer class="site-footer">
	<div class="wrapper">
		<div id="site-info-left">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/SLRG_Logo_footer.png" alt="<?php echo (esc_html_e( 'SLRG Logo ohne Titel', 'slrg' ));?>">
			<div id="site-address">
					<?php 
						echo "<p><strong>".get_theme_mod( 'text_block_section')."</strong><br>";
						
						if(strlen(get_theme_mod( 'text_block_street')) != 0){
							echo get_theme_mod( 'text_block_street')."<br>";
						}
				
						if(strlen(get_theme_mod( 'text_block_street_02')) != 0){
							echo get_theme_mod( 'text_block_street_02')."<br>";
						}
						
						if(strlen(get_theme_mod( 'text_block_location')) != 0){
							echo get_theme_mod( 'text_block_location')."<br>";
						}
				
						if(strlen(get_theme_mod( 'text_block_email')) != 0){
							echo "<a href=\"mailto:".get_theme_mod( 'text_block_email')."\" target=\"_blank\">".get_theme_mod( 'text_block_email')."</a></p>";
						}
						echo "</p>";
						
						if(strlen(get_theme_mod( 'text_block_social_01')) != 0 || strlen(get_theme_mod( 'text_block_social_02')) != 0 || strlen(get_theme_mod( 'text_block_social_03')) != 0 || strlen(get_theme_mod( 'text_block_social_04')) != 0 ){
							echo "<div id=\"footerSocialLinks\"><ul>";
						}
						   
						if(strlen(get_theme_mod( 'text_block_social_01')) != 0){
							echo "<li><a href=\"".get_theme_mod( 'url_block_social_01')."\" target=\"_blank\">".get_theme_mod( 'text_block_social_01')."</a></li>";
						}
					
						if(strlen(get_theme_mod( 'text_block_social_02')) != 0){
							echo "<li><a href=\"".get_theme_mod( 'url_block_social_02')."\" target=\"_blank\">".get_theme_mod( 'text_block_social_02')."</a> </li>";
						}
					
						if(strlen(get_theme_mod( 'text_block_social_03')) != 0){
							echo "<li><a href=\"".get_theme_mod( 'url_block_social_03')."\" target=\"_blank\">".get_theme_mod( 'text_block_social_03')."</a></li>";
						}
						   
						if(strlen(get_theme_mod( 'text_block_social_04')) != 0){
							echo "<li><a href=\"".get_theme_mod( 'url_block_social_04')."\" target=\"_blank\">".get_theme_mod( 'text_block_social_04')."</a></li>";
						}
						   
						if(strlen(get_theme_mod( 'text_block_social_01')) != 0 || strlen(get_theme_mod( 'text_block_social_02')) != 0 || strlen(get_theme_mod( 'text_block_social_03')) != 0 || strlen(get_theme_mod( 'text_block_social_04')) != 0 ){
							echo "</ul></div>";
						}
				
						if(strlen(get_theme_mod( 'text_block_copyright')) != 0){
							echo "<p>".get_theme_mod( 'text_block_copyright')."</p>";
						}
				
					?>
	
			</div>
		</div>
		<div id="site-info-right">
				<p><u><a href="https://www.slrg.ch/<?php print($actLang); ?>" target="_blank"><?php echo (esc_html_e( 'SLRG Schweiz', 'slrg' ));?></a></u></p>
				<?php 
					if(strlen(get_theme_mod( 'text_block_impressum')) != 0){
						echo "<p><a href=\"".get_theme_mod( 'text_block_impressum')."\">".esc_html_e( 'Impressum', 'slrg' )."</a></p>";
					}
				?>
				<p><img src="<?php echo get_template_directory_uri(); ?>/assets/images/SRK_Rettungsorganiation_<?php print($actLang); ?>.png" alt="<?php echo (esc_html_e( 'Organisation des SRK', 'slrg' ));?>" id="SRK_Logo"></p>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>

</body>
</html>