<?php

add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );
function theme_enqueue_styles() {
    wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
    
    remove_action( 'catchresponsive_footer', 'catchresponsive_footer_content', 100 );
	add_action( 'catchresponsive_footer', 'nss_footer_content', 100 );

}

add_action( 'init', 'register_cpt_sally' );

function register_cpt_sally() {
	
	add_image_size( 'catchresponsive-featured-tall-content', 346, 310, true ); // used in Featured Content Options Ratio 16:9

	 $labels = array( 
        'name' => _x( 'Age', 'age' ),
        'singular_name' => _x( 'Age', 'age' ),
        'search_items' => _x( 'Search Age', 'age' ),
        'popular_items' => _x( 'Popular Age', 'age' ),
        'all_items' => _x( 'All Age', 'age' ),
        'parent_item' => _x( 'Parent Age', 'age' ),
        'parent_item_colon' => _x( 'Parent Age:', 'age' ),
        'edit_item' => _x( 'Edit Age', 'age' ),
        'update_item' => _x( 'Update Age', 'age' ),
        'add_new_item' => _x( 'Add New Age', 'age' ),
        'new_item_name' => _x( 'New Age', 'age' ),
        'separate_items_with_commas' => _x( 'Separate age with commas', 'age' ),
        'add_or_remove_items' => _x( 'Add or remove age', 'age' ),
        'choose_from_most_used' => _x( 'Choose from the most used age', 'age' ),
        'menu_name' => _x( 'Age', 'age' ),
    );

    $args = array( 
        'labels' => $labels,
        'public' => true,
        'show_in_nav_menus' => true,
        'show_ui' => true,
        'show_tagcloud' => true,
        'show_admin_column' => false,
        'hierarchical' => true,
        

        'rewrite' => true,
        'query_var' => true
    );

    // register_taxonomy( 'age', array('sally'), $args );

    $labels = array( 
        'name' => _x( 'Sallys', 'sally' ),
        'singular_name' => _x( 'Sally', 'sally' ),
        'add_new' => _x( 'Add New', 'sally' ),
        'add_new_item' => _x( 'Add New Sally', 'sally' ),
        'edit_item' => _x( 'Edit Sally', 'sally' ),
        'new_item' => _x( 'New Sally', 'sally' ),
        'view_item' => _x( 'View Sally', 'sally' ),
        'search_items' => _x( 'Search Sallys', 'sally' ),
        'not_found' => _x( 'No sallys found', 'sally' ),
        'not_found_in_trash' => _x( 'No sallys found in Trash', 'sally' ),
        'parent_item_colon' => _x( 'Parent Sally:', 'sally' ),
        'menu_name' => _x( 'Sallys', 'sally' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => true,
        
        'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
        // 'taxonomies' => array( 'age' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        
        'menu_icon' => 'dashicons-sos',
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => 'adult-no-safe-sallys',
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'sally', $args );
    
    $labels = array( 
        'name' => _x( 'Kiddos', 'Kiddo' ),
        'singular_name' => _x( 'Kiddo', 'Kiddo' ),
        'add_new' => _x( 'Add New', 'Kiddo' ),
        'add_new_item' => _x( 'Add New Kiddo', 'Kiddo' ),
        'edit_item' => _x( 'Edit Kiddo', 'Kiddo' ),
        'new_item' => _x( 'New Kiddo', 'Kiddo' ),
        'view_item' => _x( 'View Kiddo', 'Kiddo' ),
        'search_items' => _x( 'Search Kiddos', 'Kiddo' ),
        'not_found' => _x( 'No Kiddos found', 'Kiddo' ),
        'not_found_in_trash' => _x( 'No Kiddos found in Trash', 'Kiddo' ),
        'parent_item_colon' => _x( 'Parent Kiddo:', 'Kiddo' ),
        'menu_name' => _x( 'Kiddos', 'Kiddo' ),
    );

    $args = array( 
        'labels' => $labels,
        'hierarchical' => true,
        
        'supports' => array( 'title', 'editor', 'excerpt', 'thumbnail' ),
       // 'taxonomies' => array( 'age' ),
        'public' => true,
        'show_ui' => true,
        'show_in_menu' => true,
        
        'menu_icon' => 'dashicons-carrot',
        'show_in_nav_menus' => true,
        'publicly_queryable' => true,
        'exclude_from_search' => false,
        'has_archive' => 'no-safe-sallys-in-training',
        'query_var' => true,
        'can_export' => true,
        'rewrite' => true,
        'capability_type' => 'post'
    );

    register_post_type( 'kiddo', $args );
}



add_action( 'customize_register', 'custom_customize_register', 99 );

function custom_customize_register($wp_customize){

			
	/**
	 * Customize control class for sally post type.
	 *
	 * @since 4.3.0
	 *
	 * @see WP_Customize_Control
	 */
	class WP_Customize_Sally_Control extends WP_Customize_Control {
	
		/**
		 * Control type.
		 *
		 * @since 4.3.0
		 * @access public
		 * @var string
		 */
		public $type = 'dropdown-sallys';
	
		/**
		 * Render the control's content.
		 *
		 * @since 4.3.0
		 * @access public
		 */
		public function render_content() {
				$dropdown = wp_dropdown_pages(
						array(
							'name'              => '_customize-dropdown-pages-' . $this->id,
							'echo'              => 0,
							'show_option_none'  => __( '&mdash; Select &mdash;' ),
							'option_none_value' => '0',
							'selected'          => $this->value(),
							'post_type'			=> 'sally',
						)
					);
	
					// Hackily add in the data link parameter.
					$dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );
	
					printf(
						'<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
						$this->label,
						$dropdown
					);
		}
	}
	
	
	/**
	 * Customize control class for sally post type.
	 *
	 * @since 4.3.0
	 *
	 * @see WP_Customize_Control
	 */
	class WP_Customize_Kiddo_Control extends WP_Customize_Control {
	
		/**
		 * Control type.
		 *
		 * @since 4.3.0
		 * @access public
		 * @var string
		 */
		public $type = 'dropdown-kiddos';
	
		/**
		 * Render the control's content.
		 *
		 * @since 4.3.0
		 * @access public
		 */
		public function render_content() {
				$dropdown = wp_dropdown_pages(
						array(
							'name'              => '_customize-dropdown-pages-' . $this->id,
							'echo'              => 0,
							'show_option_none'  => __( '&mdash; Select &mdash;' ),
							'option_none_value' => '0',
							'selected'          => $this->value(),
							'post_type'			=> 'kiddo',
						)
					);
	
					// Hackily add in the data link parameter.
					$dropdown = str_replace( '<select', '<select ' . $this->get_link(), $dropdown );
	
					printf(
						'<label class="customize-control-select"><span class="customize-control-title">%s</span> %s</label>',
						$this->label,
						$dropdown
					);
		}
	}

	
		$options  = catchresponsive_get_theme_options();

	//loop for featured page content
	for ( $i=1; $i <= $options['featured_content_number'] ; $i++ ) {
		$wp_customize->add_setting( 'catchresponsive_theme_options[featured_content_page_'. $i .']', array(
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'catchresponsive_sanitize_page',
		) );

		$wp_customize->remove_control( 'catchresponsive_theme_options[featured_content_page_'. $i .']', array(
			'active_callback'	=> 'catchresponsive_is_demo_featured_content_inactive',
			'label'    			=> __( 'Featured Page', 'catch-responsive' ) . ' ' . $i ,
			'priority'			=> '7' . $i,
			'section'  			=> 'catchresponsive_featured_content_settings',
			'settings' 			=> 'catchresponsive_theme_options[featured_content_page_'. $i .']',
			'type'	   			=> 'dropdown-pages',
		) );
		
		$wp_customize->add_control( new WP_Customize_Sally_Control ( $wp_customize, 'catchresponsive_theme_options[featured_content_page_'. $i .']', array(
			'active_callback'	=> 'catchresponsive_is_demo_featured_content_inactive',
			'label'    			=> __( 'Featured Page', 'catch-responsive' ) . ' ' . $i ,
			'priority'			=> '7' . $i,
			'section'  			=> 'catchresponsive_featured_content_settings',
			'settings' 			=> 'catchresponsive_theme_options[featured_content_page_'. $i .']',
			'type'	   			=> 'dropdown-sallys',
		) ) );
	}
	
	//loop for featured page content
	for ( $i=1; $i <= $options['featured_content_number'] ; $i++ ) {
		$wp_customize->add_setting( 'catchresponsive_theme_options[featured_content_kiddos_page_'. $i .']', array(
			'capability'		=> 'edit_theme_options',
			'sanitize_callback'	=> 'catchresponsive_sanitize_page',
		) );
		
		$wp_customize->add_control( new WP_Customize_Kiddo_Control ( $wp_customize, 'catchresponsive_theme_options[featured_content_kiddos_page_'. $i .']', array(
			'active_callback'	=> 'catchresponsive_is_demo_featured_content_inactive',
			'label'    			=> __( 'Featured Kiddos Page', 'catch-responsive' ) . ' ' . $i ,
			'priority'			=> '8' . $i,
			'section'  			=> 'catchresponsive_featured_content_settings',
			'settings' 			=> 'catchresponsive_theme_options[featured_content_kiddos_page_'. $i .']',
			'type'	   			=> 'dropdown-kiddos',
		) ) );
	}
	
	
	
	
}

