<?php

function empower_create_admin_page() { // the correct way to load scrypts & style into admin area withou breaking it.
    // see https://pippinsplugins.com/loading-scripts-correctly-in-the-wordpress-admin/ for instructions
    global $empower_settings_pages;
    //add_menu_page($page_title, $menu_title, $capability, $menu_slug, $function, $icon_url, $position)
    $empower_settings_pages[] = add_menu_page('Theme Options', 'Theme Options', 'manage_options', 'empower_menu', 'empower_general_settings_page', get_template_directory_uri() . '/images/pottery.png', 110);
    //add_submenu_page( string $parent_slug, string $page_title, string $menu_title, string $capability, string $menu_slug, callable $function = '' )
    //$empower_settings_pages[] = add_submenu_page('empower_menu', 'General Settings', 'General Settings', 'manage_options', 'empower_general','empower_general_settings_page');
    //$empower_settings_pages[] = add_submenu_page('empower_menu', 'Theme Selection', 'Theme Select', 'manage_options', 'empower_theme','empower_theme_select_page');
    
    //activate custom settings
    add_action('admin_init', 'empower_init_settings');
}

add_action('admin_menu', 'empower_create_admin_page');

function empower_load_scripts($hook) {
    global $empower_settings_pages;
    if (!in_array($hook, $empower_settings_pages))
        return; // only shown on these specific pages
    wp_enqueue_style('bootstrapcss', get_template_directory_uri() . '/bootstrap/css/bootstrap.min.css', array(), '', 'all');
    wp_enqueue_style('tabs_vertical', get_template_directory_uri() . '/css/admin/tabs.css', array(), '', 'all');
    wp_enqueue_style('admincss', get_template_directory_uri() . '/css/admin/admin.css', array(), '', 'all');
    wp_enqueue_script('bootstrapjs', get_template_directory_uri() . '/bootstrap/js/bootstrap.js', array(), '', 'true');
    wp_enqueue_style('fontawesomecss', get_template_directory_uri() . '/font-awesome/css/font-awesome.min.css', array(), '', 'all');
    
    wp_enqueue_media();
    wp_enqueue_script('jquery', get_template_directory_uri() . '/js/jquery-3.1.1.min.js', array(), '', 'true');
    wp_enqueue_script('adminjs', get_template_directory_uri() . '/js/admin.js', array(), '', 'true');
    //wp_enqueue_script( 'custom-js', plugins_url( 'js/custom.js' , dirname(__FILE__) ) );
}

add_action('admin_enqueue_scripts', 'empower_load_scripts');

function empower_init_settings() {
    register_setting('empower-general-settings', 'logo_image');
    register_setting('empower-general-settings', 'first_name');
    register_setting('empower-general-settings', 'last_name');
    register_setting('empower-general-settings', 'twitter_handler', 'empower_santinize_text_fields');
    register_setting('empower-general-settings', 'facebook_handler');
    register_setting('empower-general-settings', 'gplus_handler');
    register_setting('empower-theme-settings', 'bootstrap_theme_id');

    register_setting('empower-general-settings', 'empowerer_settings');
    //add_settings_section( $id, $title, $callback, $page );
    add_settings_section('empower-setting-section', 'General settings', 'empower_general_setting_callback', 'empower-settings-page');
    
    add_settings_section('section2', 'Theme Selection', 'empower_theme_chooser_callback', 'empower-settings-page2');
    
    
}

function empower_general_setting_callback() {
    //add_settings_field( $id, $title, $callback, $page, $section, $args );
    add_settings_field('logo_image', 'Logo Image', 'empower_general_logo_callback', 'empower-settings-page', 'empower-setting-section');
    add_settings_field('first_name', 'First Name', 'empower_general_name', 'empower-settings-page', 'empower-setting-section');
    add_settings_field('general-twitter', 'Twitter Handler', 'empower_general_twitter', 'empower-settings-page', 'empower-setting-section');
    add_settings_field('general-facebook', 'Facebook Handler', 'empower_general_facebook', 'empower-settings-page', 'empower-setting-section');
    add_settings_field('general-gplus', 'Google Plus Handler', 'empower_general_gplus', 'empower-settings-page', 'empower-setting-section');
}

