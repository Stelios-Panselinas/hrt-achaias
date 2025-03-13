<h2><?= $title?></h2>

<div class="container">
    <div class="row">
        <div class="col-12">
            <h3><?= $personal_info['name'] . ' ' . $personal_info['surname'] ?></h3>
            <p><?= $personal_info['email'] ?></p>
            <p>AM: <?= $personal_info['AM'] ?></p>
            <?php foreach ($subgroup_info as $sub_info): ?>
                <p>Τμήμα: <?= $sub_info['sub_name'] ?></p>
                <?php endforeach; ?>
        </div>
    </div>
</div>