var host = window.location.host;
function stopBodyScrolling() {
    var totalWidth = window.innerWidth;
    var InnerWidth = document.body.clientWidth;
    var ScrollbarWidth = totalWidth - InnerWidth;
    $("body").css({
        'overflow-y': 'hidden',
        'width': InnerWidth
    });
    $(".overlayWrapper").css({"overflow-y": "scroll"});

    var selectOverlay = $(".overlayWrapper");

    $(selectOverlay).on('scroll touchmove mousewheel', function (e) {
        $("body").bind('scroll touchmove mousewheel', function (e) {
            e.stopPropagation();
        });
    });
}
function resetBodyAndHeader() {
    $("body").css({
        'overflow-y': 'auto',
        'width': '100%'
    });
    $(".overlayWrapper").css({"overflow-y": "hidden"});

    $('body').off('scroll touchmove mousewheel');
}
function recordsShare(type, sid, cid) {

     var formValues = "type=" + type + "&sid=" + sid + "&cid=" + cid;
     var file = "https://www.onlinecouponisland.com/index.php?route=common/header/recordShare";
     $.post(file, formValues,
         function (data) {

         });
}
function CheckEnter(e){var c;return e&&e.which?(e=e,c=e.which):c=e.keyCode,13!=c?!0:void moduleSearch()}function null_field(e){"null"==e?document.getElementById("search1").placeholder="":document.getElementById("search1").placeholder="find your store here! (e.g Dell or Toshiba)"}function search_func(e){$.ajax({type:"POST",url:"https://www.onlinecouponisland.com/index.php?route=common/header/searchresult",data:{search_keyword:e},dataType:"text",success:function(e){$(".resultsearch").html(e),$("html").on("click",function(){$(".resultsearch").empty();});}});}$(".search input").keydown(function(e){13==e.keyCode&&moduleSearch()});
function moduleSearch() {pathArray = location.pathname.split( '/' );url = 'https://www.onlinecouponisland.com/';url += 'storesearch';var search1 = $('input[name=search1]').val();if (search1) {url += '&search=' + encodeURIComponent(search1);}location = url;}
function comment_submit(ths,id) {
  var data = $(ths).closest('.cmntForm').serialize();
  $.ajax({
     url: 'https://www.onlinecouponisland.com/index.php?route=product/couponreview/write&coupon_id='+id,
     type: 'post',
     dataType: 'json',
     data: data,
     beforeSend: function () {
         $(ths).text('loading');
     },
     complete: function () {
         $(ths).text('reset');
     },
     success: function (json) {
         $('.alert-dismissible').remove();

         if (json['error']) {
             $('.review_show_'+id).after('<div class="alert alert-danger alert-dismissible"><i class="fa fa-exclamation-circle"></i> ' + json['error'] + '</div>');
         }

         if (json['success']) {
             $('.review_show_'+id).after('<div class="alert alert-success alert-dismissible"><i class="fa fa-check-circle"></i> ' + json['success'] + '</div>');

             $('input[name=\'name\']').val('');
             $('textarea[name=\'text\']').val('');
         }
     }
  });
}
function disablealldiv() {
    $(".storeLogWrapper").each(function() {
        $(this).hide();
    });
}

// function trunchText(){
//     var showChar = 200; 
//     var ellipsestext = "...";
//     var moretext = "Show more";
//     var lesstext = "Show less"; 

//     $('.trunchText').each(function() {
//         var content = $(this).html();
//         if(content.length > showChar) {

//             var c = content.substr(0, showChar);
//             var h = content.substr(showChar, content.length - showChar);

//             var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morelink">' + moretext + '</a></span>';
//             $(this).html(html);
//         }
//     });

//     $(".morelink").click(function(){
//         if($(this).hasClass("less")) {
//             $(this).removeClass("less");
//             $(this).html(moretext);
//         } else {
//             $(this).addClass("less");
//             $(this).html(lesstext);
//         }
//         $(this).parent().prev().toggle();
//         $(this).prev().toggle();
//         return false;
//     });
// }

function storeText(charlimit){
    var showChar = charlimit; 
    var ellipsestext = "...";
    var moretext = "Show more";
    var lesstext = "Show less"; 

    $('.storeText').each(function() {
        var content = $(this).html();
        if(content.length > showChar) {
          var c = content.substr(0, showChar);
          var h = content.substr(showChar, content.length - showChar);
          var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a href="" class="morestorelink">' + moretext + '</a></span>';
          $(this).html(html);
        }
    });

    $(".morestorelink").click(function(){
        if($(this).hasClass("less")) {
            $(this).removeClass("less");
            $(this).html(moretext);
        } else {
            $(this).addClass("less");
            $(this).html(lesstext);
        }
        $(this).parent().prev().toggle();
        $(this).prev().toggle();
        return false;
    });
}

