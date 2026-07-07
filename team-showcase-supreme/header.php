<div class="wpm-6310-header">
  <ul class="wpm-6310-nav">
    <li class="has-dropdown">
      <a class="<?php if (isset($_GET['page']) && ($_GET['page'] == 'team-showcase-supreme' || $_GET['page'] == 'wpm-template-01-10' || $_GET['page'] == 'wpm-template-11-20' || $_GET['page'] == "wpm-template-21-30" || $_GET['page'] == "wpm-template-31-40")) echo "wpm-6310-active" ?>">Short code & Templates</a>
      <ul class="dropdown-menu">
        <li>
          <a href="<?php echo admin_url("admin.php?page=team-showcase-supreme"); ?>" class="<?php if (isset($_GET['page']) && $_GET['page'] == 'team-showcase-supreme') echo "wpm-6310-active" ?>">All ShortCode</a>
        </li>
        <li>
          <a href="<?php echo admin_url("admin.php?page=wpm-template-01-10"); ?>" class="<?php if (isset($_GET['page']) && $_GET['page'] == 'wpm-template-01-10') echo "wpm-6310-active" ?>">Template 01-10</a>
        </li>
        <li>
          <a href="<?php echo admin_url("admin.php?page=wpm-template-11-20"); ?>" class="<?php if (isset($_GET['page']) && $_GET['page'] == 'wpm-template-11-20') echo "wpm-6310-active" ?>">Template 11-20</a>
        </li>
        <li>
          <a href="<?php echo admin_url("admin.php?page=wpm-template-21-30"); ?>" class="<?php if (isset($_GET['page']) && $_GET['page'] == 'wpm-template-21-30') echo "wpm-6310-active" ?>">Template 21-30</a>
        </li>
        <li>
          <a href="<?php echo admin_url("admin.php?page=wpm-template-31-40"); ?>" class="<?php if (isset($_GET['page']) && $_GET['page'] == 'wpm-template-31-40') echo "wpm-6310-active" ?>">Template 31-40</a>
        </li>
      </ul>
    </li>
    <li>
      <a href="<?php echo admin_url("admin.php?page=team-showcase-supreme-team-member"); ?>" class="<?php if (isset($_GET['page']) && $_GET['page'] == 'team-showcase-supreme-team-member') echo "wpm-6310-active" ?>">Manage Members</a>
    </li>
    <li>
      <a href="<?php echo admin_url("admin.php?page=team-showcase-supreme-category"); ?>" class="<?php if (isset($_GET['page']) && $_GET['page'] == 'team-showcase-supreme-category') echo "wpm-6310-active" ?>">Manage Category</a>
    </li>
    <li>
      <a href="<?php echo admin_url("admin.php?page=team-showcase-supreme-license"); ?>" class="<?php if (isset($_GET['page']) && $_GET['page'] == 'team-showcase-supreme-license') echo "wpm-6310-active" ?>">License</a>
    </li>
    <li>
      <a href="<?php echo admin_url("admin.php?page=team-showcase-supreme-settings-help"); ?>" class="<?php if (isset($_GET['page']) && $_GET['page'] == 'team-showcase-supreme-settings-help') echo "wpm-6310-active" ?>">Help</a>
    </li>
    <li>
      <a href="<?php echo admin_url("admin.php?page=wpm-6310-wpmart-plugins"); ?>" class="<?php if (isset($_GET['page']) && $_GET['page'] == 'wpm-6310-wpmart-plugins') echo "wpm-6310-active" ?> wpm-6310-plugin-menu">WpMart Plugins</a>
    </li>
    <li>
      <a href="https://wpmart.org/downloads/team-member/" target="_blank" class="wpm-6310-pro">Upgrade To Pro<i class="fas fa-star"></i></a>
    </li>
  </ul>

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
  </div>

  <?php
  wpm_6310_team_showcase_supreme_install();
  ?>
</div>