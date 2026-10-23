/**
 * Konzult — motion layer.
 *
 * No dependencies. Everything degrades to a static, readable page:
 * - reveal animations only run when IntersectionObserver is available
 * - counters fall back to their server-rendered values
 * - the mobile menu uses <dialog>, so Escape and focus trapping are native
 */
(() => {
	'use strict';

	const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;
	const hasIO = 'IntersectionObserver' in window;

	/* ---------------------------------------------------------------------
	 * Sticky header state
	 * ------------------------------------------------------------------ */

	const header = document.querySelector('[data-k-header]');

	if (header) {
		let lastState = false;
		let queued = false;

		const syncHeader = () => {
			const stuck = window.scrollY > 12;
			if (stuck !== lastState) {
				header.classList.toggle('is-stuck', stuck);
				lastState = stuck;
			}
			queued = false;
		};

		window.addEventListener(
			'scroll',
			() => {
				if (!queued) {
					window.requestAnimationFrame(syncHeader);
					queued = true;
				}
			},
			{ passive: true }
		);

		syncHeader();
	}

	/* ---------------------------------------------------------------------
	 * Scroll reveals
	 * ------------------------------------------------------------------ */

	const reveals = document.querySelectorAll('[data-reveal]');

	if (reveals.length && hasIO && !reduceMotion) {
		const revealObserver = new IntersectionObserver(
			(entries) => {
				entries.forEach((entry) => {
					if (!entry.isIntersecting) {
						return;
					}
					entry.target.classList.add('is-in');
					revealObserver.unobserve(entry.target);
				});
			},
			{ threshold: 0.12, rootMargin: '0px 0px -6% 0px' }
		);

		reveals.forEach((el) => revealObserver.observe(el));
	} else {
		reveals.forEach((el) => el.classList.add('is-in'));
	}

	/* ---------------------------------------------------------------------
	 * Counters
	 * ------------------------------------------------------------------ */

	const counters = document.querySelectorAll('[data-count]');

	const runCounter = (el) => {
		const raw = el.getAttribute('data-count') || '';
		const target = Number.parseFloat(raw);
		const suffix = el.getAttribute('data-suffix') || '';
		const decimals = raw.includes('.') ? raw.split('.')[1].length : 0;

		if (Number.isNaN(target)) {
			return;
		}

		if (reduceMotion) {
			el.textContent = target.toFixed(decimals) + suffix;
			return;
		}

		const duration = 1500;
		const start = performance.now();

		const tick = (now) => {
			const progress = Math.min((now - start) / duration, 1);
			const eased = 1 - Math.pow(1 - progress, 3);
			el.textContent = (target * eased).toFixed(decimals) + suffix;

			if (progress < 1) {
				window.requestAnimationFrame(tick);
			}
		};

		window.requestAnimationFrame(tick);
	};

	if (counters.length) {
		if (hasIO) {
			const counterObserver = new IntersectionObserver(
				(entries) => {
					entries.forEach((entry) => {
						if (!entry.isIntersecting) {
							return;
						}
						runCounter(entry.target);
						counterObserver.unobserve(entry.target);
					});
				},
				{ threshold: 0.6 }
			);

			counters.forEach((el) => counterObserver.observe(el));
		} else {
			counters.forEach((el) => el.textContent = el.textContent);
		}
	}

	