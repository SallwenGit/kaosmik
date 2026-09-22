<div class="row align-items-center mb-3">
    <div class="col">
        <div class="page-title">Spécialisation</div>
    </div>
</div>
<div class="row mb-3">
    <div class="col-md-3">
        <div class="card h-100">
            <div class="card-body">
                <div class="card-title">Ajouter une spécialisation</div>
                <?= form_open('admin/specialization/create') ?>
                <div class="input-icon mb-3">
                    <span class="input-icon-addon">
                        <i class="fa-solid fa-tag"></i>
                    </span>
                    <input type="text" name="name" class="form-control" placeholder="Nom de la spécialisation" value="" title="Spécialisation" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea rows="5" class="form-control" name="description" placeholder="Description"></textarea>
                </div>
                <div class="d-grid mb-3">
                    <button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk me-2"></i></button>
                </div>
                <?= form_close() ?>
            </div>
        </div>
    </div>
    <div class="col-md-9">
        <div class="card h-100">
            <div class="card-body table-responsive">
                <table class="table table-hover table-striped table-sm" data-toggle="table" data-pagination="true" data-page-size="15" data-sortable="true">
                    <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Description</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php foreach ($specializations as $specialization): ?>
                        <tr>
                            <td><?= $specialization['name']; ?></td>
                            <td><?= $specialization['description']; ?></td>
                            <td class="d-flex">
                                <button type="button" class="btn btn-sm btn-warning openEditModal me-2" data-bs-toggle="modal" data-bs-target="#editModal" data-id="<?= $specialization['id']; ?>" data-name="<?= $specialization['name']; ?>" data-description="<?= $specialization['description']; ?>"><i class="fa-solid fa-pen-to-square"></i></button>
                                <?= form_open('Specialization/delete/' . $specialization['id']) ?>
                                <button type="submit" class="btn btn-sm btn-danger"><i class="fa-solid fa-trash"></i></button>
                                <?= form_close() ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal fade" id="editModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">Modification</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <?= form_open('admin/specialization/update/'); ?>
            <input type="hidden" id="updateId" value="" name="id">
            <div class="modal-body">
                <div class="input-icon mb-3">
                    <span class="input-icon-addon">
                        <i class="fa-solid fa-tag"></i>
                    </span>
                    <input id="updateName" type="text" name="name" class="form-control" placeholder="Nom spécialisation" value="" title="Spécialisation" required>
                </div>
                <div class="input-icon mb-3">
                    <span class="input-icon-addon">
                        <i class="fa-solid fa-scroll"></i>
                    </span>
                    <textarea rows="3" id="updateDescription" type="text" name="description" class="form-control" placeholder="Description" value="" title="Description"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                <button type="submit" class="btn btn-primary">Sauvegarder</button>
            </div>
            <?= form_close(); ?>
        </div>
    </div>
</div>
