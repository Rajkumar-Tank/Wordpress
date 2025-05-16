<?php
/**
 * Twenty Twenty-Four functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package Twenty Twenty-Four
 * @since Twenty Twenty-Four 1.0
 */

/**
 * Register block styles.
 */

if ( ! function_exists( 'twentytwentyfour_block_styles' ) ) :
	/**
	 * Register custom block styles
	 *
	 * @since Twenty Twenty-Four 1.0
	 * @return void
	 */
	function twentytwentyfour_block_styles() {

		register_block_style(
			'core/details',
			array(
				'name'         => 'arrow-icon-details',
				'label'        => __( 'Arrow icon', 'twentytwentyfour' ),
				/*
				 * Styles for the custom Arrow icon style of the Details block
				 */
				'inline_style' => '
				.is-style-arrow-icon-details {
					padding-top: var(--wp--preset--spacing--10);
					padding-bottom: var(--wp--preset--spacing--10);
				}

				.is-style-arrow-icon-details summary {
					list-style-type: "\2193\00a0\00a0\00a0";
				}

				.is-style-arrow-icon-details[open]>summary {
					list-style-type: "\2192\00a0\00a0\00a0";
				}',
			)
		);
		register_block_style(
			'core/post-terms',
			array(
				'name'         => 'pill',
				'label'        => __( 'Pill', 'twentytwentyfour' ),
				/*
				 * Styles variation for post terms
				 * https://github.com/WordPress/gutenberg/issues/24956
				 */
				'inline_style' => '
				.is-style-pill a,
				.is-style-pill span:not([class], [data-rich-text-placeholder]) {
					display: inline-block;
					background-color: var(--wp--preset--color--base-2);
					padding: 0.375rem 0.875rem;
					border-radius: var(--wp--preset--spacing--20);
				}

				.is-style-pill a:hover {
					background-color: var(--wp--preset--color--contrast-3);
				}',
			)
		);
		register_block_style(
			'core/list',
			array(
				'name'         => 'checkmark-list',
				'label'        => __( 'Checkmark', 'twentytwentyfour' ),
				/*
				 * Styles for the custom checkmark list block style
				 * https://github.com/WordPress/gutenberg/issues/51480
				 */
				'inline_style' => '
				ul.is-style-checkmark-list {
					list-style-type: "\2713";
				}

				ul.is-style-checkmark-list li {
					padding-inline-start: 1ch;
				}',
			)
		);
		register_block_style(
			'core/navigation-link',
			array(
				'name'         => 'arrow-link',
				'label'        => __( 'With arrow', 'twentytwentyfour' ),
				/*
				 * Styles for the custom arrow nav link block style
				 */
				'inline_style' => '
				.is-style-arrow-link .wp-block-navigation-item__label:after {
					content: "\2197";
					padding-inline-start: 0.25rem;
					vertical-align: middle;
					text-decoration: none;
					display: inline-block;
				}',
			)
		);
		register_block_style(
			'core/heading',
			array(
				'name'         => 'asterisk',
				'label'        => __( 'With asterisk', 'twentytwentyfour' ),
				'inline_style' => "
				.is-style-asterisk:before {
					content: '';
					width: 1.5rem;
					height: 3rem;
					background: var(--wp--preset--color--contrast-2, currentColor);
					clip-path: path('M11.93.684v8.039l5.633-5.633 1.216 1.23-5.66 5.66h8.04v1.737H13.2l5.701 5.701-1.23 1.23-5.742-5.742V21h-1.737v-8.094l-5.77 5.77-1.23-1.217 5.743-5.742H.842V9.98h8.162l-5.701-5.7 1.23-1.231 5.66 5.66V.684h1.737Z');
					display: block;
				}

				/* Hide the asterisk if the heading has no content, to avoid using empty headings to display the asterisk only, which is an A11Y issue */
				.is-style-asterisk:empty:before {
					content: none;
				}

				.is-style-asterisk:-moz-only-whitespace:before {
					content: none;
				}

				.is-style-asterisk.has-text-align-center:before {
					margin: 0 auto;
				}

				.is-style-asterisk.has-text-align-right:before {
					margin-left: auto;
				}

				.rtl .is-style-asterisk.has-text-align-left:before {
					margin-right: auto;
				}",
			)
		);
	}