// function prdDealText(){
//     var showChar = 300; 
//     var ellipsestext = "...";
//     var moretext = "Show more";
//     var lesstext = "Show less"; 

//     $('.prdDealText').each(function() {
//         var content = $(this).html();
//         if(content.length > showChar) {

//             var c = content.substr(0, showChar);
//             var h = content.substr(showChar, content.length - showChar);

//             var html = c + '<span class="moreellipses">' + ellipsestext+ '&nbsp;</span><span class="morecontent"><span>' + h + '</span>&nbsp;&nbsp;<a class="moreanchorlink">' + moretext + '<i class="fa fa-chevron-down" aria-hidden="true"></i></a></span>';
//             $(this).html(html);
//         }
//     });

//      $(".moreanchorlink").click(function(){
//         if($(this).hasClass("less")) {
//             $(this).removeClass("less");
//             $(this).html(moretext+'<i class="fa fa-chevron-down" aria-hidden="true"></i>');
//         } else {
//             $(this).addClass("less");
//             $(this).html(lesstext+'<i class="fa fa-chevron-up" aria-hidden="true"></i>');
//         }

//         $(this).parent().prev().toggle();
//         $(this).prev().toggle();
//         return false;
//     });
// }

function subscribeBrands(e,r,a,s,n){var l=/^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;$("#error").html("");var t=document.getElementById(e);if(""==t.value)t.focus(),t.style.border="1px solid red",alert("Please insert email address!");else if(0==l.test(t.value))t.focus(),t.style.border="1px solid red",alert("Invalid email address");else{var o=$.ajax({url:"https://www.onlinecouponisland.com/index.php?route=common/footer/subscriber_mail",type:"post",data:"work=subscripbe&email="+t.value+"&page_id="+r+"&type="+a+"&link="+s+"&sname="+n,async:!1}).responseText.split("|");"Thank you for weekly subscribe"==o?($("#simple_store_box").text('Thank you for weekly subscribe'),$(".store_box_hide").hide(),setTimeout(function(){$('#subscribePopup').modal('hide')}, 2000)):alert(o)}}

function openRecent(){
  $(".recentSearch").slideDown("fast");
}

function hiderecent(){
  setTimeout(function(){
    $(".recentSearch").hide();
  },500);
}

function createCookie(name,value,days) {
  var expires = "";
  if (days) {
      var date = new Date();
      date.setTime(date.getTime() + (days*24*60*60*1000));
      expires = "; expires=" + date.toUTCString();
  }
  document.cookie = name + "=" + value + expires + "; path=/";
}

function readCookie(name) {
  var nameEQ = name + "=";
  var ca = document.cookie.split(';');
  for(var i=0;i < ca.length;i++) {
      var c = ca[i];
      while (c.charAt(0)==' ') c = c.substring(1,c.length);
      if (c.indexOf(nameEQ) == 0) return c.substring(nameEQ.length,c.length);
  }
  return null;
}

