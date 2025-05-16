<?php
include("header.php");
?>
<head>
    <title>Catalog | Mindblow</title>
    <link rel="stylesheet" href="../static/lookbook.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" />
    <link class="favicon" rel="shortcut icon" href="../img/main/logo.png" type="image/x-icon">
</head>

<!-- Hero Section -->
<section class="py-5 bg-dark text-white mb-5 rounded-3 shadow">
    <div class="container text-center">
        <h1 class="display-4 mb-3">Catalog</h1>
        <p class="lead">Discover our latest and trendiest collections.</p>
    </div>
</section>

<main class="container my-5">
    <h2 class="text-center mb-4 fw-bold">Catalog</h2>
    <div class="row justify-content-center">
        <div class="col-12">
            <div class="owl-carousel owl-theme">
                <?php
                $sql = "SELECT * FROM products ORDER BY RAND()";
                $all_product = $con->query($sql);
                while($row = mysqli_fetch_assoc($all_product)) { ?>
                <div class="item mb-4">
                    <div class="card border-0 shadow h-100">
                        <a href="product.php?pId=<?php echo $row['pId'] ?>">
                            <img src="<?php echo $row['pImg']; ?>" alt="" class="card-img-top" style="height:250px;object-fit:cover;">
                        </a>
                        <div class="card-body text-center">
                            <h5 class="card-title text-uppercase"><?php echo $row['pName']; ?></h5>
                            <p class="card-text text-success fw-bold">Rp. <?php echo $row['pPrice']; ?></p>
                            <a href="product.php?pId=<?php echo $row['pId'] ?>" class="btn btn-dark w-100">Quick View</a>
                        </div>
                    </div>
                </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <h2 class="text-center my-5 fw-bold">All Latest and Trendy Collections</h2>
    <div class="row g-4">
        <?php
        $sql = "SELECT * FROM products ORDER BY RAND()";
        $all_product = $con->query($sql);
        while($row = mysqli_fetch_assoc($all_product)) { ?>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card h-100 shadow border-0">
                <a href="product.php?pId=<?php echo $row['pId'] ?>">
                    <img src="<?php echo $row['pImg']; ?>" alt="" class="card-img-top" style="height:220px;object-fit:cover;">
                </a>
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title text-center text-uppercase"><?php echo $row['pName']; ?></h5>
                    <p class="card-text text-center text-success fw-bold mb-2">Rp. <?php echo number_format($row['pPrice'], 0, ',', '.'); ?></p>
                    <div class="mt-auto">
                        <a href="product.php?pId=<?php echo $row['pId'] ?>" class="btn btn-outline-dark w-100">Quick View</a>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/owl.carousel.min.js"></script>
<script>
    $('.owl-carousel').owlCarousel({
        loop: true,
        margin: 15,
        nav: true,
        dots: false,
        responsive: {
            0: { items: 1 },
            600: { items: 3 },
            1000: { items: 5 }
        }
    })
</script>
<?php include("footer.php"); ?>