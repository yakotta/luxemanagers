/* global $ */

$(document).ready(function() {
    // Autoresize text area boxes with autoresize class
    // https://stackoverflow.com/questions/454202/creating-a-textarea-with-auto-resize
    $('textarea.autoresize').each(function () {
        this.setAttribute('style', 'height:' + (this.scrollHeight) + 'px;overflow-y:hidden;');
    }).on('input', function () {
        this.style.height = 'auto';
        this.style.height = (this.scrollHeight) + 'px';
    });

    // Fixes the header to the top of the page
    $(window).scroll(function(){
        var scrollVar = $(window).scrollTop();
        if (scrollVar > 150) {
            $("body").addClass("fixedtop");
        } else {
            $('body').removeClass('fixedtop');
        }
    });
    
    // Hides and unhides buttons on the testimonial admin page
    $("#admin-page .testimonials button.delete").on("click", function(){
        $(this).closest(".panel").find(".delete-confirm").removeClass("hide");
    });
    
    $("#admin-page .testimonials button.delete-cancel").on("click", function() {
        $(this).closest(".delete-confirm").addClass("hide");
    })
});