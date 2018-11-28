/**
 * turnbull.js
 *
 * Author: Center for Digital Humanities - University of South Carolina.
 * Version: Alpha.
 * Copyright: 2015. All Rights Reserved.
 *
 * Minimum Browser Support:
 * - IE       6.0
 * - Opera    0.0
 * - Chrome   0.0
 * - Safari   5.1
 * - Firefox  1.5
 */

if (document.title.indexOf("Poems") > -1 && $(".panel-turnbull").length) {
  var panels = ["poetical", "burns", "poems", "america", "appendices"];

  for (var i in panels) {
    renderPanel(panels[i]);
  }
} else if (document.title.indexOf("About") > -1) {
  renderFootnotes($("footnote"));
} else if ($("tei").length) {
  // Make some visual adjustments.
  $("tei > text").addClass(document.title.indexOf("References") > -1 ? "col-md-12" : "col-md-6").parent().append("<footnote></footnote>").find("teiheader").remove();

  // Move a note from the hidden <title> tag to the visible <h1> tag.
  if ($("tei > text title").next().is("note")) {
    $(".page-header > div").html("<h1>" + $.trim($("tei > text title").text()) + $("tei > text title").next().get(0).outerHTML + "</h1>");
    $("tei > text title").next().remove();
  } else {
    $(".page-header > div").html("<h1>" + $.trim($("tei > text title").text()) + "</h1>");
  }

  // Declare lines with the number attribute with the number tag.
  $("l[n]").each(function () {
    $(this).append("<number>" + $(this).attr("n") + "</number>");
  });

  renderFootnotes($("tei > footnote"));
} else if (document.title.indexOf("-") === -1) {
  if (platform.name === "IE" && parseFloat(platform.version, 10) < 10) {
    $(".alert").removeClass("hide").find("#browser").text("Internet Explorer").parent().find(".alert-link").attr("href", "http://microsoft.com/ie").find("#version").text("10.0");
  } else if (platform.name === "Opera" && parseFloat(platform.version, 10) < 12) {
    $(".alert").removeClass("hide").find("#browser").text("Opera").parent().find(".alert-link").attr("href", "http://www.opera.com/").find("#version").text("12.0");
  } else if (platform.name === "Chrome" && parseFloat(platform.version, 10) < 4) {
    $(".alert").removeClass("hide").find("#browser").text("Chrome").parent().find(".alert-link").attr("href", "http://www.google.com/chrome/").find("#version").text("4.0");
  } else if (platform.name === "Safari" && parseFloat(platform.version, 10) < 5.1) {
    $(".alert").removeClass("hide").find("#browser").text("Safari").parent().find(".alert-link").attr("href", "https://www.apple.com/safari").find("#version").text("5.1");
  } else if (platform.name === "Firefox" && parseFloat(platform.version, 10) < 5) {
    $(".alert").removeClass("hide").find("#browser").text("Firefox").parent().find(".alert-link").attr("href", "https://mozilla.org/firefox").find("#version").text("5.0");
  } // if (platform.name === "IE" && parseFloat(platform.version, 10) < 10)
} // if (document.title.indexOf("Poems") > -1 && $(".panel-turnbull").length)

/**
 * Gets data from the server via AJAX in HTML format.
 *
 * @param {String} url: The file URL.
 * @param {String} data: The parameters being sent.
 * @param {function} success: Function to be executed upon successful response.
 */
function getFromServer(url, data, success) {
  $.ajax({
    url: "http://lichen.csd.sc.edu/turnbull/v2/" + url,
    data: data,
    dataType: "html",
    success: success,
    error: function (result) {
      console.error("There was an error connecting to the server.\n" + result.responseText);
    }
  });
} // function getFromServer(url, data, success, before)

/**
 * Renders a panel on the collection default page.
 * - This must be a function and not within the for loop due to the callback function
 *   losing grasp of what the id (panels[i]) is within memory.
 *
 * @param {String} id: The unique column identifier.
 */
function renderPanel(id) {
  getFromServer("collections", "getTitles&category=" + id, function (result) {
    $("#" + id + " .panel-body").html(result);
  });
} // function renderPanel(id)

/**
 * Renders footnotes for a page.
 *
 * @param {HTML DOM Element} element: The element to append the footnote.
 */
function renderFootnotes(element) {
  $("note[place='bottom']").each(function () {
    var title = $(this).text();

    // Remove the asterisk or the note number.
    if ((/^\d+$/).test(title.substring(0, 1)) || title.substring(0, 1) === "*") {
      title = title.substring(1);
    } else if ((/^\d+$/).test(title.substring(0, 2))) {
      title = title.substring(2);
    } // if ((/^\d+$/).test(title.substring(0, 1)) || title.substring(0, 1) === "*")

    // Assign the tooltip's attributes.
    $(this).prev().attr({
      "data-toggle": "tooltip",
      "data-placement": "right",
      title: title
    });

    // Append the note to the bottom of the element.
    $(element).append(this.outerHTML);

    // Remove the initial placement of the element.
    $(this).remove();
  });

  // Initialize the tooltip.
  $("[data-toggle='tooltip']").tooltip();
} // function renderFootnotes(element)

/**
 * Toggles visibility on the search form in the navigation area.
 *
 * @param {HTML DOM Event} e: The event happening.
 */
$("#search").click(function (e) {
  if ($("nav form").is(":visible")) {
    $("nav form").hide();
  } else {
    $("nav form").show();
  }

  e.target.blur();
  e.preventDefault();
});

// Initialize all DataTables.
$(".dt").dataTable();
