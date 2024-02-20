import lightGallery from 'lightgallery';
import lgAutoplay from 'lightgallery/plugins/autoplay';
import lgFullscreen from 'lightgallery/plugins/fullscreen';
import lgThumbnail from 'lightgallery/plugins/thumbnail';
import lgVideo from 'lightgallery/plugins/video';
import lgZoom from 'lightgallery/plugins/zoom';

$(function () {
	document.querySelectorAll('.lightGallery').forEach((lightGalleryElement) => {
		lightGallery(lightGalleryElement, {
			licenseKey: "0000-0000-000-0000",
			mode: 'lg-slide',
			plugins: [
				lgAutoplay,
				lgFullscreen,
				lgThumbnail,
				lgVideo,
				lgZoom,
			],
		});
	});
});
