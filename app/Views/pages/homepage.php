<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<link rel="stylesheet" href="<?= base_url('css/homepage.css') ?>">


<body>
    <div class="container-fluid">
        <!-- Header -->
        <div class="header">
            <!-- Logo -->
            <div class="logo">
                <img src="https://via.placeholder.com/150x50?text=CashRich" alt="CashRich Logo">
            </div>
            <!-- User Info and Logout -->
            <div class="user-info">
                <span class="username">User Name</span>
                <a href="#" class="logout">Logout</a>
            </div>
        </div>

        <!-- Search Section -->
        <div class="search-box">
            <h3>Search</h3>
            <form class="d-flex">
                <input type="text" class="form-control" placeholder="Enter coin symbols">
                <button type="submit" class="btn btn-search">Search</button>
            </form>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<?= $this->endSection() ?>