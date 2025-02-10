function sendMail(){
    let parms = {
        name : document.getElementById("name").value,
        email : document.getElementById("email").value,
        subject : document.getElementById("subject").value,
        message : document.getElementById("message").value,

    }
    emailjs.send("service_kh9uygv", "template_8xgp5xa", parms).then(alert("Email sent!!"))
}