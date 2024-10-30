<?php
/*
Plugin Name: Counts Section
Plugin URI: http://wordpress.org/plugins/
Description: A plugin through which you can call a numeric section by short code and there is a settings page through which you can add the content of the section.
Author: Mohamed A.Mkhadah
Version: 1.0
Author URI: https://profiles.wordpress.org/mohamedmkhadah/
*/

if (!function_exists('MCOUNS_HTML')){
    add_shortcode('MCOUNS_COUNTS','MCOUNS_HTML');
    function MCOUNS_HTML(){
        $val = get_option('MCOUNS_option');
   
   ?>
       
    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts section-bg">
      <div class="container">

        <div class="row counters">

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="<?php esc_attr_e($val['number_1']) ;?>" data-purecounter-duration="1" class="purecounter"></span>
            <p><?php esc_attr_e($val['titel_1']) ;?></p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="<?php esc_attr_e($val['number_2']) ;?>" data-purecounter-duration="1" class="purecounter"></span>
            <p><?php esc_attr_e($val['titel_2']) ;?></p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="<?php esc_attr_e($val['number_3']) ;?>" data-purecounter-duration="1" class="purecounter"></span>
            <p><?php esc_attr_e($val['titel_3']) ;?></p>
          </div>

          <div class="col-lg-3 col-6 text-center">
            <span data-purecounter-start="0" data-purecounter-end="<?php esc_attr_e($val['number_4']) ;?>" data-purecounter-duration="1" class="purecounter"></span>
            <p><?php esc_attr_e($val['titel_4']) ;?></p>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->
       

   <?php
    return ob_get_clean();
}

}

if (!function_exists('MCOUNS_my_script')){
add_action('wp_enqueue_scripts','MCOUNS_my_script');
function MCOUNS_my_script(){
    wp_enqueue_script('counts_script',plugin_dir_url(__FILE__).'/js/purecounter.js',array('jquery','jquery-effects-pulsate'),'123', true);
    wp_enqueue_style('counts_style', plugin_dir_url(__FILE__).'css/style.css');
    wp_enqueue_style('countss_style', plugin_dir_url(__FILE__).'css/bootstrap.min.css');

}
}

if(!function_exists('MCOUNS_admin_menu_setting')){
    add_action('admin_menu','MCOUNS_admin_menu_setting');
    function MCOUNS_admin_menu_setting(){
        add_menu_page(__('settings'),__('Counts Settings'),'manage_options','MCOUNS_option','MCOUNS_admin_page_setting');
    }
}

if (!function_exists('MCOUNS_admin_page_setting')){
function MCOUNS_admin_page_setting(){
    ?> 
    <form action="options.php" method="post">
        
        <div class="input-text-wrap loginas" id="title-wrap" >
            <?php
            settings_fields('MCOUNS_option');
            do_settings_sections('MCOUNS_option');
            ?>
            <h3 style="font-weight: bold"><?php _e('Fill in the information above, then copy the short code and paste it in the appropriate place in your site ..')?></h3>
            <h3 style="font-weight: bold" ><?php _e('Short Code : [MCOUNS_COUNTS]')?></h3>
        </div>
            <?php 
            submit_button(__('Save Settings'))
            ?>
            <br class="clear">

    </form>
    <?php
}
}

if (!function_exists('MCOUNS_option_setting')){
add_action('admin_init','MCOUNS_option_setting');
function MCOUNS_option_setting(){
    register_setting('MCOUNS_option',__('MCOUNS_option'));
    add_settings_section('MCOUNS_my_id',__('COUNTS SECTION SETTINGS'),'','MCOUNS_option');
    add_settings_field(
        'my_titel_1',__('The Title First:'),
        'MCOUNS_create_input',
        'MCOUNS_option',
        'MCOUNS_my_id',
        array(
            'title'=>'',
            'id'=>'titel_1',
            'type'=>'text'
        )
    );
    add_settings_field(
        'my_number_1',__('The Number:'),
        'MCOUNS_create_input',
        'MCOUNS_option',
        'MCOUNS_my_id',
        array(
            'title'=>'',
            'id'=>'number_1',
            'type'=>'number'
        )
    );
    add_settings_field(
        'my_titel_2',__('The Title Second:'),
        'MCOUNS_create_input',
        'MCOUNS_option',
        'MCOUNS_my_id',
        array(
            'title'=>'',
            'id'=>'titel_2',
            'type'=>'text'
        )
    );
    add_settings_field(
        'my_number_2',__('The Number:'),
        'MCOUNS_create_input',
        'MCOUNS_option',
        'MCOUNS_my_id',
        array(
            'title'=>'',
            'id'=>'number_2',
            'type'=>'number'
        )
    );
    add_settings_field(
        'my_titel_3',__('The Title Third:'),
        'MCOUNS_create_input',
        'MCOUNS_option',
        'MCOUNS_my_id',
        array(
            'title'=>'',
            'id'=>'titel_3',
            'type'=>'text'
        )
    );
    add_settings_field(
        'my_number_3',__('The Number:'),
        'MCOUNS_create_input',
        'MCOUNS_option',
        'MCOUNS_my_id',
        array(
            'title'=>'',
            'id'=>'number_3',
            'type'=>'number'
        )
    );
    add_settings_field(
        'my_titel_4',__('The Title Fourth:'),
        'MCOUNS_create_input',
        'MCOUNS_option',
        'MCOUNS_my_id',
        array(
            'title'=>'',
            'id'=>'titel_4',
            'type'=>'text'
        )
    );
    add_settings_field(
        'my_number_4',__('The Number:'),
        'MCOUNS_create_input',
        'MCOUNS_option',
        'MCOUNS_my_id',
        array(
            'title'=>'',
            'id'=>'number_4',
            'type'=>'number'
        )
    );

}
}

if (!function_exists('MCOUNS_create_input')){
function MCOUNS_create_input($arg){
    $val = get_option('MCOUNS_option');
    ?>
    <label for="<?php esc_attr_e($arg['id']) ;?>"><?php echo esc_html_e($arg['COUNTS SECTION SETTINGS']);?></label>
    <input type="<?php esc_attr_e($arg['type']);?>" id="<?php esc_attr_e($arg['id']) ;?>" name="MCOUNS_option[<?php esc_attr_e($arg['id']);?>]" value="<?php esc_attr_e($val[$arg['id']]) ;?>">
    <?php


}

}
