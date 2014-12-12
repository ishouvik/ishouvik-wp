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
        $wp_manager->add_section( 'contact_options', array(
            'title'          => 'Contact Options',
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

        // Email Address
        $wp_manager->add_setting( 'is_email_address', array(
            'default'        => 'contact@ishouvik.com',
        ) );
        $wp_manager->add_control( 'is_email_address', array(
            'label'   => 'Email Address',
            'section' => 'contact_options',
            'type'    => 'text',
            'priority' => 1
        ) );

        // Twitter Handler control
        $wp_manager->add_setting( 'is_tw_handler', array(
            'default'        => 'ishouvik',
        ) );
        $wp_manager->add_control( 'is_tw_handler', array(
            'label'   => 'Twitter Handler',
            'section' => 'contact_options',
            'settings' => 'is_tw_handler',
            'type'    => 'text',
            'priority' => 2
        ) );

        // Facebook Username control
        $wp_manager->add_setting( 'is_fb_username', array(
            'default'        => 'shouvikmukherjee',
        ) );
        $wp_manager->add_control( 'is_fb_username', array(
            'label'   => 'Facebook Username',
            'section' => 'contact_options',
            'type'    => 'text',
            'priority' => 3
        ) );

        // Google Plus Username control
        $wp_manager->add_setting( 'is_gp_username', array(
            'default'        => '+ShouvikMukherjee-ishouvik',
        ) );
        $wp_manager->add_control( 'is_gp_username', array(
            'label'   => 'Google Plus Username',
            'section' => 'contact_options',
            'type'    => 'text',
            'priority' => 4
        ) );

        // GitHub Profile control
        $wp_manager->add_setting( 'is_github_profile', array(
            'default'        => 'ishouvik',
        ) );
        $wp_manager->add_control( 'is_github_profile', array(
            'label'   => 'GitHub Profile',
            'section' => 'contact_options',
            'type'    => 'text',
            'priority' => 5
        ) );

        // RSS Link
        $wp_manager->add_setting( 'is_rss_link', array(
            'default'        => '/feed',
        ) );
        $wp_manager->add_control( 'is_rss_link', array(
            'label'   => 'RSS Link',
            'section' => 'contact_options',
            'type'    => 'text',
            'priority' => 6
        ) );

    }

}

?>