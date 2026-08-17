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

	// Contact Form Terminal Transmission AJAX Handler
	var contactForm = document.getElementById('contact-terminal-form');
	if (contactForm) {
		contactForm.addEventListener('submit', function (e) {
			e.preventDefault();

			var submitBtn = document.getElementById('contact-submit-btn');
			var outputBox = document.getElementById('contact-cli-output');
			var nonceVal  = contactForm.querySelector('input[name="contact_nonce"]').value;
			var username  = contactForm.querySelector('input[name="username"]').value;
			var email     = contactForm.querySelector('input[name="email"]').value;
			var message   = contactForm.querySelector('textarea[name="message"]').value;
			var subscribe = contactForm.querySelector('input[name="subscribe"]').checked ? 1 : 0;

			var botToken = '';
			var cfTurnstile = contactForm.querySelector('input[name="cf-turnstile-response"]');
			var gRecaptcha  = contactForm.querySelector('textarea[name="g-recaptcha-response"]') || contactForm.querySelector('input[name="g-recaptcha-response"]');
			if (cfTurnstile) {
				botToken = cfTurnstile.value;
			} else if (gRecaptcha) {
				botToken = gRecaptcha.value;
			}

			if (submitBtn) {
				submitBtn.disabled = true;
				submitBtn.innerHTML = '<span>TRANSMITTING_PACKET...</span>';
			}

			if (outputBox) {
				outputBox.style.display = 'block';
				outputBox.innerHTML = '&gt; INITIALIZING_SOCKET_CONNECTION... [PENDING]';
			}

			var formData = new FormData();
			formData.append('action', 'ppp_send_contact_packet');
			formData.append('security', nonceVal);
			formData.append('username', username);
			formData.append('email', email);
			formData.append('message', message);
			formData.append('subscribe', subscribe);
			formData.append('bot_token', botToken);

			var ajaxUrl = (window.pppData && window.pppData.ajaxUrl) ? window.pppData.ajaxUrl : '/wp-admin/admin-ajax.php';

			fetch(ajaxUrl, {
				method: 'POST',
				body: formData
			})
			.then(function (res) { return res.json(); })
			.then(function (data) {
				if (data.success) {
					outputBox.innerHTML = '&gt; ' + data.data.message;
					contactForm.reset();
				} else {
					outputBox.innerHTML = '&gt; ' + (data.data ? data.data.message : '[ERROR_0x99]: TRANSMISSION_FAILED');
				}
			})
			.catch(function () {
				outputBox.innerHTML = '&gt; [ERROR_0x99]: SERVER_UNREACHABLE';
			})
			.finally(function () {
				if (submitBtn) {
					submitBtn.disabled = false;
					submitBtn.innerHTML = '<span>SEND_PACKET</span>';
				}
			});
		});
	}
}());