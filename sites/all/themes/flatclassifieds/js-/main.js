jQuery(document).ready(function($) {

  if ($('html').attr('dir') == 'rtl') {
    setTimeout(function() {
      $(".stwrapper").css("top","0px");
      $(".stwrapper").css("left","0px");
    },1000);
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
    		
    var ImgHeight = $(".calc_h .node-classified.node-teaser .fcimg .field-items img").height();
		$('.calc_h .node-classified.node-teaser').height(ImgHeight +95);
		$('.calc_h .node-classified.node-teaser .fcimg .field-items').height(ImgHeight);

    var ImgHeight = $(".calc_h .node-classified-noex.node-teaser .fcimg .field-items img").height();
		$('.calc_h .node-classified-noex.node-teaser').height(ImgHeight + 95);
		$('.calc_h .node-classified-noex.node-teaser .fcimg .field-items').height(ImgHeight);		

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
      $('.views_slideshow_cycle_main').height(IHeighth);

      var slideshow_data_settings = new Array();
      i = 0;
      if (Drupal.settings.viewsSlideshowCycle['#views_slideshow_cycle_main_featured_ads-block']) {
        slideshow_data_settings[i] = Drupal.settings.viewsSlideshowCycle['#views_slideshow_cycle_main_featured_ads-block'].targetId;
        i++;
      }
      if (Drupal.settings.viewsSlideshowCycle['#views_slideshow_cycle_main_featured_ads-block_1']) {
        slideshow_data_settings[0] = Drupal.settings.viewsSlideshowCycle['#views_slideshow_cycle_main_featured_ads-block_1'].targetId;
        i++;
      }
      for(var i=0; i < slideshow_data_settings.length; i++) {
        $(slideshow_data_settings[i]).children().each(function(){
          var $slide = $(this);
			    $slide.height( IHeighth );
			    $slide.width( IWidth );
			    $slide.find(".node-classified.node-teaser").height( IHeighth ); 
			    $slide.find(".node-classified-noex.node-teaser").height( IHeighth );
			    $slide.find(".node-classified.node-teaser .fcimg .field-item .field-slideshow").height( imgHeight );
			    $slide.find(".node-classified-noex.node-teaser .fcimg .field-item .field-slideshow").height( imgHeight );
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
  
  $('#block-views-exp-search-page-page .views-widget-filter-distance').click(function(e) {
		if (($('html').attr('dir') != 'rtl' && e.pageX - $(this).offset().left >= 20 && e.pageX - $(this).offset().left <= 44 && e.pageY - $(this).offset().top >= 15 && e.pageY - $(this).offset().top <= 35) || 
		    ($('html').attr('dir') == 'rtl' && e.pageX - $(this).offset().left <= $(this).width() - 20 && e.pageX - $(this).offset().left >= $(this).width() - 44 && e.pageY - $(this).offset().top >= 15 && e.pageY - $(this).offset().top <= 35)) {
			if (!$(this).hasClass("ac")) { 
			  $(this).addClass("ac");
			  $("#edit-auto-location").attr("checked","checked");
			} else {
			  $(this).removeClass("ac");
			  $("#edit-auto-location").removeAttr("checked");
			}
		}
	});

  $('#block-views-exp-search-page-page .views-widget-filter-distance').mousemove(
    function(e) {
		  if (($('html').attr('dir') != 'rtl' && e.pageX - $(this).offset().left >= 20 && e.pageX - $(this).offset().left <= 44 && e.pageY - $(this).offset().top >= 15 && e.pageY - $(this).offset().top <= 35) || 
		      ($('html').attr('dir') == 'rtl' && e.pageX - $(this).offset().left <= $(this).width() - 20 && e.pageX - $(this).offset().left >= $(this).width() - 44 && e.pageY - $(this).offset().top >= 15 && e.pageY - $(this).offset().top <= 35)) {
			  $(this).addClass("ho");
		  } else {
		    $(this).removeClass("ho");
		  }
	  }
	);

  if ($("#edit-auto-location").attr("checked")) {
    $('#block-views-exp-search-page-page .views-widget-filter-distance').addClass("ac");
  } else {
    $('#block-views-exp-search-page-page .views-widget-filter-distance').removeClass("ac");
  }
  
  $(".views-widget-filter-keys #edit-keys").val($.trim($(".views-widget-filter-keys label").text()));
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
  
  $("#views-exposed-form-search-page-page").click(function() {
  alert('123');
    if ($(".views-widget-filter-keys #edit-keys").val() == $.trim($(".views-widget-filter-keys label").text())) {
      $(".views-widget-filter-keys #edit-keys").val('');
    }
  });
  
	$(".form-select").chosen();
	
	
	  

  $(window).scroll(function() {
    if ($(this).scrollTop()) {
        $('.scroll_top').stop(true, true).fadeIn();
    } else {
        $('.scroll_top').stop(true, true).fadeOut();
    }
      //$(".stwrapper").css("display","none");
  });
  
	// Twitter
	$('.widget-twitter').each(function() {
		$('> .tweets', this).tweet({
			username: $(this).data('username'),
			count:    $(this).data('count'),
			retweets: $(this).data('retweets'),
			template: '{tweet_text}<br /><small><a href="{tweet_url}">{tweet_relative_time}</a></small>'
		});
	});

  function getScrollTop() {
    var scrOfY = 0;
    if( typeof( window.pageYOffset ) == "number" ) {
      //Netscape compliant
      scrOfY = window.pageYOffset;
    } else if( document.body && ( document.body.scrollLeft || document.body.scrollTop ) ) {
      //DOM compliant
      scrOfY = document.body.scrollTop;
    } else if( document.documentElement && ( document.documentElement.scrollLeft || document.documentElement.scrollTop ) ) {
      //IE6 Strict
      scrOfY = document.documentElement.scrollTop;
    }
    return scrOfY;
  }
  
  function fixPaneRefresh(){
    if ($(".header").length) {
      var top  = getScrollTop();
      if (top > $(".top").height() && !(tablet || mobile)) {
				if (!$(".header").hasClass("top48")) {
				  $(".header").addClass("top48");
				  $(".main").css("margin-top", $(".top").height() + $(".nav").height() + "px");
				  $(".header").css("position","fixed");
				  $(".header").css("top","0");
				  $(".top").css("display","none");
				  
				}
			} else {
				if ($(".header").hasClass("top48")) {
				  $(".header").removeClass("top48");
				  $(".top").css("display","block");
				  $(".header").css("position","static");
				  $(".header").css("top","0");
				  $(".main").css("margin-top","0px");
				}
			}
    }
  }  
  
  $(window).scroll(function() {
    fixPaneRefresh();
  });  

if (!$('div').hasClass("classified") && !$('div').hasClass("bgw")) {

  if ($('div').hasClass("cnt_page_f")) {
    var $container = $('.cnt_page_f:has(.cnt_box)');
  } else {
    var $container = $('.content-right-block:has(.cnt_box)');
  }
  if ($('html').attr('dir') == 'rtl') {
    var sRTL = 1; 
  } else {
    var sRTL = 0;
  }
  $container.imagesLoaded(function(){
    $container.masonry({
      itemSelector: '.cnt_box',
      columnWidth: 0,
      isRTL: sRTL 
    });
  });
    
  $container.infinitescroll({
      navSelector  : 'ul.pager',
      nextSelector : 'ul.pager .pager-next a',
      itemSelector : '.cnt_box',
      state: {currPage: 0},
      loading: {
        msgText: "<em>" + Drupal.t("Loading...") + "</em>",
        finishedMsg: Drupal.t("No more.")
      },
      path: function (path) {
        var href1 = $('ul.pager .pager-next a').attr('href');
        var href2 = href1.match(/^(.*?page=)1(.*|$)/).slice(1);
        var href3 = href2[0].replace('page=', 'page=' + path);
        //alert(href1.indexOf('?') + ' - ' + href1 + ' - ' +  href3);
        href1 = [href3];
        return href1;
      },
    },
    
    function( newElements ) {
        // hide new items while they are loading
        var $newElems = $( newElements ).css({ opacity: 0 });
        // ensure that images load before adding to masonry layout
        $newElems.imagesLoaded(function(){
          // show elems now they\'re ready
          window.a_second++;
          $newElems.addClass('second_'+a_second);
          $newElems.animate({ opacity: 1 });
          $container.masonry('appended', $newElems, true );
        });
      }
      
  );

}
    
});
