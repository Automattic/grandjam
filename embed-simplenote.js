(function ($) {
    var getSimplenoteJSON;

    getSimplenoteJSON = function ( slug ) {
        return $.get( 'https://app.simplenote.com/publish/note/' + encodeURIComponent( slug ) ).promise();
    };

    $(document).ready(function () {
        var $targets;
        $targets = $( '.embed-simplenote' );
        $targets.each( function() {
			var $el, noteId;
			$el = $( this );
            noteId = $el.data( 'id' );
            getSimplenoteJSON( noteId ).done( function( json ) {
                $el.html( json.content );
            } );
        } );
    });
})(jQuery);
