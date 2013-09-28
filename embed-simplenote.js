(function ($) {
    $(document).ready(function () {
        var $targets;
        $targets = $( '.embed-simplenote' );
        $targets.each( function() {
			var $el;
			$el = $( this );
			$el.html( 'hello world' ); 
			
        } );
        
    });
})(jQuery);