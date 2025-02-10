import React, { useRef } from 'react'
import { useState } from 'react';

import emailjs from '@emailjs/browser';

import '../css/Contact.css';
import Modal from '../components/Modal';

const link = document.createElement('link');
link.rel = 'stylesheet';
link.href = 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css';
link.integrity = 'sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==';
link.crossOrigin = 'anonymous';
link.referrerPolicy = 'no-referrer';

export const Contact = () => {
    const form = useRef();
    const [modalMessage, setModalMessage] = useState('');
    const [showModal, setShowModal] = useState(false);

    const sendEmail = (e) => {
        e.preventDefault();

        emailjs.sendForm('service_kh9uygv', 'template_8xgp5xa', form.current, 'jioONWoflXxxBwxuU')
            .then(
                () => {
                    setModalMessage('Your message has been sent successfully :)');
                    setShowModal(true);
                    form.current.reset();
                },
                (error) => {
                    setModalMessage(`FAILED... ${error.text}`);
                    setShowModal(true);
                }
            );
    };

    return (
        <main>
            {showModal && (
                <Modal
                    message={modalMessage}
                    onClose={() => setShowModal(false)}
                />
            )}
            <form ref={form} onSubmit={sendEmail} className="container">
                <div class="contact-box">
                    <div class="left">
                        <h2>Contact Form</h2>
                        <p>Username</p>
                        <input type="text" name="from_name" class="field" placeholder="Enter your name" />
                        <p>E-mail</p>
                        <input type="email" name="from_email" class="field" placeholder="Enter your email" />
                        <p>Subject</p>
                        <input type="text" name="subject" class="field" placeholder="Enter subject" />
                        <p>Message</p>
                        <textarea name="message" class="field area" placeholder="Enter message" ></textarea>

                        <button class="btn">Send</button>
                    </div>

                    <div class="right">
                        <h2>Contact Info</h2>
                        <ul>
                            <li>MK</li>
                            <li>mk@gmail.com <br /> +421 000 000 000 </li>
                            <li>Masarykova Univerzita <br /> Fakulta Informatiky</li>
                            <li>Botanická 68A, 602 00 <br /> Královo Pole-Ponava, Brno</li>
                        </ul>

                        <div class="network">
                            <a target="_blank" rel="noopener noreferrer" href="https://www.facebook.com/profile.php?id=100008982675113"><img className="net fb" src="https://image.similarpng.com/very-thumbnail/2020/04/Beautiful-Facebook-logo-icon-social-media-png.png" alt="" /></a>
                            <a target="_blank" rel="noopener noreferrer" href="https://www.instagram.com/miroslavkastier/?hl=sk"><img className="net ig" src="https://upload.wikimedia.org/wikipedia/commons/thumb/5/58/Instagram-Icon.png/1025px-Instagram-Icon.png" alt="" /></a>
                            <a target="_blank" rel="noopener noreferrer" href="https://www.linkedin.com/in/miroslav-ka%C5%A1tier-788a92310/"><img className="net" src="https://upload.wikimedia.org/wikipedia/commons/thumb/8/81/LinkedIn_icon.svg/1200px-LinkedIn_icon.svg.png" alt="" /></a>
                        </div>
                    </div>
                </div>
            </form>
        </main>
    );
};