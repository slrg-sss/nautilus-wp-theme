</main>

<footer class="site-footer">
	<div class="wrapper">
		<div id="site-info-left">
			<img src="<?php echo get_template_directory_uri(); ?>/assets/images/SLRG_Logo_footer.png" alt="SLRG Logo ohne Titel">
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
							echo "<li><a href=\"".get_theme_mod( 'text_block_social_02')."\" target=\"_blank\">".get_theme_mod( 'text_block_social_02')."</a> </li>";
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
				<p><u><a href="https://www.slrg.ch/" target="_blank">SLRG Schweiz</a></u></p>
				<?php 
					if(strlen(get_theme_mod( 'text_block_impressum')) != 0){
						echo "<p><a href=\"".get_theme_mod( 'text_block_impressum')."\">Impressum</a></p>";
					}
				?>
				<p><img src="<?php echo get_template_directory_uri(); ?>/assets/images/SRK_Rettungsorganiation_<?php print(get_theme_mod( 'slrg_radio_setting_id')); ?>.png" alt="Organisation des SRK" id="SRK_Logo"></p>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>

</body>
</html>