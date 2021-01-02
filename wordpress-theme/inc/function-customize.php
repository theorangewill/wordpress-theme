<?php
if(class_exists('WP_Customize_Control')){
	require_once get_template_directory().'/inc/class-customizer-toggle-control-master/class-customizer-toggle-control.php';
	require_once get_template_directory().'/inc/customizer-custom-controls-master/inc/custom-controls.php';

    class Color_Radio_Button_Custom_Control extends WP_Customize_Control {
		public $type = 'color_radio_button';
		public function enqueue(){
			wp_enqueue_style('ttw-custom-controls-css', get_template_directory_uri() . '/css/ttw.custom-controls.admin.css', array(), '1.0', 'all');
        }
		public function render_content(){
		?>
			<div class="text_radio_button_control">
				<?php if(!empty($this->label)){ ?>
					<span class="customize-control-title"><?php echo esc_html($this->label); ?></span>
				<?php } ?>
				<?php if(!empty($this->description)){ ?>
					<span class="customize-control-description"><?php echo esc_html($this->description); ?></span>
				<?php } ?>

				<div class="radio-buttons">
					<?php foreach ($this->choices as $key => $value){ ?>
                        <label class="radio-button-label ">
                            <input type="radio" 
                                   name="<?php echo esc_attr($this->id); ?>" 
                                   value="<?php echo esc_attr($key); ?>" 
                                   <?php $this->link(); ?> 
                                   <?php checked(esc_attr($key), $this->value()); ?>/>
							<span class="<?php echo $key ?>"><?php echo esc_html($value); ?></span>
						</label>
					<?php	} ?>
				</div>
			</div>
		<?php
		}
	}
}
function ttw_customize_register($wp_customize){
    $wp_customize->add_setting('ttw_customize_colors_darktheme', array(
        'default' => '',
        'description' => 'Modify the background'
   ));
    $wp_customize->add_control(new Customizer_Toggle_Control($wp_customize, 
        'ttw_customize_colors_darktheme_control', 
        array(
            'label'	      => 'Enable Dark Theme',
            'section'     => 'colors',
            'settings'    => 'ttw_customize_colors_darktheme',
            'type'        => 'flat',// light, ios, flat
       )
   ));
    $wp_customize->add_setting('ttw_customize_colors_primary',
        array(
        'default' => 'orange',
        'transport' => 'refresh',
        'sanitize_callback' => 'skyrocket_radio_sanitization'
       )
   );
    $wp_customize->add_control(new Color_Radio_Button_Custom_Control($wp_customize, 
        'ttw_customize_colors_primary',
        array(
            'label' => 'Change Primary Color',
            'section' => 'colors',
            'choices' => array(
                'red' => '',
                'orange' => '',
                'yellow' => '',
                'green' => '',
                'turquoise' => '',
                'blue' => '',
                'purple' => '',
                'magenta' => '',
                'pink' => ''
           )
       )
   ));




    

    $wp_customize->add_section('ttw_customize_options', array(
        'title' => 'Theme Options',
        'capability' => 'manage_options',
        'priority' => 21
   ));
    $wp_customize->add_setting('ttw_customize_footer_image', array(
        'default' => '',
        'description' => 'Modify the footer image'
   ));
    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize,
        'ttw_customize_footer_image_control',
        array(
            'label'      => 'Upload footer image',
            'section'    => 'ttw_customize_options',
            'settings'   => 'ttw_customize_footer_image'
       )
   ));
}
add_action('customize_register', 'ttw_customize_register');

?>