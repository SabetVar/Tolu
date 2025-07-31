
/**
 * Simple Load More
 *
 * Version: 1.5.2
 * Author: Zeshan Ahmed
 * Website: https://zeshanahmed.com/
 * Github: https://github.com/zeshanshani/simple-load-more/
 * @license MIT
 */
(function($) {
  $.fn.simpleLoadMore = function( options ) {
    // Settings.
    var settings = $.extend({
      item: '',
      count: 5,
      itemsToLoad: 5,
      cssClass: 'load-more',
      showCounter: false,
      counterText: 'Showing {showing} out of {total}',
      btnHTML: '',
      btnText: 'View More',
      btnWrapper: '',
      btnWrapperClass: '',
      easing: 'fade',
      easingDuration: 400
    }, options);

    // Variables
    var $loadMore = $(this);

    // Run through all the elements.
    $loadMore.each(function(i, el) {

      // Define all settings as variables
      var item            = settings.item,
          count           = settings.count,
          itemsToLoad     = settings.itemsToLoad,
          cssClass        = settings.cssClass,
          showCounter     = settings.showCounter,
          counterText     = settings.counterText;
          btnHTML         = settings.btnHTML,
          btnText         = settings.btnText,
          btnWrapper      = settings.btnWrapper,
          btnWrapperClass = settings.btnWrapperClass;
          // easing          = settings.easing,
          // easingDuration  = settings.easingDuration;


      // Default settings if empty
      if ( ! btnWrapper && btnWrapper !== false ) {
        btnWrapper = '<div class="' + cssClass + '__btn-wrap' + ( btnWrapperClass ? ' ' + btnWrapperClass : '' ) + '"></div>';
      }

      // Variables.
      var $thisLoadMore = $(this),
          $items = $thisLoadMore.find(item),
          $btnHTML,
          $counterHTML = $('<p class="' + cssClass + '__counter">' + counterText + '</p>');

      // If showCounter is true, then append the counter text in the component.
      if ( showCounter ) {
        $thisLoadMore.append( $counterHTML );
      }

      // Default if not available
      if ( ! btnHTML ) btnHTML = '<a href="#" class="' + cssClass + '__btn">' + btnText + '</a>';

      // Set $btnHTML as $btnHTML
      $btnHTML = $(btnHTML);

      // If options.itemsToLoad is not defined, then assign settings.count to it
      if ( ! options.itemsToLoad || isNaN( options.itemsToLoad ) ) {
        settings.itemsToLoad = settings.count;
      }

      // Add classes
      $thisLoadMore.addClass(cssClass);
      $items.addClass(cssClass + '__item');

      // Add button.
      if ( ! $thisLoadMore.find( '.' + cssClass + '__btn' ).length && $items.length > settings.count ) {
        $thisLoadMore.append( $btnHTML );
      }

      // Replace counter with fields
      $btnHTML.add( $counterHTML ).html(function(i, oldHtml) {
        var newHtml = oldHtml.replace('{showing}', '<span class="' + cssClass + '__count ' + cssClass + '__count--showing">' + count + '</span>');
        newHtml = newHtml.replace('{total}', '<span class="' + cssClass + '__count ' + cssClass + '__count--total">' + $items.length + '</span>');

        return newHtml
      })

      var $btn = $thisLoadMore.find( '.' + cssClass + '__btn' );

      // Check if button is not present. If not, then attach $btnHTML to the $btn variable.
      if ( ! $btn.length ) {
        $btn = $btnHTML;
      }

      if ( $items.length > settings.count ) {
        $items.slice(settings.count).hide();
      }

      // Wrap button in its wrapper.
      $btn.wrapAll( btnWrapper );

      // Add click event on button.
      $btn.on('click', function(e) {
        e.preventDefault();

        var $thisBtn = $(this);
        var $hiddenItems = $items.filter(':hidden');
        var $updatedItems = $hiddenItems;

        if ( settings.itemsToLoad !== -1 && settings.itemsToLoad > 0 ) {
          $updatedItems = $hiddenItems.slice(0, settings.itemsToLoad);
        }

        // Show the selected elements.
        if ( $updatedItems.length > 0 ) {
          if ( settings.easing === 'fade' ) {
            $updatedItems.fadeIn( settings.easingDuration );
          } else {
            $updatedItems.slideDown( settings.easingDuration );
          }
        }

        // Update the showing items count.
        $thisLoadMore.find('.' + cssClass + '__count--showing').text( $items.filter(':visible').length );

        // Hide the 'View More' button
        // if the elements lenght is less than 5.
        // OR if the settings.itemsToLoad is set to -1.
        if ( $hiddenItems.length <= settings.itemsToLoad || settings.itemsToLoad === -1 ) {
          if ( $thisBtn.parent( '.' + cssClass + '__btn-wrap' ) ) {
            $thisBtn.parent().remove();
          } else {
            $thisBtn.remove();
          }
        }
      });
    });
  }
}( jQuery ));

