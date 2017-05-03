<div class="container">

    <div class="card card-block">
        <h2 class="card-title">Laravel AJAX Examples
            <small>via jQuery .ajax()</small>
        </h2>
        <p class="card-text">Learn how to handle ajax with Laravel and jQuery.</p>
        <button id="btn-add" name="btn-add" class="btn btn-primary btn-xs">Add New Link</button>
    </div>

    <div>
        <table class="table table-inverse">
            <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Opzioni</th>
            </tr>
            </thead>
            <tbody id="links-list" name="links-list">
            <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $link): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr id="link<?php echo e($link->id); ?>">
                    <td><?php echo e($link->id); ?></td>
                    <td><?php echo e($link->url); ?></td>
                    <td><?php echo e($link->description); ?></td>
                    <td>
                        <button class="btn btn-info open-modal" value="<?php echo e($link->id); ?>">Edit
                        </button>
                        <button class="btn btn-danger delete-link" value="<?php echo e($link->id); ?>">Delete
                        </button>
                    </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>

        <div class="modal fade" id="linkEditorModal" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="linkEditorModalLabel">Link Editor</h4>
                    </div>
                    <div class="modal-body">
                        <form id="modalFormData" name="modalFormData" class="form-horizontal" novalidate="">

                            <div class="form-group">
                                <label for="inputLink" class="col-sm-2 control-label">Link</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="link" name="link"
                                           placeholder="Enter URL" value="">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Description</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="description" name="description"
                                           placeholder="Enter Link Description" value="">
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary" id="btn-save" value="add">Save changes
                        </button>
                        <input type="hidden" id="link_id" name="link_id" value="0">
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>