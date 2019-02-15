
function gaForceCall(url) {
	if (_gaq) {
		_gaq.push(['_trackPageview', url]);
	}
}

function gaForceCallCallback(url, callback) {
	if (_gaq) {
		_gaq.push(['_trackPageview', url]);
	}
	setTimeout(function(){
		callback();
	}, 300);
}

jQuery.ajaxSetup({
	dataFilter: function (data, dataType) {
		try{
			var dataObj = jQuery.parseJSON(data);
			if (typeof (dataObj.gaEvents) == 'string') {
				eval(dataObj.gaEvents);
				return JSON.stringify(dataObj.DataWrapper);
			}
		}
		catch(e){
		}
		return data;
	}
});


function makeUnselectable(elem) {
	if (elem) {
		elem.onselectstart = function() {
			return false;
		};
		elem.css('-moz-user-select', 'none');
		elem.css('-khtml-user-select', 'none');
		elem.unselectable = "on";
	}
}

function clearSelection() {
	if (document.selection && document.selection.empty) {
		document.selection.empty();
	} else if (window.getSelection) {
		var sel = window.getSelection();
		sel.removeAllRanges();
	}
}

(function($) {

	$.extend({
		preload: function(imgArr, option) {
			var setting = $.extend({
				init: function(loaded, total) {},
				loaded: function(img, loaded, total) {},
				loaded_all: function(imgs, loaded, total) {}
			}, option);

			var total = imgArr.length;
			var loaded = 0;
			var imgList = [];

			function load(elem, total) {
				loaded++;

				$(elem).removeAttr('height');
				$(elem).removeAttr('width');

				setting.loaded(elem, loaded, total);
				if(loaded == total) {
					setting.loaded_all(imgList, loaded, total);
				}
			}

			setting.init(0, total);
			for(var i in imgArr) {
				var new_img = $("<img />");
				imgList.push(new_img
					.attr("src", imgArr[i])
					.bind('error load onreadystatechange', function (){
							//if ($(this).get(0).complete)
								load(this, total);
							//else
							//	$(this).bind('error load onreadystatechange', load(this, total));
						}));
				if (new_img.get(0).complete)
					load(new_img.get(0), total);

			}

		},
		getUrlVars: function() {
			var vars = [], hash;
			var hashes = window.location.href.slice(window.location.href.indexOf('?') + 1).split('&');
			for(var i = 0; i < hashes.length; i++)
			{
				hash = hashes[i].split('=');
				vars.push(hash[0]);
				vars[hash[0]] = hash[1];
			}
			return vars;
		},
		getUrlVar: function(name) {
			return $.getUrlVars()[name];
		},
		getCdnEnabledParam: function(){
			if ($.getUrlVar('cdnEnabled') == '0') {
				return '?cdnEnabled=0';
			}
			return '';
		}
	});
})(jQuery);

/*
 *Script for catching events in the textarea
 */
(function(a) {
	a.event.special.textchange = {setup:function() {
		a(this).data("lastValue", this.contentEditable === "true" ? a(this).html() : a(this).val());
		a(this).bind("keyup.textchange", a.event.special.textchange.handler);
		a(this).bind("cut.textchange paste.textchange input.textchange", a.event.special.textchange.delayedHandler)
	},teardown:function() {
		a(this).unbind(".textchange")
	},handler:function() {
		a.event.special.textchange.triggerIfChanged(a(this))
	},delayedHandler:function() {
		var c = a(this);
		setTimeout(function() {
			a.event.special.textchange.triggerIfChanged(c)
		},
				25)
	},triggerIfChanged:function(a) {
		var b = a[0].contentEditable === "true" ? a.html() : a.val();
		b !== a.data("lastValue") && (a.trigger("textchange", [a.data("lastValue")]),a.data("lastValue", b))
	}};
})(jQuery);


$(function () {

	$("a.newsletterPopup").each(
			function () {
				var self = $(this);
				var page = self.attr("href");
				self.click(
						function () {
							__jQueryModal.ShowModal(
							{
								page: page,
								position: ['center', 250],
								width: 445,
								height: 315,
								title: 'Newsletter signup',
								OnClose: function (retParam) {
									if (retParam)
										window.location = retParam;
								}
							}
									);
							return false;
						}
						);
			}
			);

	$("a.lightbox").each(
			function () {
				var self = $(this);
				self.fancybox();
			});

	$("a.lightbox-scroll").each(
			function () {
				var self = $(this);
				self.fancybox({
					autoScale: false,
					type: 'iframe',
					width: 850,
					height: 520,
					onStart: function () {
						$(document.body).css({ overflow: "hidden" });
					},
					onClosed: function () {
						$(document.body).css({ overflow: "" });
					}
				});
			});

	if ($('.sub-slider .carousel-container').length)
		$('.sub-slider .carousel-container').hcarousel({
			cycle: true,
			scrollLeftButton: '.carousel-prev',
			scrollRightButton: '.carousel-next',
			scrollCount: 1
		});


	var $adsCarousel = $('#ccw_slider_1');
	if ($adsCarousel.length) {
		$adsCarousel.adsCarousel();
	}

	$("[fncClick]").live("click", function () {
		eval($(this).attr("fncClick"));
	});

	$("[placeholder]").placeholder();

	$(".savemodule").replaceWith(function () {
		var objData = JSON.parse($(this).attr("data"));
		return $("#saveButton").tmpl(objData);
	});
	$.ajax({ type: "Get",
		url: "/pages/SaveModule/GetSaved",
		dataType: "json",
		success: function (data) {
			$(".saveBtn2").each(function () {
				var self = $(this);
				if ($.inArray(parseInt(self.attr("item-id")), data.Saved) >= 0)
					self.html("Saved");
			});

			var click = data.Click;
			if (click) {
				var dv = $("#" + click);
				if (dv.length == 0) {
					var tipPrefix = click.split("dvSaveModule_")[0];
					var tip = $("input[type=hidden][name=tip-prefix][value=" + tipPrefix + "]").parent(".ccw-tip");
					if (tip.length > 0)
						tip.trigger('mouseenter', function () { $("#" + click).click(); });
				}
				else {
					dv.click();
				}
			}
		}
	});

	$(document).on("savebutton.saved", ".saveBtn2", null,function (e) {
		var sender = $(e.target);
		var id = sender.attr("id").split("dvSaveModule_")[1];
		var self = $(this);
		if (self.attr("id").indexOf("dvSaveModule_" + id) > -1)
			self.html("Saved");
	});


});

function afterAjaxUpload(elm) {
	$(".input-validation-error", elm).focus();
	$.validator.unobtrusive.parse(elm);
	$("[placeholder]", elm).placeholder();
	$(".savemodule").replaceWith(function () {
		var objData = JSON.parse($(this).attr("data"));
		return $("#saveButton").tmpl(objData);
		}
	);
	$(document).trigger("ccw-ajax:update", elm);
}

function assignAjaxUpload(elmid) {
	$("[fileinputFor=" + elmid + "]").change(function () {
		var upl = $(this).attr("fileinputFor");
		var txt = $("input[type=text][uploadFor=" + upl + "]");
		maxUploadSize
		var error_message = $(this).attr("size-error").replace("{0}", maxUploadSize);
		var format_error_message = $(this).attr("format-error");

		if (typeof FileReader !== "undefined") { // Modern // TODO: ie support via ActiveX
			var size = $(this).get(0).files[0].size;
			if (size > maxUploadSize * 1024 * 1024) {
				popUpHelper.showAlert(
					$('#' + upl),
					error_message,
					{
						alignTo: ['top', 'left'],
						alignAt: ['bottom', 'left'],
						onClose: null
					});
				return;
			}
		}

		$.ajaxFileUpload
				(
				{
					url: '/pages/fileupload/upload?imageOnly=' + $(this).attr("image"),
					secureuri: false,
					fileElementId: upl,
					dataType: 'json',
					success: function (data, status) {
						$('#addItem .loading-progress').hide();
						if (typeof (data.errorCode) != 'undefined') {
							popUpHelper.showAlert($('#' + upl),
							error_message,
							{
								alignTo: ['top', 'left'],
								alignAt: ['bottom', 'left'],
								onClose: null
							});
						}
						else if (typeof (data.Warning) != 'undefined') {
							popUpHelper.showAlert($('#' + upl),
							data.Warning == "NotSupported" ? format_error_message : data.Warning,
							{
								alignTo: ['top', 'left'],
								alignAt: ['bottom', 'left'],
								onClose: null
							});
						}
						else {
							txt.val($('<div />').html(data.FileName).text()).focus();
							$("[uploadedFor=" + upl + "]:hidden").val(true);
						}
						assignAjaxUpload(elmid);

					},
					error: function (data, status, e) {
						$('#addItem .loading-progress').hide();
						txt.val("Error Loading");
						assignAjaxUpload(elmid);
					}
				}
						);
		return false;
	});
}

$("[fileinputFor]").live("change", function () {
	var btn = $(this).attr("fileinputFor");
	$("[uploadFor=" + btn + "]:button").click();
	return false;
});

$(".ccw-star-active").live('hover', function(event) {
	$(this).prevAll().toggleClass("ccw-star-on");
});

$(".fakecheck").live('click', function (event) {
	var chk = $(this).toggleClass("checked").find(":checkbox");
	chk.attr("checked", !chk.attr("checked"));
	return false;
});

$.fn.expandAble = function(params) {
	params = $.extend(
	{
		duration: 300,
		fxType: 'show',
		target: 'nextSibling',
		clbackcls: 'active'
	},
			params
			);

	$(this).each(function() {
		var box = $(this);
		var p_box = null;
		if (params.target.toLowerCase() == 'nextsibling') {
			box.add(box.next()).wrapAll('<div></div>');
			p_box = box.parent();
		}

		box.on('click', function (e) {

            e.preventDefault();
            //e.stopPropagation();

            if (!p_box) return;

			if (params.fxType.toLowerCase() == 'show') {
				p_box.children(':gt(0)').toggle();
			}
			else if (params.fxType.toLowerCase() == 'fade') {
				p_box.children(':gt(0)').fadeToggle();
			}
			else if (params.fxType.toLowerCase() == 'slide') {
				p_box.children(':gt(0)').slideToggle();
			}

			if (params.clbackcls) {
				box.toggleClass(params.clbackcls);
			}
            //return false;
		});
	});
};

$.fn.closeAble = function(params) {
	params = $.extend(
	{
		close_cls: 'close-btn',
		html: '',
		fn: function() {
		}
	},
			params
			);
	return this.each(function() {
		var box = $(this);
		var cls_btn = $('<div class="' + params.close_cls + '">' + params.html + '</div>');
		box.append(cls_btn);
		cls_btn.click(function() {
			params.fn(box);
		});
	});
};

$.fn.ccwGrid = function(params) {
	params = $.extend($.fn.ccwGrid.params, params);

	var box = $(this);
	var box_childs_count = box.children().length;
	var cur_zIndex = box_childs_count + 1;
	var box_height = Math.ceil(box_childs_count / params.maxItems) * ( params.h + params.m );
	box.css({ height: box_height });

	box.children().each(function(k) { // Children positioning
		var e = $(this);


		e.mouseenter(function() {
			obj = [];
			obj[k] = { width: params.e_w };
			if (params.dir === 1) {
				obj[k] = $.extend({ height: params.e_h }, obj[k]);
			}

			$(this).css({ zIndex: cur_zIndex });

			box.children().each(function(j) {
				if (k != j) {
					obj[j] = { width: params.w, height: params.h };

					if ($(this).css('zIndex') == cur_zIndex) {
						$(this).css({ zIndex: cur_zIndex - 1 });
					}
					else {
						$(this).css({ zIndex: 1 });
					}
				}
			}); //each

			box.children().each(function(j) {
				$(this).stop().animate(obj[j], params.duration);
			});
		}); //mouseenter
	}); //children.each

	box.mouseleave(function() {
		$(this).children().each(function(j) {

			var obj = { width: params.w, height: params.h };

			var cur_cell_index = j % params.maxItems;
			var posLeftNew = cur_cell_index * (params.w + params.m);

			if (parseInt($(this).css('left')) != posLeftNew && !$(this).hasClass('r-side')) {
				obj['left'] = posLeftNew;
			}

			$(this).stop().animate(obj, params.duration);
		});
	});
}; //ccwGrid

$.fn.ccwGrid.params = {
	duration: 300, // duration of animation
	maxItems: 3, //max items in a row
	w: 300, //collapsed box width
	h: 250, //collapsed box height
	e_w: 518, //expanded box width
	e_h: 518, //expanded box height
	m: 18, // default margin betwee boxes
	dir: 0 // default expand behaviour: 0 - width, 1 - height + width
};

$.fn.placeChilds = function(params) {
	params = $.extend($.fn.ccwGrid.params, params);

	var box = $(this);
	if (/*!params.box ||*/ !params.name) {
		return false;
	}

	$(params.name, box).each(function(k) {
		var e = $(this);

		var cell_index = k % params.maxItems; // index in row
		var row_index = Math.floor(k / params.maxItems);

		var posLeft = cell_index * (params.w + params.m);
		var posTop = row_index * (params.h + params.m);
		var posRight = params.maxItems % (cell_index + 1) * params.w;

		if (e.hasClass('r-side')) {
			e.css({ right: posRight });
		}
		else {
			e.css({ left: posLeft });
		}

		e.css({ top: posTop });
	});//each
};

