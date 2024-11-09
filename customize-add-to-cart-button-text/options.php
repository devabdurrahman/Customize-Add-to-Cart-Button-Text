<?php

// Prevent direct access to the file
if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly
}

 /*
 * Plugin Option Page Function
 */
  function cacbt_add_theme_page(){
    add_menu_page( 'Customize Add to Cart Button Text', __('Add to Cart Button Text', 'customize-add-to-cart-button-text'), 'manage_options', 'cacbt-plugin-option', 'cacbt_create_page', 'dashicons-cart', 101 );
  }
  add_action( 'admin_menu', 'cacbt_add_theme_page' );

 /*
 * Plugin Option Page Callback Function
 */
  function cacbt_create_page(){
  	?>
      <div class="cacbt_main_area">
        <div class="cacbt_body_area cacbt_common">
          <h3 id="title"><?php print esc_attr( 'Customize Add to Cart Button Text' ); ?></h3>
          <form action="options.php" method="post">
            <?php wp_nonce_field('update-options'); ?>

            <!-- Sub Section title -->
            <h3 id="cacbt-sub-title"><?php print esc_attr( 'Change Button Text in single product & archive page' ); ?></h3>
            <p><?php print esc_attr( 'Add custom text for the Add to cart button in single product & archive page by product type' ); ?></p>

            <!-- Simple product single -->
            <label for="cacbt-simple-single" name="cacbt-simple-single"><?php print esc_attr( 'Simple product' ); ?></label>
            <input type="text" name="cacbt-simple-single" value="<?php print esc_html(get_option('cacbt-simple-single')); ?>">

            <!-- External/Affiliate product single -->
            <label for="cacbt-external-single" name="cacbt-external-single"><?php print esc_attr( 'External/Affiliate product' ); ?></label>
            <input type="text" name="cacbt-external-single" value="<?php print esc_html(get_option('cacbt-external-single')); ?>">

            <!-- Variable product single -->
            <label for="cacbt-variable-single" name="cacbt-variable-single"><?php print esc_attr( 'Variable product' ); ?></label>
            <input type="text" name="cacbt-variable-single" value="<?php print esc_html(get_option('cacbt-variable-single')); ?>">

            <!-- Grouped product single-->
            <label for="cacbt-grouped-single" name="cacbt-grouped-single"><?php print esc_attr( 'Grouped product' ); ?></label>
            <input type="text" name="cacbt-grouped-single" value="<?php print esc_html(get_option('cacbt-grouped-single')); ?>">

            
            <input type="hidden" name="action" value="update">
            <input type="hidden" name="page_options" value="cacbt-simple-single, cacbt-external-single, cacbt-variable-single, cacbt-grouped-single">
            <input type="submit" name="submit" value="<?php echo esc_html(__('Save Changes', 'customize-add-to-cart-button-text')); ?>">
          </form>
        </div>
        <div class="cacbt_sidebar_area cacbt_common">
          <h3 id="title"><?php print esc_attr( 'About Author' ); ?></h3>
          <p><img src="<?php echo esc_url(plugin_dir_url(__FILE__) . 'img/author.png'); ?>" alt=""></p>
          <p>I'm <strong><a href="https://github.com/devabdurrahman" target="_blank">Abdur Rahman</a></strong> a Wordpress Web developer who is passionate about making error-free websites with 100% client satisfaction. I have a passion for learning and sharing my knowledge with others as publicly as possible. I love to solve real-world problems.</p>
          <span id="buy-me-coffe"><a href="https://www.buymeacoffee.com/devabdurrahman" target="_blank"><img src="<?php echo esc_url(plugin_dir_url(__FILE__) . 'img/buyme.png'); ?>" alt=""></a></span>          
        </div>
      </div>
    <?php
  }

?>