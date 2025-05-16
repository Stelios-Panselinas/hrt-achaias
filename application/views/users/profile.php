<h1><?= $title ?></h1>

<div class="container">
    <div class="row">
        <h3><?= $personal_info['name'] . ' ' . $personal_info['surname'] ?></h3>
        <div class="col-12">
            <p><?= $personal_info['email'] ?></p>
            <p>AM: <?= $personal_info['AM'] ?></p>
            <?php foreach ($subgroup_info as $sub_info): ?>
                <p>Τμήμα: <?= $sub_info['sub_name'] ?></p>
            <?php endforeach; ?>
        </div>
        <div class="col-md-6 col-12">
            <h4>Οι Καλύψεις μου</h4>
            <hr>
            <table class="table table-striped table-responsive">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Όνομα Κάλυψης</th>
                        <th scope="col">Τοποθεσία</th>
                        <th scope="col">Ημερομηνία</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($operations as $operation): ?>
                        <tr>
                            <th scope="row"><?= $operation['operation_id'] ?></th>
                            <td><?= $operation['name'] ?></td>
                            <td><?= $operation['place'] ?></td>
                            <td><?= $operation['date'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
        <div class="col-md-6 col-12">
            <h4>Οι Εκπαιδεύσεις μου</h4>
            <hr>
            <table class="table table-striped table-responsive">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Όνομα Εκπαιδεύσης</th>
                        <th scope="col">Ημερομηνία</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($trainings as $training): ?>
                        <tr>
                            <th scope="row"><?= $training['training_id'] ?></th>
                            <td><?= $training['name'] ?></td>
                            <td><?= $training['date'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
