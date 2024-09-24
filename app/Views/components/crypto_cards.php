<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>
<link rel="stylesheet" href="<?= base_url('css/cryptocard.css') ?>">

<div class="container mt-5">
    <div class="row">
        <?php if(!empty($cryptos)): ?>
            <?php foreach ($cryptos as $crypto): ?>
                <div class="col-md-4">
                    <div class="card p-3">
                        <h5 class="card-title"><?= esc($crypto['name']) ?></h5>
                        <p class="card-text <?= esc($crypto['change_type']) ?>">
                            <?= esc($crypto['change']) ?>
                        </p>
                        <p class="price">Price: $<?= number_format(esc($crypto['price']), 2) ?></p>
                        <p class="rank">Rank: <?= esc($crypto['rank']) ?></p>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="col-12">
                <p>No cryptocurrency data found.</p>
            </div>
        <?php endif; ?>
    </div>
</div>

<?= $this->endSection() ?>
