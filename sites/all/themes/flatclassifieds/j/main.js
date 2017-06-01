jQuery(document).ready(function($) {

  if ($('html').attr('dir') == 'rtl') {
//     setTimeout(function() {
//       $(".stwrapper").css("top","0px");
//       $(".stwrapper").css("left","0px");
//     },1000);
    var is_RTL = true;
  } else {
    var is_RTL = false;
  }


	$(window).resize(function() {
		windowWidth = $(window).width();
		lteTablet = windowWidth < 980;
		lteMobile = windowWidth < 767;
		lteMini   = windowWidth < 479;
		gteDektop = windowWidth >= 980;
		gteTablet = windowWidth >= 767;
		gteMobile = windowWidth >= 239;
		tablet    = lteTablet && gteTablet;
		mobile    = lteMobile && gteMobile;

//     var ImgHeight = $(".calc_h .node-classified.node-teaser .fcimg .field-items img").height();
// 		$('.calc_h .node-classified.node-teaser').height(ImgHeight +95);
// 		$('.calc_h .node-classified.node-teaser .fcimg .field-items').height(ImgHeight);
//
//     var ImgHeight = $(".calc_h .node-classified-noex.node-teaser .fcimg .field-items img").height();
// 		$('.calc_h .node-classified-noex.node-teaser').height(ImgHeight + 95);
// 		$('.calc_h .node-classified-noex.node-teaser .fcimg .field-items').height(ImgHeight);

    if (Drupal.settings.viewsSlideshowCycle) {
      var IWidth = $('.views_slideshow_cycle_main').width();
      $('.views-slideshow-cycle-main-frame').width(IWidth);
      if (IWidth > 750) {
        var imgHeight = Math.round( ( ((IWidth / 4) - 10) * 0.65107913669065 ));
      } else {
        if (IWidth == 730) {
          var imgHeight = Math.round( ( ((IWidth / 3) - 10) * 0.65107913669065 ));
        } else {
          if (IWidth > 188) {
            var imgHeight = Math.round( ( ((IWidth / 2) - 10) * 0.65107913669065 ));
          } else {
            var imgHeight = Math.round( ( ((IWidth) - 10) * 0.65107913669065 ));
          }
        }
      }
      var IHeighth = imgHeight + 95;
      $('.views_slideshow_cycle_main').height(IHeighth + 1);

      var slideshow_data_settings = new Array();
      i = 0;
      if (Drupal.settings.viewsSlideshowCycle['#views_slideshow_cycle_main_featured_ads-block']) {
        slideshow_data_settings[i] = Drupal.settings.viewsSlideshowCycle['#views_slideshow_cycle_main_featured_ads-block'].targetId;
        i++;
      }
      if (Drupal.settings.viewsSlideshowCycle['#views_slideshow_cycle_main_featured_ads-block_1']) {
        slideshow_data_settings[i] = Drupal.settings.viewsSlideshowCycle['#views_slideshow_cycle_main_featured_ads-block_1'].targetId;
        i++;
      }
      if (Drupal.settings.viewsSlideshowCycle['#views_slideshow_cycle_main_featured_ads-block_2']) {
        slideshow_data_settings[i] = Drupal.settings.viewsSlideshowCycle['#views_slideshow_cycle_main_featured_ads-block_2'].targetId;
        i++;
      }

      for(var i=0; i < slideshow_data_settings.length; i++) {
        $(slideshow_data_settings[i]).children().each(function(){
          var $slide = $(this);
			    $slide.height( IHeighth + 1);
			    $slide.width( IWidth );
			    $slide.find(".node-classified.node-teaser").height( IHeighth );
			    $slide.find(".node-classified-noex.node-teaser").height( IHeighth );
			    $slide.find(".node-classified-ad-ptp.node-teaser").height( IHeighth );
			    $slide.find(".node-classified.node-teaser .fcimg .field-item .field-slideshow").height( imgHeight );
			    $slide.find(".node-classified-noex.node-teaser .fcimg .field-item .field-slideshow").height( imgHeight );
			    $slide.find(".node-classified-ad-ptp.node-teaser .fcimg .field-item .field-slideshow").height( imgHeight );
			    this.cycleH = IHeighth;
		      this.cycleW = IWidth;
		    });
		  }
    }

	}).trigger('resize');

  $('.navcat .menu li.collcat').click(function(e) {
		if ($('html').attr('dir') != 'rtl' && e.pageX - $(this).offset().left <= 20) {
		  var act = 0;
		  $('.navcat .menu li.collcat ul.menu').slideUp(300);
			if (!$(this).hasClass("expandedd")) {
			  $(this).find("ul.menu").slideDown(300);
			  act = 1;
			}
			$(".navcat .menu li.collcat").removeClass("expandedd");
			$(".navcat .menu li.collcat").addClass("collapsedd");
			if (act) {
			  $(this).addClass("expandedd");
			  $(this).removeClass("collapsedd");
			}
			return false;
		}
    if ($('html').attr('dir') == 'rtl' && e.pageX - $(this).offset().left >= $(this).width() - 20) {
		  var act = 0;
		  $('.navcat .menu li.collcat ul.menu').slideUp(300);
			if (!$(this).hasClass("expandedd")) {
			  $(this).find("ul.menu").slideDown(300);
			  act = 1;
			}
			$(".navcat .menu li.collcat").removeClass("expandedd");
			$(".navcat .menu li.collcat").addClass("collapsedd");
			if (act) {
			  $(this).addClass("expandedd");
			  $(this).removeClass("collapsedd");
			}
			return false;
		}
	});


  $( ".form-item-distance-search-distance" ).slider({
		      	range: "min",
		      	isRTL: is_RTL,
		      	value: $("#edit-distance-search-distance").val(),
		      	min: 1,
		      	max: 1000,
		      	slide: function( event, ui ) {
  	       		$("#edit-distance-search-distance").val( ui.value );
  	       		$("#edit-distance-search-distance-ind").val( ui.value );

// 		       		jQuery( "#geo-radius-search" ).val( ui.value );
//
// 		       		jQuery( ".geo-location-switch" ).removeClass("off");
// 		      	 	jQuery( ".geo-location-switch" ).addClass("on");
// 		      	 	jQuery( "#geo-location" ).val("on");
//
// 		       		mapDiv.gmap3({
// 						    getgeoloc:{
// 							    callback : function(latLng){
// 								    if (latLng){
// 									    jQuery('#geo-search-lat').val(latLng.lat());
// 									    jQuery('#geo-search-lng').val(latLng.lng());
// 								    }
// 							    }
// 						    }
//				      });

		      	}
		    });

  $( ".ui-slider-handle" ).html('<div class="distance-ind"><input id="edit-distance-search-distance-ind" type="text" value="100" name="distance_ind" /><div class="distance-ind-units">km</div></div>');

  $('.distance-ind-units').click(function(e) {
			if (!$(this).hasClass("ac")) {
			  $(this).addClass("ac");
			  $("#edit-distance-search-units").val('miles');
			  $(".distance-ind-units").html('ml');
			} else {
			  $(this).removeClass("ac");
			  $("#edit-distance-search-units").val('km');
			  $(".distance-ind-units").html('km');
			}
	});

  if ($("#edit-distance-search-units").val() == 'km') {
    $(".distance-ind-units").html('km');
  } else {
    $(".distance-ind-units").html('ml');
    $('.distance-ind-units').addClass("ac");
  }
  $("#edit-distance-search-distance-ind").val($("#edit-distance-search-distance").val());

  $('#views-exposed-form-search-page-page .views-widget-filter-distance').click(function(e) {
    var Xp = e.pageX - $(this).offset().left;
    var Yp = e.pageY - $(this).offset().top;
		if ((!is_RTL && Xp >= 20 && Xp <= 44 && Yp >= 15 && Yp <= 35) ||
		    (is_RTL && Xp <= $(this).outerWidth() - 20 && Xp >= $(this).outerWidth() - 44 && Yp >= 15 && Yp <= 35)) {
			if (!$(this).hasClass("ac")) {
			  $(this).addClass("ac");
			  $("#edit-auto-location").attr("checked","checked");
			} else {
			  $(this).removeClass("ac");
			  $("#edit-auto-location").removeAttr("checked");
			}
		}
	});

  $('#views-exposed-form-search-page-page .views-widget-filter-distance').mousemove(
    function(e) {
      var Xp = e.pageX - $(this).offset().left;
      var Yp = e.pageY - $(this).offset().top;
		  if ((!is_RTL && Xp >= 20 && Xp <= 44 && Yp >= 15 && Yp <= 35) ||
		      (is_RTL && Xp <= $(this).outerWidth() - 20 && Xp >= $(this).outerWidth() - 40 && Yp >= 15 && Yp <= 35)) {
			  $(this).addClass("ho");
		  } else {
		    $(this).removeClass("ho");
		  }
	  }
	);

	$('#views-exposed-form-search-page-page .ui-state-default').mouseenter(
    function() {
      $('.ui-state-default .distance-ind').fadeIn("fast");
	  }
	);
	$('#views-exposed-form-search-page-page .ui-state-default').mouseleave(
    function() {
      $('.ui-state-default .distance-ind').fadeOut("slow");
	  }
	);

  if ($("#edit-auto-location").attr("checked")) {
    $('#views-exposed-form-search-page-page .views-widget-filter-distance').addClass("ac");
  } else {
    $('#views-exposed-form-search-page-page .views-widget-filter-distance').removeClass("ac");
  }

  if ($.trim($(".views-widget-filter-keys #edit-keys").val()) == '') {
    $(".views-widget-filter-keys #edit-keys").val($.trim($(".views-widget-filter-keys label").text()));
  }
  $(".views-widget-filter-tid #edit-tid option[value=All]").html($(".views-widget-filter-tid label").html());
  $(".views-widget-filter-tid_1 #edit-tid-1 option[value=All]").html($(".views-widget-filter-tid_1 label").html());
  $(".views-widget-filter-keys #edit-keys").focus(function() {
    if ($(".views-widget-filter-keys #edit-keys").val() == $.trim($(".views-widget-filter-keys label").text())) {
      $(".views-widget-filter-keys #edit-keys").val('');
    }
  });
  $(".views-widget-filter-keys #edit-keys").blur(function() {
    if ($(".views-widget-filter-keys #edit-keys").val() == '') {
      $(".views-widget-filter-keys #edit-keys").val($.trim($(".views-widget-filter-keys label").text()));
    }
  });
  $("#views-exposed-form-search-page-page").submit(function() {
    if ($(".views-widget-filter-keys #edit-keys").val() == $.trim($(".views-widget-filter-keys label").text())) {
      $(".views-widget-filter-keys #edit-keys").val('');
    }
  });

  if ($('html').attr('dir') == 'rtl') {
    $('#views-exposed-form-search-page-page .form-select').addClass("chosen-rtl");
    $('.node-form .form-select').addClass("chosen-rtl");
    $('.contact-form .form-select').addClass("chosen-rtl");
  }
	$("#views-exposed-form-search-page-page .form-select").chosen();
	$(".node-form .form-select").chosen();
  $(".contact-form .form-select").chosen();
  //$(".contact-form .form-select").chosen();

  setTimeout(function() {
      $("#comments .cke_contents").height(120);
    },500);

  // Recalculate height for responsive layouts
	var img_rebuild_max_height = function(context) {
		var max_height = 0;
		var heights = $('.field-slideshow-slide',context).map(function ()
		{
			return $(this).height();
		}).get(),
		max_height = Math.max.apply(Math, heights);
		if (max_height > 0) {
			context.css("height", max_height);
		}
	};

  setTimeout(function() {
    $('.field-slideshow').each(function(){
      img_rebuild_max_height($(this))
    })
  },2000);

});
