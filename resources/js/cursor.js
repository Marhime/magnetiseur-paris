import { gsap } from "gsap";
import { getMousePos } from "./utils";
import { lerp } from "./utils";

// grab the mouse position and set it to the mouse state
let mouse = { x: 0, y: 0 };
window.addEventListener("mousemove", (ev) => (mouse = getMousePos(ev)));

export default class Cursor {
    constructor(el) {
        this.Cursor = el;
        this.mapElements = document.querySelectorAll("[data-map-element]");
        this.Cursor.style.opacity = 0;
        this.cursorConfigs = {
            x: { previous: 0, current: 0, amt: 0.2 },
            y: { previous: 0, current: 0, amt: 0.2 },
        };

        // define mouse move function
        this.mouseMoveEvent = () => {
            this.cursorConfigs.x.previous = this.cursorConfigs.x.current =
                mouse.x;
            this.cursorConfigs.y.previous = this.cursorConfigs.y.previous =
                mouse.y;

            gsap.to(this.Cursor, {
                duration: 1,
                ease: "Power3.easeOut",
            });

            // the window.requestAnimationFrame() method tells the browser that you wish to perform an animation and requests that the browser calls a specified function to update an animation before the next repaint
            window.requestAnimationFrame(() => this.render());

            // clean up the event listener
            window.removeEventListener("mousemove", this.mouseMoveEvent);
        };

        // define on hover function
        this.onHoverDirection = () => {
            this.Cursor.classList.add("active-direction");
            this.Cursor.style.opacity = 1;
        };

        // define on hover out function
        this.onHoverOutDirection = () => {
            this.Cursor.classList.remove("active-direction");
            this.Cursor.style.opacity = 0;
        };

        // assign mouse move event
        window.addEventListener("mousemove", this.mouseMoveEvent);

        // loop through all hoverable elements
        this.mapElements.forEach((item) => {
            item.addEventListener("mouseenter", () => this.onHoverDirection());
            item.addEventListener("mouseleave", () =>
                this.onHoverOutDirection()
            );
        });
    }

    render() {
        this.cursorConfigs.x.current = mouse.x;
        this.cursorConfigs.y.current = mouse.y;

        // lerp
        for (const key in this.cursorConfigs) {
            // key will be x & y
            // WTF IS LERP?
            // Lerp - A lerp returns the value between two numbers at a specified, decimal midpoint:
            this.cursorConfigs[key].previous = lerp(
                this.cursorConfigs[key].previous,
                this.cursorConfigs[key].current,
                this.cursorConfigs[key].amt
            );
        }
        // Setting the cursor x and y to our cursoer html element
        this.Cursor.style.transform = `translateX(${this.cursorConfigs.x.previous}px) translateY(${this.cursorConfigs.y.previous}px)`;
        // RAF
        requestAnimationFrame(() => this.render());
    }
}
