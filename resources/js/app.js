import './bootstrap';
import 'preline';
import Typed from 'typed.js';

// Page Navigated
document.addEventListener('livewire:navigated', () => {
    window.HSStaticMethods.autoInit();
});

// Set Locale
document.addEventListener('locale-changed', function (event) {
    const locale = event.detail.locale;
    location.reload();
});

// Typing
function typingEffect() {
    return {
        startTyping() {
            new Typed('.typing', {
                strings: messages,
                typeSpeed: 100,
                backSpeed: 60,
                loop: true
            });
        }
    }
}
window.typingEffect = typingEffect;

// Hidden Context Menu
document.addEventListener('DOMContentLoaded', function () {
    document.querySelector('[wire\\:ignore]').addEventListener('contextmenu', function (event) {
        event.preventDefault();
    });
});

// Image Private
document.addEventListener('DOMContentLoaded', function () {
    const images = document.querySelectorAll('img');
    images.forEach(function (image) {
        image.setAttribute('draggable', 'false');
        image.addEventListener('dragstart', function (event) {
            event.preventDefault();
        });
        image.addEventListener('contextmenu', function (event) {
            event.preventDefault();
        });
    });
});
