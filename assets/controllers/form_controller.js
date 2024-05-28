import { Controller } from '@hotwired/stimulus';

/*
 * This is an example Stimulus controller!
 *
 * Any element with a data-controller="hello" attribute will cause
 * this controller to be executed. The name "hello" comes from the filename:
 * hello_controller.js -> "hello"
 *
 * Delete this file or adapt it for your use!
 */
export default class extends Controller {
    connect() {
        const inputs = this.element.querySelectorAll(".input");

        inputs.forEach((input) => {
            input.addEventListener("focus", () => {
                this.focusFunc(input.parentNode);
            });
            input.addEventListener("blur", () => {
                this.blurFunc(input);
            });
        });

    }

    blurFunc(input) {
        if (input.value == "") {
            input.parentNode.classList.remove("focus");
        }
    }

    focusFunc(parent) {
        parent.classList.add("focus");
    }
}
