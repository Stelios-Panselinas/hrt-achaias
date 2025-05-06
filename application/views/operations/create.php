<h2><?= $title; ?></h2>
<div class="container col-4">
    <?php echo validation_errors(); ?>
    <?php echo form_open('operations/create'); ?>
    <div class="form-group">
        <label>Όνομα</label>
        <input type="text" class="form-control" id="operation_name" name="operation_name" placeholder="Ονομα Επιχείρησης">
    </div>
    <div class="form-group">
        <label >Τοποθεσία</label>
        <input type="text" class="form-control" id="place" name="place" placeholder="Add Place">
    </div>
    <div class="form-group">
        <label >Ημερομηνία</label>
        <input type="date" class="form-control" id="date" name="date">
    </div>
    <div class="form-group">
    <label>Άτομα</label>
    <div id="people" class="form-select" multiple>
        <?php foreach ($users as $user): ?>
            <label>
                <input type="checkbox" name="people[]" value="<?= $user['user_id']; ?>">
                <?= $user['name'] . ' ' . $user['surname']; ?>
            </label>
            <br>
        <?php endforeach; ?>
    </div>
</div>
<div class="form-group">
    <label>Τμήμα</label>
    <div id="subgroup" class="form-select" multiple>
        <?php foreach ($subgroups as $subgroup): ?>
            <label>
                <input type="checkbox" name="subgroups[]" value="<?= $subgroup['subgroup_id']; ?>">
                <?= $subgroup['sub_name']; ?>
            </label>
            <br>
        <?php endforeach; ?>
    </div>
</div>
    <br>
    <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>