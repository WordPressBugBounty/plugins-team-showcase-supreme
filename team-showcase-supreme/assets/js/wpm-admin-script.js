jQuery.fn.extend({
  live: function (event, callback) {
    if (this.selector) {
      jQuery(document).on(event, this.selector, callback);
    }
    return this;
  },
});

jQuery.fn.extend({
  size: function (event, callback) {
    if (this.selector) {
      jQuery(document).on(event, this.selector, callback);
    }
    return this;
  },
});

jQuery(document).ready(function () {
  var code = jQuery(".codemirror-textarea")[0];
  var editor = CodeMirror.fromTextArea(code, {
    mode: "text/html",
    tabMode: "indent",
    autoCloseTags: true,
    lineNumbers: true,
    fixedGutter: true,
    lineWrapping: true,
    autoCloseBrackets: true,
  });

  jQuery(
    "#tab-2, #tab-3, #tab-4, #tab-5, #tab-6, #tab-7, #tab-8, #tab-9, #tab-10, #tab-11, #tab-12, #tab-13, #tab-14, #tab-15"
  ).hide();
  jQuery("body").on("click", ".wpm-mytab", function () {
    jQuery(".wpm-mytab").removeClass("active");
    jQuery(this).addClass("active");
    var ids = jQuery(this).attr("id");
    ids = parseInt(ids.substring(3));
    jQuery(
      "#tab-1, #tab-2, #tab-3, #tab-4, #tab-5, #tab-6, #tab-7, #tab-8, #tab-9, #tab-10, #tab-11, #tab-12, #tab-13, #tab-14, #tab-15"
    ).hide();
    jQuery("#tab-" + ids).show();
    jQuery("#tab6").click(function (event) {
      jQuery(".codemirror-textarea").focus();
    });
    return false;
  });

  if(jQuery('.wpm-6310-row').children().length === 0){
    jQuery('.wpm_6310_tabs_panel_preview').html('<div class="wpm_6310_add_media_body wpm_6310_add_new_media wpm_6310_add_new_media_member_only">You didn\'t add any members to this team section. Click here to add a new member.</div><div class="wpm-6310-video-references"><a href="https://drive.google.com/file/d/1fS4rdRI7QUhNnRB2HYcP1wIsoLi3rz-B/view?usp=sharing" target="_blank">For reference, please check this video.</a></div>');
  } else{
    jQuery('.wpm_6310_add_new_media_member_only, .wpm-6310-video-references').remove();
  }
});
