<?php

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
		'primary'	=>	__( 'Hauptmenü', 'slrg-sss-nautilus' ), 
		'meta'	=>	__( 'Meta-Navigation', 'slrg-sss-nautilus' ),
	)
);

/*-----------------------------------------------------------------------------------*/
/* Enqueue theme stylesheets and scripts
/*-----------------------------------------------------------------------------------*/
function enqueue_theme_css_js() {
  wp_enqueue_style(
   'style.css',
   get_template_directory_uri() . '/style.css',
   array(),
   wp_get_theme()->get( 'Version' )
  );
  wp_enqueue_script(
    'main.js',
    get_template_directory_uri() . '/js/main.js',
    array('jquery'),
    wp_get_theme()->get( 'Version' )
  );
}
add_action( 'wp_enqueue_scripts', 'enqueue_theme_css_js' );

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
	register_sidebar( array(
		'name' => __( 'Sidebar Beiträge', 'slrg-sss-nautilus' ),
		'id' => 'sidebar-custom-header',
		'description' => __( 'Bereich für Widget in der Sidebar für Beiträge', 'slrg-sss-nautilus' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s">',
		'after_widget' => '</aside>',
		'before_title' => '<h3 class="widget-title">',
		'after_title' => '</h3>',
	));
} 
add_action( 'widgets_init', 'slrg_register_sidebars' );

/*-----------------------------------------------------------------------------------*/
/* Load translation
/*-----------------------------------------------------------------------------------*/
load_theme_textdomain('slrg-sss-nautilus', get_template_directory() . '/languages' );


/*-----------------------------------------------------------------------------------*/
/* Custom-Logo
/*-----------------------------------------------------------------------------------*/

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

/*-----------------------------------------------------------------------------------*/
/* Gutenberg Color-palette
/*-----------------------------------------------------------------------------------*/

function slrg_add_custom_gutenberg_color_palette() {
	add_theme_support(
		'editor-color-palette',
		[
			[
				'name'  => esc_html__( 'Schwarz', 'slrg-sss-nautilus' ),
				'slug'  => 'SLRG-Schwarz',
				'color' => '#000000',
			],
			[
				'name'  => esc_html__( 'SLRG Blau', 'slrg-sss-nautilus' ),
				'slug'  => 'SLRG-Blau',
				'color' => '#375B9B',
			],
			[
				'name'  => esc_html__( 'SLRG Rot', 'slrg-sss-nautilus' ),
				'slug'  => 'SLRG-Rot',
				'color' => '#C02F2E',
			],
			[
				'name'  => esc_html__( 'BG Schwarz', 'slrg-sss-nautilus' ),
				'slug'  => 'SLRG-BG-Schwarz',
				'color' => '#ececec',
			],
			[
				'name'  => esc_html__( 'SLRG BG Blau', 'slrg-sss-nautilus' ),
				'slug'  => 'SLRG-BG-Blau',
				'color' => '#d2ddef',
			],
			[
				'name'  => esc_html__( 'SLRG BG Rot', 'slrg-sss-nautilus' ),
				'slug'  => 'SLRG-BG-Rot',
				'color' => '#f4d3d3',
			],

		]
	);
}
add_action( 'after_setup_theme', 'slrg_add_custom_gutenberg_color_palette' );


/*-----------------------------------------------------------------------------------*/
/* Theme Customizer options for SLRG
/*-----------------------------------------------------------------------------------*/

