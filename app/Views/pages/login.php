<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<link rel="stylesheet" href="<?= base_url('css/login.css') ?>">
<?php helper('form'); ?>

<div class="container">
        <div class="signup-container">
            <div class="logo">
                <img src="https://via.placeholder.com/150x50?text=CashRich" alt="CashRich Logo">
            </div>
            <h3>Login</h3>
            <!-- Show validation errors (if any) -->
            <?php if (isset($validation)): ?>
                <div class="alert alert-danger">
                    <?= $validation->listErrors() ?>
                </div>
            <?php endif; ?>

            <form action="<?= base_url('/login') ?>" method="post">
            <?= csrf_field() ?>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control <?=isset($validation) && $validation->hasError('name') ? 'is-invalid': ''?> " id="email" placeholder="Enter your email" name="email" value="<?=set_value('email')?>">
                </div>
                <div class="form-group">
                    <label for="password">Password</label>
                    <input type="password" class="form-control <?= isset($validation) && $validation->hasError('password') ? 'is-invalid' : ''?>" id="password" placeholder="Enter your password" name="password" value="<?=set_value('password') ?>">
                </div>
                <button type="submit" class="btn btn-primary">login</button>
                <p>Don't have an account, click on <a href='<?=base_url('/signup') ?>'>Click here</a></p>
            </form>
        </div>
    </div>


<?= $this->endSection() ?>