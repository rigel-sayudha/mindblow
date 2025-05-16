<?php
session_start();
require_once 'dbcon.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin | Mindblow</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">Admin Dashboard</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="logout.php">Logout</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Welcome Section -->
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1 class="display-4">Selamat Datang, Admin</h1>
                <p class="lead">Kelola pengguna dan data produk di sini.</p>
            </div>
        </div>
    </div>

    <!-- User List -->
    <div class="container mt-5">
        <h3 class="mb-4">Daftar Pengguna</h3>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">User</th>
                        <th scope="col">Created</th>
                        <th scope="col" class="text-center">Status</th>
                        <th scope="col">Email</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $sql = "SELECT * FROM registration";
                    $sql_data = $con->query($sql);
                    while ($sql_row = mysqli_fetch_assoc($sql_data)) { ?>
                        <tr>
                            <td>
                                <img src="<?php echo $sql_row['profile']; ?>" alt="" class="rounded-circle" style="width: 50px; height: 50px;">
                                <span class="ms-2"><?php echo $sql_row['username']; ?></span>
                            </td>
                            <td>2013/08/08</td>
                            <td class="text-center">
                                <span class="badge bg-secondary">Inactive</span>
                            </td>
                            <td><?php echo $sql_row['email']; ?></td>
                            <td>
                                <a href="admin_userOrders.php?username=<?php echo $sql_row['username']; ?>" class="btn btn-sm btn-info">
                                    <i class="fas fa-search"></i>
                                </a>
                                <!-- Trigger Modal -->
                                <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal" data-bs-target="#editUserModal<?php echo $sql_row['id']; ?>">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <a href="#" class="btn btn-sm btn-danger">
                                    <i class="fas fa-trash"></i>
                                </a>
                            </td>
                        </tr>

                        <!-- Modal for Editing User -->
                        <div class="modal fade" id="editUserModal<?php echo $sql_row['id']; ?>" tabindex="-1" aria-labelledby="editUserModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editUserModalLabel">Edit User</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <form action="" method="POST">
                                        <div class="modal-body">
                                            <input type="hidden" name="userId" value="<?php echo $sql_row['id']; ?>">
                                            <div class="mb-3">
                                                <label for="username" class="form-label">Username</label>
                                                <input type="text" class="form-control" id="username" name="username" value="<?php echo $sql_row['username']; ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" class="form-control" id="email" name="email" value="<?php echo $sql_row['email']; ?>" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="status" class="form-label">Status</label>
                                                <select class="form-select" id="status" name="status">
                                                    <option value="Active" <?php echo ($sql_row['status'] == 'Active') ? 'selected' : ''; ?>>Active</option>
                                                    <option value="Inactive" <?php echo ($sql_row['status'] == 'Inactive') ? 'selected' : ''; ?>>Inactive</option>
                                                </select>
                                            </div>
                                            <hr>
                                            <h5>Ubah Password</h5>
                                            <div class="mb-3">
                                                <label for="newPassword" class="form-label">Password Baru</label>
                                                <input type="password" class="form-control" id="newPassword" name="newPassword">
                                            </div>
                                            <div class="mb-3">
                                                <label for="confirmPassword" class="form-label">Konfirmasi Password Baru</label>
                                                <input type="password" class="form-control" id="confirmPassword" name="confirmPassword">
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <button type="submit" name="updateUser" class="btn btn-primary">Save Changes</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

    <?php
    // Handle Update User Form Submission
    if (isset($_POST['updateUser'])) {
        $userId = $_POST['userId'];
        $username = $_POST['username'];
        $email = $_POST['email'];
        $status = $_POST['status'];
        $newPassword = $_POST['newPassword'];
        $confirmPassword = $_POST['confirmPassword'];

        // Update user details
        $updateQuery = "UPDATE registration SET username='$username', email='$email', status='$status' WHERE id='$userId'";
        if ($con->query($updateQuery)) {
            // If password fields are filled, update the password
            if (!empty($newPassword) && !empty($confirmPassword)) {
                if ($newPassword === $confirmPassword) {
                    $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
                    $passwordQuery = "UPDATE registration SET password='$hashedPassword' WHERE id='$userId'";
                    if ($con->query($passwordQuery)) {
                        echo "<script>alert('User and password updated successfully!'); window.location.href='admin_home.php';</script>";
                    } else {
                        echo "<script>alert('Failed to update password.');</script>";
                    }
                } else {
                    echo "<script>alert('Password baru dan konfirmasi tidak cocok.');</script>";
                }
            } else {
                echo "<script>alert('User updated successfully!'); window.location.href='admin_home.php';</script>";
            }
        } else {
            echo "<script>alert('Failed to update user.');</script>";
        }
    }
    ?>

    <?php
    if (isset($_POST['changePassword'])) {
        $currentPassword = $_POST['currentPassword'];
        $newPassword = $_POST['newPassword'];
        $confirmPassword = $_POST['confirmPassword'];

        $adminQuery = "SELECT * FROM registration WHERE email='admin@admin.com'";
        $adminResult = $con->query($adminQuery);
        $adminData = mysqli_fetch_assoc($adminResult);

        if (password_verify($currentPassword, $adminData['password'])) {
            if ($newPassword === $confirmPassword) {
                $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
                $updateQuery = "UPDATE registration SET password='$hashedPassword' WHERE email='admin@admin.com'";
                if ($con->query($updateQuery)) {
                    echo "<script>alert('Password berhasil diubah!');</script>";
                } else {
                    echo "<script>alert('Terjadi kesalahan saat mengubah password.');</script>";
                }
            } else {
                echo "<script>alert('Password baru dan konfirmasi tidak cocok.');</script>";
            }
        } else {
            echo "<script>alert('Password lama salah.');</script>";
        }
    }
    ?>



    <!-- Product List Section -->
    <div class="container my-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h3 class="mb-0">Daftar Produk</h3>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addProductModal">
                <i class="fa fa-plus"></i> Tambah Produk
            </button>
        </div>
        <div class="row g-4">
            <?php
            $sql = "SELECT * FROM products";
            $product_data = $con->query($sql);
            while ($product = mysqli_fetch_assoc($product_data)) { ?>
            <div class="col-12 col-sm-6 col-md-4 col-lg-3">
                <div class="card h-100 shadow border-0">
                    <img src="<?php echo $product['pImg']; ?>" class="card-img-top" alt="<?php echo $product['pName']; ?>" style="height: 200px; object-fit: cover;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title text-center text-uppercase"><?php echo $product['pName']; ?></h5>
                        <p class="card-text text-center text-success fw-bold mb-2">Rp. <?php echo number_format($product['pPrice'], 0, ',', '.'); ?></p>
                        <p class="card-text text-center mb-2">Stock: <?php echo $product['pQty']; ?></p>
                        <div class="d-flex justify-content-center gap-2 mt-auto">
                            <!-- Edit Button -->
                            <button class="btn btn-warning btn-sm" data-bs-toggle="modal" data-bs-target="#editProductModal<?php echo $product['pId']; ?>">
                                <i class="fa fa-edit"></i> Edit
                            </button>
                            <!-- Delete Button -->
                            <form action="" method="POST" onsubmit="return confirm('Yakin ingin menghapus produk ini?');">
                                <input type="hidden" name="deleteProductId" value="<?php echo $product['pId']; ?>">
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i> Hapus
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Edit Product Modal -->
            <div class="modal fade" id="editProductModal<?php echo $product['pId']; ?>" tabindex="-1" aria-labelledby="editProductModalLabel<?php echo $product['pId']; ?>" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="modal-header">
                                <h5 class="modal-title" id="editProductModalLabel<?php echo $product['pId']; ?>">Edit Produk</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="editProductId" value="<?php echo $product['pId']; ?>">
                                <div class="mb-3">
                                    <label class="form-label">Nama Produk</label>
                                    <input type="text" class="form-control" name="editPName" value="<?php echo $product['pName']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Harga Produk</label>
                                    <input type="number" class="form-control" name="editPPrice" value="<?php echo $product['pPrice']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Stok Produk</label>
                                    <input type="number" class="form-control" name="editPQty" value="<?php echo $product['pQty']; ?>" required>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Koleksi</label>
                                    <select class="form-select" name="editPCollection" required>
                                        <?php
                                        $collectionQuery = "SELECT * FROM collection_table";
                                        $collectionResult = $con->query($collectionQuery);
                                        while ($row = mysqli_fetch_assoc($collectionResult)) {
                                            $selected = ($row['collection'] == $product['pCollection']) ? 'selected' : '';
                                            echo "<option value='" . $row['collection'] . "' $selected>" . $row['collection'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Detail Produk</label>
                                    <textarea class="form-control" name="editPDetails" rows="3"><?php echo $product['pDetails']; ?></textarea>
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Gambar Produk</label>
                                    <input type="file" class="form-control" name="editPImg" accept="image/*">
                                    <small class="text-muted">Biarkan kosong jika tidak ingin mengubah gambar</small>
                                    <img src="<?php echo $product['pImg']; ?>" class="img-thumbnail mt-2" style="height: 100px">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Gambar Produk 2</label>
                                    <input type="file" class="form-control" name="editPAImg" accept="image/*">
                                    <small class="text-muted">Biarkan kosong jika tidak ingin mengubah gambar</small>
                                    <img src="<?php echo $product['pAImg']; ?>" class="img-thumbnail mt-2" style="height: 100px">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                                <button type="submit" name="updateProduct" class="btn btn-primary">Simpan Perubahan</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>

    <!-- Add Product Modal -->
    <div class="modal fade" id="addProductModal" tabindex="-1" aria-labelledby="addProductModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="" method="POST" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="addProductModalLabel">Tambah Produk Baru</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label for="pName" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="pName" name="pName" required>
                        </div>
                        <div class="mb-3">
                            <label for="pPrice" class="form-label">Product Price</label>
                            <input type="number" class="form-control" id="pPrice" name="pPrice" required>
                        </div>
                        <div class="mb-3">
                            <label for="pQty" class="form-label">Product Quantity</label>
                            <input type="number" class="form-control" id="pQty" name="pQty" required>
                        </div>
                        <div class="mb-3">
                            <label for="pCollection" class="form-label">Product Collection</label>
                            <select class="form-select" id="pCollection" name="pCollection" required>
                                <?php
                                $collectionQuery = "SELECT * FROM collection_table";
                                $collectionResult = $con->query($collectionQuery);
                                while ($row = mysqli_fetch_assoc($collectionResult)) {
                                    echo "<option value='" . $row['collection'] . "'>" . $row['collection'] . "</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="pDetails" class="form-label">Product Details</label>
                            <textarea class="form-control" id="pDetails" name="pDetails" rows="3" placeholder="Masukkan detail produk"></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="pImg" class="form-label">Product Image</label>
                            <input type="file" class="form-control" id="pImg" name="pImg" accept="image/*" required>
                        </div>
                        <div class="mb-3">
                            <label for="pImg" class="form-label">Product Image 2</label>
                            <input type="file" class="form-control" id="pAImg" name="pImg" accept="image/*" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" name="addProduct" class="btn btn-primary">Tambah Produk</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>

<?php
if (isset($_POST['addProduct'])) {
    $pName = mysqli_real_escape_string($con, $_POST['pName']);
    $pPrice = mysqli_real_escape_string($con, $_POST['pPrice']);
    $pQty = mysqli_real_escape_string($con, $_POST['pQty']);
    $pCollection = mysqli_real_escape_string($con, $_POST['pCollection']);
    $pDetails = mysqli_real_escape_string($con, $_POST['pDetails']); // Tambahkan ini

    $targetDir = "../uploads/";
    $targetFile = $targetDir . basename($_FILES["pImg"]["name"]);
    $uploadOk = 1;

    $check = getimagesize($_FILES["pImg"]["tmp_name"]);
    if ($check !== false) {
        $uploadOk = 1;
    } else {
        echo "<script>alert('File is not an image.');</script>";
        $uploadOk = 0;
    }

    if (file_exists($targetFile)) {
        echo "<script>alert('Sorry, file already exists.');</script>";
        $uploadOk = 0;
    }

    if ($_FILES["pImg"]["size"] > 50000000) {
        echo "<script>alert('Sorry, your file is too large.');</script>";
        $uploadOk = 0;
    }
  
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "<script>alert('Sorry, only JPG, JPEG, PNG & GIF files are allowed.');</script>";
        $uploadOk = 0;
    }

  
    if ($uploadOk == 0) {
        echo "<script>alert('Sorry, your file was not uploaded.');</script>";
    } else {
        if (move_uploaded_file($_FILES["pImg"]["tmp_name"], $targetFile)) {
            $insertQuery = "INSERT INTO products (pName, pPrice, pQty, pCollection, pDetails, pImg) 
                            VALUES ('$pName', '$pPrice', '$pQty', '$pCollection', '$pDetails', '$targetFile')";

            if ($con->query($insertQuery)) {
                echo "<script>alert('Product added successfully!'); window.location.href='admin_home.php';</script>";
            } else {
                echo "<script>alert('Failed to add product.');</script>";
            }
        } else {
            echo "<script>alert('Sorry, there was an error uploading your file.');</script>";
        }
    }
}

if (isset($_POST['updateProduct'])) {
    $editProductId = mysqli_real_escape_string($con, $_POST['editProductId']);
    $editPName = mysqli_real_escape_string($con, $_POST['editPName']);
    $editPPrice = mysqli_real_escape_string($con, $_POST['editPPrice']);
    $editPQty = mysqli_real_escape_string($con, $_POST['editPQty']);
    $editPCollection = mysqli_real_escape_string($con, $_POST['editPCollection']);
    $editPDetails = mysqli_real_escape_string($con, $_POST['editPDetails']); // Tambahkan ini

    // Update fields termasuk pDetails
    $updateFields = "pName='$editPName', pPrice='$editPPrice', pQty='$editPQty', pCollection='$editPCollection', pDetails='$editPDetails'";

    if(isset($_FILES['editPImg']) && $_FILES['editPImg']['error'] == 0) {
        $targetDir = "../uploads/";
        $targetFile = $targetDir . basename($_FILES["editPImg"]["name"]);
        
        if(move_uploaded_file($_FILES["editPImg"]["tmp_name"], $targetFile)) {
            $updateFields .= ", pImg='$targetFile'";
        }
    }

    if(isset($_FILES['editPAImg']) && $_FILES['editPAImg']['error'] == 0) {
        $targetDir = "../uploads/";
        $targetFile = $targetDir . basename($_FILES["editPAImg"]["name"]);
        
        if(move_uploaded_file($_FILES["editPAImg"]["tmp_name"], $targetFile)) {
            $updateFields .= ", pAImg='$targetFile'";
        }
    }

    $updateQuery = "UPDATE products SET $updateFields WHERE pId='$editProductId'";
    if ($con->query($updateQuery)) {
        echo "<script>alert('Produk berhasil diupdate!'); window.location.href='admin_home.php';</script>";
    } else {
        echo "<script>alert('Gagal mengupdate produk.');</script>";
    }
}

if (isset($_POST['deleteProductId'])) {
    $deleteProductId = mysqli_real_escape_string($con, $_POST['deleteProductId']);
    $deleteQuery = "DELETE FROM products WHERE pId='$deleteProductId'";
    if ($con->query($deleteQuery)) {
        echo "<script>alert('Produk berhasil dihapus!'); window.location.href='admin_home.php';</script>";
    } else {
        echo "<script>alert('Gagal menghapus produk.');</script>";
    }
}
?>