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

	