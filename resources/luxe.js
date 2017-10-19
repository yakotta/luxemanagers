$(document).ready(function() {
    var year = new Date();
    $("footer .site_date").text(year.getFullYear());

    // Autoresize text area boxes with autoresize class
    // https://stackoverflow.com/questions/454202/creating-a-textarea-with-auto-resize
    $('textarea.autoresize').each(function () {
        this.setAttribute('style', 'height:' + (this.scrollHeight) + 'px;overflow-y:hidden;');
    }).on('input', function () {
        this.style.height = 'auto';
        this.style.height = (this.scrollHeight) + 'px';
    });

    $(window).scroll(function(){
        var scrollVar = $(window).scrollTop();
        if (scrollVar > 75) {
            $('header').addClass('fixedtop');
        } else {
            $('header').removeClass('fixedtop');
        }
    });
});