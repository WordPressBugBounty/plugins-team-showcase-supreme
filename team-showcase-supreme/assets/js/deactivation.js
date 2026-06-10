jQuery(document).ready(function () {
  let deactivateUrl = "";

  jQuery('#deactivate-team-showcase-supreme').on(
    "click",
    function (e) {
      e.preventDefault();

      deactivateUrl = jQuery(this).attr("href");

      jQuery("#wpm-6310-myplugin-modal").fadeIn();
    }
  );

  jQuery("#wpm-6310-myplugin-skip").on("click", function () {
    window.location.href = deactivateUrl;
  });

  jQuery("#wpm-6310-myplugin-feedback-form").on(
    "submit",
    function (e) {
      e.preventDefault();

      jQuery.ajax({
        url: myPluginData.ajax_url,
        type: "POST",
        data: {
          action: "wpm_6310_myplugin_send_feedback",
          reason:
            jQuery('input[name="reason"]:checked').val() || "",
          details:
            jQuery('textarea[name="details"]').val() || "",
        },
        complete: function () {
          window.location.href = deactivateUrl;
        },
      });
    }
  );
});