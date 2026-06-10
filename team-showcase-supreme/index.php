<?php

/*
  Plugin Name: Team Members – Multi Language Supported Team Plugin
  Plugin URI: https://wordpress.org/plugins/team-showcase-supreme
  Description: Team Members is a powerful &amp; robust but easy to represent your team/staff members and their profiles with animated &amp; beautiful styled descriptions, skills &amp; links to social media.
  Author: Sk. Abul Hasan
  Author URI: http://www.wpmart.org/
  Text Domain: team-showcase-supreme
  Domain Path: /languages
  Version: 8.7
 */
if (!defined('ABSPATH'))
   exit;

define('wpm_6310_plugin_url', plugin_dir_path(__FILE__));
define('wpm_6310_plugin_dir_url', plugin_dir_url(__FILE__));
define('WPM_PLUGIN_CURRENT_VERSION', 8.7);
define('WPM_6310_PLUGIN_LANGUAGE_PATH', dirname(plugin_basename(__FILE__)) . '/languages');

add_shortcode('wpm_team_showcase', 'wpm_team_showcase_supreme_shortcode');

function wpm_team_showcase_supreme_shortcode($atts)
{
   extract(shortcode_atts(array('id' => ' ',), $atts));
   $ids = (int) $atts['id'];

   ob_start();
   include(wpm_6310_plugin_url . 'shortcode.php');
   return ob_get_clean();
}

add_action('admin_menu', 'team_showcase_supreme_menu');

function team_showcase_supreme_menu()
{
   $options = wpm_6310_get_user_roles();
   add_menu_page('WPM Team', 'WPM Team', $options, 'team-showcase-supreme', 'wpm_6310_home');
   add_submenu_page('team-showcase-supreme', 'WPM Team Showcase', 'All Team', $options, 'team-showcase-supreme', 'wpm_6310_home');
   add_submenu_page('team-showcase-supreme', 'Template 01-10', 'Template 01-10', $options, 'wpm-template-01-10', 'wpm_template_01_10');
   add_submenu_page('team-showcase-supreme', 'Template 11-20', 'Template 11-20', $options, 'wpm-template-11-20', 'wpm_template_11_20');
   add_submenu_page('team-showcase-supreme', 'Template 21-30', 'Template 21-30', $options, 'wpm-template-21-30', 'wpm_template_21_30');
   add_submenu_page('team-showcase-supreme', 'Template 31-40', 'Template 31-40', $options, 'wpm-template-31-40', 'wpm_template_31_40');
   add_submenu_page('team-showcase-supreme', 'Template 41-50', 'Template 41-50', $options, 'wpm-template-41-50', 'wpm_template_41_50');
   add_submenu_page('team-showcase-supreme', 'Manage Members', 'Manage Members', $options, 'team-showcase-supreme-team-member', 'wpm_team_6310_team_member');
   add_submenu_page('team-showcase-supreme', 'Manage Category', 'Manage Category', 'manage_options', 'team-showcase-supreme-category', 'wpm_team_6310_category');
   add_submenu_page('team-showcase-supreme', 'Manage Details Template', 'Manage Details Template', 'manage_options', 'team-showcase-supreme-details-template', 'wpm_team_6310_details_template');
   add_submenu_page('team-showcase-supreme', 'Manage Social Icons', 'Manage Social Icons', $options, 'team-showcase-supreme-social-icon', 'wpm_team_6310_icon');
   add_submenu_page('team-showcase-supreme', 'License', 'License', 'manage_options', 'team-showcase-supreme-license', 'wpm_team_6310_lincense');
   add_submenu_page('team-showcase-supreme', 'Settings', 'Settings', 'manage_options', 'team-showcase-supreme-settings', 'wpm_team_6310_settings');
   add_submenu_page('team-showcase-supreme', 'Import / Export Plugin', 'Import/Export Plugin', 'manage_options', 'team-showcase-supreme-import-export', 'wpm_team_6310_import_export');
   add_submenu_page('team-showcase-supreme', 'Help', 'Help', $options, 'team-showcase-supreme-settings-help', 'wpm_team_6310_help');
   add_submenu_page('team-showcase-supreme', 'WpMart Plugins', 'WpMart Plugins', $options, 'wpm-6310-wpmart-plugins', 'wpm_6310_wpmart_plugins');
}

