( function( api ) {

	// Extends our custom "freeware" section.
	api.sectionConstructor['freeware'] = api.Section.extend( {

		// No freeware for this type of section.
		attachFreeware: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );
