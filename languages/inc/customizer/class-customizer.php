<?php

/**
 * Implements Customizer functionality.
 *
 * Add custom sections and settings to the Customizer.
 *
 * @package   empowerer
 * @copyright Copyright (c) 2016, Ready Technologies Ltd.
 * @license   GPL2+
 */
class Empowerer_Customizer {

    public function __construct() {
        add_action('customize_register', array($this, 'register_customize_sections'));
    }

    /**
     * Add all sections and panels to the Customizer
     *
     * @param WP_Customize_Manager $wp_customize
     *
     * @access public
     * @since  1.0
     * @return void
     */
    public function register_customize_sections($wp_customize) {
        // New panel for "Layout".
        $wp_customize->add_section('layout_section', array(
            'title' => __('General settings & Layout', 'empowerer'),
            'priority' => 1
        ));
        // New panel for "Contact & social".
        $wp_customize->add_section('contact_section', array(
            'title' => __('Contact & Social', 'empowerer'),
            'priority' => 2
        ));
        // New panel for "Typography".
        $wp_customize->add_section('typography_section', array(
            'title' => __('Typography', 'empowerer'),
            'priority' => 3
        ));
        // New panel for "Top bar".
        $wp_customize->add_section('top_bar_section', array(
            'title' => __('Top bar', 'empowerer'),
            'priority' => 4
        ));
        
        // New panel for "Header".
        $wp_customize->add_section('header_section', array(
            'title' => __('Header', 'empowerer'),
            'priority' => 5
        ));
        // New panel for "Footer".
        $wp_customize->add_section('footer_section', array(
            'title' => __('Footer', 'empowerer'),
            'priority' => 6
        ));
        
        


        /*
         * Add settings to sections.
         */
        $this->top_bar_section($wp_customize);
        $this->contact_section($wp_customize);
        $this->header_section($wp_customize);
        $this->footer_section($wp_customize);
        $this->typography_section($wp_customize);
        $this->blog_layout_section($wp_customize);
        $this->colors_section($wp_customize);
    }

    /**
     * Section: Top Bar
     */
    private function top_bar_section($wp_customize) {

        $wp_customize->add_setting('top_bar_enable', array(
            'default' => true,
            'sanitize_callback' => array($this, 'sanitize_checkbox')
        ));
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'top_bar_enable', array(
            'label' => esc_html__('Enable', 'empowerer'),
            //'description' => esc_html__('Check this on to automatically insert the featured image before the post content.', 'empowerer'),
            'section' => 'top_bar_section',
            'settings' => 'top_bar_enable',
            'type' => 'checkbox',
            'priority' => 1
        )));
        
        $wp_customize->add_setting('top_bar_bg', array(
            'default' => '#191919',
            'sanitize_callback' => 'sanitize_hex_color'
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'top_bar_bg', array(
            'label' => esc_html__('Background color', 'empowerer'),
            'section' => 'top_bar_section',
            'settings' => 'top_bar_bg',
            'priority' => 2
        )));
        $wp_customize->add_setting('top_bar_text_color', array(
            'default' => '#191919',
            'sanitize_callback' => 'sanitize_hex_color'
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'top_bar_text_color', array(
            'label' => esc_html__('Text color', 'empowerer'),
            'section' => 'top_bar_section',
            'settings' => 'top_bar_text_color',
            'priority' => 2
        )));
        
        $wp_customize->add_setting('top_bar_bottom', array(
            'default' => '#191919',
            'sanitize_callback' => 'sanitize_hex_color'
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'top_bar_bottom', array(
            'label' => esc_html__('Top Bar bottom color', 'empowerer'),
            'section' => 'top_bar_section',
            'settings' => 'top_bar_bottom',
            'priority' => 2
        )));
        $wp_customize->add_setting('topbar_bg_img', array(
            'default' => '',
            'sanitize_callback' => 'esc_url'
        ));
        $wp_customize->add_control( new WP_Customize_Upload_Control( $wp_customize, 'topbar_bg_img', array(
            'label' => __( 'Background Image', 'empowerer' ),
            'description' => esc_html__('This setting overdrives background color and line.', 'empowerer'),
            'section' => 'top_bar_section',
            'settings' => 'topbar_bg_img',
            'mime_type' => 'image',
            'priority' => 2
          ) ) );
        $wp_customize->add_setting('top_bar_text', array(
            'default' => "Hotline or Email, accept HTML",
            //'sanitize_callback' => array($this, 'santinize_text_field')
        ));
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'top_bar_text', array(
            'label' => esc_html__('Hotline or Callout', 'empowerer'),
            //'description' => esc_html__('Check this on to automatically insert the featured image before the post content.', 'empowerer'),
            'section' => 'top_bar_section',
            'settings' => 'top_bar_text',
            'type' => 'textarea',
            'priority' => 3
        )));
        $wp_customize->add_setting('top_bar_social_enable', array(
            'default' => true,
            'sanitize_callback' => array($this, 'sanitize_checkbox')
        ));
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'top_bar_social_enable', array(
            'label' => esc_html__('Enable Social Links & Search', 'empowerer'),
            'description' => esc_html__('Check this to enable showing social links.', 'empowerer'),
            'section' => 'top_bar_section',
            'settings' => 'top_bar_social_enable',
            'type' => 'checkbox',
            'priority' => 4
        )));
        $wp_customize->add_setting('top_bar_button_color', array(
            'default' => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color'
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'top_bar_button_color', array(
            'label' => esc_html__('Button Color', 'empowerer'),
            'section' => 'top_bar_section',
            'settings' => 'top_bar_button_color',
            'priority' => 4
        )));
    }