function wpm_6310_home()
{
   global $wpdb;
   wp_enqueue_style('wpm-6310-font-awesome-new', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css');
   wp_enqueue_style('wpm-6310-font-awesome-old', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/v4-shims.min.css');
   wp_enqueue_style('wpm-6310-style', plugins_url('assets/css/style.css', __FILE__));

   $style_table = $wpdb->prefix . 'wpm_6310_style';
   include wpm_6310_plugin_url . 'header.php';
   include wpm_6310_plugin_url . 'home.php';
   wpm_6310_multi_language_set_all_data();
}

include wpm_6310_plugin_url . 'template-menu.php';

register_activation_hook(__FILE__, 'wpm_6310_team_showcase_supreme_install');
add_action('wp_ajax_wpm_6310_team_member_info222', 'wpm_6310_team_member_info222');

function wpm_6310_team_member_info222()
{
   wp_die();
}

add_action('wp_ajax_wpm_6310_team_member_info', 'wpm_6310_team_member_info');

function wpm_6310_my_enqueue()
{
   wp_enqueue_script('wpm-6310-ajax-script', plugins_url('assets/js/ajaxdata.js', __FILE__));
   wp_localize_script('wpm-6310-ajax-script', 'my_ajax_object', array('ajax_url' => admin_url('admin-ajax.php')));
}

add_action('wp_enqueue_scripts', 'wpm_6310_my_enqueue');

if (is_admin()) {
   add_action('wp_ajax_wpm_6310_team_member_details', 'wpm_6310_team_member_details');
} else {
   add_action('wp_ajax_nopriv_wpm_6310_team_member_details', 'wpm_6310_team_member_details');
}

add_action('wp_ajax_nopriv_wpm_6310_team_member_details', 'wpm_6310_team_member_details');
include_once(wpm_6310_plugin_url . 'settings/helper/functions.php');

function wpm_6310_activation_redirect($plugin)
{
   if ($plugin == plugin_basename(__FILE__)) {
      exit(wp_redirect(admin_url('admin.php?page=wpm-template-01-10')));
   }
}
add_action('activated_plugin', 'wpm_6310_activation_redirect');


function wpm_6310_plugin_update_check()
{
   wpm_6310_version_status();
   wpm_6310_check_field_exists();
}
add_action('plugins_loaded', 'wpm_6310_plugin_update_check');



function register_custom_post_type()
{
   $args = array(
      'label'                 => __('WPM Team', 'text_domain'),
      'description'           => __('WPM Team Description', 'text_domain'),
      'labels'                => array(
         'name'                  => _x('WPM Team', 'Post Type General Name', 'text_domain'),
         'singular_name'         => _x('WPM Team Member', 'Post Type Singular Name', 'text_domain'),
      ),
      'supports'              => array('title', 'editor', 'thumbnail', 'excerpt', 'custom-fields', 'comments'),
      'public'                => true,
      'show_ui'               => true,
      'show_in_menu'          => false,
      'menu_position'         => 5,
      'show_in_admin_bar'     => true,
      'show_in_nav_menus'     => true,
      'can_export'            => true,
      'has_archive'           => true,
      'exclude_from_search'   => false,
      'publicly_queryable'    => true,
      'capability_type'       => 'post',
      'rewrite'               => array('slug' => 'wpm-team'),
   );
   register_post_type('wpm_team', $args);
   flush_rewrite_rules();
}
add_action('init', 'register_custom_post_type', 10);



function custom_post_template($template)
{
   global $post, $wpdb;
   if (isset($post) && $post->post_type == 'wpm_team') {
      $member_table = $wpdb->prefix . 'wpm_6310_member';
      $members = $wpdb->get_row("SELECT * FROM $member_table WHERE post_id='{$post->ID}'", ARRAY_A);
      // Load custom template file from your plugin directory
      $template = plugin_dir_path(__FILE__) . "templates/custom-wpm-team-template-{$members['template_id']}.php";
   }
   return $template;
}
add_filter('template_include', 'custom_post_template');


//Deactivate code start from here
add_action('admin_enqueue_scripts', 'wpm_6310_myplugin_enqueue_assets');

function wpm_6310_myplugin_enqueue_assets($hook)
{
   if ($hook !== 'plugins.php') {
      return;
   }

   wp_enqueue_script(
      'wpm-6310-myplugin-deactivation',
      wpm_6310_plugin_dir_url . 'assets/js/deactivation.js',
      ['jquery'],
      WPM_PLUGIN_CURRENT_VERSION,
      true
   );

   wp_localize_script(
      'wpm-6310-myplugin-deactivation',
      'myPluginData',
      [
         'ajax_url' => admin_url('admin-ajax.php'),
         'plugin_slug' => plugin_basename(__FILE__)
      ]
   );

   wp_enqueue_style(
      'wpm-6310-myplugin-deactivation-css',
      wpm_6310_plugin_dir_url . 'assets/css/deactivation.css',
      [],
      WPM_PLUGIN_CURRENT_VERSION
   );
}

add_action('admin_footer', 'wpm_6310_myplugin_deactivation_modal');

function wpm_6310_myplugin_deactivation_modal()
{
   $screen = get_current_screen();

   if (!$screen || $screen->id !== 'plugins') {
      return;
   }

?>
   <div id="wpm-6310-myplugin-modal" style="display:none;">

      <div class="wpm-6310-myplugin-overlay"></div>

      <div class="wpm-6310-myplugin-popup">

         <h2>Quick Feedback</h2>

         <p>Why are you deactivating this plugin?</p>

         <form id="wpm-6310-myplugin-feedback-form">

            <label>
               <input type="radio" name="reason" value="Found a better plugin">
               Found a better plugin
            </label>

            <label>
               <input type="radio" name="reason" value="Missing feature">
               Missing feature
            </label>

            <label>
               <input type="radio" name="reason" value="Plugin issue">
               Plugin issue
            </label>

            <label>
               <input type="radio" name="reason" value="Temporary">
               Temporary deactivation
            </label>

            <label>
               <input type="radio" name="reason" value="Other">
               Other
            </label>

            <textarea
               name="details"
               rows="4"
               placeholder="Additional feedback..."></textarea>

            <div class="wpm-6310-myplugin-actions">

               <button
                  type="submit"
                  class="button button-primary">
                  Submit & Deactivate
               </button>

               <button
                  type="button"
                  class="button"
                  id="wpm-6310-myplugin-skip">
                  Skip & Deactivate
               </button>

            </div>

         </form>

      </div>

   </div>
<?php
}

add_action('wp_ajax_wpm_6310_myplugin_send_feedback', 'wpm_6310_myplugin_send_feedback');

function wpm_6310_myplugin_send_feedback()
{
   $reason = sanitize_text_field($_POST['reason'] ?? '');
   $details = sanitize_textarea_field($_POST['details'] ?? '');

   $response = wp_remote_post(
      'https://demo.tcsesoft.com/plugin-feedback.php',
      [
         'timeout' => 15,
         'headers' => [
            'Content-Type' => 'application/json',
            'X-API-KEY' => '7fK9xP2mQ8vN4rT6yH1jW5cL3zB0dS'
         ],
         'body' => wp_json_encode([
            'reason'         => $reason,
            'details'        => $details,
            'plugin_version' => WPM_PLUGIN_CURRENT_VERSION,
            'site_url'       => home_url(),
            'wp_version'     => get_bloginfo('version'),
            'plugin_name'    => 'team'
         ])
      ]
   );

   if (is_wp_error($response)) {
      wp_send_json_error();
   }

   wp_send_json_success();
}
