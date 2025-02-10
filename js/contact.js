
document.addEventListener("DOMContentLoaded", function ()
{
    if (window.emailjs) 
    {
        emailjs.init("jioONWoflXxxBwxuU");
    }
});

function sendMail(event) {

    let params = {
        name: document.getElementById("name").value,
        email: document.getElementById("email").value,
        subject: document.getElementById("subject").value,
        message: document.getElementById("message").value,
    };

    emailjs.send("service_kh9uygv", "template_8xgp5xa", params)
        .then(function (response) {
            alert("Email sent successfully!");
        })
        .catch(function (error) {
            event.preventDefault();
            alert("Failed to send email. Please try again.");
            console.error("Error:", error);
        });
}