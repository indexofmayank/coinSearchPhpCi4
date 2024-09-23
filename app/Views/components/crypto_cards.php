<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<link rel="stylesheet" href="<?= base_url('css/cryptocard.css') ?>">

</head>
<body>

<div class="container mt-5">
    <div class="row">
        <?php foreach ($cryptos as $crypto): ?>
            <div class="col-md-4">
                <div class="card p-3">
                    <h5 class="card-title"><?= $crypto['name'] ?></h5>
                    <p class="card-text <?= $crypto['change_type'] ?>">
                        <?= $crypto['change'] ?>
                    </p>
                    <p class="price">Price: <?= $crypto['price'] ?></p>
                    <p class="rank">Rank: <?= $crypto['rank'] ?></p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</div>

