<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<link rel="stylesheet" href="<?= base_url('css/homepage.css') ?>">
<?php helper('form'); ?>

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
                <span class="username"><?= session()->get('user_name') ?></span>
                <a href=<?=base_url('/logout') ?> class="logout">Logout</a>
            </div>
        </div>

       <!-- Search Section -->
       <div class="search-box">
            <h3>Search</h3>
            <form class="d-flex" action='<?= base_url('/search') ?>' method="post">
                <?= csrf_field() ?>
                <!-- Conditionally change placeholder based on user_name session -->
                <input type="text" class="form-control" name='search_term'
                    placeholder="<?= session()->has('user_name') ? 'Search by user coins' : 'BTC ADA BNB' ?>">
                
                <!-- Conditionally display search button only if user_name is set -->
                <?php if (session()->has('user_name')): ?>
                    <button type="submit" class="btn btn-search">Search</button>
                <?php endif; ?>
            </form>
        </div>
    </div>





    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
<?= $this->endSection() ?>