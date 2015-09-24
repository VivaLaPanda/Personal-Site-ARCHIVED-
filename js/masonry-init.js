$(document).ready(function () {

    $('.blog-entry-grid').masonry({
        itemSelector: '.blog-grid-item',
        columnWidth: '.blog-grid-sizer',
        gutter: '.blog-gutter-sizer',
        percentPosition: true
    });

});