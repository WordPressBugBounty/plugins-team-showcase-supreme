<?php
if (!defined('ABSPATH')) {
  exit;
}

?>
<div class="wpm-6310">
  <h1>Product License Activation</h1>
  <p>Activate your copy to get direct plugin updates and official support.</p>
  <?php
  if (!empty($_POST['save'])) {
      wpm_6310_validate_request('wpm_nonce_field_license');
      wpm_6310_check_license(sanitize_text_field($_POST['license']));
  }
  ?>
  <form action="" method="post" style="width: 600px">
    <?php
    echo wp_nonce_field("wpm_nonce_field_license");
    ?>
    <table>
      <tr>
        <td>License Key:</td>
        <td>
          <input type="text" name="license" class="wpm-form-input">
        </td>
      </tr>
      <tr>
        <td></td>
        <td>
          <br />
          <input type="submit" name="save" class="wpm-btn-primary">
        </td>
      </tr>
    </table>
  </form>
</div>