/*


*/


/**
 * Homepage Featured Content Position
 *
 * @action catchresponsive_content, catchresponsive_after_secondary
 * 
 * @since Catch Responsive 1.0
 */
function catchresponsive_featured_content_display_position() {
	// Getting data from Theme Options
	$options 		= catchresponsive_get_theme_options();
	
	$featured_content_position = $options [ 'featured_content_position' ];
	
	if ( '1' != $featured_content_position ) { 
		add_action( 'catchresponsive_before_content', 'catchresponsive_featured_adult_content_display', 40 );
		add_action( 'catchresponsive_before_content', 'catchresponsive_featured_kiddos_content_display', 40 );
	} else {
		add_action( 'catchresponsive_after_content', 'catchresponsive_featured_content_display', 40 );
	}
	
}

if ( ! function_exists( 'catchresponsive_page_content' ) ) :
/**
 * This function to display featured page content
 *
 * @param $options: catchresponsive_theme_options from customizer
 *
 * @since Catch Responsive 1.0
 */
function catchresponsive_page_content( $options ) {
	global $post;

	$quantity 					= $options [ 'featured_content_number' ];

	$more_link_text				= $options['excerpt_more_text'];

	$show_content	= isset( $options['featured_content_show'] ) ? $options['featured_content_show'] : 'excerpt';
	
	$catchresponsive_page_content 	= '';

   	$number_of_page 			= 0; 		// for number of pages

	$page_list					= array();	// list of valid pages ids

	//Get valid pages
	for( $i = 1; $i <= $quantity; $i++ ){
		if( isset ( $options['featured_content_page_' . $i] ) && $options['featured_content_page_' . $i] > 0 ){
			$number_of_page++;

			$page_list	=	array_merge( $page_list, array( $options['featured_content_page_' . $i] ) );
		}

	}
	if ( !empty( $page_list ) && $number_of_page > 0 ) {
		$get_featured_posts = new WP_Query( array(
                    'posts_per_page' 		=> $number_of_page,
                    'post__in'       		=> $page_list,
                    'orderby'        		=> 'post__in',
                    'post_type'				=> 'sally',
                ));

		$i=0; 
		while ( $get_featured_posts->have_posts()) : $get_featured_posts->the_post(); $i++;
			$title_attribute = the_title_attribute( array( 'before' => __( 'Permalink to: ', 'catch-responsive' ), 'echo' => false ) );
			
			$excerpt = get_the_excerpt();

			$catchresponsive_page_content .= '
				<article id="featured-post-' . $i . '" class="post hentry featured-page-content">';	
				if ( has_post_thumbnail() ) {
					$catchresponsive_page_content .= '
					<figure class="featured-homepage-image">
						<a href="' . get_permalink() . '" title="'.the_title( '', '', false ).'">
						'. get_the_post_thumbnail( $post->ID, 'catchresponsive-featured-tall-content', array( 'title' => esc_attr( $title_attribute ), 'alt' => esc_attr( $title_attribute ), 'class' => 'pngfix' ) ) .'
						</a>
					</figure>';
				}
				else {
					$catchresponsive_first_image = catchresponsive_get_first_image( $post->ID, 'catchresponsive-featured-tall-content', array( 'title' => esc_attr( $title_attribute ), 'alt' => esc_attr( $title_attribute ), 'class' => 'pngfix' ) );

					if ( '' != $catchresponsive_first_image ) {
						$catchresponsive_page_content .= '
						<figure class="featured-homepage-image">
							<a href="' . get_permalink() . '" title="'.the_title( '', '', false ).'">
								'. $catchresponsive_first_image .'
							</a>
						</figure>';
					}
				}

				$catchresponsive_page_content .= '
					<div class="entry-container">
						<header class="entry-header">
							<h1 class="entry-title">
								<a href="' . get_permalink() . '" rel="bookmark">' . the_title( '','', false ) . '</a>
							</h1>
						</header>';
						if ( 'excerpt' == $show_content ) {
							$catchresponsive_page_content .= '<div class="entry-excerpt"><p>' . $excerpt . '</p></div><!-- .entry-excerpt -->';
						}
						elseif ( 'full-content' == $show_content ) { 
							$content = apply_filters( 'the_content', get_the_content() );
							$content = str_replace( ']]>', ']]&gt;', $content );
							$catchresponsive_page_content .= '<div class="entry-content">' . $content . '</div><!-- .entry-content -->';
						}
					$catchresponsive_page_content .= '
					</div><!-- .entry-container -->
				</article><!-- .featured-post-'. $i .' -->';
		endwhile;

		wp_reset_query();
	}		
	
	return $catchresponsive_page_content;
}
endif; // catchresponsive_page_content


