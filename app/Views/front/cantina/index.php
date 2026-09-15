<div class="row">
    <div class="col d-flex">
        <div>
            <h1 class="shadow text-white">La Cantina</h1>
            <span class="text-white">Ici, on recrute nos mercenaires</span>
        </div>
        <div class="ms-auto">
            <?= form_open('cantina/refresh'); ?>
            <button type="submit" class="btn btn-kaosmik">
                Rafraichir la sélection
            </button>
            <?= form_close(); ?>
        </div>
    </div>
</div>
<div class="row g-3">
    <?php
    foreach($cantinaHeroes as $hero) : ?>
        <div class="col">
            <?= view_cell('HeroCell', ['character' => $hero, 'context' => 'cantina']) ; ?>
        </div>
    <?php endforeach; ?>

</div>