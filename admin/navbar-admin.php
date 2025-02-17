<style>
    .nav-link {
        color: white !important; 
        transition: all 0.3s ease-in-out;
        padding: 5px 15px;
        border-radius: 20px;
        font-weight: bold;
    }

    .nav-link.active {
        color: white !important;
    }

    .nav-link:hover {
        background-color: rgba(255, 255, 255, 0.2); 
        border-radius: 20px;
    }
</style>

<nav class="navbar navbar-expand-lg navbar-light bg-warning">  
    <div class="container">
        <a class="navbar-brand text-white" href="#">Admin</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link <?php echo ($_SERVER['PHP_SELF'] == '/admin.php' ? 'active' : ''); ?>" href="admin.php">Home</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link <?php echo ($_SERVER['PHP_SELF'] == '/barang.php' ? 'active' : ''); ?>" href="barang.php">Daftar Barang</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link <?php echo ($_SERVER['PHP_SELF'] == '/user.php' ? 'active' : ''); ?>" href="user.php">User</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?php echo ($_SERVER['PHP_SELF'] == '/transaksi-petugas.php' ? 'active' : ''); ?>" href="transaksi-petugas.php">Transaksi Petugas</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?php echo ($_SERVER['PHP_SELF'] == '/laporan-stok.php' ? 'active' : ''); ?>" href="laporan-stok.php">Laporan Stok</a> 
                </li>

                <li class="nav-item">
                    <a class="nav-link <?php echo ($_SERVER['PHP_SELF'] == '/rekap.php' ? 'active' : ''); ?>" href="rekap.php">Rekapitulasi Transaksi</a>
                </li>
                
                <li class="nav-item">
                    <a class="nav-link" href="../logout.php" onclick="return confirm('Apakah Anda yakin akan logout?')">Logout</a>
                </li>
            </ul>
        </div>
    </div>
</nav>