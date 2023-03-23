"use strict";

let html = document.querySelector("html");
let body = document.querySelector("body");

let scrolled = function () {
	let dec = scrollY / (body.scrollHeight - innerHeight);
	return Math.floor(dec * 100);
}

addEventListener("scroll", function () {
	html.style.setProperty("background", scrolled() < 50 ?
		"var(--hue-light)" :
		"var(--hue-dark)"
	);
});