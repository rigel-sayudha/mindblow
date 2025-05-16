<?php include("header.php"); ?>

<head>
    <title>Question | Mindblow</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>

<!-- Hero Section -->
<section class="py-5 bg-dark text-white mb-5 rounded-3 shadow">
    <div class="container text-center">
        <h1 class="display-4 mb-3">Question</h1>
        <p class="lead">Have any questions or concerns? We're always ready to help!<br>
            Email us at <a href="mailto:info@smart-fashion.com" class="text-success text-decoration-underline">mindblow@gmail.com</a>
        </p>
    </div>
</section>

<!-- Contact Form Section -->
<div class="container mb-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <div class="card shadow border-0">
                <div class="card-body p-5">
                    <h3 class="card-title text-center mb-4 text-dark">Contact Us</h3>
                    <form method="post">
                        <div class="row g-3">
                            <div class="col-md-6">
                                <label for="txtName" class="form-label">Your Name *</label>
                                <input type="text" name="txtName" class="form-control" id="txtName" placeholder="Enter your name" required>
                            </div>
                            <div class="col-md-6">
                                <label for="txtEmail" class="form-label">Your Email *</label>
                                <input type="email" name="txtEmail" class="form-control" id="txtEmail" placeholder="Enter your email" required>
                            </div>
                            <div class="col-md-6">
                                <label for="txtPhone" class="form-label">Your Phone Number *</label>
                                <input type="number" name="txtPhone" class="form-control" id="txtPhone" placeholder="Enter your phone number" required>
                            </div>
                            <div class="col-md-6">
                                <label for="txtMsg" class="form-label">Your Message *</label>
                                <textarea name="txtMsg" class="form-control" id="txtMsg" rows="3" placeholder="Type your message here..." required></textarea>
                            </div>
                        </div>
                        <div class="text-center mt-4">
                            <button type="submit" class="btn btn-success px-5 py-2">Send Message</button>
                        </div>
                    </form>
                </div>
            </div>
            <!-- Optional: Success message after submit -->
            <!--
            <div class="alert alert-success mt-4 text-center" role="alert">
                Thank you for contacting us! We will get back to you soon.
            </div>
            -->
        </div>
    </div>
</div>

<?php include("footer.php"); ?>