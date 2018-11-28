/**
 * turnbull.js
 *
 * Author: Center for Digital Humanities - University of South Carolina.
 * Version: Beta.
 * Copyright: 2015. All Rights Reserved.
 */

/**
 * Executed when the DOM is ready.
 */
$(document).ready(function () {
  // Unsupported Browsers.
  if (platform.name === "IE" && parseFloat(platform.version, 10) < 9) {
    $("header").css("height", "115px").find(".alert").removeClass("hide").find("> h2").text("Internet Explorer v" + platform.version + " Detected").parent().find("> p > a").prop("href", "http://windows.microsoft.com/en-us/internet-explorer/download-ie").text("upgrade to at least 9.0");
  } else {
    $("header .alert").remove();
  }

  resizeElements();

  var temp = [];
  $("nav li").each(function () {
    if (temp.indexOf($.trim($(this).text())) == -1) {
      temp.push($.trim($(this).text()));
    } else {
      $(this).find("a").html($(this).text() + "<span class='hide'>2</span>").attr("href", $(this).find("a").attr("href") + "2");
    }
  });

  if ((16 <= window.location.pathname.length && window.location.pathname.indexOf("/turnbull/search") > -1) || window.location.pathname.indexOf("/turnbull/search") > -1) {
    renderSearch(window.location.pathname.substring(17));
  } else {
    renderPage();
  }

  $(".fb").fancybox();
});

/**
 * Executed when the window is resizing.
 */
$(window).resize(function () {
  resizeElements();
});

/**
 * Executed when the window goes back.
 */
window.onpopstate = function () {
  if ((16 <= window.location.pathname.length && window.location.pathname.indexOf("/turnbull/search") > -1) || window.location.pathname.indexOf("/turnbull/search") > -1) {
    renderSearch(window.location.pathname.substring(17));
  } else {
    renderPage();
  }
};

/**
 * Render a search query based upon the user's input.
 *
 * @param {HTML DOM Event} e: The event happening.
 */
$("form[role='search']").submit(function (e) {
  var value = $.trim($("form[role='search'] > div > input[type='text']").val());

  if (value === "") {
    $("form[role='search'] > div").addClass("has-error");
  } else {
    var link = "/turnbull/search/" + value.replace(" ", "-").toLowerCase();

    window.history.pushState({
      "Search" : link
    }, "Search", link);

    renderSearch(value);
  }

  e.target.blur();
  e.preventDefault();
});

/**
 * Slides down the poem selection or renders information.
 *
 * @param {HTML DOM Event} e: The event happening.
 */
$("nav").on("click", "li > a", function (e) {
  var href = $(this).attr("href");
  var text = $.trim($(this).text());
  var next = $(this).parent().next();

  if (next.is("ul")) {
    resetNavigation();

    if (!next.is(":visible")) {
      $(this).removeClass("active").parent().find("i").toggleClass("glyphicon-triangle-left glyphicon-triangle-bottom");
      next.slideDown();
    }
  } else if (!$(this).parent().parent().hasClass("has-children")) {
    resetNavigation();
  }

  if (href != "#") {
    $("nav a.active").removeClass("active");
    $(this).addClass("active");

    modifyURL($(this));
    renderPage(text, $(this).data("file"));
  }

  e.target.blur();
  e.preventDefault();
});

/**
 * Render the search page.
 *
 * @param {String} query: The search query.
 */
function renderSearch(query) {
  if (query === undefined || query === null) {
    $("form[role='search'] > div").addClass("has-error");
    return;
  }

  $.ajax({
    url: "/turnbull/",
    type: "GET",
    data: "search=" + query,
    dataType: "html",
    beforeSend: function () {
      resetNavigation();

      $("#main").html("<div class='throbber-holder'><div class='throbber-loader'>Loading...</div></div>");
    },
    success: function (result) {
      $("#main").html(result).find("table").dataTable();

      $("title").text("Search - Turnbull Project");
    },
    error: function (result) {
      $("#main").html("<div class='alert alert-danger'><h2>There was an error connecting to the server.</h2><p>" + result.responseText + "</p></div>");
    }
  });
}

/**
 * Renders the poem visually.
 *
 * @param {String} title: The title of the poem.
 */