/**
     * Section: Top Bar
     */
    private function contact_section($wp_customize) {

        $wp_customize->add_setting('url_facebook', array(
            'default' => '',
            'sanitize_callback' => 'esc_url'
        ));
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'url_facebook', array(
            'label' => esc_html__('Facebook URL', 'empowerer'),
            'section' => 'contact_section',
            'settings' => 'url_facebook',
            'type' => 'text',
            'priority' => 1
        )));
        
        $wp_customize->add_setting('url_twitter', array(
            'default' => '',
            'sanitize_callback' => 'esc_url'
        ));
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'url_twitter', array(
            'label' => esc_html__('Twitter URL', 'empowerer'),
            'section' => 'contact_section',
            'settings' => 'url_twitter',
            'type' => 'text',
            'priority' => 2
        )));
        
        $wp_customize->add_setting('url_linkedin', array(
            'default' => '',
            'sanitize_callback' => 'esc_url'
        ));
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'url_linkedin', array(
            'label' => esc_html__('LinkedIn URL', 'empowerer'),
            'section' => 'contact_section',
            'settings' => 'url_linkedin',
            'type' => 'text',
            'priority' => 3
        )));
        
        $wp_customize->add_setting('url_youtube', array(
            'default' => '',
            'sanitize_callback' => 'esc_url'
        ));
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'url_youtube', array(
            'label' => esc_html__('Youtube URL', 'empowerer'),
            'section' => 'contact_section',
            'settings' => 'url_youtube',
            'type' => 'text',
            'priority' => 4
        )));
        
        $wp_customize->add_setting('url_pinterest', array(
            'default' => '',
            'sanitize_callback' => 'esc_url'
        ));
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'url_pinterest', array(
            'label' => esc_html__('Pinterest URL', 'empowerer'),
            'section' => 'contact_section',
            'settings' => 'url_pinterest',
            'type' => 'text',
            'priority' => 5
        )));
        
        $wp_customize->add_setting('url_googleplus', array(
            'default' => '',
            'sanitize_callback' => 'esc_url'
        ));
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'url_googleplus', array(
            'label' => esc_html__('Google Plus+ URL', 'empowerer'),
            'section' => 'contact_section',
            'settings' => 'url_googleplus',
            'type' => 'text',
            'priority' => 6
        )));
        
        $wp_customize->add_setting('url_skype', array(
            'default' => '',
            'sanitize_callback' => 'sanitize_text_field'
        ));
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'url_skype', array(
            'label' => esc_html__('Skype URL', 'empowerer'),
            'section' => 'contact_section',
            'settings' => 'url_skype',
            'type' => 'text',
            'priority' => 7
        )));
        
        
    }
    /**
     * Section: header
     */
    private function header_section($wp_customize) {

        $wp_customize->add_setting('header_bg_color', array(
            'default' => '#ffffff',
            'sanitize_callback' => 'sanitize_hex_color'
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'header_bg_color', array(
            'label' => esc_html__('Background Color', 'empowerer'),
            'section' => 'header_section',
            'settings' => 'header_bg_color',
            'priority' => 1
        )));
        
        $wp_customize->add_setting('header_bg_img', array(
            'default' => '',
            'sanitize_callback' => 'esc_url'
        ));
        $wp_customize->add_control( new WP_Customize_Upload_Control( $wp_customize, 'header_bg_img', array(
            'label' => __( 'Background Image', 'empowerer' ),
            'section' => 'header_section',
            'settings' => 'header_bg_img',
            'mime_type' => 'image',
            'priority' => 2
          ) ) );
        
        $wp_customize->add_setting('header_logo', array(
            'default' => ''
        ));
        $wp_customize->add_control( new WP_Customize_Cropped_Image_Control( $wp_customize, 'header_logo', array(
            'label' => __( 'Logo', 'empowerer' ),
            'section' => 'header_section',
            'settings' => 'header_logo',
            'width'       => 200,
            'height'      => 100,
            'flex_height' => true,
            'flex_width' => true,
            'mime_type' => 'image',
            'priority' => 3
          ) ) );
        $wp_customize->add_setting('font_main_menu_color', array(
            'default' => '#333333',
            'sanitize_callback' => 'sanitize_hex_color'
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'font_main_menu_color', array(
            'label' => esc_html__('Main menu Color', 'empowerer'),
            'section' => 'header_section',
            'settings' => 'font_main_menu_color',
            'priority' => 3
        )));
        $wp_customize->add_setting('font_main_menu_color_hover', array(
            'default' => '#666666',
            'sanitize_callback' => 'sanitize_hex_color'
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'font_main_menu_color_hover', array(
            'label' => esc_html__('Main menu Hover Color', 'empowerer'),
            'section' => 'header_section',
            'settings' => 'font_main_menu_color_hover',
            'priority' => 3
        )));
        
        $wp_customize->add_setting('font_main_menu', array(
            'default' => 'Roboto'
        ));
        $wp_customize->add_control( new Google_Font_Dropdown_Custom_Control( $wp_customize, 'font_main_menu', array(
            'label' => __( 'Main menu Font', 'empowerer' ),
            'section' => 'header_section',
            'settings' => 'font_main_menu',
            'priority' => 4
          ) ) );
        
        
        $wp_customize->add_setting('font_main_menu_bold', array(
            'default' => '0'
        ));
        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'font_main_menu_bold', array(
            'label' => __( 'Main menu Font weight', 'empowerer' ),
            'section' => 'header_section',
            'settings' => 'font_main_menu_bold',
            'type' => 'select',
            'choices' => array('0'=>'Normal','1'=>'Bold'),
            'priority' => 5
          ) ) );
        
        $wp_customize->add_setting('font_main_menu_size', array(
            'default' => '100'
        ));
        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'font_main_menu_size', array(
            'label' => __( 'Main menu Font size', 'empowerer' ),
            'section' => 'header_section',
            'settings' => 'font_main_menu_size',
            'type' => 'select',
            'choices' => array('100'=>'Default', '110'=>'1.1x', '120'=>'1.2x','130'=>'1.3x','140'=>'1.4x','150'=>'1.5x','200'=>'2x'),
            'priority' => 6
          ) ) );
        
        $wp_customize->add_setting('font_main_menu_transform', array(
            'default' => 'none'
        ));
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'font_main_menu_transform', array(
            'label' => esc_html__('Transform', 'empowerer'),
            //'description' => esc_html__('Check this on to automatically insert the featured image before the post content.', 'empowerer'),
            'section' => 'header_section',
            'settings' => 'font_main_menu_transform',
            'type' => 'select',
            'choices' => array('none'=>'None','capitalize'=>'Capitalize', 'uppercase'=>'Uppercase'),
            'priority' => 7
        )));
    }
    /**
     * Section: Footer
     */
    private function footer_section($wp_customize) {
        $wp_customize->add_setting('footer_widget_bg', array(
            'default' => '#f5f5f5',
            'sanitize_callback' => 'sanitize_hex_color'
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_widget_bg', array(
            'label' => esc_html__('Widget background color', 'empowerer'),
            'section' => 'footer_section',
            'settings' => 'footer_widget_bg',
            'priority' => 1
        )));
        
        $wp_customize->add_setting('footer_widget_border', array(
            'default' => '#c52d2f',
            'sanitize_callback' => 'sanitize_hex_color'
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_widget_border', array(
            'label' => esc_html__('Separate Line Color', 'empowerer'),
            'section' => 'footer_section',
            'settings' => 'footer_widget_border',
            'priority' => 2
        )));
        $wp_customize->add_setting('footer_sep_thick', array(
            'default' => '1'
        ));
        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_sep_thick', array(
            'label' => __( 'Separate Line thickness', 'empowerer' ),
            'section' => 'footer_section',
            'settings' => 'footer_sep_thick',
            'type' => 'select',
            'choices' => array('1'=>'1px','2'=>'2px','3'=>'3px','4'=>'4px','5'=>'5px'),
            'priority' => 3
          ) ) );
        
        $wp_customize->add_setting('footer_copy_bg', array(
            'default' => '#2e2e2e',
            'sanitize_callback' => 'sanitize_hex_color'
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'footer_copy_bg', array(
            'label' => esc_html__('Footer Background color ', 'empowerer'),
            'section' => 'footer_section',
            'settings' => 'footer_copy_bg',
            'priority' => 4
        )));
        $wp_customize->add_setting('footer_copy_text', array(
            'default' => date('Y')
        ));
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'footer_copy_text', array(
            'label' => esc_html__('Footer Copyright text', 'empowerer'),
            'section' => 'footer_section',
            'settings' => 'footer_copy_text',
            'type' => 'text',
            'priority' => 5
        )));
        
        $wp_customize->add_setting('footer_copy_float', array(
            'default' => 'left'
        ));
        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'footer_copy_float', array(
            'label' => __( 'Copyright text position', 'empowerer' ),
            'section' => 'footer_section',
            'settings' => 'footer_copy_float',
            'type' => 'select',
            'choices' => array('left'=>'Left','right'=>'Right'),
            'priority' => 6
          ) ) );
        
    }

    /**
     * Section: Blog Layout
     */
    private function blog_layout_section($wp_customize) {
        $wp_customize->add_setting('site_bg_img', array(
            'default' => '',
            'sanitize_callback' => 'esc_url'
        ));
        $wp_customize->add_control( new WP_Customize_Upload_Control( $wp_customize, 'site_bg_img', array(
            'label' => __( 'Background Image', 'empowerer' ),
            'section' => 'layout_section',
            'settings' => 'site_bg_img',
            'mime_type' => 'image',
            'priority' => 1
          ) ) );
        
    }

    /**
     * Sanitize Checkbox
     *
     * Accepts only "true" or "false" as possible values.
     *
     * @param $input
     *
     * @access public
     * @since  1.0
     * @return bool
     */
    public function sanitize_checkbox($input) {
        return ( $input === true ) ? true : false;
    }

    function santinize_text_field($input) {
        $output = sanitize_text_field($input);
        $output = str_replace("@", "", $output);
        return($output);
    }
    private function typography_section($wp_customize){
        $wp_customize->add_setting('body_text_color', array(
            'default' => '#444444',
            'sanitize_callback' => 'sanitize_hex_color'
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'body_text_color', array(
            'label' => esc_html__('Body Text Color', 'empowerer'),
            'section' => 'typography_section',
            'settings' => 'body_text_color',
            'priority' => 1
        )));
        $wp_customize->add_setting('body_text_font', array(
            'default' => 'Roboto'
        ));
        $wp_customize->add_control( new Google_Font_Dropdown_Custom_Control( $wp_customize, 'body_text_font', array(
            'label' => __( 'Body Font', 'empowerer' ),
            'section' => 'typography_section',
            'settings' => 'body_text_font',
            'priority' => 2
          ) ) );
        $wp_customize->add_setting('body_text_font_size', array(
            'default' => '12px'
        ));
        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'body_text_font_size', array(
            'label' => __( 'Body Font size', 'empowerer' ),
            'section' => 'typography_section',
            'settings' => 'body_text_font_size',
            'type' => 'select',
            'choices' => array('10px'=>'10px', 
                '11px'=>'11px', 
                '12px'=>'12px',
                '13px'=>'13px',
                '14px'=>'14px',
                '15px'=>'15px',
                '16px'=>'16px',
                '17px'=>'17px',
                '18px'=>'18px',
                ),
            'priority' => 2
          ) ) );
        // link
        $wp_customize->add_setting('link_color', array(
            'default' => '#ff4444',
            'sanitize_callback' => 'sanitize_hex_color'
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'link_color', array(
            'label' => esc_html__('Links Color', 'empowerer'),
            'section' => 'typography_section',
            'settings' => 'link_color',
            'priority' => 3
        )));
        $wp_customize->add_setting('link_hover_color', array(
            'default' => '#ff0000',
            'sanitize_callback' => 'sanitize_hex_color'
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'link_hover_color', array(
            'label' => esc_html__('Links Hover Color', 'empowerer'),
            'section' => 'typography_section',
            'settings' => 'link_hover_color',
            'priority' => 4
        )));
        // heading
        $wp_customize->add_setting('heading_color', array(
            'default' => '#ff4444',
            'sanitize_callback' => 'sanitize_hex_color'
        ));
        $wp_customize->add_control(new WP_Customize_Color_Control($wp_customize, 'heading_color', array(
            'label' => esc_html__('Heading Color', 'empowerer'),
            'section' => 'typography_section',
            'settings' => 'heading_color',
            'priority' => 5
        )));
        
        $wp_customize->add_setting('heading_bold', array(
            'default' => '0'
        ));
        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'heading_bold', array(
            'label' => __( 'Heading Font weight', 'empowerer' ),
            'section' => 'typography_section',
            'settings' => 'heading_bold',
            'type' => 'select',
            'choices' => array('0'=>'Normal','1'=>'Bold'),
            'priority' => 6
          ) ) );
        $wp_customize->add_setting('heading_transform', array(
            'default' => 'none'
        ));
        $wp_customize->add_control(new WP_Customize_Control($wp_customize, 'heading_transform', array(
            'label' => esc_html__('Transform', 'empowerer'),
            //'description' => esc_html__('Check this on to automatically insert the featured image before the post content.', 'empowerer'),
            'section' => 'typography_section',
            'settings' => 'heading_transform',
            'type' => 'select',
            'choices' => array('none'=>'None','capitalize'=>'Capitalize', 'uppercase'=>'Uppercase'),
            'priority' => 7
        )));
        $wp_customize->add_setting('h1_size', array(
            'default' => '150'
        ));
        $wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'h1_size', array(
            'label' => __( 'H1 Font size', 'empowerer' ),
            'description' => esc_html__('Note: h2, h3, h4 and h5 inherit this inital size by deduce 10% each.', 'empowerer'),
            'section' => 'typography_section',
            'settings' => 'h1_size',
            'type' => 'select',
            'choices' => array('150'=>'1.5x','160'=>'1.6x','170'=>'1.7x','180'=>'1.8x','190'=>'1.9x','200'=>'2x','210'=>'2.1x'),
            'priority' => 8
          ) ) );
        
        
    }

    /**
     * Section: Colors
     *
     * @param WP_Customize_Manager $wp_customize
     *
     * @access private
     * @since  1.0
     * @return void
     */
    private function colors_section($wp_customize) {

        
    }

}

