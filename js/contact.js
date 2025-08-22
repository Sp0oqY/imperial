//FAQ
const accordionItemHeaders = document.querySelectorAll(".accordion-item-header");

accordionItemHeaders.forEach(accordionItemHeader => {
    accordionItemHeader.addEventListener("click", event => {
        accordionItemHeader.classList.toggle("active");
        const accordionItemBody = accordionItemHeader.nextElementSibling;
        if (accordionItemHeader.classList.contains("active")) {
            accordionItemBody.style.maxHeight = accordionItemBody.scrollHeight + "px";
        } else {
            accordionItemBody.style.maxHeight = 0;
        }
    });
});

//Email
const form = document.getElementById('contact-form');
const modal = document.querySelector('.modal');
const modalMessageElement = document.querySelector('.modal-content p');

function showModal(message) {
    if (modal && modalMessageElement) {
        modalMessageElement.textContent = message;
        modal.classList.add('show');
    }
}

function closeModal() {
    if (modal) {
        modal.classList.remove('show');
    }
}

form.addEventListener('submit', function (e) {
    e.preventDefault();

    emailjs.sendForm('service_dw9fv22', 'template_pw0zf1n', this)
        .then(() => {
            showModal("Your message has been sent successfully :)");
            form.reset();
        }, (error) => {
            showModal("FAILED... " + error.text);
        });
});