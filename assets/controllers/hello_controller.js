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
        const input = this.element.querySelector('input');
        const span = this.element.querySelector('span');
        const button = this.element.querySelector('button');

        button.addEventListener('click', (e) => {
            span.textContent = input.value;
        });
    }
}
