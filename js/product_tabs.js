( function( $ ) {
    $.fn.responsiveTabs = function() {
        var container = this;
        container
            .on('show.bs.collapse', '.panel-collapse', function() {
                $(this).addClass('active')
                    .siblings('.panel-collapse').removeClass('active').collapse('hide');
                container.find('.nav-tabs a[href="#' + $(this).attr('id') + '"]').parent().addClass('active')
                    .siblings().removeClass('active');
            })
            .on('show.bs.tab', '.nav-tabs a', function() {
                $($(this).attr('href')).addClass('in')
                    .siblings('.tab-pane').removeClass('in');
            });
    
    
    
    };
    
    // Instanciation
    $(document).ready(function() {
        $('.responsive-tabs').responsiveTabs();
    });

})(jQuery);