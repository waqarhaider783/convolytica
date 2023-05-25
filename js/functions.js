function scrollhandler() {
  element = document.querySelectorAll(
    "[data-srcset],[data-src], [data-bgimage]"
  );
  for (var i = 0, len = element.length; i < len; i++) {
    if (
      element[i].getBoundingClientRect().top - window.innerHeight <
      window.pageYOffset
    ) {
      if (
        !element[i].dataset.hasOwnProperty("bgimage") &&
        element[i].dataset.hasOwnProperty("src")
      ) {
        element[i].setAttribute("src", element[i].dataset.src);
        element[i].removeAttribute("data-src");
      } else if (element[i].dataset.hasOwnProperty("srcset")) {
        element[i].setAttribute("srcset", element[i].dataset.srcset);
        element[i].removeAttribute("data-srcset");
      } else {
        element[i].removeAttribute("data-bgimage");
      }
    }
  }
}

scrollhandler();
window.addEventListener(
  "scroll",
  (e) => {
    window.requestAnimationFrame(scrollhandler);
  },
  { passive: true }
);

/**
 * @const { Node } sidebar The sidebar element
 */
const sidebar = document.querySelector(".sticky");
if (sidebar) {
  /**
   * Make sidebar scroll to the bottom before implementing sticky
   * behavior on screens shorter than the height of the sidebar
   * @param { Node } ELEMENT
   * @param { Number } PADDING
   * @param { Number } WINDOWHEIGHT
   */
  const handleStickyElement = (ELEMENT, PADDING, WINDOWHEIGHT) => {
    /**
     * @const { Node } header Website header element
     */
    //const _header = document.querySelector(".site-header");
    //const _availableSpace = WINDOWHEIGHT - _header.scrollHeight + 16;
    const _availableSpace = WINDOWHEIGHT + 16;
    if (ELEMENT.scrollHeight > _availableSpace) {
      ELEMENT.style.top = `${
        _availableSpace - ELEMENT.scrollHeight - PADDING
      }px`;
    } else {
      ELEMENT.style.top = "0";
    }
  };
  /**
   * Function to call the sticky handler on window resize
   */
  const handleResize = () => {
    handleStickyElement(sidebar, 10, window.innerHeight);
  };
  /**
   * Invoke the sticky handler function on page load
   */
  handleStickyElement(sidebar, 10, window.innerHeight);
  /**
   * Add an event listener to the window to run this function anytime
   * the window is resized
   */
  window.addEventListener("resize", handleResize);
}

function stopBodyScrolling() {
  var totalWidth = window.innerWidth;
  var InnerWidth = document.body.clientWidth;
  var ScrollbarWidth = totalWidth - InnerWidth;

  $("body").css({
    "overflow-y": "hidden",
    width: InnerWidth,
  });
}

function resetBodyAndHeader() {
  $("body").css({
    "overflow-y": "auto",
    width: "100%",
  });
}

$(window).resize(function () {});

$(document).ready(function () {
  $("body")
    .on("click", ".search-main-box input", function () {
      $(this).closest(".search-top").addClass("active");
      $(this).closest(".searchbar").find(".search-result").addClass("active");
      $(this).closest(".responsive-menu").find(".main-menu").fadeOut("fast");
    })
    .on("click", ".search-result .close-search", function () {
      $(this).closest(".search-top").removeClass("active");
      $(this)
        .closest(".searchbar")
        .find(".search-result")
        .removeClass("active");
      $(".search-main-box input").val("");
      $(this).closest(".responsive-menu").find(".main-menu").fadeIn();
    });

  // For Swiper On About Page
  const myAboutSwiper = new Swiper(".myAboutSwiper", {
    slidesPerView: 3,
    spaceBetween: 30,

    navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
    },
  });

  // function calling for home page slider..
  $(".coupon-box").show();
  $(".sidebar-checkboxes")
    .find("input:radio")
    .on("click", function () {
      var $posts = $(".coupon-box").hide();
      var $elements = $(".sidebar-checkboxes").find("input:checked");

      $posts
        .filter(function () {
          var $post = $(this);
          return $elements.toArray().every(function (element) {
            return $post.hasClass($(element).attr("data-visibility"));
          });
        })
        .show();
      document.dispatchEvent(new Event("scroll", { bubbles: true }));
    });

  //home page accordian starts here...
  $("[data-accordian]").on("click", function (e) {
    $(this).toggleClass("active");
    if ($(this).hasClass("active")) {
      $(this).find("i").removeClass("x_down").addClass("x_up");
    } else {
      $(this).find("i").removeClass("x_up").addClass("x_down");
    }
    var target = $(this).data("accordian");
    $("." + target)
      .stop(true)
      .slideToggle();
  });

  //rating fuction starts here..
  $(".RateActive").prevAll("label").addClass("RateActive"),
    $(document).on("click", ".rate label", function () {
      $(".RateActive").removeClass("RateActive"),
        $(this).addClass("RateActive"),
        $(".RateActive").prevAll("label").addClass("RateActive");
    });

  $(".cids").click(function () {
    var varName = $(this).data("id"),
      varmarchat = $(this).data("marchant");
    window.open(varmarchat + "?copy=" + varName),
      (window.location = "?r=" + varName);
  });

  $(".sids").click(function () {
    var varName = $(this).data("id"),
      varmarchat = $(this).data("marchant");
    window.open(varmarchat + "?deal=" + varName),
      (window.location = "?r=" + varName);
  });

  $(".affiliate").click(function () {
    var varName = $(this).data("id");
    window.open("?r=" + varName);
  });
  // clipboard copy
  var button = document.querySelector(".copyCodeButton");
  if (button) {
    button.addEventListener("click", function (event) {
      event.preventDefault();
      if (navigator.userAgent.match(/ipad|ipod|iphone/i)) {
        var $input = $("#input_output");
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
        var successful = document.execCommand("copy");
        $input.blur();
        var msg = successful ? "successful " : "un-successful ";
        $(".copyCodeButton").siblings(".code").addClass("selectedCode");
        $(".copyCodeButton").text("COPIED");
      } else {
        var copyTextarea = document.querySelector("#input_output");
        copyTextarea.select();
        var successful = document.execCommand("copy");
        var msg = successful ? "successful " : "unsuccessful";
        $(".copyCodeButton").siblings(".code").addClass("selectedCode");
        $(".copyCodeButton").text("COPIED");
        // console.log("else" + msg);
      }
    });
  }
});