function slrg_register_theme_customizer( $wp_customize ) {

    $wp_customize->add_panel( 'text_blocks', array(
        'priority'       => 50,
        'theme_supports' => '',
        'title'          => __( 'Footer', 'slrg-sss-nautilus' ),
        'description'    => __( 'Adresse & Links der Sektionen', 'slrg-sss-nautilus' ),
    ) );

    $wp_customize->add_section( 'adress_text' , array(
        'title'    => __('Adresse','slrg-sss-nautilus'),
        'panel'    => 'text_blocks',
        'priority' => 10
    ) );
	
	$wp_customize->add_section( 'social_text' , array(
        'title'    => __('Socialmedia Links','slrg-sss-nautilus'),
        'panel'    => 'text_blocks',
        'priority' => 20
    ) );
	
	$wp_customize->add_section( 'impressum_text' , array(
        'title'    => __('Impressum Link','slrg-sss-nautilus'),
        'panel'    => 'text_blocks',
        'priority' => 30
    ) );
	
	$wp_customize->add_section( 'copyright_text' , array(
        'title'    => __('Copyright','slrg-sss-nautilus'),
        'panel'    => 'text_blocks',
        'priority' => 40
    ) );
	
	$wp_customize->add_setting( 'text_block_social_01', array(
         'sanitize_callback' => 'sanitize_text'
    ) );
	
	$wp_customize->add_setting( 'url_block_social_01', array(
         'sanitize_callback' => 'sanitize_text'
    ) );
	
	$wp_customize->add_setting( 'text_block_social_02', array(
         'sanitize_callback' => 'sanitize_text'
    ) );
	
	$wp_customize->add_setting( 'url_block_social_02', array(
         'sanitize_callback' => 'sanitize_text'
    ) );
	
	$wp_customize->add_setting( 'text_block_social_03', array(
         'sanitize_callback' => 'sanitize_text'
    ) );
	
	$wp_customize->add_setting( 'url_block_social_03', array(
         'sanitize_callback' => 'sanitize_text'
    ) );
	
	$wp_customize->add_setting( 'text_block_social_04', array(
         'sanitize_callback' => 'sanitize_text'
    ) );
	
	$wp_customize->add_setting( 'url_block_social_04', array(
         'sanitize_callback' => 'sanitize_text'
    ) );
	
	$wp_customize->add_setting( 'text_block_section', array(
         'sanitize_callback' => 'sanitize_text'
    ) );

    $wp_customize->add_setting( 'text_block_street', array(
         'sanitize_callback' => 'sanitize_text'
    ) );
	
	 $wp_customize->add_setting( 'text_block_street_02', array(
         'sanitize_callback' => 'sanitize_text'
    ) );
	
	$wp_customize->add_setting( 'text_block_location', array(
         'sanitize_callback' => 'sanitize_text'
    ) );
	
	$wp_customize->add_setting( 'text_block_email', array(
         'sanitize_callback' => 'sanitize_text'
    ) );
	
	$wp_customize->add_setting( 'text_block_impressum', array(
         'sanitize_callback' => 'sanitize_text'
    ) );
	
	$wp_customize->add_setting( 'text_block_copyright', array(
         'sanitize_callback' => 'sanitize_text'
    ) );
	
	$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'text_block_social_01',
            array(
                'label'    => __( 'Social-Media-Plattform 01', 'slrg-sss-nautilus' ),
                'section'  => 'social_text',
                'settings' => 'text_block_social_01',
                'type'     => 'text',
				'input_attrs' => array(
					'placeholder' => __( 'z.B. Facebook', 'slrg-sss-nautilus' ),
				)
            )
        )
    );
	
	$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'url_block_social_01',
            array(
                'section'  => 'social_text',
                'settings' => 'url_block_social_01',
                'type'     => 'text',
				'input_attrs' => array(
					'placeholder' => __( 'https://www.facebook.com/...', 'slrg-sss-nautilus' ),
				)
            )
        )
    );
	
	$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'text_block_social_02',
            array(
                'label'    => __( 'Social-Media-Plattform 02', 'slrg-sss-nautilus' ),
                'section'  => 'social_text',
                'settings' => 'text_block_social_02',
                'type'     => 'text',
				'input_attrs' => array(
					'placeholder' => __( 'z.B. Instagram', 'slrg-sss-nautilus' ),
				)
            )
        )
    );
	
	$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'url_block_social_02',
            array(
                'section'  => 'social_text',
                'settings' => 'url_block_social_02',
                'type'     => 'text',
				'input_attrs' => array(
					'placeholder' => __( 'https://www.instagram.com/...', 'slrg-sss-nautilus' ),
				)
            )
        )
    );
	
	$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'text_block_social_03',
            array(
                'label'    => __( 'Social-Media-Plattform 03', 'slrg-sss-nautilus' ),
                'section'  => 'social_text',
                'settings' => 'text_block_social_03',
                'type'     => 'text',
				'input_attrs' => array(
					'placeholder' => __( 'z.B. Youtube', 'slrg-sss-nautilus' ),
				)
            )
        )
    );
	
	$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'url_block_social_03',
            array(
                'section'  => 'social_text',
                'settings' => 'url_block_social_03',
                'type'     => 'text',
				'input_attrs' => array(
					'placeholder' => __( 'https://www.youtube.com/...', 'slrg-sss-nautilus' ),
				)
            )
        )
    );
	
	$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'text_block_social_04',
            array(
                'label'    => __( 'Social-Media-Plattform 04', 'slrg-sss-nautilus' ),
                'section'  => 'social_text',
                'settings' => 'text_block_social_04',
                'type'     => 'text',
				'input_attrs' => array(
					'placeholder' => __( 'z.B. Tiktok', 'slrg-sss-nautilus' ),
				)
            )
        )
    );
	
	$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'url_block_social_04',
            array(
                'section'  => 'social_text',
                'settings' => 'url_block_social_04',
                'type'     => 'text',
				'input_attrs' => array(
					'placeholder' => __( 'https://www.tiktok.com/...', 'slrg-sss-nautilus' ),
				)
            )
        )
    );
	
	$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'text_block_section',
            array(
                'label'    => __( 'Sektion', 'slrg-sss-nautilus' ),
                'section'  => 'adress_text',
                'settings' => 'text_block_section',
                'type'     => 'text',
				'input_attrs' => array(
					'placeholder' => __( 'SLRG Sektion XX', 'slrg-sss-nautilus' ),
				)
            )
        )
    );

    $wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'text_block_street',
            array(
                'label'    => __( 'Strasse', 'slrg-sss-nautilus' ),
                'section'  => 'adress_text',
                'settings' => 'text_block_street',
                'type'     => 'text',
				'input_attrs' => array(
					'placeholder' => __( 'Strasse', 'slrg-sss-nautilus' ),
				)
            )
        )
    );
	
	$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'text_block_street_02',
            array(
                'label'    => __( 'Strasse 2', 'slrg-sss-nautilus' ),
                'section'  => 'adress_text',
                'settings' => 'text_block_street_02',
                'type'     => 'text',
				'input_attrs' => array(
					'placeholder' => __( 'Strasse 2', 'slrg-sss-nautilus' ),
				)
            )
        )
    );
	
	$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'text_block_location',
            array(
                'label'    => __( 'Ort', 'slrg-sss-nautilus' ),
                'section'  => 'adress_text',
                'settings' => 'text_block_location',
                'type'     => 'text',
				'input_attrs' => array(
					'placeholder' => __( '0000 Ort', 'slrg-sss-nautilus' ),
				)
            )
        )
    );
	
	$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'text_block_email',
            array(
                'label'    => __( 'E-Mail-Adresse', 'slrg-sss-nautilus' ),
                'section'  => 'adress_text',
                'settings' => 'text_block_email',
                'type'     => 'text',
				'input_attrs' => array(
					'placeholder' => __( 'info@sektion.ch', 'slrg-sss-nautilus' ),
				)
            )
        )
    );
	
	$wp_customize->add_control( new WP_Customize_Control(
        $wp_customize,
        'text_block_impressum',
            array(
                'label'    => __( 'Impressum URL', 'slrg-sss-nautilus' ),
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
                'label'    => __( 'Copyright Text', 'slrg-sss-nautilus' ),
                'section'  => 'copyright_text',
                'settings' => 'text_block_copyright',
                'type'     => 'text',
				'input_attrs' => array(
					'placeholder' => __( '© 2021 SLRG Sektion XX', 'slrg-sss-nautilus' ),
				)
            )
        )
    );
	
  
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
            'Header',
            'slrg_custom_box_html',
            $screen,
			'side',
			'core'
        );
    }
}
add_action( 'add_meta_boxes', 'slrg_add_custom_box' );


