(function () {
	'use strict';

	// Mobile Navigation Toggle
	var toggle = document.querySelector('.menu-toggle');
	var nav = document.querySelector('.main-navigation');

	if (toggle && nav) {
		toggle.addEventListener('click', function () {
			var isOpen = nav.classList.toggle('is-open');
			toggle.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
		});
	}

	// Download Sequence Timer
	var downloadData = window.pppDownload;
	if (downloadData) {
		var countEl = document.getElementById('download-countdown');
		var barEl = document.getElementById('download-progress');
		var buttonEl = document.getElementById('download-button');

		if (countEl && barEl && buttonEl) {
			var totalSeconds = parseInt(downloadData.seconds, 10) || 10;
			var secondsLeft = totalSeconds;

			countEl.textContent = '[ download available in ' + secondsLeft + 's ]';

			var timer = setInterval(function () {
				secondsLeft--;

				if (secondsLeft > 0) {
					countEl.textContent = '[ download available in ' + secondsLeft + 's ]';
					var progressPct = ((totalSeconds - secondsLeft) / totalSeconds) * 100;
					barEl.style.width = progressPct + '%';
				} else {
					clearInterval(timer);
					countEl.textContent = '[ download ready ]';
					barEl.style.width = '100%';
					buttonEl.hidden = false;
				}
			}, 1000);
		}
	}

	// Micro-interaction for Sidebar CPU Load Bar
	var progressBar = document.getElementById('dynamic-progress');
	if (progressBar) {
		setInterval(function () {
			var currentWidth = parseFloat(progressBar.style.width) || 15;
			var fluctuation = (Math.random() - 0.5) * 6;
			var newWidth = Math.min(Math.max(currentWidth + fluctuation, 6), 35);
			progressBar.style.width = newWidth + '%';
		}, 1500);
	}
}());