endif;

add_action( 'init', 'twentytwentyfour_block_styles' );

/**
 * Enqueue block stylesheets.
 */

if ( ! function_exists( 'twentytwentyfour_block_stylesheets' ) ) :
	/**
	 * Enqueue custom block stylesheets
	 *
	 * @since Twenty Twenty-Four 1.0
	 * @return void
	 */
	function twentytwentyfour_block_stylesheets() {
		/**
		 * The wp_enqueue_block_style() function allows us to enqueue a stylesheet
		 * for a specific block. These will only get loaded when the block is rendered
		 * (both in the editor and on the front end), improving performance
		 * and reducing the amount of data requested by visitors.
		 *
		 * See https://make.wordpress.org/core/2021/12/15/using-multiple-stylesheets-per-block/ for more info.
		 */
		wp_enqueue_block_style(
			'core/button',
			array(
				'handle' => 'twentytwentyfour-button-style-outline',
				'src'    => get_parent_theme_file_uri( 'assets/css/button-outline.css' ),
				'ver'    => wp_get_theme( get_template() )->get( 'Version' ),
				'path'   => get_parent_theme_file_path( 'assets/css/button-outline.css' ),
			)
		);
	}
endif;

add_action( 'init', 'twentytwentyfour_block_stylesheets' );

/**
 * Register pattern categories.
 */

if ( ! function_exists( 'twentytwentyfour_pattern_categories' ) ) :
	/**
	 * Register pattern categories
	 *
	 * @since Twenty Twenty-Four 1.0
	 * @return void
	 */
	function twentytwentyfour_pattern_categories() {

		register_block_pattern_category(
			'twentytwentyfour_page',
			array(
				'label'       => _x( 'Pages', 'Block pattern category', 'twentytwentyfour' ),
				'description' => __( 'A collection of full page layouts.', 'twentytwentyfour' ),
			)
		);
	}
endif;

add_action( 'init', 'twentytwentyfour_pattern_categories' );


// 1. Register Custom Post Type: book
add_action('init', 'create_book_cpt');
function create_book_cpt() {
    register_post_type('book', array(
        'labels' => array(
            'name' => 'Books',
            'singular_name' => 'Book'
        ),
        'public' => true,
        'has_archive' => true,
        'menu_icon' => 'dashicons-book-alt',
        'supports' => array('title', 'editor', 'thumbnail'),
    ));
}


// 2. Add Metabox
add_action('add_meta_boxes', 'add_book_metabox');
function add_book_metabox() {
    add_meta_box(
        'book_details_metabox',
        'Book Details',
        'render_book_metabox',
        'book',
        'normal',
        'high'
    );
}

// 3. Render Metabox HTML
function render_book_metabox($post) {
    // Nonce field
    wp_nonce_field('book_meta_nonce_action', 'book_meta_nonce_name');

    // Get existing values
    $author = get_post_meta($post->ID, '_book_author', true);
    $pub_date = get_post_meta($post->ID, '_book_pub_date', true);
    $price = get_post_meta($post->ID, '_book_price', true);
    $genre = get_post_meta($post->ID, '_book_genre', true);
    $bestseller = get_post_meta($post->ID, '_book_bestseller', true);
    $summary = get_post_meta($post->ID, '_book_summary', true);

    ?>
    <p>
        <label>Author Name:</label><br>
        <input type="text" name="book_author" value="<?php echo esc_attr($author); ?>" style="width:100%;" />
    </p>
    <p>
        <label>Publication Date:</label><br>
        <input type="date" name="book_pub_date" value="<?php echo esc_attr($pub_date); ?>" />
    </p>
    <p>
        <label>Price (₹):</label><br>
        <input type="number" step="0.01" name="book_price" value="<?php echo esc_attr($price); ?>" />
    </p>
    <p>
        <label>Genre:</label><br>
        <select name="book_genre">
            <option value="fiction" <?php selected($genre, 'fiction'); ?>>Fiction</option>
            <option value="nonfiction" <?php selected($genre, 'nonfiction'); ?>>Non-Fiction</option>
            <option value="sci-fi" <?php selected($genre, 'sci-fi'); ?>>Sci-Fi</option>
            <option value="biography" <?php selected($genre, 'biography'); ?>>Biography</option>
        </select>
    </p>
    <p>
        <label>
            <input type="checkbox" name="book_bestseller" value="yes" <?php checked($bestseller, 'yes'); ?> />
            Is Bestseller?
        </label>
    </p>
    <p>
        <label>Summary:</label><br>
        <textarea name="book_summary" rows="4" style="width:100%;"><?php echo esc_textarea($summary); ?></textarea>
    </p>
    <?php
}

