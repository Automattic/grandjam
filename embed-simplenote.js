(function ($) {
	var getSimplenoteJSON;

	getSimplenoteJSON = function ( slug ) {
		return $.getJSON( 'https://app.simplenote.com/publish/note/' + encodeURIComponent( slug ) ).promise();
	};

	$(document).ready(function () {
		var $targets;
		$targets = $( '.embed-simplenote' );
		$targets.each( function() {
			var $el, noteId;
			$el = $( this );
			noteId = $el.data( 'id' );
			if ( !noteId ) {
				return;
			}
			getSimplenoteJSON( noteId ).done( function( json ) {
				var content, converter;

				content = json.content;
				if ( !content ) {
					return;
				}

				if ( typeof Showdown !== 'undefined' ) {
					converter = new Showdown.converter();
					content = converter.makeHtml( content );
				}

				$el.html( content );
			} );
		} );
	});
})(jQuery);