function renderPage(title, file) {
  var path = window.location.pathname;

  // Should only occur when first arriving to the website.
  if (path == "/turnbull/" || path == "/turnbull") {
    title = "Home";
  }

  // Should only occur when first arriving to the website via link.
  if (title === undefined || title === null) {
    renderNavigation();
    title = $.trim($("nav a.active").text());
    file = $("nav a.active").data("file");
  }

  if (title === undefined || title === null || title === "") {
    console.error("Title is either undefined, null, or blank. Unable to render page.");
    return;
  }

  $.ajax({
    url: "/turnbull/",
    type: "GET",
    data: "title=" + title + "&file=" + file,
    dataType: "html",
    beforeSend: function () {
      $("#main").empty().html("<div class='throbber-holder'><div class='throbber-loader'>Loading...</div></div>");
    },
    success: function (result) {
      $("#main").empty().html(result);

      // Begin XML cleanup.
      $("body title").each(function () {
        var tag = this.outerHTML.replace(new RegExp("<" + this.tagName, "i"), "<" + "h1");
        tag = tag.replace(new RegExp("</" + this.tagName, "i"), "</" + "h1");

        $(this).replaceWith(tag);
      });

      $("l[n]").each(function () {
        $(this).append("<number>" + $(this).attr("n") + "</number>");
      });

      var bordered = false;
      $("note[place='bottom']").each(function () {
        var title = $.trim($(this).text());
        var place = $(this).prev().is("titler") || $(this).parent().is("titler") ? "bottom" : "right";

        if ((/^\d+$/).test(title.substring(0, 2))) {
          title = title.substring(2);
        } else if ((/^\d+$/).test(title.substring(0, 1)) || title.substring(0, 1) == "*") {
          title = title.substring(1);
        }

        $(this).prev().attr({
          "data-toggle" : "tooltip",
          "data-placement" : place,
          "title" : title
        });

        if (!bordered) {
          $(this).css("border-top", "1px solid #000000");
          bordered = true;
        }

        if ($("#poem").length === 0) {
          $(this).css({
            "margin-right" : "80px",
            "text-align" : "left"
          });
          $("#main > section").append(this.outerHTML);
        } else {
          $("#poem").append(this.outerHTML);
        }

        $(this).remove();
      });

      if ($("lg > l").length !== 0) {
        var width = 0;
        $("lg > l").each(function () {
          $(this).addClass("pull-left");
          $(this).find("number").hide();

          if ($(this).width() > width) {
            width = $(this).width();
          }

          $(this).removeClass("pull-left");
          $(this).find("number").show();
        });

        $("#poem").css("width", (width + 5) + "px");
      }

      if ($("#main titler").length !== 0) {
        var title = $("titler").first();
        $(title.get(0).outerHTML).insertBefore($("#poem"));
        title.remove();

        $("#main p").each(function () {
          $(this).css({
            width : $("#main > .col-xs-12").width(),
            "margin-left" : -(($("#main > .col-xs-12").width() - parseInt($("#poem").css("width"), 10)) / 2) + "px",
            "padding-right" : "20px",
          });

          if ($(this).prop("id") == "before") {
            $($(this).css("margin-left", "0px").get(0).outerHTML).insertBefore($("titler").first());
            $(this).remove();
          }
        });
      }

      $("[data-toggle='tooltip']").tooltip();
    },
    error: function (result) {
      $("#main").empty().html("<div class='alert alert-danger'><h2>There was an error connecting to the server.</h2><p>" + result.responseText + "</p></div>");
    }
  });
}

/**
 * Display a navigational item based on the name.
 *
 * @param {String} title: The name of the navigational item.
 * @param {String} type: The type we should be looking for (text or link).
 */
function renderNavigation() {
  var path = window.location.pathname.split("/");
  var list = $("nav ul[data-url='" + path[path.length - 2] + "']");

  // This means it's the informational navigational items.
  if (list.length === 0) {
    $("nav > ul > li").each(function () {
      var href= $(this).find("a").attr("href").split("/");
      if (href[href.length - 1] === path[path.length - 1]) {
        $(this).find("a").addClass("active");
        return false;
      }
    });
    return;
  } // if (list.length === 0)

  // This means it's a poem.
  list.find("li").each(function () {
    var href = $(this).find("a").attr("href").split("/");
    if (href[href.length - 1] == path[path.length - 1]) {
      $(this).find("a").addClass("active");

      list.slideDown(function () {
        list.animate({
          scrollTop : $("nav .active").position().top - (list.prev().position().top * 1.5) + "px"
        });
      });
      return false;
    } // if (href[href.length - 1] == path[path.length - 1])
  });
}

/**
 * Reset navigation visually.
 */
function resetNavigation() {
  $(".glyphicon-triangle-bottom").toggleClass("glyphicon-triangle-bottom glyphicon-triangle-left");

  $(".has-children:visible").slideUp(function () {
    if ($(this).find("li a.active").length) {
      $(this).prev().find("a").addClass("active");
    }
  });
}

/**
 * Modifies a URL.
 *
 * @param {HTML DOM Element} item: The item to use to modify the URL.
 */
function modifyURL(item) {
  var link = item.attr("href");
  var text = $.trim(item.text());

  if (item.parent().parent().hasClass("has-children")) {
    text = text + " - " + item.parent().parent().prev().text();
  }

  if (text == "Home") {
    $("title").text("Turnbull Project");
  } else {
    $("title").text(text + " - Turnbull Project");
  }

  window.history.pushState({
    text : link
  }, text, link);
}

/**
 * Resize the navigation and #main sections.
 */
function resizeElements() {
  var windowHeight   = outerHeight($("body")) - parseInt($("#main").position().top, 10);

  if (windowHeight < 700) {
    $("#main").css("height", windowHeight);
    $("nav").css({
      height: windowHeight,
      overflow : "auto",
      "background-color" : $("nav > ul").css("background-color")
    });
  } else {
    var navigationItem = outerHeight($("nav li > a").first());
    var navigationFull = navigationItem * $("nav > ul > li").length;

    $("nav > ul > ul").each(function () {
      if ((($(this).find("> li").length * navigationItem) + navigationFull) > windowHeight) {
        $(this).css("height", outerHeight($("body")) - outerHeight($("header")) - navigationFull);
      }
    });

    $("#main, nav > ul").css("height", windowHeight);
  }
}

/**
 * Determine the complete height of an item.
 * - 7/9/15 - Firefox requires '-width' on border-top and border-bottom.
 *
 * @param {HTML DOM Element} item: The item needing its height determined.
 * @return {int}
 */
function outerHeight(item) {
  return parseInt(item.height(), 10) + parseInt(item.css("margin-top"), 10) + parseInt(item.css("margin-bottom"), 10) + parseInt(item.css("padding-top"), 10) + parseInt(item.css("padding-bottom"), 10) + parseInt(item.css("border-top-width"), 10) + parseInt(item.css("border-bottom-width"), 10);
}
