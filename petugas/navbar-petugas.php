<style>
   
    .nav-link {
        color: white !important; 
        transition: all 0.3s ease-in-out;
        padding: 5px 15px; 
        border-radius: 20px;
    }

    .nav-link.active {
        color: white !important;
    }

    .nav-link:hover {
        background-color: rgba(255, 255, 255, 0.2);
        border-radius: 20px; 
    }

    .navbar {
        background-color: #ffc107 !important; 
    }


    .navbar-brand {
        color: white !important; 
    }

    .navbar-nav .nav-item .nav-link.active {
        color: white !important;
    }

    .nav-link {
        font-weight: bold;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
        <a class="navbar-brand" href="#">Petugas</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link <?php echo ($_SERVER['PHP_SELF'] == '/petugas.php' ? 'active' : ''); ?>" aria-current="page" href="petugas.php">Home</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?php echo ($_SERVER['PHP_SELF'] == '/tambah_barang.php' ? 'active' : ''); ?>" href="tambah_barang.php">Tambah Barang</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link <?php echo ($_SERVER['PHP_SELF'] == '/transaksi.php' ? 'active' : ''); ?>" href="transaksi.php">Transaksi Barang</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?php echo ($_SERVER['PHP_SELF'] == '/stok.php' ? 'active' : ''); ?>" href="stok.php">Stok Barang</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="../logout.php" onclick="return confirm('Apakah Anda yakin akan logout?')">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>
