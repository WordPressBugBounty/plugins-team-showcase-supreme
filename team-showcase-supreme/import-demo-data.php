<?php
if (!empty($_POST['submit']) && $_POST['submit'] == 'Import >>') {
  wpm_6310_validate_request('wpm_nonce_field_import_demo_data');

  $name = 'Demo Team Members';
  $style_name = 'template-01';

  $defaultData = wpm_6310_default_value($style_name);
  $css = $defaultData['css'];
  $slider = $defaultData['slider'];   
  
  $members = $wpdb->get_results('SELECT * FROM ' . $member_table . ' ORDER BY name ASC', ARRAY_A);
  $membersId = "";
  foreach ($members as $member) {
    if ($membersId) {
        $membersId .= ",";
    }
    $membersId .= $member['id'];
  }
  
  
  $wpdb->query($wpdb->prepare("INSERT INTO {$style_table} (name, style_name, css, slider, memberid) VALUES ( %s, %s, %s, %s, %s )", array($name, $style_name, $css, $slider,  $membersId)));
  $redirect_id = $wpdb->insert_id;

  if ($redirect_id == 0) {
      $url = admin_url("admin.php?page=team-showcase-supreme");
  } else if ($redirect_id != 0) {
      $url = admin_url("admin.php?page=wpm-template-01-10&styleid=$redirect_id");
  }
  echo '<script type="text/javascript"> document.location.href = "' . $url . '"; </script>';
  exit;
}

?>

<div id="wpm-6310-modal-demo-data" class="wpm-6310-modal" >
  <div class="wpm-6310-modal-content wpm-6310-modal-sm wpm-6310-modal-sm-l">
    <form action="" method="post">
      <div class="wpm-6310-modal-header">
        Import Demo Data
        <div class="wpm-6310-close">&times;</div>
      </div>
      <div class="wpm-6310-modal-body-form">
        <?php wp_nonce_field("wpm_nonce_field_import_demo_data") ?>
        <p>Import demo data to quickly set up WPM Team with sample members, templates, styles, and settings. Simply copy the shortcode into a page to view the demo.</p> 
        <p>You can customize the imported content anytime to match your website.</p>
      </div>
      <div class="wpm-6310-modal-form-footer">
        <button type="button" name="close" class="wpm-btn-danger wpm-pull-right">Cancel</button>
        <input type="submit" name="submit" class="wpm-btn-primary wpm-pull-right wpm-margin-right-10" value="Import >>" />
      </div>
    </form>
    <br class="wpm-6310-clear" />
  </div>
</div>



<script>
  jQuery(document).ready(function() {
    const params = new URLSearchParams(window.location.search);

    if (params.has('demo-data')) {
      const url = new URL(window.location.href);
      url.searchParams.delete('demo-data');
      window.history.replaceState({}, '', url);
      wpm_6310_open_modal();
    }

    jQuery('body').on('click', '.import-demo-data', function() {
      wpm_6310_open_modal();
    });

    jQuery("body").on("click", ".wpm-6310-close, .wpm-btn-danger", function() {
      jQuery("#wpm-6310-modal-demo-data").fadeOut(500);
      jQuery("body").css({
        "overflow": "initial"
      });
    });
  });

  function wpm_6310_open_modal() {
    jQuery("#wpm-6310-modal-demo-data").fadeIn(500);
    jQuery("body").css({
      "overflow": "hidden"
    });
    return false;
  }
</script>