// 4. Save Metabox Data
add_action('save_post', 'save_book_metabox');
function save_book_metabox($post_id) {
    if (!isset($_POST['book_meta_nonce_name']) ||
        !wp_verify_nonce($_POST['book_meta_nonce_name'], 'book_meta_nonce_action')) {
        return;
    }

    if (defined('DOING_AUTOSAVE') && DOING_AUTOSAVE) return;

    if (!current_user_can('edit_post', $post_id)) return;

    update_post_meta($post_id, '_book_author', sanitize_text_field($_POST['book_author']));
    update_post_meta($post_id, '_book_pub_date', sanitize_text_field($_POST['book_pub_date']));
    update_post_meta($post_id, '_book_price', sanitize_text_field($_POST['book_price']));
    update_post_meta($post_id, '_book_genre', sanitize_text_field($_POST['book_genre']));
    update_post_meta($post_id, '_book_bestseller', isset($_POST['book_bestseller']) ? 'yes' : 'no');
    update_post_meta($post_id, '_book_summary', sanitize_textarea_field($_POST['book_summary']));
}


// Shortcode to Display Books CPT with Custom Fields
add_shortcode('show_books', 'show_books_shortcode');

function show_books_shortcode($atts) {
    ob_start(); // Output buffering

    $args = array(
        'post_type' => 'book',
        'posts_per_page' => -1
    );

    $books = new WP_Query($args);

    if ($books->have_posts()) {
        echo '<div class="book-list">';
        while ($books->have_posts()) {
            $books->the_post();

            $author = get_post_meta(get_the_ID(), '_book_author', true);
            $pub_date = get_post_meta(get_the_ID(), '_book_pub_date', true);
            $price = get_post_meta(get_the_ID(), '_book_price', true);
            $genre = get_post_meta(get_the_ID(), '_book_genre', true);
            $bestseller = get_post_meta(get_the_ID(), '_book_bestseller', true);
            $summary = get_post_meta(get_the_ID(), '_book_summary', true);

            ?>
            <div class="book-item" style="border:1px solid #ccc; padding:15px; margin-bottom:20px;">
                <h2><?php the_title(); ?></h2>
                <ul>
                    <li><strong>Author:</strong> <?php echo esc_html($author); ?></li>
                    <li><strong>Publication Date:</strong> <?php echo esc_html($pub_date); ?></li>
                    <li><strong>Price:</strong> ₹<?php echo esc_html($price); ?></li>
                    <li><strong>Genre:</strong> <?php echo esc_html($genre); ?></li>
                    <li><strong>Bestseller:</strong> <?php echo $bestseller === 'yes' ? 'Yes' : 'No'; ?></li>
                    <li><strong>Summary:</strong> <?php echo esc_html($summary); ?></li>
                </ul>
            </div>
            <?php
        }
        echo '</div>';
        wp_reset_postdata();
    } else {
        echo '<p>No books found.</p>';
    }

    return ob_get_clean(); // Return buffered content
}