function slrg_custom_box_html( $post ) {
    $value = get_post_meta( $post->ID, '_slrg-sss-nautilus_header-option', true );
    ?>
    <label for="slrg-sss-nautilus_header_option"><?php print( __( 'Gewünschter Header anzeigen', 'slrg-sss-nautilus' )); ?></label>
    <select name="slrg-sss-nautilus_header_option" id="slrg-sss-nautilus_header_option" class="postbox" style="min-width: 150px; border: 1px solid #777; margin-top: 8px;">
    <option value="1" <?php selected( $value, '1' ); ?>><?php print( __( 'Titel links (Standard)', 'slrg-sss-nautilus' )); ?></option>
    <option value="2" <?php selected( $value, '2' ); ?>><?php print( __( 'Titel mit Hintergrundbild', 'slrg-sss-nautilus' )); ?></option>
		<option value="3" <?php selected( $value, '3' ); ?>><?php print( __( 'Nur Bild', 'slrg-sss-nautilus' )); ?></option>
		<option value="0" <?php selected( $value, '0' ); ?>><?php print( __( 'Kein Header', 'slrg-sss-nautilus' )); ?></option>
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
    if ( array_key_exists( 'slrg-sss-nautilus_header_option', $_POST ) ) {
        update_post_meta(
            $post_id,
            '_slrg-sss-nautilus_header-option',
            $_POST['slrg-sss-nautilus_header_option']
        );
    }
}
add_action( 'save_post', 'slrg_save_postdata' );


//------------------------------------------------------------------------------
// Update checker to provide updates in the WordPress admin interface
//------------------------------------------------------------------------------
require 'updater/plugin-update-checker.php';
$updateChecker = Puc_v4_Factory::buildUpdateChecker(
  'https://update.wordpress.slrg.dev/themes/slrg-sss-nautilus/latest/',
  __FILE__,
  'slrg-sss-nautilus'
);
//------------------------------------------------------------------------------