if( !function_exists( 'catchresponsive_featured_adult_content_display' ) ) :
/**
* Add Featured content.
*
* @uses action hook catchresponsive_before_content.
*
* @since Catch Responsive 1.0
*/
function catchresponsive_featured_adult_content_display() {
	catchresponsive_flush_transients();
	
	global $post, $wp_query;

	// get data value from options
	$options 		= catchresponsive_get_theme_options();
	$enablecontent 	= $options['featured_content_option'];
	$contentselect 	= $options['featured_content_type'];
	
	// Front page displays in Reading Settings
	$page_on_front 	= get_option('page_on_front') ;
	$page_for_posts = get_option('page_for_posts'); 


	// Get Page ID outside Loop
	$page_id = $wp_query->get_queried_object_id();
	if ( $enablecontent == 'entire-site' || ( ( is_front_page() || ( is_home() && $page_for_posts != $page_id ) ) && $enablecontent == 'homepage' ) ) {
		if( ( !$catchresponsive_featured_content = get_transient( 'catchresponsive_featured_content_display' ) ) ) {
			$layouts 	 = $options ['featured_content_layout'];
			$headline 	 = $options ['featured_content_headline'];
			$subheadline = $options ['featured_content_subheadline'];
	
			echo '<!-- refreshing cache -->';

			if ( !empty( $layouts ) ) {
				$classes = $layouts ;
			}

			if( $contentselect == 'demo-featured-content' ) {
				$classes 		.= ' demo-featured-content' ;
				$headline 		= __( 'Featured Content', 'catch-responsive' );
				$subheadline 	= __( 'Here you can showcase the x number of Featured Content. You can edit this Headline, Subheadline and Feaured Content from "Appearance -> Customize -> Featured Content Options".', 'catch-responsive' );
			} 
			elseif ( $contentselect == 'featured-page-content' ) {
				$classes .= ' featured-page-content' ;
			}

			//Check Featured Content Position
			$featured_content_position = $options [ 'featured_content_position' ];
			
			if ( '1' == $featured_content_position ) {
				$classes .= ' border-top' ;
			}

			$catchresponsive_featured_content ='
				<section id="featured-content" class="' . $classes . '">
					<div class="wrapper">';
						if ( !empty( $headline ) || !empty( $subheadline ) ) {
							$catchresponsive_featured_content .='<div class="featured-heading-wrap">';
								if ( !empty( $headline ) ) {
									$catchresponsive_featured_content .='<h1 id="featured-heading" class="entry-title">'. $headline .'</h1>';
								}
								if ( !empty( $subheadline ) ) {
									$catchresponsive_featured_content .='<p>'. $subheadline .'</p>';
								}
							$catchresponsive_featured_content .='</div><!-- .featured-heading-wrap -->';
						}
						$catchresponsive_featured_content .='
						<div class="featured-content-wrap">';

							// Select content
							if ( $contentselect == 'demo-featured-content'  && function_exists( 'catchresponsive_demo_content' ) ) {
								$catchresponsive_featured_content .= catchresponsive_demo_content( $options );
							}
							elseif ( $contentselect == 'featured-page-content' && function_exists( 'catchresponsive_page_content' ) ) {
								$catchresponsive_featured_content .= catchresponsive_page_content( $options );
							}

			$catchresponsive_featured_content .='
						</div><!-- .featured-content-wrap -->
					</div><!-- .wrapper -->
				</section><!-- #featured-content -->';
		set_transient( 'catchresponsive_featured_content', $catchresponsive_featured_content, 86940 );
		}
	echo $catchresponsive_featured_content;
	}
}
endif;

