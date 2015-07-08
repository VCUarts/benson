<?php

/**
 * The public-facing functionality of the plugin.
 *
 * @link       https://github.com/VCUarts
 * @since      1.0.0
 *
 * @package    Benson
 * @subpackage Benson/public
 */

/**
 * The public-facing functionality of the plugin.
 *
 * Defines the plugin name, version, and two examples hooks for how to
 * enqueue the dashboard-specific stylesheet and JavaScript.
 *
 * @package    Benson
 * @subpackage Benson/public
 * @author     VCUarts <luetkemj@gmail.com>
 */
class Benson_Public {

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
	 * @param      string    $benson       The name of the plugin.
	 * @param      string    $version    The version of this plugin.
	 */
	public function __construct( $benson, $version ) {

		$this->benson = $benson;
		$this->version = $version;
		
		add_action( 'wp_head', array( $this, 'benson_cdata') );

	}

	/**
	 * Make sure that all custom fields get attached to wp-api json output
	 *
	 * @since    1.0.0
	 */
	public function wp_api_encode_acf($data, $post, $context) {
		if ( get_fields($post['ID'] ) ){
			$data['meta'] = array_merge( $data['meta'], get_fields($post['ID'] ) );
		}
		return $data;
	}



	/**
	 * Register the stylesheets for the public-facing side of the site.
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

		// wp_enqueue_style( $this->benson, plugin_dir_url( __FILE__ ) . 'css/benson-public.css', array(), $this->version, 'all' );

	}

	/**
	 * Register the stylesheets for the public-facing side of the site.
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


		global $post;
		if ( get_field( 'benson_angular_modules', $post->ID ) ){
			
			wp_enqueue_script( 'angular', '//ajax.googleapis.com/ajax/libs/angularjs/1.3.12/angular.js', array(), $this->version, true );

			if ( in_array( 'filter', get_field( 'benson_angular_modules', $post->ID ) ) ) {
				wp_enqueue_script( 'angular-filter', 'https://cdnjs.cloudflare.com/ajax/libs/angular-filter/0.5.4/angular-filter.min.js', array(), $this->version, true );
			}

			if ( in_array( 'animate', get_field( 'benson_angular_modules', $post->ID ) ) ) {
				wp_enqueue_script( 'angular-animate', '//ajax.googleapis.com/ajax/libs/angularjs/1.3.12/angular-animate.js', array(), $this->version, true );
			}

			if ( in_array( 'paginate', get_field( 'benson_angular_modules', $post->ID ) ) ) {
				wp_enqueue_script( 'angular-paginate', plugin_dir_url( __FILE__ ) . 'js/modules/dirPagination.js', array(), $this->version, true );
			}

			if ( in_array( 'sanitize', get_field( 'benson_angular_modules', $post->ID ) ) ) {
				wp_enqueue_script( 'angular-sanitize', '//ajax.googleapis.com/ajax/libs/angularjs/1.3.12/angular-sanitize.js', array(), $this->version, true );
			}
		}

		wp_enqueue_script( $this->benson.'app', plugin_dir_url( __FILE__ ) . 'js/benson-public.js', array('angular'), $this->version, true );
	}


	// dump cdata in header
	public function benson_cdata(){

		global $post;
		$benson_wpjson_url = get_field( 'benson_wpjson_url', $post->ID );
		if ( get_field( 'benson_angular_modules', $post->ID ) ){
			$animate = (in_array( 'animate', get_field( 'benson_angular_modules', $post->ID ) ) ? 'ngAnimate' : '');
			$paginate = (in_array( 'paginate', get_field( 'benson_angular_modules', $post->ID ) ) ? 'angularUtils.directives.dirPagination' : '');
			$sanitize = (in_array( 'sanitize', get_field( 'benson_angular_modules', $post->ID ) ) ? 'ngSanitize' : '');
			$filter = (in_array( 'filter', get_field( 'benson_angular_modules', $post->ID ) ) ? 'angular.filter' : '');

			echo "<script type='text/javascript'>
						//<![CDATA[
						var wpjson_url = '$benson_wpjson_url';
						var angular_animate = '$animate';
						var angular_paginate = '$paginate';
						var angular_sanitize = '$sanitize';
						var angular_filter = '$filter';
						//]]>
						</script>";
		}

	}

}
