<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<link rel="stylesheet" href="<?= base_url('css/singup.css') ?>">

    <!-- <style>
    </style> -->
<body>
    <div class="container">
        <div class="signup-container">
            <div class="logo">
                <img src="https://via.placeholder.com/150x50?text=CashRich" alt="CashRich Logo">
            </div>
            <h3>Sign Up</h3>
            <form>
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" class="form-control" id="name" placeholder="Enter your name">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Enter your email">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control" id="password" placeholder="Enter your password">
                </div>
                <button type="submit" class="btn btn-primary">Sign Up</button>
            </form>
        </div>
    </div>
    <?= $this->endSection() ?>
