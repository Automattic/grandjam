(function ($) {
    $(document).ready(function () {
        var $targets;
        $targets = $( '.embed-simplenote' );
        $targets.each( function() {
			var $el, noteId;
			$el = $( this );
            noteId = $el.data( 'id' );
            console.log( noteId );
			
        } );
        
    });
})(jQuery);