//Theme Options
var themeOptions = {
		siteWrap: '.site-wrap',
		footerWrap: '.footer-wrap',
		mainMenu: '.header-navigation',
		selectMenu: '.select-menu',
		courseRating: '.course-rating',
		themexSlider: '.themex-slider',
		parallaxSliderClass: 'parallax-slider',
		toolTip: '.tooltip',
		toolTipWrap: '.tooltip-wrap',
		tooltipSwitch: '.switch-button',
		button: '.button',
		submitButton: '.submit-button',
		printButton: '.print-button',
		facebookButton: '.facebook-button',
		toggleTitle: '.toggle-title',
		toggleContent: '.toggle-content',
		toggleContainer: '.toggle-container',
		accordionContainer: '.accordion',
		tabsContainer: '.tabs-container',
		tabsTitles: '.tabs',
		tabsPane: '.pane',
		playerContainer: '.jp-container',
		playerSource: '.jp-source a',
		player: '.jp-jplayer',
		playerFullscreen: '.jp-screen-option',
		placeholderFields: '.popup-form input',
		userImageUploader: '.user-image-uploader',
		popup: '.popup',
		popupContainer: '.popup-container',
		noPopupClass: 'no-popup',
		googleMap: '.google-map-container',
		widgetTitle: '.widget-title'
};

var ajaxForms= {
		loginForm: '.login-form',
		registerForm: '.register-form',
		passwordForm: '.password-form',
		contactForm: '.contact-form',
};

//Ajax Form
function ajaxForm(form) {
	form.submit(function() {
		var data={
			action: form.find('.action').val(),
			nonce: form.find('.nonce').val(),
			data: form.serialize()
		}

		form.find('.message').slideUp(300);
		form.find('.form-loader').show();
		form.find(themeOptions.submitButton).addClass('disabled');
		
		jQuery.post(form.attr('action'), data, function(response) {
			form.find(themeOptions.submitButton).removeClass('disabled');
			if(response.match('success') != null) {
				if(jQuery('a.redirect',response).length) {
					window.location.href=jQuery('a.redirect',response).attr('href');
				} else if(response!='0' && response!='-1') {
					form.find('.message').html(response).slideDown(300);
					form.find('.form-loader').hide();
				}						
			} else if(response!='0' && response!='-1') {
				form.find('.message').html(response).slideDown(300);
				form.find('.form-loader').hide();
			}
		});				
		return false;
	});
}