if( !function_exists( 'catchresponsive_featured_kiddos_content_display' ) ) :
/**
* Add Featured content.
*
* @uses action hook catchresponsive_before_content.
*
* @since Catch Responsive 1.0
*/
function catchresponsive_featured_kiddos_content_display() {
	catchresponsive_flush_transients();
	
	global $post, $wp_query;

	// get data value from options
	$options 		= catchresponsive_get_theme_options();
	$enablecontent 	= $options['featured_content_option'];
	$contentselect 	= $options['featured_content_type'];
	
	// Front page displays in Reading Settings
	$page_on_front 	= get_option('page_on_front') ;
	$page_for_posts = get_option('page_for_posts'); 


	// Get Page ID outside Loop
	$page_id = $wp_query->get_queried_object_id();
	if ( $enablecontent == 'entire-site' || ( ( is_front_page() || ( is_home() && $page_for_posts != $page_id ) ) && $enablecontent == 'homepage' ) ) {
		if( ( !$catchresponsive_featured_content = get_transient( 'catchresponsive_featured_content_display' ) ) ) {
			$layouts 	 = $options ['featured_content_layout'];
			$headline 	 = $options ['featured_content_headline'];
			$subheadline = $options ['featured_content_subheadline'];
	
			echo '<!-- refreshing cache -->';

			if ( !empty( $layouts ) ) {
				$classes = $layouts ;
			}

			if( $contentselect == 'demo-featured-content' ) {
				$classes 		.= ' demo-featured-content' ;
				$headline 		= __( 'Featured Content', 'catch-responsive' );
				$subheadline 	= __( 'Here you can showcase the x number of Featured Content. You can edit this Headline, Subheadline and Feaured Content from "Appearance -> Customize -> Featured Content Options".', 'catch-responsive' );
			} 
			elseif ( $contentselect == 'featured-page-content' ) {
				$classes .= ' featured-page-content' ;
			}
			
			$headline = 'No Safe Sallys in Training';
			
			$subheadline = 'No Safe Sallys is dedicated to growing young girls into positive, strong, and compassionate leaders.';

			//Check Featured Content Position
			$featured_content_position = $options [ 'featured_content_position' ];
			
			if ( '1' == $featured_content_position ) {
				$classes .= ' border-top' ;
			}

			$catchresponsive_featured_content ='
				<section id="featured-content" class="' . $classes . '">
					<div class="wrapper">';
						if ( !empty( $headline ) || !empty( $subheadline ) ) {
							$catchresponsive_featured_content .='<div class="featured-heading-wrap">';
								if ( !empty( $headline ) ) {
									$catchresponsive_featured_content .='<h1 id="featured-heading" class="entry-title">'. $headline .'</h1>';
								}
								if ( !empty( $subheadline ) ) {
									$catchresponsive_featured_content .='<p>'. $subheadline .'</p>';
								}
							$catchresponsive_featured_content .='</div><!-- .featured-heading-wrap -->';
						}
						$catchresponsive_featured_content .='
						<div class="featured-content-wrap">';

							// Select content
							if ( $contentselect == 'demo-featured-content'  && function_exists( 'catchresponsive_demo_content' ) ) {
								$catchresponsive_featured_content .= catchresponsive_demo_content( $options );
							}
							elseif ( $contentselect == 'featured-page-content' && function_exists( 'catchresponsive_page_kiddos_content' ) ) {
								$catchresponsive_featured_content .= catchresponsive_page_kiddos_content( $options );
							}

			$catchresponsive_featured_content .='
						</div><!-- .featured-content-wrap -->
					</div><!-- .wrapper -->
				</section><!-- #featured-content -->';
		set_transient( 'catchresponsive_featured_content', $catchresponsive_featured_content, 86940 );
		}
	echo $catchresponsive_featured_content;
	}
}
endif;

