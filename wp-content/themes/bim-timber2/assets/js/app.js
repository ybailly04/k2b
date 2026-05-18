//import '../../node_modules/swiper/swiper-bundle.js';
/* import './mistral/mistral.js'; */

import './components/svg-icons.js';
import './components/header.js';
import './components/sliders.js';
import { ScrollManager } from './components/scroll.js';
import { CursorManager } from './components/cursor.js';

window.onload = (e) => {
	document.querySelector('html').classList.add('__loaded');

	console.log('ere');
	new ScrollManager();

	new CursorManager();

}

document.querySelector('html').classList.remove('no-js');