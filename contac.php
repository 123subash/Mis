<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php include 'header.php'; ?>

<section class="contact-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Contact Us</h2>
                <ul class="contact-info">
                    <li><i class="fas fa-envelope"></i> Mail at: <a href="mailto:subashpanthi838@gmail.com">subashpanthi838@gmail.com</a></li>
                    <li><i class="fas fa-phone"></i> Call: <a href="tel:9840795141">9840795141</a></li>
                    <li><i class="fab fa-whatsapp"></i> Whatsapp: <a href="https://wa.me/9840795141">9840795141</a></li>
                </ul>
            </div>
            <div class="col-md-6">
                <h2>Visit Us</h2>
                <!-- Embed Google Maps here -->
                <div class="map">
                    <!-- Replace this with your Google Maps embed code -->
                    <iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d14131.033284202393!2d85.32395039659698!3d27.69386358743114!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m0!4m5!1s0x39eb19ecef2eedd1%3A0x668e25466241a9bd!2sKoteshwor%20Mahadevasthan%2C%20Mahadevsthan%20Marg%2C%20Kathmandu%2044600!3m2!1d27.6807491!2d85.3412639!5e0!3m2!1sen!2snp!4v1713539113844!5m2!1sen!2snp" width="600" height="450" style="border:0;"
                         allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .contact-section {
        text-align: center;
    }
    .map {
        margin: 0 auto;
        width: 80%; /* Adjust the width as needed */
    }
    body {
        font-family: Arial, sans-serif;
        background-color: #f4f4f4;
        margin: 0;
        background-image: linear-gradient(to right, green,white, yellow);
        background-size: cover;
        background-repeat: no-repeat;
        padding: 0;
    }
</style>
<?php include 'footer.php'; ?>

</body>
</html>