$.fn.changeBG = function(el, params) {
	params = $.extend(
	{
		img: '',
		fxType: 'show',
		cssStyle: { backgroundPosition: '50% 0', backgroundRepeat: 'no-repeat' }
	},
			params
			);

	if (!params['img']) {
		if (params.fxType == 'show') {
			$(el).hide().css({ backgroundImage: 'none' });
		}
		else if (params.fxType == 'fade') {
			$(el).fadeOut().css({ backgroundImage: 'none' });
		}
		return true;
	}
};

// Grid links fix preventing links from work
$(document).ready(function () {
	$('.inner-text-box a').click(function(e){
		$(this).closest('.inner-text-box').click();
		e.stopPropagation();
		e.preventDefault();
	});
});


$(document).ready(function () {
	$(".closeAble").closeAble();

	var VEIL_AUTO_SHOW_DELAY = 1000;

	var VEIL_FADE_IN_DURACITY = 1500;
	var VEIL_SHOW_DURACITY = 4000;
	var VEIL_FADE_OUT_DURACITY = 1000;

	var $colin_btn = $('#colin-btn');
	var $veil = $('#veil');
	var $close_btn = $veil.find('.close-btn');

	var veil_shown = false;
	var autotimeout;
    var adAutoRefreshTimeout;
    var adRefreshTimeout;

	if ($veil.length) {


		$colin_btn.show();
		// preload veil
		var veil_height;
		var is_my_collection = ($('#content > .my-collection').length != 0);

		function show_veil(autohide) {
			clearTimeout(autotimeout);
			veil_shown = true;

			//TODO: change to the image
			$colin_btn.addClass("on");

			$veil.show();
			if (!veil_height) {
				veil_height = $veil.height();
				if (is_my_collection)
					$veil.css({ height: 0});
				$veil.hide();
			}
			$veil.css({ display: 'block', opacity: 0.0});
			var an_style;

			if (is_my_collection)
				an_style = {opacity: 1.0, height: veil_height, marginBottom: 20 };
			else
				an_style = {opacity: 1.0};

			$veil.stop().animate(an_style, {
				queue: false,
				duration: VEIL_FADE_IN_DURACITY,
				complete: function () {
					if (autohide)
						autotimeout = setTimeout(hide_veil, VEIL_SHOW_DURACITY);
				}
			});
		}

		function hide_veil() {
			veil_shown = false;
			$colin_btn.removeClass("on");

			var an_style;

			if (is_my_collection)
				an_style = { opacity: 0, height: 0, marginBottom: 0 };
			else
				an_style = { opacity: 0 };

			$veil.stop().animate(an_style, {
				queue: false,
				duration: VEIL_FADE_OUT_DURACITY,
				complete: function () {
					$veil.css({ display: 'none'});
				}
			});
		}

		function toggle_veil() {
			if (!veil_shown)
				show_veil(false);
			else
				hide_veil();
		}

		// auto show needed
		if ($veil.attr("notshowonopen") != 'true') {
			autotimeout = setTimeout(function () {
				show_veil(true);
			}, VEIL_AUTO_SHOW_DELAY);
		}

		$colin_btn.click(toggle_veil);
		$close_btn.click(hide_veil);

	} else
		$colin_btn.hide();

	var thumb_wrapper = $(".homepage.thumbs.big .list-wrapper");
	var thumb_big = $(".homepage.thumbs.big");
	thumb_big.css({ height: Math.ceil($(".list-item", thumb_wrapper).length / 3) * (250 + 18) });
	thumb_wrapper.css({ height: (thumb_wrapper_height = Math.ceil($(".list-item", thumb_wrapper).length / 3) * (250 + 18)) });

	if ($(".homepage.thumbs.big").length) {
		thumb_wrapper.placeChilds({ name: '.list-item' });
		$(".homepage.thumbs.big .boxes-4").ccwGrid({ dir: 1 });
	}

	$('#fancybox-wrap').draggable();
	if ($('.page-navigation').length)
		makeUnselectable($('.page-navigation'));
	//if ($('.collection-slider-overlay').length)
	//	makeUnselectable($('.collection-slider-overlay'));

	if ($('.photo-workarea').length)
		makeUnselectable($('.photo-workarea'));

    if ($('.details-slider-container').length) {
        makeUnselectable($('.details-slider-container ul'));
        makeUnselectable($('.details-slider-container .left-arrow a'));
        makeUnselectable($('.details-slider-container .right-arrow a'));
    }
    
	var box;
	if ((box = $(".inspireMe .thumbs.sub-slider .sub-slide-container")).length) {
		var p_box = box.parent();
		box.children().mouseenter(function () {
			p_box.css({ height: 300 });
		});

		box.children().mouseleave(function () {
			p_box.css({ height: '' });
		});

		makeUnselectable($(".thumbs"));
	}

	box = null;
	if ((box = $(".sub-nav.article-sub .nav")).length) {
		(function () {
			box.scrollAble();
			makeUnselectable(box);
		})();
	}

    if ($(".whats-new .block-container.scrollable").length) {
        $(".whats-new .block-container.scrollable").jScrollPane({
            showArrows: false,
            animateScroll: true
        });
    }

    if ($(".add-item-wrapper .browse").length) {
		$(".add-item-wrapper .browse").hover(
				function () {
					$(".browse .btn.save").addClass("btnhover");
				}).mouseleave(function () {
					$(".browse .btn.save").removeClass("btnhover");
				});
	}

	$(".pop.save select").live("change", function () {
		if ($(".pop.save select option:selected").text() != "Me")
			$(".showTell-wrapper").hide();
		else
			$(".showTell-wrapper").show();
	});

	/* shared ads */
    $(document).bind('notify.autoplay', function () {
        $(document).data('is-autoplay', true);
        $(document).data('autoplay-counter', 0);
        clearInterval(adAutoRefreshTimeout);
        adAutoRefreshTimeout = setInterval(function () {
            $('.ads-autoupdate').trigger('update.adframe');
        }, 1000);
    });

    $(document).bind('notify.autoplay-stop', function () {
        $(document).data('is-autoplay',false);
        $(document).data('autoplay-counter', 0);
        clearInterval(adAutoRefreshTimeout);
    });

    $(document).on('click', function(){
        if ($(document).data('is-autoplay')) {
            $(document).trigger('notify.autoplay');
        }
    });

    $(document).bind('update.adframe', function () {
        if ($(document).data('can-update')) {

            $(document).data('can-update', false);
            var ad_params_array = window.location.pathname.split("/");
            if (window.location.hash) {
                var hash_params = window.location.hash.split("#")[1].split("/");
                for (var i = 0; i < hash_params.length; i++) {
                    if (hash_params[i]) {
                        ad_params_array.pop();
                        ad_params_array.push(hash_params[i]);
                    }
                }
            }

            ad_params_array.push(Math.floor(Math.random() * 99999999) + 1);
            ad_params_array = ad_params_array.reverse();
            $('.ads-autoupdate').each(function () {

                var $repeat_data = $(this);
                var $ad_block = $repeat_data.parent();
                var $ad_frame = $ad_block.find('iframe');

                var s_url_template = $ad_block.find('.ads-url').val();
                var i_interval = $repeat_data.val();

                if (i_interval < 5)
                    i_interval = 5;


                $ad_frame.attr('src', $.validator.format(s_url_template, ad_params_array));

            });

            if ($(document).data('is-autoplay')) {
                var counter = $(document).data('autoplay-counter');
                if (counter > 2) {
                    clearInterval(adAutoRefreshTimeout);
                } else
                    $(document).data('autoplay-counter', counter + 1);


                adRefreshTimeout = setTimeout(function () {
                    $(document).data('can-update', true);
                }, 20000);
            }
            else
            {
                adRefreshTimeout = setTimeout(function () {
                    $(document).data('can-update', true);
                }, 20000);
            }

            gaForceCall(window.location.pathname + '?refresh=true');

        }

    });


    adRefreshTimeout = setTimeout(function () {
        $(document).data('can-update', true);
    }, 20000);

/* tips */

	var colors = ['#B2BB1E', '#9C8DC3', '#13B5ea', '#F37321', '#EB4489'];
	$('.colin-tip').each(function () {
		this.bgcss = { backgroundColor: colors[Math.floor(Math.random() * 5)] };
	});

	$('.tip-close').live('click', function () {
		$(this).closest('.tip-popup').stop(true, true).fadeOut(500).removeClass('active');
	});

	var antipropagate = function (e) {
		e.stopPropagation();
	};

	$('.ccw-tip').click(antipropagate);
	$('.tip-popup').live('click', function (e) {

		if (!$(e.target).hasClass('saveBtn2'))
			e.stopPropagation();

	});

	$(document).click(function (event) {
		if ((!$(event.target).hasClass('saveBtn2') || !$(event.target).closest('.tip-popup').length)
				&& ($(this).hasClass('.popup-dialog-box') || !$(event.target).closest('.popup-dialog-box').length))
		$('.tip-popup.active').stop(true, true).fadeOut(500).removeClass('active');
	});

	$('.ccw-tip').mouseenter(function (event, callback) {
		var tip_icon = this;
		$(tip_icon).parent().css({ 'z-index': 1, 'position': 'relative' });

		this.tip_tm = setTimeout(function () {
			$('.tip-popup.active').stop(true, true).fadeOut(500).removeClass('active');

			var category;
			if ($(tip_icon).hasClass('colin-tip'))
				category = 'Colin Tip';
			else
				category = 'Editorial Tip';

			var title = $(tip_icon).find('input[name="title"]').val();
			var id = $(tip_icon).find('input[name="tip-id"]').val();
			var prefix = $(tip_icon).find('input[name="tip-prefix"]').val();

			var $popup_body;

			function show_popup($popup_body) {
				if (!$popup_body.hasClass('active')) {

					$popup_body.detach().insertAfter('#footer');

					var left = $(tip_icon).offset().left - $('#content').offset().left - $popup_body.outerWidth();
					if (left < 0)
						left = $(tip_icon).offset().left - $('#content').offset().left + $(tip_icon).outerWidth();

					$popup_body.css({
						top: $(tip_icon).offset().top - $popup_body.innerHeight() / 2,
						left: left
					});


					$popup_body.stop(true, true).addClass('active').fadeIn(1000, callback);

					_gaq.push(['_trackEvent', category, 'Open ' + title, window.location.href, 0, true]);
				}
			}

			if (tip_icon.$popup === undefined) {

				//$popup_body = $(tip_icon).find('.tip-popup');
				$.get('/pages/Tips/Detail/' + id + '?prefix=' + prefix, function (data) {

					$popup_body = $(data);
					$popup_body.find(".savemodule")
						.replaceWith(function () {
							var objData = JSON.parse($(this).attr("data"));
							return $("#saveButton").tmpl(objData);
						});
					if (tip_icon.bgcss)
						$popup_body.find('.internal').css(tip_icon.bgcss);
					tip_icon.$popup = $popup_body;
					show_popup($popup_body);
				});

			} else {
				$popup_body = tip_icon.$popup;
				show_popup($popup_body);
			}

		}, 500);

	}).mouseleave(function () {
		clearTimeout(this.tip_tm);
		$(tip_icon).parent().removeAttr('style');
	});


    // Custom url tracking

    // for all links on the page
    $('a').live('mouseup', function(e){

		if (e.button > 1 )
			return true; // not left or middle button

        if ((this.href.indexOf("http:") == 0 || this.href.indexOf("https:") == 0) && this.href.indexOf(location.host) == -1){
            try {
                _gaq.push(['_trackEvent', 'ExternalLink', 'Click', this.href]);
            } catch(err){}
		}

		return true; // go on for internal link
    });

	//all pages up arrow
	var $scroll_top_arrow = $('#content .scroll-top-page');
	if ($scroll_top_arrow.length){
		$scroll_top_arrow.css({opacity:0}); //for ie browsers
		var showed = false;

		function show_hide_arrow(){
			var h = $(window).height();
			var scroll_top = $(window).scrollTop();
			var margin_left = 30;

			if (scroll_top>=150){
				if (!showed && $(window).width() >= 1130){
					$scroll_top_arrow.animate({opacity:1},{duration: 300,queue:false});
					$scroll_top_arrow.css({bottom:0, right: ($(window).width() - $scroll_top_arrow.parent().width())/2 - $scroll_top_arrow.outerWidth() - margin_left});
					showed = true;
				}else{
					if ($(window).width() >= 1130)
						$scroll_top_arrow.css({opacity:1, bottom:0, right: ($(window).width() - $scroll_top_arrow.parent().width())/2 - $scroll_top_arrow.outerWidth()- margin_left});
					else
						$scroll_top_arrow.animate({opacity:0},{duration: 300,queue:false});
				}
			}else{
				if (showed)
					$scroll_top_arrow.animate({opacity:0},{duration: 300,queue:false});

				showed = false;
			}
		}

		$(window).scroll(function(){
			show_hide_arrow()
		});
		$(window).resize(function(){
			show_hide_arrow()
		});

		$scroll_top_arrow.on('click', function(){
			$('html,body').animate({scrollTop:0}, 200);
		});

	}

	// Invite friends validation helper
	$(document).on('click', '.invalid-text-field', function(){
		$(this).hide();
		$(this).prev().focus();
	});

    $(document).on('click', '.text-box.multi-line', function(){
        if ($(this).next().hasClass('invalid-text-field'))
            $(this).next().hide();
        $(this).next().focus();
    });

    setInterval(function(){

        $('.char-limited').each(function() {
            var $this = $(this);
            var limit = $this.attr('data-char-limit');
            var ellipsis = $this.attr('data-char-ellipsis');
            if (!limit)
                limit = 12;
            if (!ellipsis)
                ellipsis = "...";

            var initialText = $this.text();
            if (initialText.length > limit) {
                var trimmedText = initialText.substring(0, limit - 4);
                trimmedText += ellipsis;
                $this.text(trimmedText);
            }
        });
    }, 100);

    //gelleries promo block

    $('#wrapper').on('mouseover','.promoblock.find-more .thumbs a', function(){
        var $promo_item_title = $('.promoblock.find-more .title');
        $promo_item_title.html($(this).find('img').data('title'));
        $promo_item_title.show();
    });

    $('#wrapper').on('mouseout','.promoblock.find-more .thumbs a', function(){
       var $promo_item_title = $('.promoblock.find-more .title');
       $promo_item_title.hide();
   });

    if ($('.search .search-img-promotion').length > 0
            && $('.search .search-img-promotion').find('img').length > 0) {
        var $promoImg = $('.search .search-img-promotion').find('img');
        var src = $promoImg.attr('src');
        var srcHover = $promoImg.attr('rel');
        var imageTitle = $promoImg.attr('title');
        _gaq.push(['_trackEvent', 'Promotion Viewed', imageTitle, document.location.href]);
        $promoImg.on('click', function() {
            _gaq.push(['_trackEvent', 'Promotion Clicked', imageTitle, document.location.href]);
        });

        $promoImg.on('hover',
                function() {
                    $(this).attr('src', srcHover);
                }).on('mouseleave', function() {
            $(this).attr('src', src);
        });
    }
    // top ads
    var $close_btn_push_ads = $('.top-ads .close-tab');
    if ($('.top-ads').length > 0){
        var $ads_block = $('.top-ads');
        var margin_top = $ads_block.find('.ads-box').outerHeight() + 17;
        var margin_wrapper = margin_top + 25;

        var margin_bg_closed = 3;
        var margin_top_body = margin_top;

        /*if($('html').hasClass('ie7')){
            margin_bg_closed += 17;
            margin_top_body += 17;
        }*/

        if ($('html').hasClass('gecko'))
			$('body').css({backgroundPosition:'50% '+margin_bg_closed});
		else
        	$('body').css({'background-position-y':margin_bg_closed});

		$('#wrapper').css({top: -margin_wrapper});

        $ads_block.css({top: -margin_top});

        $close_btn_push_ads.on('click',function(){
            if ($(this).hasClass('closed')){
                $ads_block.animate({top:0}, {queue: false,duration: 300,
                    complete: function () {
                        $close_btn_push_ads.removeClass('closed');
                    }
                });
                // add src to iframe
                var $change_ad_frame = $ads_block.find('iframe');
                if ($change_ad_frame.attr('src') == ''){
                    var ad_url = $change_ad_frame.attr('rel');
                    $change_ad_frame.attr('src', ad_url);
                }
				if ($('html').hasClass('gecko'))
                	$('body').animate({backgroundPosition:'50% ' + margin_top_body}, {queue: false,duration: 300});
                else
					$('body').animate({'background-position-y':margin_top_body}, {queue: false,duration: 300});

                $('#wrapper').animate({top: -25}, {queue: false,duration: 300});
            }else{
                $ads_block.animate({top: -margin_top}, {queue: false,duration: 300,
                    complete: function () {
                        $close_btn_push_ads.addClass('closed');
                    }
                });
				if ($('html').hasClass('gecko'))
               		$('body').animate({backgroundPosition:'50% '+margin_bg_closed},  {queue: false,duration: 300});
                else
					$('body').animate({'background-position-y':margin_bg_closed},  {queue: false,duration: 300});

                $('#wrapper').animate({top: -margin_wrapper}, {queue: false,duration: 300});

                $.cookie('TopPushAds', 1, { path: '/'});
            }

        });
    }
    //if not have cookie
    if (!$.cookie('TopPushAds', {path: '/'}))
        $close_btn_push_ads.click();

	//rss
    if ($('.rss-list').length > 0){
        var $rss_list = $('.rss-list');
        $rss_list.find('.collable .cat-name').on('click',function(){
            var $li_elem = $(this).closest('li');
            var $sublist = $li_elem.find('.text');

            if ($li_elem.hasClass('active')){
                $sublist.hide();
                $li_elem.removeClass('active');
            }else{
                $sublist.show();
                $li_elem.addClass('active');
            }
        });
    }

});   //jquery

