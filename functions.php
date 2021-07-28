<?php
// Define the version so we can easily replace it throughout the theme
define( 'SLRG_VERSION', 1.0 );

/*-----------------------------------------------------------------------------------*/
/*  Set the maximum allowed width for any content in the theme
/*-----------------------------------------------------------------------------------*/
if ( ! isset( $content_width ) ) $content_width = 1140;

/*-----------------------------------------------------------------------------------*/
/* Add Rss feed support to Head section
/*-----------------------------------------------------------------------------------*/
add_theme_support( 'automatic-feed-links' );

/*-----------------------------------------------------------------------------------*/
/* Add post thumbnail/featured image support
/*-----------------------------------------------------------------------------------*/
add_theme_support( 'post-thumbnails' );

/*-----------------------------------------------------------------------------------*/
/* Register main menu for Wordpress use
/*-----------------------------------------------------------------------------------*/
register_nav_menus( 
	array(
		'primary'	=>	__( 'Primary Menu', 'slrg' ), 
		'meta'	=>	__( 'Meta Menu', 'slrg' ),
	)
);

/*-----------------------------------------------------------------------------------*/
/* Activate sidebar for Wordpress use
/*-----------------------------------------------------------------------------------*/
function slrg_register_sidebars() {
	register_sidebar(array(
		'id' => 'sidebar',
		'name' => 'Sidebar',
		'description' => 'Take it on the side...',
		'before_widget' => '<div>',
		'after_widget' => '</div>',
		'before_title' => '<h3 class="side-title">',
		'after_title' => '</h3>',
		'empty_title'=> '',
	));
} 
add_action( 'widgets_init', 'slrg_register_sidebars' );


load_theme_textdomain('slrg', get_template_directory() . '/languages' );

add_theme_support( 'custom-logo' );

function custom_logo_setup() {
    $defaults = array(
        'height'               => 100,
        'width'                => 400,
        'flex-height'          => true,
        'flex-width'           => true,
        'header-text'          => array( 'site-title', 'site-description' ),
        'unlink-homepage-logo' => false, 
    );
	
    add_theme_support( 'custom-logo', $defaults );
}
 
add_action( 'after_setup_theme', 'custom_logo_setup' );

function wpdc_add_custom_gutenberg_color_palette() {
	add_theme_support(
		'editor-color-palette',
		[
			[
				'name'  => esc_html__( 'Schwarz', 'wpdc' ),
				'slug'  => 'SLRG-Schwarz',
				'color' => '#191919',
			],
			[
				'name'  => esc_html__( 'SLRG Blau', 'wpdc' ),
				'slug'  => 'SLRG-Blau',
				'color' => '#004fab',
			],
			[
				'name'  => esc_html__( 'SLRG Rot', 'wpdc' ),
				'slug'  => 'SLRG-Rot',
				'color' => '#EA0A0A',
			],

		]
	);
}
add_action( 'after_setup_theme', 'wpdc_add_custom_gutenberg_color_palette' );


/*-----------------------------------------------------------------------------------*/
/* Theme Customizer options for SLRG
/*-----------------------------------------------------------------------------------*/