//DOM Loaded
jQuery(document).ready(function($) {


	
   $('input[type=password]').each (function() {
	   
		$(this).after('<div type="button" class="button buttonshow" aria-label="نمایش رمز"><span class="dashicons dashicons-visibility" aria-hidden="true"></span></div>');
	   
		$(this).css({"position": "relative", "text-align": "left", "direction": "ltr"});
	    $(this).parent().css({"position": "relative", "display": "block" , "padding-bottom": "0"});

   });
	
	$('.buttonshow').click(function(){
		
		if($(this).hasClass('show')){
			$(this).prev().attr("type","password");			
			$(this).removeClass('show');
		}else{
			$(this).prev().attr("type","text");
			$(this).addClass('show');
		}
		
	});
	
	
	   $("#password").attr("type","password");
   
	$(".dropdown-toggle.ripple").click(function(){
		
		if($(this).hasClass('show')){
			$(this).next().removeClass('show');
			$(this).parent().removeClass('show');
			$(this).removeClass('show');
		} else{
			$(this).next().addClass('show');
			$(this).parent().addClass('show');
			$(this).addClass('show');
		}
		
	});
	
	$(".dropdown-toggle.ripple.show").click(function(){

	});
	
	
	//mob menu
	$(".mob-menu-icon").click(function() {
		$(".mob-menu").removeClass('mob-close');
		$(".mob-menu").addClass('mob-open');
		
		$(".mob-overaly").removeClass('ov-close');
		$(".mob-overaly").addClass('ov-open');
		
		$("body").addClass('disable-scroll');		
	});
	
	$(".mob-overaly , .dicon.mob-close-icon").click(function() {
		$(".mob-menu").removeClass('mob-open');
		$(".mob-menu").addClass('mob-close');
		
		$(".mob-overaly").removeClass('ov-open');
		$(".mob-overaly").addClass('ov-close');
		
		$("body").removeClass('disable-scroll');

	});
	

$(document).scroll(function() {
  var y = $(this).scrollTop();
  if (y > 110) {
    $('.mlogo').addClass('mlopen');
  } else {
    $('.mlogo').removeClass('mlopen');
  }
   if (y > 300) {
    $('.move-top').addClass('move-open');
  } else {
    $('.move-top').removeClass('move-open');
  }
});

$('.move-top').click(function() {
  $("html, body").animate({ scrollTop: 0 }, "slow");
  return false;
});
	
	
	
	//sticky
	$(".sticky").stick_in_parent();
	
	//Dropdown Menu
	$(themeOptions.mainMenu).find('li').hoverIntent(
		function() {
			var menuItem=$(this);
			menuItem.parent('ul').css('overflow','visible');			
			menuItem.children('ul').slideToggle(200, function() {
				menuItem.addClass('hover');
			});
		},
		function() {
			var menuItem=$(this);
			menuItem.children('ul').slideToggle(200, function() {
				menuItem.removeClass('hover');
			});
		}
	);
	
	//Select Menu
	$(themeOptions.selectMenu).find('select').fadeTo(0, 0);
	$(themeOptions.selectMenu).find('span').text($(themeOptions.selectMenu).find('option:eq(0)').text());
	$(themeOptions.selectMenu).find('option').each(function() {
		if(window.location.href==$(this).val()) {
			$(themeOptions.selectMenu).find('span').text($(this).text());
			$(this).attr('selected','selected');
		}
	});
	
	$(themeOptions.selectMenu).find('select').change(function() {
		window.location.href=$(this).find('option:selected').val();
		$(themeOptions.selectMenu).find('span').text($(this).find('option:selected').text());
	});

	//Course Rating
	$(themeOptions.courseRating).each(function() {
		var rating=$(this);		
		$(this).raty({
			score: rating.data('score'),
			readOnly: rating.data('readonly'),
			hints   : ['', '', '', '', ''],
			noRatedMsg : '',
			click: function(score, evt) {
				var data= {
					action: rating.data('action'),					
					rating: score,
					id: rating.data('id')
				};
				$.post(rating.data('url'), data, function(response) {
				});
			}
		});
	});
	
	//Audio and Video
	if($(themeOptions.playerContainer).length) {
		$(themeOptions.playerContainer).each(function() {
			var mediaPlayer=$(this);
			var suppliedExtensions='';
			var suppliedMedia=new Object;
			
			mediaPlayer.find(themeOptions.playerSource).each(function() {
				var mediaLink=$(this).attr('href');
				var mediaExtension=$(this).attr('href').split('.').pop();
				
				if(mediaExtension=='webm') {
					mediaExtension='webmv';
				}
				
				if(mediaExtension=='mp4') {
					mediaExtension='m4v';
				}
				
				suppliedMedia[mediaExtension]=mediaLink;				
				suppliedExtensions+=mediaExtension;
				
				if(!$(this).is(':last-child')) {
					suppliedExtensions+=',';
				}
			});
		
			mediaPlayer.find(themeOptions.player).jPlayer({
				ready: function () {
					$(this).jPlayer('setMedia', suppliedMedia);
				},
				swfPath: templateDirectory+'js/jplayer/Jplayer.swf',
				supplied: suppliedExtensions,
				cssSelectorAncestor: '#'+mediaPlayer.attr('id'),
				solution: 'html, flash',
				wmode: 'window'
			});		
			
			mediaPlayer.show();
		});		
		
		$(themeOptions.playerFullscreen).click(function() {
			$('body').toggleClass('fullscreen-video');
		});
	}	
	
	//Sliders
	$(themeOptions.themexSlider).each(function() {
		var sliderOptions= {
			speed: parseInt($(this).find('.slider-speed').val()),
			pause: parseInt($(this).find('.slider-pause').val()),
			effect: $(this).find('.slider-effect').val()
		};
		
		$(this).themexSlider(sliderOptions);
	});
	
	//Tooltips
	$(themeOptions.toolTip).click(function(e) {
		var tooltipButton=$(this).children(themeOptions.button);
		if(!tooltipButton.hasClass('active')) {
			var tipCloud=$(this).find(themeOptions.toolTipWrap).eq(0);
			if(!tipCloud.is(':visible')) {
				tooltipButton.addClass('active');
				$(themeOptions.toolTipWrap).hide();
				tipCloud.fadeIn(200);
			}
		}
		
		return false;
	});
	
	$(themeOptions.tooltipSwitch).click(function() {
		var tipCloud=$(this).parent();
		while(!tipCloud.is(themeOptions.toolTipWrap)) {
			tipCloud=tipCloud.parent();
		}
		
		tipCloud.fadeOut(200, function() {
			$(this).next(themeOptions.toolTipWrap).fadeIn(200);
		});
		
		return false;
	});
	
	$('body').click(function() {
		$(themeOptions.toolTipWrap).fadeOut(200);
		$(themeOptions.toolTipWrap).parent().children(themeOptions.button).removeClass('active');
	});
	

	
	//Placeholders
	$('input, textarea').each(function(){
		if($(this).attr('placeholder')) {
			$(this).placeholder();
		}		
	});
	
	$(themeOptions.placeholderFields).each(function(index, item){
		item = $(item);
		var defaultStr = item.val();
	
		item.focus(function () {
			var me = $(this);
			if(me.val() == defaultStr){
				me.val('');
			}
		});
		item.blur(function () {
			var me = $(this);			
			if(!me.val()){
				me.val(defaultStr);
			}
		});
	});
	
	//Popup
	if($(themeOptions.popupContainer).length) {
		$(themeOptions.popupContainer).find('a').click(function() {
			if(!$(this).hasClass(themeOptions.noPopupClass)) {
				$(themeOptions.popup).stop().hide().fadeIn(300, function() {
					var popup=$(this);
					window.setTimeout(function() {
						popup.stop().show().fadeOut(300);
					}, 2000);
				});
				return false;
			}			
		});
	}
	
	//Toggles
	$(themeOptions.accordionContainer).each(function() {
		if(!$(this).find(themeOptions.toggleContainer+'.expanded').length) {
			$(this).find(themeOptions.toggleContainer).eq(0).addClass('expanded').find(themeOptions.toggleContent).show();
		}
	});
	
	/*$(themeOptions.toggleTitle).live('click', function() {
		if($(this).parent().parent().hasClass('accordion') && $(this).parent().parent().find('.expanded').length) {
			if($(this).parent().hasClass('expanded')) {
				return false;
			}
			$(this).parent().parent().find('.expanded').find(themeOptions.toggleContent).slideUp(200, function() {
				$(this).parent().removeClass('expanded');			
			});
		}
		
		$(this).parent().find(themeOptions.toggleContent).slideToggle(200, function(){
			$(this).parent().toggleClass('expanded');		
		});
	});*/
  
	$(document).on('click', themeOptions.toggleTitle, function() {
          if ($(this).parent().parent().hasClass('accordion') && $(this).parent().parent().find('.expanded').length) {
              if ($(this).parent().hasClass('expanded')) {
                  return false;
              }
              $(this).parent().parent().find('.expanded').find(themeOptions.toggleContent).slideUp(200, function() {
                  $(this).parent().removeClass('expanded');			
              });
          }
          $(this).parent().find(themeOptions.toggleContent).slideToggle(200, function() {
              $(this).parent().toggleClass('expanded');		
          });
	});

  
  
	
	if(window.location.hash && $(window.location.hash).length) {
		$(window.location.hash).each(function() {
			var item=$(this);
			
			if(item.parent().hasClass('children')) {
				item=$(this).parent().parent();
			}
			
			item.addClass('expanded');
		});
	}
	
	//Tabs
	if($(themeOptions.tabsContainer).length) {
		$(themeOptions.tabsContainer).each(function() {
			
			var tabs=$(this);
		
			//show first pane
			tabs.find(themeOptions.tabsTitles).find('li:first-child').addClass('current');
			
			tabs.find('.tabs li').click(function() {
				//set active state to tab
				tabs.find('.tabs li').removeClass('current');
				$(this).addClass('current');
				
				//show current tab
				tabs.find('.pane').hide();
				tabs.find('.pane:eq('+$(this).index()+')').show();			
			});
		});	
	}
	
	//Submit Button
	$(themeOptions.submitButton).not('.disabled').click(function() {
		var form=$($(this).attr('href'));
		
		if(!form.length || !form.is('form')) {
			form=$(this).parent();
			while(!form.is('form')) {
				form=form.parent();
			}
		}
			
		form.submit();		
		return false;
	});
	
	$('input').keypress(function (e) {
		var form=$(this).parent();
	
		if (e.which==13) {
			e.preventDefault();
			
			while(!form.is('form')) {
				form=form.parent();
			}
			
			
			form.submit();
		}
	});
	
	//Print Button
	$(themeOptions.printButton).click(function() {
		window.print();
		return false;
	});
	
	//Facebook Button
	$(themeOptions.facebookButton).click(function() {
		if(typeof(FB)!='undefined') {
			FB.login(function(response) {
				if (response.authResponse) {
					window.location.reload();
				}
			}, {
				scope: 'email'
			});
		}		
	});
	
	//Image Uploader
	$(themeOptions.userImageUploader).find(themeOptions.button).click(function() {
		$(this).parent().find('input').trigger('click');
		return false;
	});
	
	$(themeOptions.userImageUploader).find('input').change(function() {
		var form=$(this).parent();
		while(!form.is('form')) {
			form=form.parent();
		}
		form.submit();
	});
	
	//Google Map
	$(themeOptions.googleMap).each(function() {
		var container=$(this);		
		var position = new google.maps.LatLng(container.find('.map-latitude').val(), container.find('.map-longitude').val());
		var myOptions = {
		  zoom: parseInt(container.find('.map-zoom').val()),
		  center: position,
		  mapTypeId: google.maps.MapTypeId.ROADMAP
		};
		var map = new google.maps.Map(
			document.getElementById('google-map'),
			myOptions);
	 
		var marker = new google.maps.Marker({
			position: position,
			map: map,
			title:container.find('.map-description').val()
		});  
	 
		var infowindow = new google.maps.InfoWindow({
			content: container.find('.map-description').val()
		});
	 
		google.maps.event.addListener(marker, 'click', function() {
			infowindow.open(map,marker);
		});
	});
	
	//AJAX forms
	for (var form in ajaxForms) {
		var currentForm = ajaxForms[form];
		$(currentForm).each(function() {
			ajaxForm($(this));
		});
	}
	
	//Window Loaded
	$(window).bind('load resize', function() {

	});
	
	//IE Detector
	/*if ( $.browser.msie ) {
		$('body').addClass('ie');
	 }*/
  
	if (navigator.userAgent.indexOf('MSIE') !== -1 || navigator.userAgent.indexOf('Trident') !== -1) {
    	$('body').addClass('ie');
	}

	
	//DOM Elements
	$('p:empty').remove();
	$('h1,h2,h3,h4,h5,h6,blockquote').prev('br').remove();
	
	$(themeOptions.widgetTitle).each(function() {
		if($(this).text()=='') {
			$(this).remove();
		}
	});
	
	$('ul, ol').each(function() {
		if($(this).css('list-style-type')!='none') {
			//$(this).css('padding-left', '1em');
			//$(this).css('text-indent', '-1em');
		}
	});
	
// wp quiz pro add textarea insted of input	
$('[data-type=free_answer] input.wpProQuiz_questionInput').each(function () {
    var style = $(this).attr('style'),
		name = $(this).attr('name'),
		arclass = $(this).attr('class'), 
        textbox = $(document.createElement('textarea')).attr(
					{
						style:style, 
						name:name,
						class:arclass
					}
				);
    $(this).replaceWith(textbox);
});// JavaScript Document
	
$('.plan-description').simpleLoadMore({
  item: '.planli',
  count: 5,
  itemsToLoad: 10,
  btnHTML: '<a href="#" class="load-more__btn"> <i class="fas fa-angle-down"></i> سایر دوره ها ... </a>'
});	
	
});
