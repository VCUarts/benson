<?php

/**
 * The dashboard-specific functionality of the plugin.
 *
 * @link       https://github.com/VCUarts
 * @since      1.0.0
 *
 * @package    Benson
 * @subpackage Benson/admin
 */

/**
 * The dashboard-specific functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the dashboard-specific stylesheet and JavaScript.
 *
 * @package    Benson
 * @subpackage Benson/admin
 * @author     VCUarts <luetkemj@gmail.com>
 */
class Benson_Admin {

	/**
	 * The ID of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $benson    The ID of this plugin.
	 */
	private $benson;

	/**
	 * The version of this plugin.
	 *
	 * @since    1.0.0
	 * @access   private
	 * @var      string    $version    The current version of this plugin.
	 */
	private $version;

	/**
	 * Initialize the class and set its properties.
	 *
	 * @since    1.0.0
	 * @param      string    $benson       The name of this plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $benson, $version ) {

		$this->benson = $benson;
		$this->version = $version;

		add_action( 'after_setup_theme', array( $this, 'benson_ACF') );

	}

	/**
	 * Register the stylesheets for the Dashboard.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_styles() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Benson_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Benson_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_style( $this->benson, plugin_dir_url( __FILE__ ) . 'css/benson-admin.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the JavaScript for the dashboard.
	 *
	 * @since    1.0.0
	 */
	public function enqueue_scripts() {

		/**
		 * This function is provided for demonstration purposes only.
		 *
		 * An instance of this class should be passed to the run() function
		 * defined in Benson_Loader as all of the hooks are defined
		 * in that particular class.
		 *
		 * The Benson_Loader will then create the relationship
		 * between the defined hooks and the functions defined in this
		 * class.
		 */

		wp_enqueue_script( $this->benson, plugin_dir_url( __FILE__ ) . 'js/benson-admin.js', array( 'jquery' ), $this->version, false );

	}





public function benson_ACF() {
	
	// start ACF export code
	if( function_exists('register_field_group') ):

	register_field_group(array (
		'key' => 'group_55099a4fecd7b',
		'title' => 'Benson Options',
		'fields' => array (
			array (
				'key' => 'field_55099a78a9a0c',
				'label' => 'wpjson_url',
				'name' => 'benson_wpjson_url',
				'prefix' => '',
				'type' => 'text',
				'instructions' => 'Paste the wpjson_url here.',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'default_value' => '',
				'placeholder' => '',
				'prepend' => '',
				'append' => '',
				'maxlength' => '',
				'readonly' => 0,
				'disabled' => 0,
			),
			array (
				'key' => 'field_55099a9fa9a0d',
				'label' => 'Angular Modules',
				'name' => 'benson_angular_modules',
				'prefix' => '',
				'type' => 'checkbox',
				'instructions' => 'Check the angular modules you need.',
				'required' => 0,
				'conditional_logic' => 0,
				'wrapper' => array (
					'width' => '',
					'class' => '',
					'id' => '',
				),
				'choices' => array (
					'animate' => 'Animate',
					'paginate' => 'Paginate',
					'sanitize' => 'Sanitize',
					'filter' => 'Filter'
				),
				'default_value' => array (
				),
				'layout' => 'vertical',
			),
		),
		'location' => array (
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'post',
				),
			),
			array (
				array (
					'param' => 'post_type',
					'operator' => '==',
					'value' => 'page',
				),
			),
		),
		'menu_order' => 0,
		'position' => 'normal',
		'style' => 'default',
		'label_placement' => 'top',
		'instruction_placement' => 'label',
		'hide_on_screen' => '',
	));

	endif;
		// end ACF export code
}



}