function slrg_register_theme_customizer( $wp_customize ) {

    $wp_customize->add_panel( 'text_blocks', array(
        'priority'       => 50,
        'theme_supports' => '',
        'title'          => __( 'Footer', 'slrg' ),
        'description'    => __( 'Adresse & Links der Sektionen', 'slrg' ),
    ) );

    $wp_customize->add_section( 'adress_text' , array(
        'title'    => __('Adresse','slrg'),
        'panel'    => 'text_blocks',
        'priority' => 10
    ) );
	
	$wp_customize->add_section( 'social_text' , array(
        'title'    => __('Socialmedia Links','slrg'),
        'panel'    => 'text_blocks',
        'priority' => 20
    ) );
	
	$wp_customize->add_section( 'impressum_text' , array(
        'title'    => __('Impressum Link','slrg'),
        'panel'    => 'text_blocks',
        'priority' => 30
    ) );
	
	$wp_customize->add_section( 'copyright_text' , array(
        'title'    => __('Copyright','slrg'),
        'panel'    => 'text_blocks',
        'priority' => 40
    ) );
	
	$wp_customize->add_setting( 'text_block_social_01', array(
         'default'           => __( 'Facebook', 'slrg' ),
         'sanitize_callback' => 'sanitize_text'
    ) );
	
	$wp_customize->add_setting( 'url_block_social_01', array(
         'default'           => __( 'https://www.facebook.com/...', 'slrg' ),
         'sanitize_callback' => 'sanitize_text'
    ) );
	
	$wp_customize->add_setting( 'text_block_social_02', array(
         'default'           => __( 'Instagram', 'slrg' ),
         'sanitize_callback' => 'sanitize_text'
    ) );
	
	$wp_customize->add_setting( 'url_block_social_02', array(
         'default'           => __( 'https://www.instagram.com/...', 'slrg' ),
         'sanitize_callback' => 'sanitize_text'
    ) );
	
	$wp_customize->add_setting( 'text_block_social_03', array(
         'default'           => __( 'Youtube', 'slrg' ),
         'sanitize_callback' => 'sanitize_text'
    ) );
	
	$wp_customize->add_setting( 'url_block_social_03', array(
         'default'           => __( 'https://www.youtube.com/...', 'slrg' ),
         'sanitize_callback' => 'sanitize_text'
    ) );
	
	$wp_customize->add_setting( 'text_block_social_04', array(
         'default'           => __( 'Tiktok', 'slrg' ),
         'sanitize_callback' => 'sanitize_text'
    ) );
	
	$wp_customize->add_setting( 'url_block_social_04', array(
         'default'           => __( 'https://www.tiktok.com/...', 'slrg' ),
         'sanitize_callback' => 'sanitize_text'
    ) );
	
	$wp_customize->add_setting( 'text_block_section', array(
         'default'           => __( 'SLRG Sektion XX', 'slrg' ),
         'sanitize_callback' => 'sanitize_text'
    ) );

    $wp_customize->add_setting( 'text_block_street', array(
         'default'           => __( 'Strasse', 'slrg' ),
         'sanitize_callback' => 'sanitize_text'
    ) );
	
	 $wp_customize->add_setting( 'text_block_street_02', array(
         'default'           => __( 'Strasse 2', 'slrg' ),
         'sanitize_callback' => 'sanitize_text'
    ) );
	
	$wp_customize->add_setting( 'text_block_location', array(
         'default'           => __( '0000 Ort', 'slrg' ),
         'sanitize_callback' => 'sanitize_text'
    ) );
	
	$wp_customize->add_setting( 'text_block_email', array(
         'default'           => __( 'info@sektion.ch', 'slrg' ),
         'sanitize_callback' => 'sanitize_text'
    ) );
	
	$wp_customize->add_setting( 'text_block_impressum', array(
         'default'           => __( '', 'slrg' ),
         'sanitize_callback' => 'sanitize_text'
    ) );
	
	$wp_customize->add_setting( 'text_block_copyright', array(
         'default'           => __( '© 2021 SLRG Sektion XX', 'slrg' ),
         'sanitize_callback' => 'sanitize_text'
    ) );
	
	$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'text_block_social_01',
            array(
                'label'    => __( 'Social-Media-Plattform 01', 'slrg' ),
                'section'  => 'social_text',
                'settings' => 'text_block_social_01',
                'type'     => 'text'
            )
        )
    );
	
	$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'url_block_social_01',
            array(
                'section'  => 'social_text',
                'settings' => 'url_block_social_01',
                'type'     => 'text'
            )
        )
    );
	
	$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'text_block_social_02',
            array(
                'label'    => __( 'Social-Media-Plattform 02', 'slrg' ),
                'section'  => 'social_text',
                'settings' => 'text_block_social_02',
                'type'     => 'text'
            )
        )
    );
	
	$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'url_block_social_02',
            array(
                'section'  => 'social_text',
                'settings' => 'url_block_social_02',
                'type'     => 'text'
            )
        )
    );
	
	$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'text_block_social_03',
            array(
                'label'    => __( 'Social-Media-Plattform 03', 'slrg' ),
                'section'  => 'social_text',
                'settings' => 'text_block_social_03',
                'type'     => 'text'
            )
        )
    );
	
	$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'url_block_social_03',
            array(
                'section'  => 'social_text',
                'settings' => 'url_block_social_03',
                'type'     => 'text'
            )
        )
    );
	
	$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'text_block_social_04',
            array(
                'label'    => __( 'Social-Media-Plattform 04', 'slrg' ),
                'section'  => 'social_text',
                'settings' => 'text_block_social_04',
                'type'     => 'text'
            )
        )
    );
	
	$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'url_block_social_04',
            array(
                'section'  => 'social_text',
                'settings' => 'url_block_social_04',
                'type'     => 'text'
            )
        )
    );
	
	$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'text_block_section',
            array(
                'label'    => __( 'Sektion', 'slrg' ),
                'section'  => 'adress_text',
                'settings' => 'text_block_section',
                'type'     => 'text'
            )
        )
    );

    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'text_block_street',
            array(
                'label'    => __( 'Strasse', 'slrg' ),
                'section'  => 'adress_text',
                'settings' => 'text_block_street',
                'type'     => 'text'
            )
        )
    );
	
	$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'text_block_street_02',
            array(
                'label'    => __( 'Strasse 2', 'slrg' ),
                'section'  => 'adress_text',
                'settings' => 'text_block_street_02',
                'type'     => 'text'
            )
        )
    );
	
	$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'text_block_location',
            array(
                'label'    => __( 'Ort', 'slrg' ),
                'section'  => 'adress_text',
                'settings' => 'text_block_location',
                'type'     => 'text'
            )
        )
    );
	
	$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'text_block_email',
            array(
                'label'    => __( 'E-Mail-Adresse', 'slrg' ),
                'section'  => 'adress_text',
                'settings' => 'text_block_email',
                'type'     => 'text'
            )
        )
    );
	
	$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'text_block_impressum',
            array(
                'label'    => __( 'Impressum URL', 'slrg' ),
                'section'  => 'impressum_text',
                'settings' => 'text_block_impressum',
                'type'     => 'text'
            )
        )
    );
	
	$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'text_block_copyright',
            array(
                'label'    => __( 'Copyright Text', 'slrg' ),
                'section'  => 'copyright_text',
                'settings' => 'text_block_copyright',
                'type'     => 'text'
            )
        )
    );
	
	$wp_customize->add_panel( 'lang_text_block', array(
        'priority'       => 60,
        'theme_supports' => '',
        'title'          => __( 'Sprache', 'slrg' ),
        'description'    => __( 'Wähle die Sprache deiner Sektionen', 'slrg' ),
    ) );
	
	$wp_customize->add_section( 'Sprache_text' , array(
        'title'    => __('Sprache wählen','slrg'),
        'panel'    => 'lang_text_block',
        'priority' => 10
    ) );

	$wp_customize->add_setting( 'slrg_radio_setting_id', array(
		'capability' => 'edit_theme_options',
		'default' => 'blue',
		'sanitize_callback' => 'slrg_customizer_sanitize_radio',
	) );
	$wp_customize->add_control( 'slrg_radio_setting_id', array(
		'type' => 'radio',
		'section' => 'Sprache_text',
		'label' => __( 'Wähle die Sprache:' ),
		'choices' => array(
			'de' => __( 'Deutsch' ),
			'fr' => __( 'Français' ),
			'it' => __( 'Italiano' ),
		),
	) );
	
  
    // Sanitize text
    function sanitize_text( $text ) {
        return sanitize_text_field( $text );
    }
	
	function slrg_customizer_sanitize_radio( $input, $setting ) {
		// Ensure input is a slug
		$input = sanitize_key( $input );

		// Get a list of choices from the control associated with the setting.
		$choices = $setting->manager->get_control( $setting->id )->choices;

		// If the input is a valid key, return it; otherwise, return the default.
		return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
	}
}
add_action( 'customize_register', 'slrg_register_theme_customizer' );