if ( ! function_exists( 'catchresponsive_page_kiddos_content' ) ) :
/**
 * This function to display featured page content
 *
 * @param $options: catchresponsive_theme_options from customizer
 *
 * @since Catch Responsive 1.0
 */
function catchresponsive_page_kiddos_content( $options ) {
	global $post;

	$quantity 					= $options [ 'featured_content_number' ];

	$more_link_text				= $options['excerpt_more_text'];

	$show_content	= isset( $options['featured_content_show'] ) ? $options['featured_content_show'] : 'excerpt';
	
	$catchresponsive_page_content 	= '';

   	$number_of_page 			= 0; 		// for number of pages

	$page_list					= array();	// list of valid pages ids

	//Get valid pages
	for( $i = 1; $i <= $quantity; $i++ ){
		if( isset ( $options['featured_content_kiddos_page_' . $i] ) && $options['featured_content_kiddos_page_' . $i] > 0 ){
			$number_of_page++;

			$page_list	=	array_merge( $page_list, array( $options['featured_content_kiddos_page_' . $i] ) );
		}

	}
	if ( !empty( $page_list ) && $number_of_page > 0 ) {
		$get_featured_posts = new WP_Query( array(
                    'posts_per_page' 		=> $number_of_page,
                    'post__in'       		=> $page_list,
                    'orderby'        		=> 'post__in',
                    'post_type'				=> 'kiddo',
                ));

		$i=0; 
		while ( $get_featured_posts->have_posts()) : $get_featured_posts->the_post(); $i++;
			$title_attribute = the_title_attribute( array( 'before' => __( 'Permalink to: ', 'catch-responsive' ), 'echo' => false ) );
			
			$excerpt = get_the_excerpt();

			$catchresponsive_page_content .= '
				<article id="featured-post-' . $i . '" class="post hentry featured-page-content">';	
				if ( has_post_thumbnail() ) {
					$catchresponsive_page_content .= '
					<figure class="featured-homepage-image">
						<a href="' . get_permalink() . '" title="'.the_title( '', '', false ).'">
						'. get_the_post_thumbnail( $post->ID, 'catchresponsive-featured-tall-content', array( 'title' => esc_attr( $title_attribute ), 'alt' => esc_attr( $title_attribute ), 'class' => 'pngfix' ) ) .'
						</a>
					</figure>';
				}
				else {
					$catchresponsive_first_image = catchresponsive_get_first_image( $post->ID, 'catchresponsive-featured-tall-content', array( 'title' => esc_attr( $title_attribute ), 'alt' => esc_attr( $title_attribute ), 'class' => 'pngfix' ) );

					if ( '' != $catchresponsive_first_image ) {
						$catchresponsive_page_content .= '
						<figure class="featured-homepage-image">
							<a href="' . get_permalink() . '" title="'.the_title( '', '', false ).'">
								'. $catchresponsive_first_image .'
							</a>
						</figure>';
					}
				}

				$catchresponsive_page_content .= '
					<div class="entry-container">
						<header class="entry-header">
							<h1 class="entry-title">
								<a href="' . get_permalink() . '" rel="bookmark">' . the_title( '','', false ) . '</a>
							</h1>
						</header>';
						if ( 'excerpt' == $show_content ) {
							$catchresponsive_page_content .= '<div class="entry-excerpt"><p>' . $excerpt . '</p></div><!-- .entry-excerpt -->';
						}
						elseif ( 'full-content' == $show_content ) { 
							$content = apply_filters( 'the_content', get_the_content() );
							$content = str_replace( ']]>', ']]&gt;', $content );
							$catchresponsive_page_content .= '<div class="entry-content">' . $content . '</div><!-- .entry-content -->';
						}
					$catchresponsive_page_content .= '
					</div><!-- .entry-container -->
				</article><!-- .featured-post-'. $i .' -->';
		endwhile;

		wp_reset_query();
	}		
	
	return $catchresponsive_page_content;
}
endif; // catchresponsive_page_content