/*newsletter*/
function signUpPopupDel(obj){
	var $container = $(obj);
	$container.find('.msg').hide();
	$container.find('.newsletter-form').show();
}

function signUp(obj) {
	var $newsletter_signup = $('.newsletter-signup');
	var $container = $(obj).parent();

	var $email = $container.find('.emailnews');

	var json = '{email:"' + $email.val() + '"}';

	$.ajax({ type: "POST",
		url: "/newsletter/signup",
		data: json,
		contentType: "application/json;charset=utf-8",
		dataType: "json",
		async: false,
		timeout: 5000,

		success: function (response) {
			if (!response.Success){
				$container.find('.newsletter-form').hide();

				$container.find('.newsletter-ierror.msg .title').html(response.Title);
				$container.find('.newsletter-ierror.msg p').html(response.Message);

				$container.find('.newsletter-ierror').show();
			}
			else{
				trackUnitClickedEvent('Newsletter Promo', 'Successful Sign Up');
				if ($container.hasClass('newsletter-unit')){
					popUpHelper.showAlert($(obj), $container.find('.newsletter-thank').html(), {
						alignTo: ['bottom', 'left'],
						alignAt: ['bottom', 'left'],
						contentClass: "newsletter",
						deleteBtnClass: "white",
						//hideTime: 2500,
						onClose: null
					});
				}
				else{
					$container.find('.newsletter-form').hide();
					$container.find('.newsletter-thank').show();
				}
			}


				//alert('error');
			//$container.find('.newsletter-form').hide();
			// succsess
			//$container.find('.newsletter-thank').show();
			// internal error
			//$container.find('.newsletter-ierror').show();
			// invalid email
			//$container.find('.newsletter-iemail').show();
			// email already subscribed
			//$container.find('.newsletter-semail').show();
		}
	});

	/*$.ajax({ type: "Get",
		url: "/newsletter/success",
		dataType: "text/html",
		async: false,
		timeout: 5000,

		complete: function (response, $email) {
			var $newsletter_submit = $('.newsletter-form input[type=submit]');
			popUpHelper.showAlert($newsletter_submit, response.responseText, {
				alignTo: ['bottom', 'left'],
				alignAt: ['bottom', 'left'],
				contentClass: "newsletter",
				//hideTime: 2500,
				onClose: null
			});
		}
	});*/
}

