(function ($) {
  var api = wp.customize;

  $.each({
    'tc_theme_options[tc_show_featured_pages]': {
      controls: TCControlParams.FPControls,
      callback: function (to) {
        return '1' == to
      }
    },
    'tc_theme_options[tc_front_slider]': {
      controls: [
        'tc_theme_options[tc_slider_width]',
        'tc_theme_options[tc_slider_delay]'
      ],
      callback: function (to) {
        return '0' !== to
      }
    }
  }, function (settingId, o) {
    api(settingId, function (setting) {
      $.each(o.controls, function (i, controlId) {
        api.control(controlId, function (control) {
          var visibility = function (to) {
            control.container.toggle(o.callback(to));
          };
          visibility(setting.get());
          setting.bind(visibility);
        });
      });
    });
  });


})(jQuery);

/*jQuery(document).ready(function () {
    ! function ($) {

      var $FrontDropdown = $('li#customize-control-show_on_front.customize-control select');

      function DisplayPostPageOption() {
        console.log($FrontDropdown.val());
        if ( $FrontDropdown.val() != 'posts' ) {
          $('li#customize-control-page_for_posts.customize-control.customize-control-dropdown-pages').show();
        }
      }
      DisplayPostPageOption()
      $FrontDropdown.on('change', function() {
        DisplayPostPageOption();
      } );

    }(window.jQuery)
});*/