<?php
if (!defined('ABSPATH'))
   exit;

include(wpm_6310_plugin_url . 'import-demo-data.php');
?>
<div class="wpm-6310-header">
  <div class="wpm-6310-notifications">
    <!-- Blue -->
    <div class="wpm-6310-notice wpm-6310-info">
      <div class="wpm-6310-icon">
        <span class="dashicons dashicons-info"></span>
      </div>
      <div class="wpm-6310-content">
        <p>
          Thank you for using the free version of <strong>Team Members – Team with Slider</strong>. We hope you're enjoying the plugin! If you have any questions, encounter any issues, or have suggestions for improvement, please don't hesitate to file a <a href="https://wordpress.org/support/plugin/team-showcase-supreme/" target="_blank">bug report</a>. We're always happy to help.
        </p>

        <p>Can't find the feature you need? Send your request to <a href="mailto:sk.hasan6310@gmail.com">sk.hasan6310@gmail.com</a>, and we'll review it. If it's a good fit for the plugin, we'll do our best to add it within 72 hours.</p>
      </div>
    </div>

    <br>
    <button class="wpm-btn-primary import-demo-data">Import Demo Data</button>
    <a href="https://www.youtube.com/watch?v=XQMLA_F_CYs" target="_blank" class="wpm-btn-primary">How to use?</a>
  </div>

  <?php
  wpm_6310_team_showcase_supreme_install();
  ?>
</div>