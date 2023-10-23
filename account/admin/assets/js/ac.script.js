/* Template: UserCenter v1.0.1 @ICO Crypto */
(function($){
	'use strict';
	var $win = $(window), $body_m = $('body'), $navbar = $('.navbar');
	
	// Touch Class
	if (!("ontouchstart" in document.documentElement)) {
		$body_m.addClass("no-touch");
	}
	// Get Window Width
	function winwidth () {
		return $win.width();
	}
	var wwCurrent = winwidth();
	$win.on('resize', function () { 
		wwCurrent = winwidth(); 
	});

	// Sticky
	var $is_sticky = $('.is-sticky');
	if ($is_sticky.length > 0 ) {
		var $navm = $('#mainnav').offset();
		$win.scroll(function(){
			var $scroll = $win.scrollTop();
			if ($win.width() > 991) {
				if($scroll > $navm.top ){
					if(!$is_sticky.hasClass('has-fixed')) {$is_sticky.addClass('has-fixed');}
				} else {
					if($is_sticky.hasClass('has-fixed')) {$is_sticky.removeClass('has-fixed');}
				}
			} else {
				if($is_sticky.hasClass('has-fixed')) {$is_sticky.removeClass('has-fixed');}
			}
		});
	}
	
	// Active page menu when click
	var CurURL = window.location.href, urlSplit = CurURL.split("#");
	var $nav_link = $("a");
	if ($nav_link.length > 0) {
		$nav_link.each(function() {
			if (CurURL === (this.href) && (urlSplit[1]!=="")) {
				$(this).closest("li").addClass("active").parent().closest("li").addClass("active");
			}
		});
	}
    
	// Select
	var $selectbox = $('.input-select, select');
	if ($selectbox.length > 0) {
        $selectbox.each(function() {
			var $this = $(this);
            $this.select2();
		});
	}
    
    
    // Function For Toggle Class On click
    function tglcls(tigger,action,connect,connect2){
        var $toglr = tigger, $tgld = action,$tgcon = connect,$tgcon2 = connect2;
        $toglr.on("click",function(){
            $tgld.toggleClass('active');
            $toglr.toggleClass('active');
            if($tgcon.hasClass('active')){
                $tgcon.removeClass('active');
            }
            if($tgcon2.hasClass('active')){
                $tgcon2.removeClass('active');
            }
            return false;
        });
    }
    var $toggle_action = $('.toggle-action'), 
        $topbar_action = $('.topbar-action'), 
        $toggle_nav = $('.toggle-nav'), 
        $sidebar = $('.user-sidebar'),
        $sidebar_overlay = $('.user-sidebar-overlay');
	if ($toggle_action.length > 0 ) {
		tglcls($toggle_action,$topbar_action,$sidebar,$toggle_nav);
	}
	if ($toggle_nav.length > 0 ) {
		tglcls($toggle_nav,$sidebar,$topbar_action,$toggle_action);
	}
    if ($sidebar_overlay.length > 0 ) {
		$sidebar_overlay.on("click",function(){
            $sidebar.removeClass('active');
            $toggle_nav.removeClass('active');
        });
	}
    if(wwCurrent < 991){
        $sidebar.delay(500).addClass('user-sidebar-mobile');
    }else{
        $sidebar.delay(500).removeClass('user-sidebar-mobile');
    }
    $win.on('resize', function () { 
        if(wwCurrent < 991){
            $sidebar.delay(500).addClass('user-sidebar-mobile');
        }else{
            $sidebar.delay(500).removeClass('user-sidebar-mobile');
        }
	});

    
    
    // Countdown Clock
    var $count_token_clock = $('.token-countdown-clock');
	if ($count_token_clock.length > 0 ) {
		$count_token_clock.each(function() {
			var $self = $(this), datetime = $self.attr("data-date");
			$self.countdown(datetime).on('update.countdown', function(event) {
				$(this).html(event.strftime('' + '<div class="col"><span class="countdown-time countdown-time-first">%D</span><span class="countdown-text">Days</span></div>' + '<div class="col"><span class="countdown-time">%H</span><span class="countdown-text">Hours</span></div>' + '<div class="col"><span class="countdown-time countdown-time-last">%M</span><span class="countdown-text">Minutes</span></div>'));
			});
		});
	}
    
    // Transation Data Table
    var $tranx_table = $('.tranx-table');
    if($tranx_table.length > 0){
       var $tranx_table_fltr = $tranx_table.DataTable({
           "ordering": false,
           autoWidth: false,
           "dom":'<"row"<"col-10 text-left"f><"col-2 text-right"<"data-table-filter dropdown">>><"row"<"col-12"<"overflow-x-auto"t>>><"row"<"col-sm-6 text-left"p><"col-sm-6 text-sm-right"i>>',
           "pageLength": 7, 
           "bPaginate" : $('.data-table tbody tr').length>7,
           "iDisplayLength": 7,
           "language": {
                "search": "",
                "searchPlaceholder": "Type in to Search",
                "info": "_START_ -_END_ of _TOTAL_",
                "infoEmpty": "No records",
                "infoFiltered": "( Total _MAX_  )",
                "paginate": {
                    "first":      "First",
                    "last":       "Last",
                    "next":       "Next",
                    "previous":   "Prev"
                },
            },
        });
        
        $(".data-table-filter").append('');
        
        var $tranx_filter = $('.data-filter');
        $tranx_filter.on('change', function(){
            var _thisval = $(this).val();
            $tranx_table_fltr.columns('.tranx-status').search( _thisval ? _thisval : '', true, false ).draw();
        });
        
    }
    
    // Activity Data Table
    var $activity_table = $('.activity-table');
    if($activity_table.length > 0){
        $activity_table.DataTable({
           ordering: false,
           autoWidth: false,
           dom:'<"row"<"col-12"<"overflow-x-auto"t>>><"row align-items-center"<"col-sm-6 text-left"p><"col-sm-6 text-sm-right text-center"<"clear-table">>>',
           pageLength: 7, 
           bPaginate : $('.data-table tbody tr').length>7,
           iDisplayLength: 7,
           language: {
                info: "_START_ -_END_ of _TOTAL_",
                infoEmpty: "No records",
                infoFiltered: "( Total _MAX_  )",
                paginate: {
                    first:      "First",
                    last:       "Last",
                    next:       "Next",
                    previous:   "Prev"
                },
            },
        });
        $(".clear-table").append('<a href="#" class="btn btn-primary btn-xs clear-activity">Clear Activity</a>');
    }
    
    // Activity Data Table
    var $refferal_table = $('.refferal-table');
    if($refferal_table.length > 0){
        $refferal_table.DataTable({
           ordering: false,
           autoWidth: false,
           dom:'<"row"<"col-12"<"overflow-x-auto"t>>><"row align-items-center"<"col-sm-6 text-left"p><"col-sm-6 text-sm-right text-center"i>>',
           pageLength: 5, 
           bPaginate : $('.data-table tbody tr').length>5,
           iDisplayLength: 5,
           language: {
                info: "_START_ -_END_ of _TOTAL_",
                infoEmpty: "No records",
                infoFiltered: "( Total _MAX_  )",
                paginate: {
                    first:      "First",
                    last:       "Last",
                    next:       "Next",
                    previous:   "Prev"
                },
            },
        });
    }
    
    // Payment Chack (token page) 
    var $payment_check = $('.payment-check'), $payment_btn = $('.payment-btn');
    if($payment_check.length > 0){
        $payment_check.on('change', function(){
            var _thisval = $(this).val(), _thisHash = '#'+_thisval;
            $payment_btn.attr('data-target', _thisHash)
        });
    }
    
    
    // Tooltip
    var $tooltip = $('[data-toggle="tooltip"]');
    if($tooltip.length > 0){
        $tooltip.tooltip();
    }
    
    // Date Picker
    var $date_picker = $('.date-picker');
    if($date_picker.length > 0){
        $date_picker.each(function(){
            $date_picker.datepicker({ 
                format: 'mm/dd/yyyy',
                autoclose: true, 
                todayHighlight: true,
                startView: "0", 
                minViewMode: "0",
            }).datepicker('update', new Date());
        });
    }
    
    // Toggle
    function toggleTab(triger,action,connect){
        triger.on('click',function(){
            action.addClass('active');
            if(connect.hasClass('active')){
                connect.removeClass('active');
            }
            return false;
        });
    }
    
    // Make pay
    var $make_pay = $('.make-pay'),
        $pay_done = $('.pay-done'), 
        $tranx_payment_details = $('.tranx-payment-details'), 
        $tranx_purchase_details = $('.tranx-purchase-details');
    if($make_pay.length > 0){
        toggleTab($make_pay,$tranx_payment_details,$tranx_purchase_details)
    }
    if($pay_done.length > 0){
        toggleTab($pay_done,$tranx_purchase_details,$tranx_payment_details)
    }
    
    // Ath Open
    var $ath_trigger = $('.ath-trigger'), $ath_content = $('.ath-content');
    if($ath_trigger.length > 0){
        $ath_trigger.on('click', function(){
            $ath_content.slideDown();
            return false;
        });
    }
    
    // Dropzone
	var $upload_zone = $('.upload-zone');
	if ($upload_zone.length > 0 ) {
        Dropzone.autoDiscover = false;
		$upload_zone.each(function(){
			var $self = $(this);
			$self.addClass('dropzone').dropzone({ url: "/file/post" });
		});
	}
    
    /*-- @v1.0.1-s */
    // Copyto clipboard
    function feedback (el, state) {
        if (state==='success'){
            $(el).parent().find('.copy-feedback').text('Copied to Clipboard').fadeIn().delay(1000).fadeOut();
        } else {
            $(el).parent().find('.copy-feedback').text('Faild to Copy').fadeIn().delay(1000).fadeOut();
        }
    }
    var clipboard = new ClipboardJS('.copy-clipboard');
    clipboard.on('success', function(e) {
        feedback(e.trigger, 'success'); e.clearSelection();
    }).on('error', function(e) {
        feedback(e.trigger, 'fail');
    });
    
    // Copyto clipboard In Modal
    var clipboardModal = new ClipboardJS('.copy-clipboard-modal', {
        container: document.querySelector('.modal')
    });
    clipboardModal.on('success', function(e) {
        feedback(e.trigger, 'success'); e.clearSelection();
    }).on('error', function(e) {
        feedback(e.trigger, 'fail');
    });
    /*-- @v101-e */
    
    // Color Switcher ( only for demo )
//	var _rimg = '../ico/images/', _rmode = 'RTL Mode', _rurl = './rtl/index.html', icom = '../ico/', icou = '../ico-user/' ;
    
    var _img_r = '../ico/images', _link_r = '../ico/', _link_o ='../ico/landing/', _user_r = './';
	$body_m.append('');
	
    var $dtc =$('.demo-themes,.demo-close'), $dec = $('.demo-content'), $dct = $('.demo-color-toggle'), $dc = $('.demo-color'), $cot = $('.color-trigger');
        // Open/Close Demo List
        if ($dec.length > 0 ) {
            $dtc.on("click", function() {
                $dec.toggleClass('demo-active').css('display', 'block');
                $body_m.toggleClass('shown-preview');
            });
        }
        
        // Toggle Color Switcher
        if ($dct.length > 0 ) {
            $dct.on("click", function() {
                $dc.slideToggle('slow');
            });
        }
        
	if ($cot.length > 0 ) {
		$cot.on("click",function() {
			var $self = $(this);
			var $color_value = $self.attr("title");
			$("#layoutstyle").attr("href", "assets/css/" + $color_value + ".css");
			return false;
		});
	}
    
	$body_m.append('<a target="_blank" href="https://t.me/" class="promo-trigger active"><div class="promo-trigger-img"><i class="fa fa-paper-plane"></i></div><div class="promo-trigger-text">Official Telegram Group</div></a>');
    // Promo Switcher ( only for demo )
	var $pr_tg = $('.promo-trigger'), $pr_cn = $('.promo-content'), $pr_cl = $('.promo-close');
	if ($pr_cl.length > 0 ) {
		$pr_cl.on("click",function() {
            var getCookie = Cookies.get('twz-offer'); 
            $pr_cn.removeClass('active');
            $pr_tg.addClass('active');
            if(getCookie == null){
                Cookies.set('twz-offer', 'true', { expires: 1 , path: ''});
            }
            return false;
		});
	}
    
    $win.on('load', function(){
        var getCookie = Cookies.get('twz-offer'); 
        if(getCookie == null){
            $pr_cn.addClass('active');
        }else{
            $pr_tg.addClass('active');
        }
    });
    
})(jQuery);