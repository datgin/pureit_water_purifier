//  
function addClassPopupInBannerImg() {
    var addClassImg = document.querySelectorAll('.sec-banner .popmake figure img');
    if (addClassImg.length > 0) {
        addClassImg.forEach(function (item) {
            item.classList.add('popmake-33');
        });
    }
}

addClassPopupInBannerImg();

jQuery(function ($) {

    function mona_collapse() {
        var mCollapse = $('.m-collapse');
        if (mCollapse) {
            mCollapse.each(function () {
                let $this = $(this);
                let action = $this.find('.collapse-action');
                let content = $this.find('.collapse-content');

                content.hide();
                action.on('click', function (e) {
                    e.preventDefault();
                    content.slideToggle('slow');
                    content.toggleClass('show');
                });
            });
        }
    }
    mona_collapse();

});