if ( ! function_exists( 'catchresponsive_header_center' ) ) :
/**
 * Shows Header Right Social Icon
 *
 * @since Catch Responsive 1.0
 */
function catchresponsive_header_center() { ?>
	<aside class="sidebar sidebar-header-center widget-area">
		<section class="widget widget_search" id="header-right-search">
			<div class="widget-wrap">
				<a href="/get-noticed/">
					<img src="http://nosafesallys.org/wp-content/uploads/2015/08/no-safe-sally-banner.jpg" />
				</a>
			</div>
		</section>		
	</aside><!-- .sidebar .header-sidebar .widget-area -->	
<?php	
}
endif;
add_action( 'catchresponsive_header', 'catchresponsive_header_center', 65 );


/**
 * Footer Text
 *
 * @get footer text from theme options and display them accordingly
 * @display footer_text
 * @action catchresponsive_footer
 *
 * @since Catch Responsive 1.0
 */
function nss_footer_content() {
	//catchresponsive_flush_transients();
	if ( ( !$catchresponsive_footer_content = get_transient( 'dm_footer_content' ) ) ) {
		echo '<!-- refreshing cache -->';
		
		$catchresponsive_content = catchresponsive_get_content();

		$catchresponsive_footer_content =  '    	
    	<div id="site-generator">
    		<div class="wrapper">
    			<div id="footer-content" class="copyright">'
    				. $catchresponsive_content['left'] . ' &#124; ' . $catchresponsive_content['right'] . 
    			'</div>
			</div><!-- .wrapper -->
		</div><!-- #site-generator -->';
		
    	set_transient( 'dm_footer_content', $catchresponsive_footer_content, 86940 );
    }

    echo $catchresponsive_footer_content;
}
