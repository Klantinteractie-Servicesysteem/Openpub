<?php

namespace KISS\OpenPub\Classes;

class OpenPubPluginAdminSettings
{
    public function __construct()
    {
        // The Admin menu Item
        add_action('admin_menu', [$this, 'openpub_options_page']);

        // Initiating the settings page
        add_action('admin_init', [$this, 'wporg_settings_init']);
    }


    /**
     * Lets define the basic settings page
     */
    public function openpub_overview_page_html()
    {
        // check user capabilities
        if (!current_user_can('manage_options')) {
            return;
        }

        ?>
        <div class="wrap">
            <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
            <form action="options.php" method="post">
                Overview
            </form>
        </div>
        <?php
    }

    /**
     * Lets define the basic settings page
     */
    public function openpub_posts_page_html()
    {
        // check user capabilities
        if (!current_user_can('manage_options')) {
            return;
        }

        ?>
        <div class="wrap">
            <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
            <form action="options.php" method="post">
                Posts
            </form>
        </div>
        <?php
    }


    /**
     * Lets define the basic settings page
     */
    public function openpub_catalogi_page_html()
    {
        // check user capabilities
        if (!current_user_can('manage_options')) {
            return;
        }

        ?>
        <div class="wrap">
            <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
            Catalogi
        </div>
        <?php
    }

    /**
     * Lets define the basic settings page
     */
    public function openpub_options_page_html()
    {
        // check user capabilities
        if (!current_user_can('manage_options')) {
            return;
        }

?>
        <div class="wrap">
            <h1><?php echo esc_html(get_admin_page_title()); ?></h1>
            <form action="options.php" method="post">
                <?php
                // output security fields for the registered setting "wporg_options"
                settings_fields('openpub_options');
                // output setting sections and their fields
                // (sections are registered for "wporg", each field is registered to a specific section)
                do_settings_sections('openpub_api');
                // output save settings button
                submit_button(__('Save Settings', 'textdomain'));
                ?>
            </form>
        </div>
    <?php
    }

    /**
     * The settings menu item
     */
    public function openpub_options_page()
    {
        add_menu_page(
            'OpenPub',
            'OpenPub',
            'manage_options',
            'openpub',
            [$this, 'openpub_overview_page_html'],
            '',
            null
        );

        add_submenu_page(
            'openpub',
            'OpenPub | Posts',
            'Posts',
            'manage_options',
            'openpub_posts',
            [$this, 'openpub_posts_page_html']
        );
        add_submenu_page(
            'openpub',
            'OpenPub | Catalogi',
            'Catalogi',
            'manage_options',
            'openpub_catalogi',
            [$this, 'openpub_catalogi_page_html']
        );
        add_submenu_page(
            'openpub',
            'OpenPub | Configuration',
            'Configuration',
            'manage_options',
            'openpub_configuration',
            [$this, 'openpub_options_page_html']
        );
    }

    /**
     * Lets define some settings
     */
    public function wporg_settings_init()
    {
        // register a new setting for "reading" page
        register_setting('openpub_options', 'openpub_api_domain');
        register_setting('openpub_options', 'openpub_api_key');
        register_setting('openpub_options', 'openpub_organization');

        // register a new section in the "reading" page
        add_settings_section(
            'default', // id
            'API  Configuration', // title
            [$this, 'wporg_settings_section_callback'], // callback
            'openpub_api' // page
        );

        // register a new field in the "wporg_settings_section" section, inside the "reading" page
        add_settings_field(
            'openpub_api_domain_field', // id
            'API Domain',  // title
            [$this, 'openpub_api_domain_field_callback'], //callback
            'openpub_api',
            'default'
        );

        // register a new field in the "wporg_settings_section" section, inside the "reading" page
        add_settings_field(
            'openpub_api_key_field',
            'API  KEY',
            [$this, 'openpub_api_key_field_callback'],
            'openpub_api',
            'default'
        );

        // register a new field in the "wporg_settings_section" section, inside the "reading" page
        add_settings_field(
            'openpub_organization_field',
            'Organization',
            [$this, 'openpub_organization_field_callback'],
            'openpub_api',
            'default'
        );
    }

    /**
     * callback functions
     */

    // section content cb
    public function wporg_settings_section_callback()
    {
        echo '<p>In order to use the openpub api you wil need to provide api credentials.</p>';
    }

    // field content cb
    public function openpub_api_domain_field_callback()
    {
        // get the value of the setting we've registered with register_setting()
        $setting = get_option('openpub_api_domain');
        // output the field
    ?>
        <input type="text" name="openpub_api_domain" value="<?php echo isset($setting) ? esc_attr($setting) : ''; ?>">
    <?php
    }

    public function openpub_api_key_field_callback()
    {
        // get the value of the setting we've registered with register_setting()
        $setting = get_option('openpub_api_key');
        // output the field
    ?>
        <input type="text" name="openpub_api_key" value="<?php echo isset($setting) ? esc_attr($setting) : ''; ?>">
    <?php
    }

    public function openpub_organization_field_callback()
    {
        // get the value of the setting we've registered with register_setting()
        $setting = get_option('openpub_organization');
        // output the field
    ?>
        <input type="text" name="openpub_organization" value="<?php echo isset($setting) ? esc_attr($setting) : ''; ?>">
<?php
    }
}
