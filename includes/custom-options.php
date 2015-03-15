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


        // Site Intro Control
        $wp_manager->add_setting( 'is_site_intro', array(
            'default'        => 'yes',
        ) );

        $wp_manager->add_control( 'is_site_intro', array(
            'label'      => 'Site Intro',
            'section'    => 'site_descriptions',
            'settings'   => 'is_site_intro',
            'type'       => 'select',
            'choices'   =>  array(
                    'yes' => 'Yes',
                    'no' => 'No'
            ),
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

        $wp_manager->add_setting( 'is_email_address_display', array(
            'default'        => 'yes',
        ) );

        $wp_manager->add_control( 'is_email_address_display', array(
            'label'      => 'Show email address?',
            'section'    => 'contact_options',
            'settings'   => 'is_email_address_display',
            'type'       => 'select',
            'choices'   =>  array(
                    'yes' => 'Yes',
                    'no' => 'No'
            ),
            'priority' => 2
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
            'priority' => 3
        ) );

        $wp_manager->add_setting( 'is_tw_handler_display', array(
            'default'        => 'yes',
        ) );

        $wp_manager->add_control( 'is_tw_handler_display', array(
            'label'      => 'Display?',
            'section'    => 'contact_options',
            'settings'   => 'is_tw_handler_display',
            'type'       => 'select',
            'choices'   =>  array(
                    'yes' => 'Yes',
                    'no' => 'No'
            ),
            'priority' => 4
        ) );

        // Facebook Username control
        $wp_manager->add_setting( 'is_fb_username', array(
            'default'        => 'shouvikmukherjee',
        ) );
        $wp_manager->add_control( 'is_fb_username', array(
            'label'   => 'Facebook Username',
            'section' => 'contact_options',
            'type'    => 'text',
            'priority' => 5
        ) );

        $wp_manager->add_setting( 'is_fb_username_display', array(
            'default'        => 'yes',
        ) );

        $wp_manager->add_control( 'is_fb_username_display', array(
            'label'      => 'Display?',
            'section'    => 'contact_options',
            'settings'   => 'is_fb_username_display',
            'type'       => 'select',
            'choices'   =>  array(
                    'yes' => 'Yes',
                    'no' => 'No'
            ),
            'priority' => 6
        ) );

        // Google Plus Username control
        $wp_manager->add_setting( 'is_gp_username', array(
            'default'        => '+ShouvikMukherjee-ishouvik',
        ) );
        $wp_manager->add_control( 'is_gp_username', array(
            'label'   => 'Google Plus Username',
            'section' => 'contact_options',
            'type'    => 'text',
            'priority' => 7
        ) );

        $wp_manager->add_setting( 'is_gp_username_display', array(
            'default'        => 'yes',
        ) );

        $wp_manager->add_control( 'is_gp_username_display', array(
            'label'      => 'Display?',
            'section'    => 'contact_options',
            'settings'   => 'is_gp_username_display',
            'type'       => 'select',
            'choices'   =>  array(
                    'yes' => 'Yes',
                    'no' => 'No'
            ),
            'priority' => 8
        ) );

        // GitHub Profile control
        $wp_manager->add_setting( 'is_github_profile', array(
            'default'        => 'ishouvik',
        ) );
        $wp_manager->add_control( 'is_github_profile', array(
            'label'   => 'GitHub Profile',
            'section' => 'contact_options',
            'type'    => 'text',
            'priority' => 9
        ) );

        $wp_manager->add_setting( 'is_github_profile_display', array(
            'default'        => 'yes',
        ) );

        $wp_manager->add_control( 'is_github_profile_display', array(
            'label'      => 'Display?',
            'section'    => 'contact_options',
            'settings'   => 'is_github_profile_display',
            'type'       => 'select',
            'choices'   =>  array(
                    'yes' => 'Yes',
                    'no' => 'No'
            ),
            'priority' => 10
        ) );

        // RSS Link
        $wp_manager->add_setting( 'is_rss_link', array(
            'default'        => '/feed',
        ) );
        $wp_manager->add_control( 'is_rss_link', array(
            'label'   => 'RSS Link',
            'section' => 'contact_options',
            'type'    => 'text',
            'priority' => 11
        ) );

        $wp_manager->add_setting( 'is_rss_link_display', array(
            'default'        => 'yes',
        ) );

        $wp_manager->add_control( 'is_rss_link_display', array(
            'label'      => 'Display?',
            'section'    => 'contact_options',
            'settings'   => 'is_rss_link_display',
            'type'       => 'select',
            'choices'   =>  array(
                    'yes' => 'Yes',
                    'no' => 'No'
            ),
            'priority' => 12
        ) );

    }

}

?>