function empower_theme_chooser_callback() {
    //echo "Theme Selection";
    add_settings_field('bootstrap_theme_id', 'Select a Theme:', 'empower_bootstrap_theme_chooser_callback', 'empower-settings-page2', 'section2');
    echo "Current theme: <strong>". get_option('bootstrap_theme_id')."</strong>";
    
}

function empower_general_logo_callback() {
    
    $logo = esc_attr(get_option('logo_image'));
    echo '<div class="image-container">';
    echo '  <div id="logo-picture-preview" style="background-image:url('.$logo.')">';
    echo '  </div>';
    echo '</div>';
    echo '<input type="button" value="Upload Website Logo" class="btn btn-primary fa fa-upload" id="upload-button" /> ';
    echo '<input type="hidden" name="logo_image" value="' . $logo . '" id="logo-picture" />';
    
}
function empower_general_name() {
    $firstName = esc_attr(get_option('first_name'));
    $lastName = esc_attr(get_option('last_name'));
    echo '<input type="text" name="first_name" value="' . $firstName . '" placeholder="First Name" /> ';
    echo '<input type="text" name="last_name" value="' . $lastName . '" placeholder="Last Name" />';
}

function empower_general_twitter() {
    $t = esc_attr(get_option('twitter_handler'));
    echo '<input type="text" name="twitter_handler" value="' . $t . '" placeholder="Twitter Handler" /><p class="description">Decription</p>';
}

function empower_general_facebook() {
    $fb = esc_attr(get_option('facebook_handler'));
    echo '<input type="text" name="facebook_handler" value="' . $fb . '" placeholder="Facebook Handler" />';
}

function empower_general_gplus() {
    $g = esc_attr(get_option('gplus_handler'));
    echo '<input type="text" name="gplus_handler" value="' . $g . '" placeholder="Google Handler" />';
}

function empower_bootstrap_theme_chooser_callback() {

    $theme_uri = get_template_directory_uri() . '/bootstrap/css/themes/';
    $theme_dir = get_template_directory() . '/bootstrap/css/themes/';
    $dirs = array_filter(glob($theme_dir . '/*'), 'is_dir');
    $cur_theme = get_option('bootstrap_theme_id');
    
    if (!empty($dirs)) {
        
        foreach ($dirs as $dir) {
            $theme = basename($dir);
            ?>
            <div class="col-xs-6">
                <div class="preview">
                    <div class="image">
                        <img src="<?php echo $theme_uri . $theme . '/thumbnail.png'; ?>" class="img-responsive" />
                    </div>
                    <div class="options">
                        <h3><label><input type="radio" name="bootstrap_theme_id" value="<?php echo ucfirst($theme) ?>" <?php if( ucfirst($theme) == $cur_theme) echo "checked"; ?> /><?php echo ucfirst($theme) ?></label></h3>
                    </div>
                </div>
            </div>
            <?php
        }
    }
}
function empower_santinize_text_fields($input) {
    $output = sanitize_text_field($input);
    $output = str_replace("@", "", $output);
    return($output);
}

function empower_theme_select_page() {
   // require_once(get_template_directory() . '/inc/templates/empower-admin.php');
    echo "this is it";
}

function empower_general_settings_page() {
   require_once(get_template_directory() . '/inc/templates/empower-admin.php');
}

add_action( 'wp_ajax_settings_general', 'my_action_callback' );

function my_action_callback() {
	//global $wpdb; // this is how you get access to the database
        
        $options = array();
        $options['value1'] = $_POST['test1'];
        $options['hotline'] = $_POST['hotline'];
        $options['logo_image'] = $_POST['logo_image'];
        
        $options['bootstrap_theme_id'] = strtolower($_POST['bootstrap_theme_id']);
        $save = json_encode($options);
        update_option("empowerer_settings", $save);
        
        echo "Saved!";


	wp_die(); // this is required to terminate immediately and return a proper response
}