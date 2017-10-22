/* Symnel Main Global JS */
document.write('<style>.noscript { display: none; }</style>');

jQuery(document).ready(function() {
    // Menu Superfish
    jQuery('ul.top-category-list').superfish();

    // Implement timeago
    jQuery('time.timeago').timeago();

    // Implement lazyload
    jQuery("img.lazy").lazyload();

    // Responsive Menu
    jQuery("<select />").appendTo("#responsive-top-menu");

    // Create default option "Go to..."
    jQuery("<option />", {
       "selected": "selected",
       "value": "",
       "text": browseAllCategories_txt
    }).appendTo("#responsive-top-menu select");

    // Populate dropdown with menu items
    jQuery(".top-category-list a").each(function() {
     var el = jQuery(this);
     jQuery("<option />", {
         "value"   : el.attr("href"),
         "text"    : el.text()
     }).appendTo("#responsive-top-menu select");
    });

    jQuery("#responsive-top-menu select").change(function() {
      window.location = jQuery(this).find("option:selected").val();
    });

    // Item tab
    if(jQuery('#item-desc-tab').length > 0) {
      jQuery('#item-desc-tab a').click(function (e) {
        e.preventDefault();
        jQuery(this).tab('show');
      });
    }

    // Main select
    var mainSymnelSearch = jQuery('#sCategory');
    if( mainSymnelSearch.length > 0 ) {
      mainSymnelSearch.select2();
    }

    if (jQuery('#item-thumbs').length > 0) {
      // Image photos slider
      // We only want these styles applied when javascript is enabled
      jQuery('div.item-image-navigation').css({'width' : '100%', 'float' : 'left'});
      jQuery('div.item-image-content').css('display', 'block');

      // Initially set opacity on thumbs and add
      // additional styling for hover effect on thumbs
      var onMouseOutOpacity = 0.67;
      jQuery('#item-thumbs ul.thumbs li').opacityrollover({
        mouseOutOpacity:   onMouseOutOpacity,
        mouseOverOpacity:  1.0,
        fadeSpeed:         'fast',
        exemptionSelector: '.selected'
      });

      // Initialize Advanced Galleriffic Gallery
      var gallery = jQuery('#item-thumbs').galleriffic({
        delay:                     2500,
        numThumbs:                 4,
        preloadAhead:              10,
        enableTopPager:            true,
        enableKeyboardNavigation:  false,
        enableBottomPager:         true,
        maxPagesToShow:            7,
        imageContainerSel:         '#slideshow',
        controlsContainerSel:      '#controls',
        captionContainerSel:       '#caption',
        loadingContainerSel:       '#loading',
        renderSSControls:          true,
        renderNavControls:         true,
        playLinkText:              playSlideShow_txtgallery,
        pauseLinkText:             pauseSlideShow_txtgallery,
        prevLinkText:              prevPhoto_txtgallery,
        nextLinkText:              nextPhoto_txtgallery,
        nextPageLinkText:          nextLink_txtgallery,
        prevPageLinkText:          prevLink_txtgallery,
        enableHistory:             false,
        autoStart:                 false,
        syncTransitions:           true,
        defaultTransitionDuration: 500,
        onSlideChange:             function(prevIndex, nextIndex) {
          // 'this' refers to the gallery, which is an extension of jQuery('#item-thumbs')
          this.find('ul.thumbs').children()
            .eq(prevIndex).fadeTo('fast', onMouseOutOpacity).end()
            .eq(nextIndex).fadeTo('fast', 1.0);
        },
        onPageTransitionOut:       function(callback) {
          this.fadeTo('fast', 0.0, callback);
        },
        onPageTransitionIn:        function() {
          this.fadeTo('fast', 1.0);
        }
      });

      // Gallery Thumbnail Relocate
      relocateGalleryThumbnail();
      jQuery(window).resize( function(){
        relocateGalleryThumbnail();
      });

    } // end item-thumbs

    function relocateGalleryThumbnail(){
      enquire.register("(max-width: 991px)", {
          match : function() {
            jQuery('#item-thumbs').appendTo('#mobile-slideshow-thumb');
          },
          unmatch : function() {
            jQuery('#mobile-slideshow-thumb #item-thumbs').appendTo('#desktop-slideshow-thumb');
          },
          destroy : function() {
          }
      });
    }

    // Supporting JS
    jQuery('.listing-card').on('click', function() {
      window.location = jQuery(this).find('.listing-thumb').attr('href');
    });

    // Validation (Search)
    jQuery('#main_search_form').validate({
      rules: {
        sPattern: {
          required: true
        }
      },
      messages: {
        sPattern: {
          required: searchRequiredKeyword_txt
        }
      }
    });

    // Validation (Search)
    jQuery('#main_search_form2').validate({
      rules: {
        sPattern: {
          required: true
        }
      },
      messages: {
        sPattern: {
          required: searchRequiredKeyword_txt
        }
      }
    });

    // Validation (Contact Form)
    jQuery('#contact_form').validate({
      rules: {
        message: {
          required: true,
          minlength: 2
        },
        yourEmail: {
          required: true,
          email: true
        },
        yourName: {
          required: true,
          lettersonly: true
        },
      },
      messages: {
        message: {
          required: commonForm_msgrequired,
          minlength: commonForm_msgminlength
        },
        yourEmail: {
          required: commonForm_emailrequired,
          email: commonForm_emailvalid
        },
        yourName: {
          required: commonForm_namerequired,
          lettersonly: commonForm_namelettersonly
        }
      }
    });

    // Validation (Contact Form 2)
    jQuery('#contact_form2').validate({
      rules: {
        message: {
          required: true,
          minlength: 2
        },
        yourEmail: {
          required: true,
          email: true
        },
        yourName: {
          required: true,
          lettersonly: true
        },
      },
      messages: {
        message: {
          required: commonForm_msgrequired,
          minlength: commonForm_msgminlength
        },
        yourEmail: {
          required: commonForm_emailrequired,
          email: commonForm_emailvalid
        },
        yourName: {
          required: commonForm_namerequired,
          lettersonly: commonForm_namelettersonly
        }
      }
    });

    // Validation (Comment)
    jQuery('#comment_form').validate({
      rules: {
        body: {
          required: true
        },
        authorEmail: {
          required: true,
          email: true
        },
        yourName: {
          required: true
        },
      },
      messages: {
        body: {
          required: commentForm_bodyrequired
        },
        authorEmail: {
          required: commonForm_emailrequired,
          email: commonForm_emailvalid
        },
        yourName: {
          required: commonForm_namerequired
        }
      }
    });

    // Validation (Register)
    jQuery('#register').validate({
      rules: {
        s_name: {
          required: true,
          lettersonly: true
        },
        s_email: {
          required: true,
          email: true
        },
        s_password: {
          required: true
        },
        s_password2: {
          required: true,
          equalTo: "#s_password"
        },
      },
      messages: {
        s_name: {
          required: commonForm_namerequired,
          lettersonly: commonForm_namelettersonly
        },
        s_email: {
          required: commonForm_emailrequired,
          email: commonForm_emailvalid
        },
        s_password: {
          required: commonForm_setpassword
        },
        s_password2: {
          required: commonForm_setpassword2required,
          equalTo: commonForm_setpassword2equalto
        }
      }
    });

    // Validation (Login)
    jQuery('#login').validate({
      rules: {
        email: {
          required: true,
          email: true
        },
        password: {
          required: true
        }
      },
      messages: {
        email: {
          required: commonForm_loginregisteredemail,
          email: commonForm_loginvalidemail
        },
        password: {
          required: commonForm_passwordrequired
        }
      }
    });

    // Validation (Recover Password)
    jQuery('#recover-password').validate({
      rules: {
        s_email: {
          required: true,
          email: true
        }
      },
      messages: {
        s_email: {
          required: commonForm_loginregisteredemail,
          email: commonForm_loginvalidemail
        }
      }
    });

    // Validation (Recover Forgot Password)
    jQuery('#recover-forgot-password').validate({
      rules: {
        new_password: {
          required: true
        },
        new_password2: {
          required: true,
          equalTo: "#new_password"
        }
      },
      messages: {
        new_password: {
          required: commonForm_passwordnew
        },
        new_password2: {
          required: commonForm_passwordnew2required,
          equalTo: commonForm_passwordnew2equalto
        }
      }
    });

    // Validation (Spam Report)
    jQuery('#mask_as_form').validate({
      rules: {
        as: {
          required: true
        }
      },
      messages: {
        as: {
          required: reportForm_issue
        }
      }
    });

    // Validation Item (Post and Edit)
    jQuery('#dtf-form-backend').validate({
      rules: {
        contactName: {
          required: true,
          lettersonly: true
        },
        contactEmail: {
          required: true,
          email: true
        },
        catId: {
          required: true
        },
        price: {
          required: true
        }
      },
      messages: {
        contactName: {
          required: commonForm_namerequired,
          lettersonly: commonForm_namelettersonly
        },
        contactEmail: {
          required: commonForm_emailrequired,
          email: commonForm_emailvalid
        },
        catId: {
          required: commonForm_categoryrequired
        },
        price: {
          required: commonForm_pricerequired
        }
      }
    });

    // if( jQuery('#dtf-form-backend #price').length > 0 ) {
    //   jQuery('#dtf-form-backend input#price').val(function(index, value) {
    //           return value
    //               .replace(/\D/g, '')
    //               .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    //           ;
    //   });

    //   jQuery('#dtf-form-backend input#price').keyup(function(event) {
    //       // skip for arrow keys
    //       if(event.which >= 37 && event.which <= 40) return;
    //       // format number
    //       jQuery(this).val(function(index, value) {
    //           return value
    //               .replace(/\D/g, '')
    //               .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
    //           ;
    //       });
    //   });

    //   jQuery('#dtf-form-backend').submit(function(event) {
    //       jQuery('#dtf-form-backend input#price').val(function(index, value) {
    //           return value
    //               .replace(/\D/g, '')
    //               .replace(/\B(?=(\d{3})+(?!\d))/g, "")
    //           ;
    //       });
    //   });
    // }

    // Extra added function
    jQuery.validator.addMethod("priceonly", function(value, element) {
      return this.optional(element) || /^[0-9\,]+$/i.test(value);
    }, "Letters only please");

   jQuery(".search-desktop .dropdown-menu").on("click", function(e) {
        e.stopPropagation();
    });

      // jQuery('input#priceMin').val(function(index, value) {
      //         return value
      //             .replace(/\D/g, '')
      //             .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
      //         ;
      // });

      // jQuery('input#priceMin').keyup(function(event) {
      //     // skip for arrow keys
      //     if(event.which >= 37 && event.which <= 40) return;
      //     // format number
      //     jQuery(this).val(function(index, value) {
      //         return value
      //             .replace(/\D/g, '')
      //             .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
      //         ;
      //     });
      // });

      // jQuery('#main_search_form').submit(function(event) {
      //     jQuery('input#priceMin').val(function(index, value) {
      //         return value
      //             .replace(/\D/g, '')
      //             .replace(/\B(?=(\d{3})+(?!\d))/g, "")
      //         ;
      //     });
      // });

      // jQuery('.search-generic-form').submit(function(event) {
      //     jQuery('input#priceMin').val(function(index, value) {
      //         return value
      //             .replace(/\D/g, '')
      //             .replace(/\B(?=(\d{3})+(?!\d))/g, "")
      //         ;
      //     });
      // });

      // jQuery('input#priceMax').val(function(index, value) {
      //         return value
      //             .replace(/\D/g, '')
      //             .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
      //         ;
      // });

      // jQuery('input#priceMax').keyup(function(event) {
      //     // skip for arrow keys
      //     if(event.which >= 37 && event.which <= 40) return;
      //     // format number
      //     jQuery(this).val(function(index, value) {
      //         return value
      //             .replace(/\D/g, '')
      //             .replace(/\B(?=(\d{3})+(?!\d))/g, ",")
      //         ;
      //     });
      // });

      // jQuery('#main_search_form').submit(function(event) {
      //     jQuery('#priceMax').val(function(index, value) {
      //         return value
      //             .replace(/\D/g, '')
      //             .replace(/\B(?=(\d{3})+(?!\d))/g, "")
      //         ;
      //     });
      // });

      //  jQuery('.search-generic-form').submit(function(event) {
      //     jQuery('input#priceMax').val(function(index, value) {
      //         return value
      //             .replace(/\D/g, '')
      //             .replace(/\B(?=(\d{3})+(?!\d))/g, "")
      //         ;
      //     });
      // });
});