function slrg_add_custom_box() {
    $screens = [ 'post', 'page' ];
    foreach ( $screens as $screen ) {
        add_meta_box(
            'slrg_box_id', 
            'Seiten Header Optionen',
            'slrg_custom_box_html',
            $screen,
			'side',
			'core'
        );
    }
}
add_action( 'add_meta_boxes', 'slrg_add_custom_box' );


function slrg_custom_box_html( $post ) {
    $value = get_post_meta( $post->ID, '_slrg_meta_key', true );
    ?>
    <label for="slrg_field">Gewünschter Header anzeigen</label>
    <select name="slrg_field" id="slrg_field" class="postbox" style="min-width: 150px; border: 1px solid #777; margin-top: 8px;">
        <option value="1" <?php selected( $value, '1' ); ?>>Links anzeigen</option>
        <option value="2" <?php selected( $value, '2' ); ?>>Zentriert mit Hintergrundbild</option>
		<option value="3" <?php selected( $value, '3' ); ?>>Nur Hintergrundbild</option>
    </select>
	<style>
		#slrg_box_id{
			background-color: #f2f2f2;
		}
		#slrg_box_id .postbox-header div{
			display: none;
		}
	</style>
    <?php
}

function slrg_save_postdata( $post_id ) {
    if ( array_key_exists( 'slrg_field', $_POST ) ) {
        update_post_meta(
            $post_id,
            '_slrg_meta_key',
            $_POST['slrg_field']
        );
    }
}
add_action( 'save_post', 'slrg_save_postdata' );