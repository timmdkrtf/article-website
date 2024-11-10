$(function () {
    "use strict";
    var url = window.location.href; // Get the current URL

    // Check if the current URL contains '/create-article'
    if (url.indexOf('/create-article') !== -1) {
        // Add 'active' class to the 'Article' sidebar item and remove 'd-none' class
        $("a[href='/article']").addClass("active");
        $("a[href='/article']").parent().removeClass("d-none");
    } else {
        // Your existing code for selecting active sidebar items
        var element = $("ul#sidebarnav a").filter(function () {
            return this.href === url;
        });
        // Add 'active' class to the appropriate sidebar items
        element.parentsUntil(".sidebar-nav").each(function (index) {
            if ($(this).is("li") && $(this).children("a").length !== 0) {
                $(this).children("a").addClass("active");
                $(this).parent("ul#sidebarnav").length === 0 ?
                    $(this).addClass("active") :
                    $(this).addClass("selected");
            } else if (!$(this).is("ul") && $(this).children("a").length === 0) {
                $(this).addClass("selected");
            } else if ($(this).is("ul")) {
                $(this).addClass("in");
            }
        });
        element.addClass("active");
    }

    // Your existing click event handler for sidebar items
    $("#sidebarnav a").on("click", function (e) {
        if (!$(this).hasClass("active")) {
            // hide any open menus and remove all other classes
            $("ul", $(this).parents("ul:first")).removeClass("in");
            $("a", $(this).parents("ul:first")).removeClass("active");

            // open our new menu and add the open class
            $(this).next("ul").addClass("in");
            $(this).addClass("active");
        } else if ($(this).hasClass("active")) {
            $(this).removeClass("active");
            $(this).parents("ul:first").removeClass("active");
            $(this).next("ul").removeClass("in");
        }
    });
    $("#sidebarnav >li >a.has-arrow").on("click", function (e) {
        e.preventDefault();
    });
});