//new functions for convolytica

// $("#resources").on("click", function () {
//   $(".resources").toggleClass("active");
// });

//function for features component @homepage

const tabs = document.querySelectorAll("[data-tab-target]");
const tabContents = document.querySelectorAll("[data-tab-content]");

tabs.forEach((tab) => {
  tab.addEventListener("click", () => {
    const target = document.querySelector(tab.dataset.tabTarget);
    tabContents.forEach((tabContent) => {
      tabContent.classList.remove("active");
    });
    tabs.forEach((tab) => {
      tab.classList.remove("active");
    });
    tab.classList.add("active");
    target.classList.add("active");
  });
});

// sidenav functions

$(".menu_icon").click(() => {
  $(".sidenav").toggleClass("active");
  $("body").css("overflow", "hidden");
  $(".overlay").fadeIn();
});

$("body").on("click", ".overlay-menu , .close_menu_btn", function () {
  $(".sidenav").removeClass("active");
  $(".overlay").fadeOut();
  $("body").css("overflow", "auto");
});

//to stop scrollbar while the sidenav opened

$(".sidenav .close, .overlay").click(function () {
  $("body").css({
    "overflow-y": "scroll",
    width: "100%",
  });

  $(".overlay-menu").fadeOut();
  $(".sidenav").removeClass("active");
});

//features tabs functionality

function openFeature(evt, feat) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(feat).style.display = "flex";
  evt.currentTarget.className += " active";
}

//to change the position of privacy line in footer
function changePosition() {
  if (window.innerWidth <= 500) {
    let termsPrivacy = document.querySelectorAll(".terms-privacy")[0];
    let termsPrivac = document.querySelectorAll(".terms-privac")[0];
    let linkList = document.querySelectorAll(".other-links")[0];
    // a.remove();
    linkList.append(termsPrivacy);
    linkList.append(termsPrivac);
  }
}
changePosition();

//function to open resources section in mobile view

// $(".open-resources").on("click", function () {
//   $(".mobile-resources").toggleClass("active");
//   $(this).toggleClass("up-down");
// });

//to change the color of first option in country selector
const updateSelectClass = ({ target }) => {
  if (!target.value) return target.classList.add("empty");
  target.classList.remove("empty");
};

document
  .querySelectorAll("select")
  .forEach((select) => select.addEventListener("change", updateSelectClass));
var swiper = new Swiper(".mySwiper", {
  slidesPerView: 5,
  loop: true,
  centeredSlides: true,
  autoplay: {
    delay: 1000,
  },
  disableOnInteraction: true,
});
var swiper = new Swiper(".teamSwiper .swiper", {
  slidesPerView: 1,
  freeMode: false,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".teamSwiper .swiper-button-next",
    prevEl: ".teamSwiper .swiper-button-prev",
  },
  breakpoints: {
    950: {
      slidesPerView: 3,
    },
    551: {
      slidesPerView: 2,
    },
  },
});
const menuIcon=document.querySelector(".menu_icon");
closeIcon=document.querySelector(".close_menu_btn");
viewMenu=document.querySelector(".view");
menuIcon && menuIcon.addEventListener("click",function(){
    viewMenu && viewMenu.classList.add("active");
});
closeIcon && closeIcon.addEventListener("click",function(){
    viewMenu && viewMenu.classList.remove("active")
});