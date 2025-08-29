
document.getElementById('contact-form').addEventListener('submit', function (event) {
    event.preventDefault();

    const form = event.target;
    const formData = new FormData(form);
    const data = {};
    formData.forEach((value, key) => {
        data[key] = value;
    });

    const nonce = my_form_ajax.nonce;
    const restUrl = my_form_ajax.rest_url;
    const siteKey = my_form_ajax.site_key;

    grecaptcha.ready(function () {
        grecaptcha.execute(siteKey, { action: 'submit_contact' }).then(function (token) {
            data['recaptcha_token'] = token;

            fetch(restUrl, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-WP-Nonce': nonce
                },
                body: JSON.stringify(data)
            })
                .then(response => {
                    if (!response.ok) {
                        throw new Error('Network response was not ok');
                    }
                    return response.json();
                })
                .then(result => {
                    console.log('Email sent successfully:', result);
                    form.reset();
                    alert('Thank you! Your message has been sent.');
                })
                .catch(error => {
                    console.error('Error sending email:', error);
                    alert('There was an error sending your message. Please try again later.');
                });
        });
    });
})