//import '../../node_modules/swiper/swiper-bundle.js';

import "./components/svg-icons.js";
import "./components/header.js";
import "./components/sliders.js";
import "./components/animation.js";
import "./components/sticky-features.js";
import "./components/steps.js";
import "./components/objects.js";
import "./components/vimeo.js";
import "./components/whatsapp.js";
import { ScrollManager } from "./components/scroll.js";
import { CursorManager } from "./components/cursor.js";

window.onload = (e) => {
  document.querySelector("html").classList.add("__loaded");
  new ScrollManager();
  new CursorManager();
};

document.querySelector("html").classList.remove("no-js");
