<?php

if (!defined('ABSPATH')) {
	exit;
}

/** 
 * Simple SCSS compiler admin class
 */
class sSCSScAdmin {

    function __construct() {
        // Load admin menu
        add_action('admin_menu', array($this, 'sscssc_menu'));

        // Load styles and scripts
        add_action('admin_enqueue_scripts', array($this, 'sscssc_scripts'));

        // Add actions to plugin list
        add_filter('plugin_action_links', array($this, 'sscssc_action_links'), 10, 2);
    }

    /*
     * Create admin menu
     */
    public function sscssc_menu() {
        $page_title = __('Simple SCSS Compiler', 'simple-scss-compiler');
        $menu_title = __('Simple SCSS Compiler', 'simple-scss-compiler');
        $capability = 'manage_options';
        $menu_slug = 'sscssc-settings';
        $function = array($this, 'sscssc_settings_page');

        add_options_page($page_title, $menu_title, $capability, $menu_slug, $function);
    }

    /*
     * Create admin page for settings
     */
    public function sscssc_settings_page() {
    ?>
        <div class="wrap">

            <h1><?php echo __('Simple SCSS Compiler settings', 'simple-scss-compiler') ?></h1>

            <p><?php echo __('Use full path of files relative to your WordPress document root e.g.: /wp-content/themes/theme/styles.scss', 'simple-scss-compiler') ?></p>

            <?php
            if (array_key_exists('sscssc-files-to-compile', $_POST)) {
                if (current_user_can('administrator')) {
                    if (json_encode(sanitize_text_field($_POST['sscssc-files-to-compile']))) {
                        update_option('sscssc-files-to-compile', sanitize_text_field($_POST['sscssc-files-to-compile']));
                    }
                }
            }
            ?>

            <div id="sscss-files-field">
                <script>
                    const SscssCSettingsObject = {
                        removeFileGroupText     :   "<?php echo __('- Remove file group', 'simple-scss-compiler') ?>",
                        addInputFileText        :   "<?php echo __('+ Add input file', 'simple-scss-compiler') ?>"
                    }
                </script>
                <table>
                    <thead>
                        <tr>
                            <td></td>
                            <td><?php echo __('Input files', 'simple-scss-compiler') ?></td>
                            <td><?php echo __('Output file', 'simple-scss-compiler') ?></td>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
                <h3 id="sscss-add-file-group"><?php echo __('+ Add file group', 'simple-scss-compiler') ?></h3>
            </div>

            <form id="sscss-files-form" method="post">
                <input id="sscssc-files-to-compile" name="sscssc-files-to-compile" type="hidden" value='<?php echo esc_js(get_option('sscssc-files-to-compile')) ?>'>
                <input type="submit" name="submitButton" id="submit-button" class="button button-primary" value="<?php echo __('Save settings', 'simple-scss-compiler') ?>">
            </form>

        </div>
    <?php
    }

    /**
     * Load styles and scripts for admin
     */
    public function sscssc_scripts() {
        wp_enqueue_style('sscssc-styles', sSCSScURL . 'assets/sscssc-styles.css');
        wp_enqueue_script('sscssc-scripts', sSCSScURL . 'assets/sscssc-scripts.js', array('jquery'), '', true);
    }

    /**
     * Add links to the plugin's row on the plugins page
     */
    public function sscssc_action_links($links_array, $plugin_file_name) {
        if (strpos($plugin_file_name, sSCSScMainFileName)) {
            array_unshift($links_array, '<a href="'.admin_url('options-general.php?page=sscssc-settings').'">'.__('Settings', 'simple-scss-compiler').'</a>');
        }
        
        return $links_array;
    }
}

?>
