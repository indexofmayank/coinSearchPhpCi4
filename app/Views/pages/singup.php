<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<link rel="stylesheet" href="<?= base_url('css/signup.css') ?>">
<?php helper('form'); ?>

<div class="container">
    <div class="signup-container">
        <div class="logo">
            <img src="https://via.placeholder.com/150x50?text=CashRich" alt="CashRich Logo">
        </div>
        <h3>Sign Up</h3>

        <!-- Show validation errors (if any) -->
        <?php if (isset($validation)): ?>
            <div class="alert alert-danger">
                <?= $validation->listErrors() ?>
            </div>
        <?php endif; ?>

        <form action="<?= base_url('/signup') ?>" method="post">
            <?= csrf_field() ?>
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" class="form-control <?= isset($validation) && $validation->hasError('name') ? 'is-invalid' : '' ?>" 
                    id="name" 
                    placeholder="Enter your name" 
                    name="name" 
                    value="<?= set_value('name') ?>">
                
                <!-- Display individual error for the name field -->
                <?php if (isset($validation) && $validation->hasError('name')): ?>
                    <div class="invalid-feedback">
                        <?= $validation->getError('name') ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" class="form-control <?= isset($validation) && $validation->hasError('email') ? 'is-invalid' : '' ?>" 
                    id="email" 
                    placeholder="Enter your email" 
                    name="email" 
                    value="<?= set_value('email') ?>">

                <!-- Display individual error for the email field -->
                <?php if (isset($validation) && $validation->hasError('email')): ?>
                    <div class="invalid-feedback">
                        <?= $validation->getError('email') ?>
                    </div>
                <?php endif; ?>
            </div>

            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" class="form-control <?= isset($validation) && $validation->hasError('password') ? 'is-invalid' : '' ?>" 
                    id="password" 
                    placeholder="Enter your password" 
                    name="password" 
                    value="<?= set_value('password') ?>">

                <!-- Display individual error for the password field -->
                <?php if (isset($validation) && $validation->hasError('password')): ?>
                    <div class="invalid-feedback">
                        <?= $validation->getError('password') ?>
                    </div>
                <?php endif; ?>
            </div>

            <button type="submit" class="btn btn-primary">Sign Up</button>
            <p>Already have an account, <a href='<?= base_url('login') ?>'>click here</a></p>
        </form>
    </div>
</div>

<?= $this->endSection() ?>
