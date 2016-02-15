// JavaScript Document

/* clear form field */
function clickclear(thisfield, defaulttext) {
    if (thisfield.value === defaulttext) {
        thisfield.value = "";
    }
}
function clickrecall(thisfield, defaulttext) {
    if (thisfield.value === "") {
        thisfield.value = defaulttext;
    }
}

$(document).ready(function () {
    /* Collapse Expand Script Start */
    $(".content-primary h3").click(function () {
        /*---------- when navigation already open ------------------*/
        if ($(this).next('.contentDesc').is(":visible")) {
            $(this).next('.contentDesc').slideUp(500);
            $('.collapes').addClass('expand').removeClass('collapes');
            $('span.color2', this).addClass('color4').removeClass('color2');
        } else {
            /*---------- when navigation close ------------------*/
            $(".contentDesc").slideUp(500);
            $(this).next('.contentDesc').slideDown(500);
            // $(this).addClass('active');
            $('.collapes').addClass('expand').removeClass('collapes');
            $('.expand', this).addClass('collapes').removeClass('expand');
            $('span.color4', this).addClass('color2').removeClass('color4');
        }
    });


    /* For Sub-Menu */
    $('.menu ul li').hover(function () {
        $('.submenu', this).filter(':not(:animated)').fadeIn(300);
    }, function () {
        $('.submenu', this).fadeOut(100);
    });

    $('.submenu').hover(function () {
        $(this).prev('a').addClass('active');
    }, function () {
        $(this).prev('a').removeClass('active');
    });

    // delete cms pages
    $("a.deletePost").live("click", function (event) {
        event.stopPropagation();

        if (confirm("Do you want to delete?")) {
            var dataid = $(this).data("id")
            //alert("Ok"+dataid);
            $.ajax({
                url: $(this).data("url"),
                type: 'POST',
                data: {"postID": $(this).data("id")},
                success: function (response) {
                    $("#delmsg").css("visibility", "visible");
                    $('<h3>Record Deleted!</h3>').appendTo('#delmsg');
                }
            });
        }
        event.preventDefault();
    });

    //active-deactive category
    $(document).on('click', '.status_checks', function () {
        var status = ($(this).hasClass("fa-unlock")) ? '0' : '1';
        var msg = (status === '0') ? 'Activate' : 'Deactivate';
        var update = (status === '0') ? '1' : '0';

        if (confirm("Are you sure to " + msg)) {
            $.ajax({
                url: $(this).data("url"),
                type: 'POST',
                data: {"catId": $(this).data("id"), "status": update},
                success: function (response)
                {
                    location.reload();
                }
            });
        }
    });

    //delete the category
    $(document).on('click', '.deleteCat', function () {
        if (confirm("Are you sure, you want to delete!")) {
            $.ajax({
                url: $(this).data("url"),
                type: 'POST',
                data: {"catID": $(this).data("id")},
                success: function (response)
                {
                    location.reload();
                }
            });
        }
    });

});


