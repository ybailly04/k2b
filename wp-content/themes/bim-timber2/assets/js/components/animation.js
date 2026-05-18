import { ScrollTrigger } from "gsap/all";
import { SplitText } from "gsap/all";
import gsap from "gsap"

gsap.registerPlugin(ScrollTrigger, SplitText)

class Appear {

    constructor(el, direction = "right") {
        this.el = el;

        if(!ScrollTrigger.isInViewport(this.el)){
            if(this.el && direction == "right"){
                this.appearFromRight(this.el)
            }
    
            if(this.el && direction == "left"){
                this.appearFromLeft(this.el)
            }
    
            if(this.el && direction == "both"){
                this.appearSymmetry(this.el)
            }
    
            if(this.el && direction == "bottom"){
                this.appearBottom(this.el)
            }
    
            if(this.el && direction == "top"){
                this.appearTop(this.el)
            }
    
            if(this.el && direction == "text"){
                this.appearText(this.el)
            }
    
            if(this.el && direction == "gallery"){
                this.appearGallery(this.el)
            }
        }

        if(this.el && direction == "defil"){
            this.initDefil(this.el)
        }
    }

    appearFromRight(el){
        gsap.from(el.children,{
            opacity: 0,
            x: 80,
            stagger: .2,
            scrollTrigger: {
                trigger: el,
                start: "top 70%",
            }
        })
    }

    appearFromLeft(el){
        gsap.from(el.children,{
            opacity: 0,
            x: -80,
            stagger: .2,
            scrollTrigger: {
                trigger: el,
                start: "top 70%",
            }
        })
    }

    appearSymmetry(el){
        let transform = 80
        if(el.classList.contains('right')){
            transform = -transform
        }
        
        gsap.from(el.firstElementChild,{
            opacity: 0,
            x: -transform,
            stagger: .2,
            scrollTrigger: {
                trigger: el,
                start: "top 70%",
            }
        })
        gsap.from(el.lastElementChild,{
            opacity: 0,
            x: transform,
            stagger: .2,
            scrollTrigger: {
                trigger: el,
                start: "top 70%",
            }
        })
    }

    appearBottom(el){
        gsap.from(el.children,{
            opacity: 0,
            y: -80,
            stagger: .2,
            scrollTrigger: {
                trigger: el,
                start: "top 70%",
            }
        })
    }

    appearTop(el){
        gsap.from(el.children,{
            opacity: 0,
            stagger: .2,
            scrollTrigger: {
                trigger: el,
                start: "top 70%",
            }
        })
    }

    appearText(el){
        let split = new SplitText(el, { type: "words,lines" });

        gsap.from(split.words, {
            duration: 0.6,
            opacity: 0,
            ease: "back",
            stagger: 0.01,
            scrollTrigger: {
                trigger: el,
                start: "top 75%",
            }
        })
    }

    appearGallery(el){
        for(let image of el.children){
            gsap.from(image, {
                scale: 0,
                opacity: 0,
                duration: 1,
                ease: "power4",
                scrollTrigger: {
                    trigger: image,
                    start: "top 85%",
                }
            })
        }
    }

    initDefil(el){
        gsap.to(el, {
            ease: "none",
            x: - (el.offsetWidth - window.innerWidth),
            scrollTrigger: {
                trigger: el.parentElement,
                start: "top bottom",
                end: "bottom top",
                scrub: true,
                toggleActions: "play none none reverse",
            }
        })
    }

}

[].forEach.call(document.querySelectorAll('.__appear'), (el) => {
    new Appear(el);
});

[].forEach.call(document.querySelectorAll('.__appear_left'), (el) => {
    new Appear(el, 'left');
});

[].forEach.call(document.querySelectorAll('.__appear_symmetry'), (el) => {
    new Appear(el, 'both');
});

[].forEach.call(document.querySelectorAll('.__appear_bottom'), (el) => {
    new Appear(el, 'bottom');
});

[].forEach.call(document.querySelectorAll('.__appear_top'), (el) => {
    new Appear(el, 'top');
});

[].forEach.call(document.querySelectorAll('.__appear_text'), (el) => {
    new Appear(el, 'text');
});

[].forEach.call(document.querySelectorAll('.__appear_gallery'), (el) => {
    new Appear(el, 'gallery');
});

[].forEach.call(document.querySelectorAll('.__text_defil'), (el) => {
    new Appear(el, 'defil');
});