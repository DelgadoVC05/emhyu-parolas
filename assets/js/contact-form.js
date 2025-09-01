document.getElementById('contact-form').addEventListener('submit', function (event) {
    event.preventDefault();

    const form = event.target;
    const spinner = form.querySelector('.spinner-border');
    const buttonText = form.querySelector('.button-text');
    const submitButton = form.querySelector('button[type="submit"]');
    const alertSuccess = form.querySelector('#alert-success');
    const alertError = form.querySelector('#alert-danger');
    const alertErrorText = form.querySelector('#alert-danger-text');
    const invalidEmail = document.querySelector('.invalid-email');



    spinner.style.display = 'inline-block';
    buttonText.style.display = 'none';
    submitButton.disabled = true;


    alertSuccess.style.display = 'none';

    if (alertError) alertError.style.display = 'none';

    if (alertErrorText) alertErrorText.textContent = '';

    if (invalidEmail) invalidEmail.style.display = 'none';






    const formData = new FormData(form);
    const data = {};
    formData.forEach((value, key) => {
        data[key] = value;
    });




    if (
        !data.name || !data.name.trim() ||
        !data.email || !data.email.trim() ||
        !data.subject || !data.subject.trim() ||
        !data.message || !data.message.trim()
    ) {

        alertErrorText.textContent = 'Please fill all required fields.';


        alertError.style.display = 'block';

        spinner.style.display = 'none';
        buttonText.style.display = 'inline';
        submitButton.disabled = false;

        return;
    }


    //Validate email format
    let regex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
    if (!regex.test(data.email)) {

        invalidEmail.style.display = 'block';

        spinner.style.display = 'none';
        buttonText.style.display = 'inline';
        submitButton.disabled = false;
        return;;
    }


    // Sanitize inputs
    data.message = DOMPurify.sanitize(data.message, {
        ALLOWED_TAGS: [],
        ALLOWED_ATTR: []
    });
    data.name = DOMPurify.sanitize(data.name, {
        ALLOWED_TAGS: [],
        ALLOWED_ATTR: []
    });
    data.subject = DOMPurify.sanitize(data.subject, {
        ALLOWED_TAGS: [],
        ALLOWED_ATTR: []
    });

    const nonce = my_form_ajax.nonce;
    const ajaxUrl = my_form_ajax.ajax_url;
    const siteKey = my_form_ajax.site_key;

    // Honeypot check
    if (data.website && data.website.trim() !== '') {
        alertErrorText.textContent = 'Spam detected. Please try again.';
        alertError.style.display = 'block';

        spinner.style.display = 'none';
        buttonText.style.display = 'inline';
        submitButton.disabled = false;
        return;
    }


    grecaptcha.ready(function () {
        grecaptcha.execute(siteKey, { action: 'submit_contact' }).then(function (token) {
            console.log('reCAPTCHA token received:', token.substring(0, 50) + '...');

            const verifyData = new FormData();
            verifyData.append('action', 'verify_recaptcha');
            verifyData.append('nonce', nonce);
            verifyData.append('recaptcha_token', token);

            fetch(ajaxUrl, {
                method: 'POST',
                body: verifyData
            })
                .then(response => response.json())
                .then(result => {
                    console.log('reCAPTCHA verification result:', result);

                    if (!result.success) {
                        throw new Error('reCAPTCHA verification failed: ' + (result.data || 'Unknown error'));
                    }

                    console.log('Sending email via EmailJS...');

                    // Using EmailJS SDK
                    return emailjs.send(
                        my_form_ajax.emailjs_service_id,
                        my_form_ajax.emailjs_template_id,
                        {
                            name: data.name,
                            from_email: data.email,
                            subject: data.subject,
                            message: data.message,
                            time: new Date().toLocaleString()
                        },

                        my_form_ajax.emailjs_public_key
                    );
                })
                .then(emailResult => {
                    console.log('EmailJS result:', emailResult);
                    form.reset();
                    alertSuccess.style.display = 'block';
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('There was an error sending your message. Error: ' + error.message);
                })
                .finally(() => {

                    spinner.style.display = 'none';
                    buttonText.style.display = 'inline';
                    submitButton.disabled = false;
                });
        });
    });
});