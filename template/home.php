<?php
include("header.php");

$sql = "SELECT * FROM products LIMIT 3";
$all_product = $con->query($sql);
?>
<head>
    <title>Home | Mindblow</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- Tambahkan Font Awesome 6 -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="shortcut icon" href="../img/main/logo.png" type="image/x-icon">
    <link class="favicon" rel="shortcut icon" href="../img/main/logo.png" type="image/x-icon">
</head>

<main class="container my-5">
    
    <div class="row mb-5">
        <div class="col-md-6 d-flex flex-column justify-content-center align-items-start bg-light p-5">
            <h2 class="display-4">T-Shirt</h2>
            <h3 class="mb-3"></h3>
            <hr class="w-25">
            <a href="collection.php?collection=t-shirt" class="btn btn-dark btn-lg">Shop Now</a>
        </div>
        <div class="col-md-6">
            <img src="../img/main/MindBlow 2-16.jpg" class="img-fluid" alt="T-Shirt">
        </div>
    </div>

    <div class="row mb-5">
        <div class="col-md-6 order-md-2 d-flex flex-column justify-content-center align-items-start bg-success text-white p-5">
            <h2 class="display-4">Hoodie</h2>
            <h3 class="mb-3"></h3>
            <hr class="w-25 bg-white">
            <a href="collection.php?collection=hoodie" class="btn btn-light btn-lg">Shop Now</a>
        </div>
        <div class="col-md-6 order-md-1">
            <img src="../img/main/MindBlow 2-71.jpg" class="img-fluid" alt="T-Shirt">
        </div>
    </div>
</main>

<!-- New Arrivals -->
<section class="container my-5">
    <h2 class="text-center mb-4">New Collections</h2>
    <div class="row g-4">
        <?php while ($row = mysqli_fetch_assoc($all_product)) { ?>
        <div class="col-md-4">
            <div class="card border-0 shadow-sm">
                <img src="<?php echo $row['pImg']; ?>" class="card-img-top" alt="New Arrival">
                <div class="card-body text-center">
                    <h5 class="card-title"><?php echo $row['pName']; ?></h5>
                    <p class="card-text">Rp. <?php echo $row['pPrice']; ?></p>
                    <a href="product.php?pId=<?php echo $row['pId']; ?>" class="btn btn-dark">View Product</a>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</section>

<!-- Get on the List -->
<section class="container my-5 text-center">
    <h2>GET ON THE LIST</h2>
    <p>Be the first to shop new arrivals and exclusive promotions.</p>
    <form class="row g-3 justify-content-center">
        <div class="col-md-6">
            <input type="email" class="form-control" placeholder="Enter your email address" required>
        </div>
        <div class="col-md-3">
            <button type="submit" class="btn btn-success w-100">Submit</button>
        </div>
    </form>
</section>

<!-- Accessories and Sale -->
<section class="container my-5">
    <div class="row g-4">
        <div class="col-md-6">
            <div class="card bg-dark text-white text-center">
                <img src="../img/main/MindBlow 2-71.jpg" class="card-img" alt="hoodie">
                <div class="card-img-overlay d-flex flex-column justify-content-center">
                    <h3 class="card-title">Hoodie</h3>
                    <a href="collection.php?collection=hoodie" class="btn btn-light">Shop Now</a>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card bg-dark text-white text-center">
                <!-- Tambahkan gambar dummy jika gambar kosong -->
                <img src="../img/main/MindBlow 2-16.jpg" class="card-img" alt="T-Shirt" onerror="this.src='https://picsum.photos/600/400';">
                <div class="card-img-overlay d-flex flex-column justify-content-center">
                    <h3 class="card-title">T-Shirt</h3>
                    <p class="card-text">Now 30% off</p>
                    <a href="lookbook.php" class="btn btn-light">Explore</a>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- WhatsApp Floating Button -->
<a href="#" class="whatsapp-float" data-bs-toggle="modal" data-bs-target="#whatsappModal">
    <i class="fab fa-whatsapp"></i>
</a>

<!-- WhatsApp Modal -->
<div class="modal fade" id="whatsappModal" tabindex="-1" aria-labelledby="whatsappModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="whatsappModalLabel">Kami Tersedia di WhatsApp</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center">
                <p>Hubungi kami untuk pertanyaan atau bantuan melalui WhatsApp.</p>
                <a href="https://wa.me/6281234567890" target="_blank" class="btn btn-success">
                    <i class="fab fa-whatsapp"></i> Chat dengan Kami
                </a>
            </div>
        </div>
    </div>
</div>

<style>
    .whatsapp-float {
        position: fixed;
        bottom: 20px;
        right: 20px;
        background-color: #25d366;
        color: white;
        border-radius: 50%;
        width: 50px;
        height: 50px;
        display: flex;
        justify-content: center;
        align-items: center;
        box-shadow: 0px 4px 6px rgba(0, 0, 0, 0.1);
        z-index: 1000;
        text-decoration: none;
    }

    .whatsapp-float i {
        font-size: 24px;
    }

    .whatsapp-float:hover {
        background-color: #1ebe57;
    }
</style>

<?php include("footer.php"); ?>