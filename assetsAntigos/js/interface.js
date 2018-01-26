function Interface() {
	//registra variáveis globais;
	var g_Usuario = false;

	this.isTouch = function () {
		try {
			document.createEvent("TouchEvent");
			return true;
		} catch (e) {
			return false;
		}
	}

	this.toggleFullScreen = function (focar) {
		focar = focar ? 'true' : 'false';

		var doc = window.document;
		var docEl = doc.documentElement;
		var requestFullScreen = docEl.requestFullscreen || docEl.mozRequestFullScreen || docEl.webkitRequestFullScreen || docEl.msRequestFullscreen;
		var cancelFullScreen = doc.exitFullscreen || doc.mozCancelFullScreen || doc.webkitExitFullscreen || doc.msExitFullscreen;
		if (!doc.fullscreenElement && !doc.mozFullScreenElement && !doc.webkitFullscreenElement && !doc.msFullscreenElement) {
			if (forcar != 'desligar') requestFullScreen.call(docEl);
		} else {
			if (forcar != 'ligar') cancelFullScreen.call(doc);
			//requestFullScreen.call(docEl);
		}
	}
	

	// this.scrola() = function () {
	// }

}


