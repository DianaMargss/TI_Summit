'use strict';

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

var HurrytimerAction =
/*#__PURE__*/
function () {
  function HurrytimerAction(elementRef) {
    _classCallCheck(this, HurrytimerAction);

    this.elementRef = elementRef;
  }
  /**
   * Hide campaign.
   */


  _createClass(HurrytimerAction, [{
    key: "hide",
    value: function hide() {
      // We don't hide campaign if there is a message to display.
      if (this.elementRef.find('.hurrytimer-campaign-message').length) {
        return;
      }

      var stickyBar = this.elementRef.closest('.hurrytimer-sticky');

      if (stickyBar.length) {
        stickyBar.remove();
      } else {
        this.elementRef.remove();
      }
    }
    /**
     * Redirect to the given url.
     * @param url
     */

  }, {
    key: "displayMessage",

    /**
     * Display message by replacing campaign content with the given message.
     * @param message
     */
    value: function displayMessage(message) {
      var html = "<div class=\"hurrytimer-campaign-message\">".concat(message, "</div>");
      this.elementRef.html(html);
    }
  }], [{
    key: "redirect",
    value: function redirect(url) {
      window.location.href = url;
    }
    /**
     * Hide "Add to cart" button.
     * @return void
     */

  }, {
    key: "hideAddToCartButton",
    value: function hideAddToCartButton() {
      var button = document.querySelector('.single_add_to_cart_button');

      if (button) {
        button.remove();
      }
    }
  }]);

  return HurrytimerAction;
}();
"use strict";

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