function trackUnitViewedEvent(action, label){
	$(document).ready(function() {
		if (_gaq) {
			var category = _unitCategoryRoot + '. Viewed';
			_gaq.push(['_trackEvent', category, action, label, 0, true]);
		}
		//subscribe for munit links
		$('a.munit').mouseup(function(e) {
			if (e.button > 1 )
				return true; // not left or middle button
			trackUnitClickedEvent($(this).attr('eventAction'), $(this).attr('eventLabel'));
			return true; // go on for internal link
		});
	});
}

function trackUnitClickedEvent(action, label){
	if (_gaq) {
		var category = _unitCategoryRoot + '. Clicked';
		_gaq.push(['_trackEvent', category, action, label, 0, true]);
	}
}

function roadblockGoBack() {
	var referrer = document.referrer;
	var lhost = window.location.host.toString();
	if (referrer.length > 0 && referrer.indexOf(lhost) > -1 && referrer.indexOf(lhost) <= 8) {
		window.location = referrer;
	}
	else {
		window.location = '/';
	}
}

//jQuery.html() escaped some char in href attribute of copied links
$.fn.oldHtml = $.fn.html;
$.fn.html = function (html) {
	var self = $(this);
	if (html === undefined) {
		function SpecialChars(content, isEscape) {
			content.children("a").each(
				function () {
					var self = $(this);
					var currentHref = self.attr("href");
					self.attr("href", isEscape ? escape(currentHref) : unescape(currentHref));
				});

		}
		SpecialChars(self, true);
		var ret = unescape(self.oldHtml());
		SpecialChars(self, false);
		return ret;
	}else if($.isFunction(html)){
		return self.oldHtml(html)
	}

	else {
		return self.oldHtml(html);
	}
}

$.fn.getAttributes = function () {
	var attributes = {};

	if (!this.length)
		return this;

	$.each(this[0].attributes, function (index, attr) {
		attributes[attr.name] = attr.value;
	});

	return attributes;
}

if ($.tmpl) {
	$.extend($.tmpl.tag, {
		"var": {
			open: "var $1;"
		}
	});
}
