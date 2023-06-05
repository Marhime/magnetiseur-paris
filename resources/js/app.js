import { ScrollTrigger, SplitText, gsap } from "gsap/all";
import "./bootstrap";
import Alpine from "alpinejs";
import Cursor from "./cursor";

gsap.registerPlugin(SplitText);
gsap.registerPlugin(ScrollTrigger);

window.Alpine = Alpine;

Alpine.start();

const timelineSettings = {
    staggerValue: 0.2,
    charsDuration: 0.5,
};

function init() {
    let isNavVisible = true;
    let prevScrollPos = window.pageYOffset + 200;
    const navElement = document.querySelector("[data-navigation] header");
    if (navElement) {
        window.onscroll = function () {
            let currentScrollPos = window.pageYOffset + 200;

            if (prevScrollPos > currentScrollPos && !isNavVisible) {
                // Scroll vers le haut
                navElement.classList.remove("-translate-y-full");
                navElement.classList.add("translate-y-0");
                isNavVisible = true;
            } else if (prevScrollPos < currentScrollPos && isNavVisible) {
                // Scroll vers le bas
                navElement.classList.add("-translate-y-full");
                navElement.classList.remove("translate-y-0");
                isNavVisible = false;
            }

            prevScrollPos = currentScrollPos;
        };
    }

    const dataContent = document.querySelector("[data-content]");
    if (dataContent) {
        const tl = gsap.timeline();
        const titleWords = new SplitText("[data-title]", {
            type: "words",
            wordsClass: "will-change-transform",
        }).words;
        const titleLines = new SplitText("[data-title]", {
            type: "lines",
            linesClass: "overflow-hidden pb-2.5",
        });
        tl.from("[data-title]", { autoAlpha: 0 }).from(titleWords, {
            duration: timelineSettings.charsDuration,
            y: 100,
            opacity: 0,
            stagger: timelineSettings.staggerValue,
            ease: "power4.inOut",
            onComplete: () => {
                dataContent.classList.remove("translate-y-10");
                dataContent.classList.add("translate-y-0");
                dataContent.classList.add("opacity-100");
                dataContent.classList.remove("opacity-0");
            },
        });
    }

    const footerTitle = document.querySelector("[data-footer-title]");
    if (footerTitle) {
        const tl = gsap.timeline();
        const footerTitleWords = new SplitText(footerTitle, {
            type: "words",
            wordsClass: "overflow-hidden",
        });
        const footerTitleWordsInner = new SplitText(footerTitle, {
            type: "words",
            linesClass: "will-change-transform",
        }).words;
        ScrollTrigger.create({
            trigger: "footer",
            once: true,
            onEnter: () => {
                tl.from(footerTitle, { autoAlpha: 0 }).from(
                    footerTitleWordsInner,
                    {
                        duration: timelineSettings.charsDuration,
                        y: 100,
                        opacity: 0,
                        stagger: 0.2,
                        ease: "power4.inOut",
                    }
                );
            },
        });
    }

    const menu = document.querySelector("[data-navigation-menu]");
    const btnOpenMenu = document.querySelector("[data-open-menu]");
    const btnCloseMenu = document.querySelector("[data-close-menu]");
    if (menu && btnOpenMenu && btnCloseMenu) {
        const tlMenu = gsap.timeline({ paused: true });

        tlMenu
            .to(menu, {
                duration: 0.5,
                autoAlpha: 1,
                x: 0,
                ease: "power4.inOut",
            })
            .from(
                "[data-navigation-menu] a",
                {
                    duration: 0.5,
                    y: 100,
                    opacity: 0,
                    stagger: 0.15,
                    ease: "power4.inOut",
                },
                "-=0.60"
            );

        btnOpenMenu.addEventListener("click", function () {
            document.body.classList.add("overflow-hidden");
            tlMenu.play();
        });

        btnCloseMenu.addEventListener("click", function () {
            document.body.classList.remove("overflow-hidden");
            tlMenu.reverse();
        });
    }

    const parallaxElements = gsap.utils.toArray("[data-parallax-element]");
    if (parallaxElements) {
        parallaxElements.forEach((element, i) => {
            // if last direction inverse
            const direction = element.dataset.direction;
            const speed = element.dataset.speed;
            const yValue = direction === "inverse" ? -speed * 100 : speed * 100;
            gsap.to(element, {
                scrollTrigger: {
                    trigger: "[data-parallax-section]",
                    scrub: true,
                },
                ease: "power4.inOut",
                y: yValue,
            });
        });
    }

    const cursor = document.querySelector("[data-cursor]");
    if (cursor) {
        const cursorFollower = new Cursor(cursor);
    }

    // const readMoreButtons = gsap.utils.toArray("[data-read-more]");
    // if (readMoreButtons) {
    //     readMoreButtons.forEach((button) => {
    //         const parent = button.parentElement;
    //         const content = parent.querySelector("[data-read-more-content]");
    //         let contentText;
    //         if (content.innerText.length > 300) {
    //             contentText = content.innerText;
    //             const contentTextCut = contentText.substring(0, 300);
    //             content.innerHTML = `${contentTextCut}...`;
    //         }
    //         button.addEventListener("click", function () {
    //             content.innerHTML = contentText;
    //             const tl = gsap.timeline();
    //             tl.to(content, {
    //                 duration: 0.5,
    //                 height: "auto",
    //                 ease: "power4.inOut",
    //             });
    //             this.remove();
    //         });
    //     });
    // }

    const dotElements = gsap.utils.toArray("[data-dot-element]");
    if (dotElements) {
        dotElements.forEach((element) => {
            const dot = element.querySelector("[data-dot]");
            gsap.to(element, {
                scrollTrigger: {
                    trigger: element,
                    start: "top center",
                    once: true,
                    onEnter: () => {
                        dot.classList.remove("bg-white");
                        dot.classList.add("text-white");
                        dot.classList.remove("text-black");
                        dot.classList.add("bg-black");
                    },
                },
            });
        });
    }
}

window.addEventListener("load", init);
