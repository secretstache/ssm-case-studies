<?php
/**
 * SSM Case Studies
 *
 * @package   SSM_Case_Studies
 * @license   GPL-2.0+
 */

/**
 * Register post types and taxonomies.
 *
 * @package SSM_Case_Studies
 */
class SSM_Case_Studies_Registrations {

	public $post_type = 'case-study';

	public $taxonomies = array( 'case-study-category' );

	public function init() {
		// Add the SSM Case Studies and taxonomies
		add_action( 'init', array( $this, 'register' ) );
	}

	/**
	 * Initiate registrations of post type and taxonomies.
	 *
	 * @uses SSM_Case_Studies_Registrations::register_post_type()
	 * @uses SSM_Case_Studies_Registrations::register_taxonomy_category()
	 */
	public function register() {
		$this->register_post_type();
		$this->register_taxonomy_category();
	}

	/**
	 * Register the custom post type.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_post_type
	 */
	protected function register_post_type() {
		$labels = array(
			'name'               => __( 'Case Studies', 'ssm-case-studies' ),
			'singular_name'      => __( 'Case Study', 'ssm-case-studies' ),
			'add_new'            => __( 'Add Case Study', 'ssm-case-studies' ),
			'add_new_item'       => __( 'Add Case Study', 'ssm-case-studies' ),
			'edit_item'          => __( 'Edit Case Study', 'ssm-case-studies' ),
			'new_item'           => __( 'New Case Study', 'ssm-case-studies' ),
			'view_item'          => __( 'View Case Study', 'ssm-case-studies' ),
			'search_items'       => __( 'Search Case Study', 'ssm-case-studies' ),
			'not_found'          => __( 'No case studies found', 'ssm-case-studies' ),
			'not_found_in_trash' => __( 'No case studies in the trash', 'ssm-case-studies' ),
		);

		$supports = array(
			'title',
		);

		$args = array(
			'labels'          		=> $labels,
			'supports'        		=> $supports,
			'public'          		=> true,
			'capability_type' 		=> 'post',
			'publicly_queriable'	=> true,
			'show_ui' 						=> true,
			'show_in_nav_menus' 	=> true,
			'rewrite'         		=> array('slug' => 'case-study', 'with_front' => false),
			'menu_position'   		=> 30,
			'menu_icon'       		=> 'dashicons-analytics',
			'has_archive'					=> 'case-studies',
			'exclude_from_search'	=> false
		);

		$args = apply_filters( 'SSM_Case_Studies_args', $args );

		register_post_type( $this->post_type, $args );
	}

	/**
	 * Register a taxonomy for Project Categories.
	 *
	 * @link http://codex.wordpress.org/Function_Reference/register_taxonomy
	 */
	protected function register_taxonomy_category() {
		$labels = array(
			'name'                       => __( 'Case Study Categories', 'ssm-case-studies' ),
			'singular_name'              => __( 'Case Study Category', 'ssm-case-studies' ),
			'menu_name'                  => __( 'Categories', 'ssm-case-studies' ),
			'edit_item'                  => __( 'Edit Category', 'ssm-case-studies' ),
			'update_item'                => __( 'Update Category', 'ssm-case-studies' ),
			'add_new_item'               => __( 'Add New Category', 'ssm-case-studies' ),
			'new_item_name'              => __( 'New Category Name', 'ssm-case-studies' ),
			'parent_item'                => __( 'Parent Category', 'ssm-case-studies' ),
			'parent_item_colon'          => __( 'Parent Category:', 'ssm-case-studies' ),
			'all_items'                  => __( 'All Categories', 'ssm-case-studies' ),
			'search_items'               => __( 'Search Categories', 'ssm-case-studies' ),
			'popular_items'              => __( 'Popular Categories', 'ssm-case-studies' ),
			'separate_items_with_commas' => __( 'Separate categories with commas', 'ssm-case-studies' ),
			'add_or_remove_items'        => __( 'Add or remove categories', 'ssm-case-studies' ),
			'choose_from_most_used'      => __( 'Choose from the most used categories', 'ssm-case-studies' ),
			'not_found'                  => __( 'No categories found.', 'ssm-case-studies' ),
		);

		$args = array(
			'labels'            => $labels,
			'public'            => true,
			'show_in_nav_menus' => true,
			'show_ui'           => true,
			'show_tagcloud'     => true,
			'hierarchical'      => true,
			'rewrite'						=> array('slug' => 'case-studies/category'),
			'show_admin_column' => true,
			'query_var'         => true,
		);

		$args = apply_filters( 'SSM_Case_Studies_category_args', $args );

		register_taxonomy( $this->taxonomies[0], $this->post_type, $args );
	}
}