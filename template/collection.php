<?php
include("header.php");

$collection = "";
if (isset($_GET["collection"])) {
    $collection = $_GET["collection"];
}

$sql = "SELECT * FROM products WHERE pCollection = '$collection' ";
$all_product = $con->query($sql);
?>
<head>
    <link rel="stylesheet" href="../static/collection.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>

<!-- Hero Section -->
<section class="py-5 bg-dark text-white mb-5 rounded-3 shadow">
    <div class="container text-center">
        <h1 class="display-4 text-uppercase mb-3"><?php echo ucfirst($collection); ?> Collection</h1>
        <p class="lead">Temukan pilihan terbaik dari koleksi <?php echo $collection; ?> kami!</p>
    </div>
</section>

<!-- Product Grid -->
<div class="container mb-5">
    <div class="row g-4">
        <?php while($row = mysqli_fetch_assoc($all_product)) { ?>
        <div class="col-12 col-sm-6 col-md-4 col-lg-3">
            <div class="card h-100 shadow border-0">
                <img src="<?php echo $row['pImg']; ?>" class="card-img-top" alt="<?php echo $row['pName']; ?>" style="height: 250px; object-fit: cover;">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title text-center text-uppercase"><?php echo $row['pName']; ?></h5>
                    <p class="card-text text-center text-success fw-bold mb-2">Rp. <?php echo number_format($row['pPrice'], 0, ',', '.'); ?></p>
                    <div class="mt-auto">
                        <a href="product.php?pId=<?php echo $row['pId'] ?>" class="btn btn-dark w-100">Quick View</a>
                    </div>
                </div>
            </div>
        </div>
        <?php } ?>
    </div>
</div>
<?php include("footer.php"); ?>