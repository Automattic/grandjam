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
			getSimplenoteJSON( noteId ).done( function( json ) {
				var content = json.content;
				content = content.replace( /(\r\n|\n|\r)/g, '<br />' );
				$el.html( content );
			} );
		} );
	});
})(jQuery);
