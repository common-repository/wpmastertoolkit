<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Module Name: Hide Admin Notices
 * Description: Hide admin notices from the admin dashboard
 * @since 1.0.0
 */
class WPMastertoolkit_Hide_Admin_Notices {

    /**
	 * Invoke Wp Hooks
	 *
	 * @since    1.0.0
	 */
    public function __construct() {

        add_action( 'admin_enqueue_scripts', array( $this, 'inline_css') );
        add_action( 'admin_menu', array( $this, 'add_submenu' ), 999 );
    }

    /**
     * Add css to hide the admin notices
     * 
     * @since   1.0.0
     */
    public function inline_css( $hook_suffix ) {

        if ( $hook_suffix === 'wp-mastertoolkit_page_wp-mastertoolkit-settings-admin-notices' ) {
            return;
        }

        ?>
            <style type="text/css">
                #wpbody-content .notice:not(.system-notice),
                #wpbody-content .notice-error,
                #wpbody-content .error,
                #wpbody-content .notice-info,
                #wpbody-content .notice-information,
                #wpbody-content #message,
                #wpbody-content .notice-warning,
                #wpbody-content .notice-success,
                #wpbody-content .notice-updated,
                #wpbody-content .updated,
                #wpbody-content .update-nag,						
                #wpbody-content > .wrap > .notice:not(.system-notice),
                #wpbody-content > .wrap > .notice-error,
                #wpbody-content > .wrap > .error,
                #wpbody-content > .wrap > .notice-info,
                #wpbody-content > .wrap > .notice-information,
                #wpbody-content > .wrap > #message,
                #wpbody-content > .wrap > .notice-warning,
                #wpbody-content > .wrap > .notice-success,
                #wpbody-content > .wrap > .notice-updated,
                #wpbody-content > .wrap > .updated,
                #wpbody-content > .wrap > .update-nag,
                #wpbody-content > .wrap > div > .notice:not(.system-notice),
                #wpbody-content > .wrap > div > .notice-error,
                #wpbody-content > .wrap > div > .error,
                #wpbody-content > .wrap > div > .notice-info,
                #wpbody-content > .wrap > div > .notice-information,
                #wpbody-content > .wrap > div > #message,
                #wpbody-content > .wrap > div > .notice-warning,
                #wpbody-content > .wrap > div > .notice-success,
                #wpbody-content > .wrap > div > .notice-updated,
                #wpbody-content > .wrap > div > .updated,
                #wpbody-content > .wrap > div > .update-nag,
                #wpbody-content > div > .wrap > .notice:not(.system-notice),
                #wpbody-content > div > .wrap > .notice-error,
                #wpbody-content > div > .wrap > .error,
                #wpbody-content > div > .wrap > .notice-info,
                #wpbody-content > div > .wrap > .notice-information,
                #wpbody-content > div > .wrap > #message,
                #wpbody-content > div > .wrap > .notice-warning,
                #wpbody-content > div > .wrap > .notice-success,
                #wpbody-content > div > .wrap > .notice-updated,
                #wpbody-content > div > .wrap > .updated,
                #wpbody-content > div > .wrap > .update-nag,
                #wpbody-content > .update-nag,
                #wpbody-content > .notice,
                #wpbody-content > .jp-connection-banner,
                #wpbody-content > .jitm-banner,
                #wpbody-content > .jetpack-jitm-message,
                #wpbody-content > .ngg_admin_notice,
                #wpbody-content > .imagify-welcome,
                #wpbody-content #wordfenceAutoUpdateChoice,
                #wpbody-content #easy-updates-manager-dashnotice {
                    display: none !important;
                }
            </style>
		<?php 
    }

    /**
     * Add a submenu
     * 
     * @since   1.0.0
     */
    public function add_submenu(){

        add_submenu_page(
            'wp-mastertoolkit-settings',
            esc_html__('Admin Notices', 'wpmastertoolkit'),
            esc_html__('Admin Notices', 'wpmastertoolkit'),
            'manage_options',
            'wp-mastertoolkit-settings-admin-notices', 
            array( $this, 'render_submenu'),
            null
        );
    }

    /**
     * Render the admin notices
     * 
     * @since   1.0.0
     */
    public function render_submenu() {

        ?>
            <div class="wrap">
                <h1 class="wp-heading-inline"><?php esc_html_e( 'Admin Notices', 'wpmastertoolkit' ); ?></h1>
            </div>
        <?php
    }

}