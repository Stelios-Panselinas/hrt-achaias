<?php if($this->session->userdata('is_ds') && !is_null($this->session->userdata('logged_in'))): ?>
<div class="conatiner">
    <div class="row">
        <h1> <?php echo $title; ?> </h1>
        <div class="col-12 d-flex justify-content-center">

            <table class="table table-striped table-responsive">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Όνομα</th>
                        <th scope="col">Επίθετο</th>
                        <th scope="col">Καλύψεις</th>
                        <th scope="col">Εκπαιδεύσεις</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($all_members as $department_member): ?>
                        <tr>
                            <th scope="row"><?= $department_member['user_id'] ?></th>
                            <td><?= $department_member['name'] ?></td>
                            <td><?= $department_member['surname'] ?></td>
                            <td>
                                <div class="row">
                                    <div class="col-8" id="accordion<?php echo $department_member['user_id']; ?>">

                                        <div class="card">
                                            <div class="card-header">
                                                <a class="btn" data-bs-toggle="collapse" href="#collapseOne<?php echo $department_member['user_id']; ?>">
                                                    Καλύψεις
                                                </a>
                                            </div>
                                            <div id="collapseOne<?php echo $department_member['user_id']; ?>" class="collapse" data-bs-parent="#accordion<?php echo $department_member['user_id']; ?>">
                                                <div class="card-body">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">#</th>
                                                                <th scope="col">Όνομα Κάλυψης</th>
                                                                <th scope="col">Ημερομηνία</th>
                                                                <th scope="col">Τοποθεσία</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($department_member['operations'] as $operation): ?>
                                                                <tr>
                                                                    <th scope="row"><?= $operation['operation_id'] ?></th>
                                                                    <td><?= $operation['name'] ?></td>
                                                                    <td><?= $operation['date'] ?></td>
                                                                    <td><?= $operation['place'] ?></td>
                                                                </tr>
                                                                <?php endforeach; ?>
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                            <td>
                                <div class="row">
                                <div class="col-8" id="accordion">
                                        <div class="card">
                                            <div class="card-header">
                                                <a class="collapsed btn" data-bs-toggle="collapse" href="#collapseTwo<?php echo $department_member['user_id']; ?>">
                                                    Εκπαιδεύσεις
                                                </a>
                                            </div>
                                            <div id="collapseTwo<?php echo $department_member['user_id']; ?>" class="collapse" data-bs-parent="#accordion">
                                                <div class="card-body">
                                                    <table class="table">
                                                        <thead>
                                                            <tr>
                                                                <th scope="col">#</th>
                                                                <th scope="col">Όνομα</th>
                                                                <th scope="col">Ημερομηνία</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            <?php foreach ($department_member['training'] as $training): ?>
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
                                    </div>
                                </div>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php else: ?>
	<?php redirect('home');?>
<?php endif;?>