function shoping_search(ths){
  title = $(ths).attr("title");
  title2 = $(ths).attr("data-title");
  href = $(ths).attr("href");
  var data = '{"title":"'+title+'","href":"'+href+'"}';
  var last_no = readCookie("recent_count");
  if(last_no==null || last_no=="" || last_no==0){
    last_no = 1;
  }else{
    last_no = parseInt(last_no);
    last_no++;
  }
  createCookie("recent_srch_"+last_no,data,30);
  createCookie("recent_count",last_no,30);
  return true;
}
function load_recent_search(){
  var recent_count = readCookie("recent_count");
  recent_count = parseInt(recent_count);
  var li = "";
  var count = 0;
  if(recent_count > 0){
    while(true) {
        if(count>3){
            break;
        }
        var data = readCookie("recent_srch_"+recent_count);
        data    = $.parseJSON(data);
        title   = data.title;
        href    = data.href;
        li      = li+"<li><a href='"+href+"'>"+title+"</li>";
        recent_count--;

        if(recent_count <= 0){
            break;
        }

        count++;
    }
    $(".recent_js ul").html(li);                
    $(".recent_js").show();
  }
}
function storeRating(a, b, c) {
  var d = "store=" + b + "&value=" + a + "&ip=" + c;
  $.post("https://www.onlinecouponisland.com/index.php?route=product/manufacturer/storeRating", d, function(a) {
      $("." + b).html(a), $(".ratingCalculator").text(a), console.log(a)
  })
}
$(document).ready(function () {
    // setTimeout(function(){
    //     !function (d, i) {
    //         if (!d.getElementById(i)) {
    //             var j = d.createElement("script");
    //             j.id = i;
    //             j.src = "https://widgets.getpocket.com/v1/j/btn.js?v=1";
    //             var w = d.getElementById(i);
    //             d.body.appendChild(j);
    //         }
    //     }(document, "pocket-btn-js");
    // }, 4000); 
    // if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
    //      $(".whatsapp_item").show();
    // } else {
    //      $(".whatsapp_item").hide();
    // }
    // $('.cstmSldr').slick({
    //     fade: true,
    //     infinite: true,
    //     speed: 1000,
    //     autoplay: true,
    //     dots: false,
    //     arrows: false,
    //     autoplaySpeed: 5000
    // });
    
    $(".inputWrapper input, .inputWrapper textarea").on('focus', function(){
        $(this).next(".bottomBar").addClass("baractive");
    });

    $(".inputWrapper input, .inputWrapper textarea").on('blur', function(){
        $(this).next(".bottomBar").removeClass("baractive");
    });

    // $(".storeTabs").on('click', function(){
    //     $(".storeTabSelected").removeClass("storeTabSelected");
    //     $(this).addClass("storeTabSelected");
    //     var tabIndex = $(this).index();
    //     disablealldiv();
    //     $(".storeLogWrapper").eq(tabIndex).fadeIn("slow");
    // });
    // $('.storeTabs').eq(0).click();

    //trunchText();
    storeText(200);
    //prdDealText();

    $('.breadcrumb span[typeof="v:Breadcrumb"]:last').css("margin-right","20px");
    
    //open close overlay start
    $(".openOverlay").on('click', function(){
        var overlayName = $(this).data("name");
        $("#"+overlayName).fadeIn("slow");
        stopBodyScrolling();
    });
    if($(".overlayContainer:visible").length){
        stopBodyScrolling();
    }
    $(".closeOverlay, .overlayBgReset").on("click ", function (e) {
        resetBodyAndHeader();
        $(".overlayWrapper").fadeOut();
    });
    $(document).keydown(function (e) {
        // ESCAPE key pressed
        if (e.keyCode == 27) {
            resetBodyAndHeader();
            $(".overlayWrapper").fadeOut("fast");
        }
    });

    /*$(document).on('click','.discountWrapper li', function(){
        var getIcon = $(this).find("i");
        $(getIcon).toggleClass("fa-square");
        $(this).next('input').trigger('click');        
    });*/

    // $(document).on('click','span.comments', function(){
    //     var comntBar = $(this).closest('.standardCouponBox').find(".commntSec");
    //     console.log(comntBar);
    //     $(comntBar).slideToggle(); 
    // });
    // $(document).on('click','span.share', function(){
    //     var shareBar = $(this).closest('.standardCouponBox').find(".shrIcnz");
    //     $(shareBar).slideToggle(); 
    // });
    //open close overlay end

    //    $(document).on("click",".radiobuttonIcon", function (e) {
    //        var activeCLass = $(this).find("i").attr("data-activeclass");
    //        $("."+activeCLass).removeClass(activeCLass);
    //        $(this).find("i").addClass(activeCLass);
    //        $(this).children("input").prop('checked', true);
    //    });

    // header.twig
    $(".has-children > a ").on('click', function(e){
        e.preventDefault();
        $(".sideNav").css("margin-left","-270px");
        $(this).next(".sub-nav").css({"opacity":"1","z-index":"44"});
    });
    $(".clossubmenu").on('click', function(e){
        e.preventDefault();
        $('.sideNav').css("margin-left","0px");
        $(this).parent().parent(".sub-nav").css({"opacity":"0","z-index":"33"});
    });

    $('.menu').click(function(){
        $(this).toggleClass('activeMenu');
        if ($(this).hasClass('activeMenu')) {
            $(".mainWrapper").css("margin-left","270px");
            $(".sideMenu").css("left","0px");
        } else {
            $(".mainWrapper").css("margin-left","0px");
            $(".sideMenu").css("left","-270px");
        }
    });

    $(".closmanmenu").on('click', function(e){
        e.preventDefault();
        $(".menu").trigger('click');
    });

    $('#review').delegate('.pagination a', 'click', function(e) {
         e.preventDefault();
         $('#review').fadeOut('slow');
         $('#review').load(this.href);
         $('#review').fadeIn('slow');
     });

    $.each($('.review_show'), function () {
         var id = $(this).data('id');
         $(this).load('https://www.onlinecouponisland.com/index.php?route=product/couponreview&coupon_id='+id);
    });
    
    $(".c_ids").click(function(){$varName=$(this).data("id"),$varmarchat=$(this).data("marchant"),window.open($varmarchat+"?dealscopycode="+$varName),window.location="?r="+$varName}),
    $(".s_ids").click(function(){$varName=$(this).data("id"),$varmarchat=$(this).data("marchant"),window.open($varmarchat+"?dealsshopnow="+$varName),window.location="?r="+$varName}),
    $(".affiliate").click(function(){$varName=$(this).data("id"),window.open("?r="+$varName)});

    // clipboard copy
    var button = document.getElementById("copyCodeBtn");
    if (button) {
      button.addEventListener("click", function (event) {
      event.preventDefault();
        if (navigator.userAgent.match(/ipad|ipod|iphone/i)) {
            var $input = $('#input_output');
            $input.val();
            var el = $input.get(0);
            var editable = el.contentEditable;
            var readOnly = el.readOnly;
            el.contentEditable = true;
            el.readOnly = true;
            var range = document.createRange();
            range.selectNodeContents(el);
            var sel = window.getSelection();
            sel.removeAllRanges();
            sel.addRange(range);
            el.setSelectionRange(0, 999999);
            el.contentEditable = editable;
            el.readOnly = readOnly;
            var successful = document.execCommand('copy');
            $input.blur();
            var msg = successful ? 'successful ' : 'un-successful '; 
            $(".copyCodeButton").siblings(".code").addClass("selectedCode");
            $(".copyCodeButton").text("COPIED"); 
            //console.log("if"+msg);
        }
        else{
            var copyTextarea = document.querySelector('#input_output');
            copyTextarea.select();
            var successful = document.execCommand('copy');
            var msg = successful ? 'successful ' : 'unsuccessful';
            $(".copyCodeButton").siblings(".code").addClass("selectedCode");
            $(".copyCodeButton").text("COPIED");
            //console.log("else"+msg);
        }
      });
    }

    // $(document).on("click", '.share_Facebook', function () {
    //    var sid = $(this).attr("data-store");
    //    var cid = $(this).attr("data-id");
    //    recordsShare("Facebook", sid, cid);
    // });
    // $(document).on("click", '.share_Twitter', function () {
    //    var sid = $(this).attr("data-store");
    //    var cid = $(this).attr("data-id");
    //    recordsShare("Twitter", sid, cid);
    // });

    // $(document).on("click", '.whatsapp', function () {
    //    var text = $(this).attr("data-text");
    //    var url = $(this).attr("data-link");
    //    var sid = $(this).attr("data-store");
    //    var cid = $(this).attr("data-id");
    //    var message = encodeURIComponent(text) + " - " + encodeURIComponent(url);
    //    var whatsapp_url = "whatsapp://send?text=" + message;
    //    window.location.href = whatsapp_url;
    //    recordsShare("WhatsApp", sid, cid);
    // });

    // home slider start
    if ($("#checkforhome").hasClass("homeScreen")) {
      
      // $('.couponSlider').slick({
      //   slidesToShow: 1,
      //   slidesToScroll: 1,
      //   arrows: false,
      //   dots:false,
      //   autoplay:true
      // });
      // $('.couponSlider').show();
      // $('.sliderNav').slick({
      //   slidesToShow: 3,
      //   slidesToScroll: 1,
      //   asNavFor: '.couponSlider',
      //   infinite:false,
      //   arrows: false,
      //   dots: false,
      //   focusOnSelect: true
      // }); 
      // $('.couponSlider').on('afterChange', function(event,slick,i){
      //   $('.sliderNav .slick-slide').removeClass('slick-current');
      //   $('.sliderNav .slick-slide').eq(i).addClass('slick-current');               
      // });
      // $('.sliderNav .slick-slide').eq(0).addClass('slick-current');   
      // $('.next').click(function(){
      //   $(".couponSlider").slick('slickNext');
      //   var nextelement = $(".slick-current").next();
      //   if (nextelement.length) {
      //       $(".slick-current").removeClass("slick-current");
      //       $(nextelement).addClass("slick-current");
      //   }
      // });
      // $('.prev').click(function(){
      //   $(".couponSlider").slick('slickPrev');
      //   var prevelement = $(".slick-current").prev();
      //   if (prevelement.length) {
      //       $(".slick-current").removeClass("slick-current");
      //       $(prevelement).addClass("slick-current");
      //   }
      // });
    }

    // logo offer Box sizing store page
    $('.storepageBox .logo_offer').each(function () {
      var screenWidth = $(window).width();
      if (screenWidth > 640) {
          var getheight = $(this).next(".storeDesc").outerHeight()
          $(this).css("height", getheight);
      } else {
          $(".storepageBox .logo_offer").css("height", "112px");
      }
    });
    $(window).resize(function () {
      var screenWidth = $(window).width();
      if (screenWidth <= 640) {
          $(".storepageBox .logo_offer").css("height", "112px");
      }
    });
    var i = 0;
    $(window).bind("mousewheel", function (t) {
      var screenWidth = $(window).width();
      if (screenWidth >= 720) {
        if (i == 0) {
            var n = $(this).scrollTop();
            if (n > 400) {
                $(".subscriptionLiteBox").fadeIn("show");
            }
        }
      }
    });
    $(".crossIcon").on("click", function () {
      $(".subscriptionLiteBox").fadeOut();
      return i = 1;
    });
    $(".categoryStorePage").on("change", function () {
      $(".t_sales,.t_shipping,.t_codes").hide();
      $("#store_coupons_filters :input:checked").each(function () {
          var n = $(this).val();
           $("."+n).show();
      });
      if($("#store_coupons_filters :input:checked").length<=0){
         $(".t_sales,.t_shipping,.t_codes").show(); 
      }
    });
    $(".categoryEvent").on("change", function () {
      var t = [];
      $("#coupons_filters :input:checked").each(function () {
          var n = $(this).val();
          t.push(n)
      }), 0 == t.length ? $(".resultblock").fadeIn("slow") : $(".resultblock").each(function () {
          var n = $(this).attr("data-tag");
          jQuery.inArray(n, t) > -1 ? $(this).fadeIn("slow") : $(this).hide()
      })
    });
    //$(".category1").on("change",function(){var t=[];$("#coupons_filters :input:checked").each(function(){var n=$(this).val();t.push(n)}),0==t.length?$(".resultblock").fadeIn("slow"):$(".resultblock").each(function(){var n=$(this).attr("data-type");jQuery.inArray(n,t)>-1?$(this).fadeIn("slow"):$(this).hide()})})
    $(".unchecked").on('click', function(){
        $(this).toggleClass("checked");
        $(this).next("input").click();
    });

    $(".RateActive").prevAll("label").css("color", "#16b1ef"), $(document).on("click", ".rating label", function() {
      $(".RateActive").removeClass("RateActive"), $(this).addClass("RateActive"), $(".RateActive").prevAll("label").css("color", "#16b1ef")
    });

    $(".sharcpnradibtn input").on("click", function(){
      var getid = $(this).attr('data-id');
      $(".inptrslt").hide();
      $("#"+getid).show();
    });

    // subscribe page js
    var flag = 0;
    $(document).on('click','.addStrLst li',function(){
        if ($(this).find(".aftrad").css('display') !== 'block') {
            $(this).find("i").fadeOut();
            $(this).find(".aftrad").fadeIn();
            var getstoreid = $(this).find("img").attr("data-id");
            var getstoreimage = $(this).find("img").attr("src");
            var addstoreli = '<li><div class="strlstbx"><input type="hidden" value="'+getstoreid+'" name="store_id[]"/><img src="'+getstoreimage+'"/><i class="fa fa-minus-circle" aria-hidden="true"></i></div></li>';
            $(".storLst").prepend(addstoreli);
            console.log("click");
        }
        //flag = 1;
    });

    $(document).on('click','.checkuncheck',function(){
        if (!$(this).hasClass("fa-check-circle-o")) {
            $(this).removeClass('fa-circle-o').addClass('fa-check-circle-o');
            $(this).next("input").click();
        } else {
            $(this).next("input").click();
            $(this).removeClass('fa-check-circle-o').addClass('fa-circle-o');
        }
    });

    $(document).on('click','.strlstbx i',function(){
        $(this).parent().parent().remove();
    });

    $(".searchIcn").on('click', function(){
      $(".mobsearchPanel").toggle();
    });

    $("#button-newsletter").on("click", function() {
        $.ajax({
            url: "https://www.onlinecouponisland.com/index.php?route=information/subscribe/write",
            type: "post",
            dataType: "json",
            data: $("#form-newsletter").serialize(),
            beforeSend: function() {
                $("#button-newsletter").text("Loading...")
            },
            complete: function() {
                $("#button-newsletter").text("submit")
            },
            success: function(json) {
                $('.alert-success, .alert-danger').remove();

                if (json['error']) {
                    $('#review').after('<div class="alert alert-danger"><i class="fa fa-exclamation-circle"></i> ' + json['error'] + '</div>');
                }

                if (json['success']) {
                    window.location.assign("https://www.onlinecouponisland.com/subscribe?success=1");
                }
            }
        })
    });
    //alert("document ready");
    load_recent_search();
}); 
