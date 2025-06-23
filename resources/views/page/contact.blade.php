@extends('page.template.temp')
@section('content')
 <!-- Contact -->
 <section class="contact-area">
    <div class="container">
        <div class="gx-row d-flex justify-content-between gap-24">
            <div class="contact-infos">
                <h3 data-aos="fade-up">Contact Info</h3>
                <ul class="contact-details">
                    <li class="d-flex align-items-center" data-aos="zoom-in">
                        <div class="icon-box shadow-box">
                            <i class="fas fa-envelope"></i>
                        </div>
                        <div class="right">
                            <span>EMAIL</span>
                            <h4>opasean207@gmail.com</h4>
                        </div>
                    </li>
                    <li class="d-flex align-items-center" data-aos="zoom-in">
                        <div class="icon-box shadow-box">
                            <i class="iconoir-phone"></i>
                        </div>
                        <div class="right">
                            <span>Contact</span>
                            <h4>+62 859-6301-4202</h4>
                        </div>
                    </li>
                    <li class="d-flex align-items-center" data-aos="zoom-in">
                        <div class="icon-box shadow-box">
                            <i class="fas fa-map-marker-alt"></i> <!-- Ikon lokasi dari FontAwesome -->
                        </div>
                        <div class="right">
                            <span>Location</span>
                            <h4>Batukerbuy <br>Pasean <br>PAMEKASAN</h4>
                        </div>
                    </li>
                </ul>
                <h3 data-aos="fade-up">Social Info</h3>
                <ul class="social-links d-flex align-center" data-aos="zoom-in">
                    <li><a href="#"><i class="iconoir-facebook"></i></a></li>
                    <li><a href="https://www.instagram.com/ar_dmz25?igsh=MW5pbGEwZmFoamY0bw=="><i
                                class="iconoir-instagram"></i></a></li>
                </ul>
            </div>

            <div data-aos="zoom-in" class="contact-form">
                <div class="shadow-box">
                    <img src="{{ asset('pages') }}/assets/images/bg1.png" alt="BG" class="bg-img">
                    <img src="{{ asset('pages') }}/assets/images/icon3.png" alt="Icon">
                    <h1>Hubungi <span>saya.</span></h1>
                    <form method="POST" action="https://wpriverthemes.com/landing/gridx-html/mailer.php">
                        <div class="alert alert-success messenger-box-contact__msg" style="display: none"
                            role="alert">
                            Your message was sent successfully.
                        </div>
                        <div class="input-group">
                            <input type="text" name="full-name" id="full-name" placeholder="Name *">
                        </div>
                        <div class="input-group">
                            <input type="email" name="email" id="email" placeholder="Email *">
                        </div>
                        <div class="input-group">
                            <input type="text" name="subject" id="subject" placeholder="Your Subject *">
                        </div>
                        <div class="input-group">
                            <textarea name="message" id="message" placeholder="Your Message *"></textarea>
                        </div>
                        <div class="input-group">
                            <button class="theme-btn submit-btn" name="submit" type="submit">Kirim
                                pesan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection
