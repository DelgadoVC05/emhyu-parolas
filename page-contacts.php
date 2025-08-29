<?php get_header(); ?>

<section id="contact" class="contact section py-5">

    <div class="section-title mt-5" data-aos="fade-up">
        <h2 class="display-5 fw-bold mb-4">Contact Us</h2>
        <p class="sub-title">Have Questions? Reach out to Parolas Guimaras today</p>
    </div>

    <div class="container mb-5" data-aos="fade-up" data-aos-delay="100">
        <div class="contact__wrapper shadow-lg mt-n9">
            <div class="row no-gutters">
                <div class="col-lg-5 contact-info__wrapper gradient-brand-color p-5 order-lg-2" data-aos="fade-up" data-aos-delay="200">
                    <h3 class="color--white mb-5">Get in Touch</h3>

                    <ul class="contact-info__list list-style--none position-relative z-index-101">
                        <li class="mb-4 pl-4">
                            <span class="position-absolute"><i class="fas fa-envelope"
                                    style="color: var( --accent-color)"></i></span> emhyufoods@gmail.com
                        </li>
                        <li class="mb-4 pl-4">
                            <span class="position-absolute"><i class="fas fa-phone"
                                    style="color: var( --accent-color)"></i></span> 033 3221247
                        </li>
                        <li class="mb-4 pl-4">
                            <span class="position-absolute"><i class="fas fa-mobile"
                                    style="color: var( --accent-color)"></i></span> 09605967441/ 09562894178
                        </li>
                        <li class="mb-4 pl-4">
                            <span class="position-absolute"><i class="fas fa-map-marker-alt"
                                    style="color: var( --accent-color)"></i></span> San isidro, Buenavista,
                            <br>Guimaras

                        </li>
                    </ul>

                </div>

                <div class="col-lg-7 contact-form__wrapper p-5 order-lg-1" data-aos="fade-up" data-aos-delay="200">
                    <form class="contact-form form-validate" id="contact-form" method="post">
                        <div class="row">

                           <input type="hidden" id="website" name="website" autocomplete="off">
                            <div class="col-sm-12 mb-3">
                                <div class="form-group">
                                    <label class="required-field mb-2" for="name">Name</label>
                                    <input type="text" class="form-control" id="name" name="name"
                                        placeholder="" required>
                                </div>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <div class="form-group">
                                    <label class="required-field mb-2" for="email">Email</label>
                                    <input type="text" class="form-control" id="email" name="email"
                                        placeholder="" required>
                                </div>
                            </div>

                            <div class="col-sm-12 mb-3">
                                <div class="form-group">
                                    <label class="required-field mb-2" for="email">Subject</label>
                                    <input type="text" class="form-control" id="subject" name="subject"
                                        placeholder="" required>
                                </div>
                            </div>
                            <div class="col-sm-12 mb-3">
                                <div class="form-group">
                                    <label class="required-field mb-2" for="message">Message</label>
                                    <textarea class="form-control" id="message" name="message" rows="4" placeholder="" required></textarea>
                                </div>
                            </div>

                            <div class="col-sm-12 mb-3">
                                <button type="submit" name="submit" class="btn text-light"
                                    style="background-color:var(--accent-color)">Submit</button>
                            </div>

                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>

    <div class="container" data-aos="fade-up" data-aos-delay="100">

        <div class="mb-5">
            <iframe style="width: 100%; height: 400px;"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3920.8559860504365!2d122.63484647547611!3d10.66828448947401!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x33aee989d55464f3%3A0xadadae1436562081!2sPAROLAS%20by%20EMHYU%20FOOD%20PRODUCTS!5e0!3m2!1sen!2sph!4v1717544352947!5m2!1sen!2sph"
                frameborder="0" allowfullscreen="true"></iframe>
        </div>
</section>

<?php get_footer(); ?>
