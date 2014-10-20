<?php
new ishouvikwp_options();

class ishouvikwp_options
{
    public function __construct()
    {
        add_action( 'customize_register', array(&$this, 'is_custom_options' ));
    }

    /**
     * Customizer manager
     * @param  WP_Customizer_Manager $wp_manager
     * @return void
     */
    public function is_custom_options( $wp_manager )
    {
        $this->is_custom_options_section( $wp_manager );
    }

    public function is_custom_options_section( $wp_manager )
    {

        // Site Descriptions section
        $wp_manager->add_section( 'site_descriptions', array(
            'title'          => 'Site Descriptions',
            'priority'       => 34,
        ) );

        // Social Profiles section
        $wp_manager->add_section( 'social_profiles', array(
            'title'          => 'Social Profiles',
            'priority'       => 35,
        ) );


        // Site Logo control
        $wp_manager->add_setting( 'is_logo', array(
            'default'        => '',
        ) );

        $wp_manager->add_control( 'is_logo', array(
            'label'      => 'Logo URL',
            'section'    => 'site_descriptions',
            'settings'   => 'is_logo',
            'type'       => 'text',
        ) );

        // Twitter Handler control
        $wp_manager->add_setting( 'is_tw_handler', array(
            'default'        => 'ishouvik',
        ) );
        $wp_manager->add_control( 'is_tw_handler', array(
            'label'   => 'Twitter Handler (twitter.com/handler)',
            'section' => 'social_profiles',
            'settings' => 'is_tw_handler',
            'type'    => 'text',
            'priority' => 1
        ) );

        // Facebook Username control
        $wp_manager->add_setting( 'is_fb_username', array(
            'default'        => 'shouvikmukherjee',
        ) );
        $wp_manager->add_control( 'is_fb_username', array(
            'label'   => 'Facebook Username (facebook.com/username)',
            'section' => 'social_profiles',
            'type'    => 'text',
            'priority' => 2
        ) );

        // Google Plus Username control
        $wp_manager->add_setting( 'is_gp_username', array(
            'default'        => 'shouvikmukherjee',
        ) );
        $wp_manager->add_control( 'is_gp_username', array(
            'label'   => 'Google Plus Username (plus.google.com/+username)',
            'section' => 'social_profiles',
            'type'    => 'text',
            'priority' => 3
        ) );

    }

}

?>