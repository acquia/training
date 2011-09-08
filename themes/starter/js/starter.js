/*jslint bitwise: true, eqeqeq: true, immed: true, newcap: true, nomen: false,
 onevar: false, plusplus: false, regexp: true, undef: true, white: true, indent: 2
 browser: true */

/*global jQuery: true Drupal: true window: true */

(function ($) {
  /**
   * custom object is created if it doesn't exist.
   */
  Drupal.behaviors.custom = Drupal.behaviors.custom || {};
  
  /**
  * Attach handler.
  */
  Drupal.behaviors.custom = {
    attach: function (context, settings) {
      Drupal.behaviors.custom.exampleFunction(context, settings);
    }
  };
  
  /**
   */
  Drupal.behaviors.custom.exampleFunction = function (context, settings) {};
})(jQuery);