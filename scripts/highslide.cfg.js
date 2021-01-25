hs.addSlideshow({
	//slideshowGroup: 'group1',

	interval: 5000,

	repeat: false,

	useControls: true,

	fixedControls: 'fit',

	overlayOptions: {

		opacity: .75,

		position: 'top center',

		hideOnMouseOut: true

	}

});

hs.graphicsDir = '/highslide/graphics/';

hs.captionEval = 'this.thumb.alt';

hs.fadeInOut = true;

hs.outlineType = 'rounded-white';



// Optional: a crossfade transition looks good with the slideshow

hs.transitions = ['expand', 'crossfade'];