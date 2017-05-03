<head>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <script src="http://code.jquery.com/jquery-3.1.1.js" type="text/javascript"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<nav class="navbar navbar-light bg-faded">
    <form class="form-inline">
        <input class="form-control  mr-sm-2" type="text" placeholder="Search">
        <button value="Add"  class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
    </form>
</nav>
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">ADD</button>


<!-- FORM AGGIUNTA UTENTI     !-->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                <h4 class="modal-title" id="myModalLabel">Aggiunta Utente</h4>
            </div>

            <div class="modal-body">
                <form id="frmTasks" method="post" action="/crudinsert" name="frmTasks" class="form-horizontal" novalidate="">

                    <?php echo e(csrf_field()); ?>

                    <div class="form-group error">

                        <label for="inputTask" class="col-sm-3 control-label">Nome</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control has-error" id="name" name="name" placeholder="Nome" value="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="email" name="email" placeholder="Email" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" value="">
                        </div>
                    </div>


            <div class="modal-footer">
                <button type="submit" name="save" class="btn btn-primary" id="btn-save" value="Add">Salva</button>
            </div>
            </form>
            </div>
        </div>
    </div>
</div>



<table class="table">
    <thead>
    <tr>
        <th>Nome</th>
        <th>Email</th>
        <th>Opzioni</th>
    </tr>

    </thead>
    <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $task): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>

    <tr id="task<?php echo e($task->id); ?>">
            <td><?php echo e($task->name); ?></td>
            <td><?php echo e($task->email); ?></td>
            <td>

                <button class="btn btn-info" data-toggle="modal" data-target="#viewModal" onclick="fun_view('<?php echo e($task -> id); ?>')">View</button>
                <button class="btn btn-warning" data-toggle="modal" data-target="#editModal" onclick="fun_edit('<?php echo e($task -> id); ?>')">Edit</button>
                <button class="btn btn-danger" data-target="#myModal2" onclick="fun_delete('<?php echo e($task -> id); ?>')">Delete</button>

            </td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

        </table>



<input type="hidden" name="hidden_view" id="hidden_view" value="<?php echo e(url('crud/view')); ?>">
<input type="hidden" name="hidden_delete" id="hidden_delete" value="<?php echo e(url('crud/delete')); ?>">


<div class="modal fade" id="viewModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">View</h4>
            </div>
            <div class="modal-body">
                <p><b>First Name : </b><span id="view_fname" class="text-success"></span></p>
                <p><b>Last Name : </b><span id="view_lname" class="text-success"></span></p>
                <p><b>Email : </b><span id="view_email" class="text-success">bhaskar.panja@quadone.com</span></p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal"></button>
            </div>
        </div>

    </div>
</div>



<div class="modal fade" id="editModal" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title">Edit</h4>
            </div>
            <div class="modal-body">
                <form action="<?php echo e(url('crud/update')); ?>" method="post">
                    <?php echo e(csrf_field()); ?>

                    <div class="form-group">
                        <div class="form-group">
                            <label for="edit_first_name"> Name:</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>

                        <label for="edit_email">Email :</label>
                        <input type="email" class="form-control" id="email" name="email">
                    </div>

                    <button type="submit" class="btn btn-default">Update</button>
                    <input type="hidden" id="edit_id" name="edit_id">
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>

        </div>

    </div>
</div>


<!-- SEZIONE SCRIPT CRUD !-->


<script type="text/javascript">
    function fun_delete(id)
    {
        var conf = confirm("Are you sure want to delete??");
        if(conf){
            var delete_url = $("#hidden_delete").val();
            $.ajax({
                url: delete_url,
                type:"POST",
                data: {"id":id,_token: "<?php echo e(csrf_token()); ?>"},
                success: function(response){
                    alert(response);
                    location.reload();
                }
            });
        }
        else{
            return false;
        }
    }

    function fun_edit(id)
    {
        var view_url = $("#hidden_view").val();
        $.ajax({
            url: view_url,
            type:"GET",
            data: {"id":id},
            success: function(result){
                //console.log(result);
                $("#edit_id").val(result.id);
                $("#name").val(result.name);

                $("#email").val(result.email);
            }
        });
    }



</script>


<nav aria-label="Page navigation">
    <ul class="pagination">
        <li>
            <a href="#" aria-label="Previous">
                <span aria-hidden="true">&laquo;</span>
            </a>
        </li>
        <li><a href="#">1</a></li>
        <li><a href="#">2</a></li>
        <li><a href="#">3</a></li>
        <li><a href="#">4</a></li>
        <li><a href="#">5</a></li>
        <li>
            <a href="#" aria-label="Next">
                <span aria-hidden="true">&raquo;</span>
            </a>
        </li>
    </ul>
</nav>