var HurrytimerCampaign =
/*#__PURE__*/
function () {
  function HurrytimerCampaign(elementRef, config) {
    _classCallCheck(this, HurrytimerCampaign);

    this.config = config;
    this.elementRef = elementRef;
    this.actionsOptions = hurrytimer_ajax_object.actionsOptions;
    this.restartOptions = hurrytimer_ajax_object.restartOptions;
  }
  /**
   * @param endDateInMS
   * @return void
   */


  _createClass(HurrytimerCampaign, [{
    key: "setCookie",
    value: function setCookie(endDateInMS) {
      Cookies.set(this.config.cookieName, endDateInMS, {
        expires: 365
      });
    }
    /**
     * Returns end date for the given duration.
     * @return {Date}
     */

  }, {
    key: "getEndDate",
    value: function getEndDate() {
      if (this.config.isRegular) {
        return new Date(this.config.endDate);
      }

      var date = new Date(this.config.endDate);

      if (!this.config.endDate || this.allowReset() || this.allowRestart()) {
        date = this.calculateDate();
      } // Set or refresh cookie expiry date.


      this.setCookie(date.getTime());
      return date;
    }
    /**
     * Returns true if the campaign should reset.
     *
     * @return {number}
     */

  }, {
    key: "allowReset",
    value: function allowReset() {
      return this.config.reset;
    }
    /**
     * Returns true if the campaign will restart.
     * @return {boolean}
     */

  }, {
    key: "allowRestart",
    value: function allowRestart() {
      if (this.config.isRegular) return false;
      return this.isExpired() && (this.allowRestartImmediately() || this.allowRestartAfterReload());
    }
    /**
     * Campaign expired.
     */

  }, {
    key: "isExpired",
    value: function isExpired() {
      var today = new Date();
      return this.config.endDate < today;
    }
  }, {
    key: "allowRestartAfterReload",
    value: function allowRestartAfterReload() {
      return this.config.restart == this.restartOptions.afterReload;
    }
  }, {
    key: "allowRestartImmediately",
    value: function allowRestartImmediately() {
      return this.config.restart == this.restartOptions.immediately;
    }
    /**
     * Returns true if the campaign has an action.
     */

  }, {
    key: "hasAction",
    value: function hasAction() {
      return this.config.actions.length;
    }
    /**
     * Calculate date based on the given duration.
     * @return {Date}
     */

  }, {
    key: "calculateDate",
    value: function calculateDate() {
      var date = new Date();
      date.setSeconds(date.getSeconds() + this.config.duration);
      return date;
    }
    /**
     * Run registered actions.
     */

  }, {
    key: "executeActions",
    value: function executeActions() {
      // No action, abort.
      if (this.hasAction()) {
        var _iteratorNormalCompletion = true;
        var _didIteratorError = false;
        var _iteratorError = undefined;

        try {
          for (var _iterator = this.config.actions[Symbol.iterator](), _step; !(_iteratorNormalCompletion = (_step = _iterator.next()).done); _iteratorNormalCompletion = true) {
            var action = _step.value;
            var actionManager = new HurrytimerAction(this.elementRef);

            switch (action['id']) {
              case this.actionsOptions.redirect:
                HurrytimerAction.redirect(action['redirectUrl']);
                break;

              case this.actionsOptions.hideAddToCartButton:
                HurrytimerAction.hideAddToCartButton();
                break;

              case this.actionsOptions.displayMessage:
                actionManager.displayMessage(action['message']);
                break;

              case this.actionsOptions.hide:
                actionManager.hide();
                break;
            }
          }
        } catch (err) {
          _didIteratorError = true;
          _iteratorError = err;
        } finally {
          try {
            if (!_iteratorNormalCompletion && _iterator.return != null) {
              _iterator.return();
            }
          } finally {
            if (_didIteratorError) {
              throw _iteratorError;
            }
          }
        }
      }
    }
  }, {
    key: "maybeShowCampaign",
    value: function maybeShowCampaign() {
      if (this.elementRef.length) {
        this.elementRef.removeClass('hurryt-loading');
      }

      var stickyBar = this.elementRef.closest('.hurrytimer-sticky');

      if (stickyBar.length) {
        stickyBar.removeClass('hurryt-loading');
      }
    }
    /**
     * Maybe run countdown timer.
     */

  }, {
    key: "run",
    value: function run() {
      var _this = this;

      this.elementRef.countdown(this.getEndDate(), function (e) {
        return _this.onCountdownRun(e);
      }).on('finish.countdown', function (_) {
        return _this.onCountdownFinish();
      });
      var stickyBar = this.elementRef.closest('.hurrytimer-sticky');
      this.handleStickyBar(stickyBar);
    }
    /**
     * Handle sticky bar visibility.
     * @param {*} stickyBar
     */

  }, {
    key: "handleStickyBar",
    value: function handleStickyBar(stickyBar) {
      var _this2 = this;

      if (stickyBar.length === 0) return;
      var dismissCookie = Cookies.get("_ht_CDT-".concat(this.config.id, "_dismissed")); // Stick bar hasn't been dismissed.

      if (dismissCookie == undefined) {
        stickyBar.on('click', '.hurrytimer-sticky-close', function () {
          return _this2.onStickyBarDismiss(stickyBar);
        });
      } else {
        this.hideStickyBar(stickyBar);
      }
    }
    /**
     * Hide Sticky Bar
     * @param {*} stickyBar
     */

  }, {
    key: "hideStickyBar",
    value: function hideStickyBar(stickyBar) {
      if (stickyBar.length === 0) return;
      var isTopPinned = stickyBar.css('top') === '0px';
      stickyBar.remove();

      if (isTopPinned) {
        jQuery('body').css('margin-top', 0);
      } else {
        jQuery('body').css('margin-bottom', 0);
      }
    }
    /**
     * Handle sticky bar dismiss.
     */

  }, {
    key: "onStickyBarDismiss",
    value: function onStickyBarDismiss(stickyBar) {
      this.hideStickyBar(stickyBar);
      Cookies.set("_ht_CDT-".concat(this.config.id, "_dismissed"), '1', {
        expires: +hurrytimer_ajax_object.sticky_bar_hide_timeout
      });
    }
    /**
     * Countdown timer start callback.
     * @param event
     */

  }, {
    key: "onCountdownRun",
    value: function onCountdownRun(event) {
      this.render(event);

      if (event.elapsed) {
        this.executeActions();
      }

      this.maybeShowCampaign();
    }
    /**
     * Render countdown timer.
     * @param event
     */

  }, {
    key: "render",
    value: function render(event) {
      this.elementRef.find('.hurrytimer-timer').html(event.strftime(this.config.template));
    }
    /**
     * Countdown timer finish callback.
     */

  }, {
    key: "onCountdownFinish",
    value: function onCountdownFinish() {
      this.executeActions();
      this.maybeShowCampaign();

      if (this.allowRestartImmediately()) {
        this.run();
      }
    }
  }]);

  return HurrytimerCampaign;
}();
'use strict';

(function (jQuery) {
  // Body element.
  var bodyElementRef = jQuery('body');
  jQuery('.hurrytimer-campaign').each(function () {
    // Campaign element.
    var campaignElementRef = jQuery(this); // Handle sticky bar if present. 

    var stickyBarElementRef = campaignElementRef.closest('.hurrytimer-sticky'); // Display sticky bar if present.

    if (stickyBarElementRef.length) {
      bodyElementRef.append(stickyBarElementRef);
      jQuery(window).resize(function () {
        if (stickyBarElementRef.css('top') === '0px') {
          // Pin at the top.
          bodyElementRef.css('margin-top', stickyBarElementRef.outerHeight());
        } else {
          // Pin at the bottom.
          bodyElementRef.css('margin-bottom', stickyBarElementRef.outerHeight());
        }
      });
      setTimeout(function () {
        jQuery(window).trigger('resize');
      });
    } // Campaign config.


    var config = campaignElementRef.data('config');
    if (config === undefined) return; // Clean up DOM.

    campaignElementRef.removeAttr('data-config');
    var campaign = new HurrytimerCampaign(campaignElementRef, config); // Start campaign.

    campaign.run();
  });
})(jQuery);