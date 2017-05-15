<head>
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">
    <script src="http://code.jquery.com/jquery-3.1.1.js" type="text/javascript"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script type="text/javascript" src="http://code.jquery.com/ui/1.10.1/jquery-ui.min.js"></script>
     <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
            <a class="navbar-brand" >
                Laravel BackOffice Admin
            </a>
            <div class="topnav" id="myTopnav">
                <a href="{{url('tabellacustomers')}}">Customers</a>
                <a href="{{url('tabellaagenti')}}">Agente</a>

            </div>
        </div>

    </div>
</nav>



<nav class="navbar navbar-light bg-faded">
    <form  class="form-inline">
        <input name="search_text" id="search_text" class="form-control  mr-sm-2" type="text" >
       <!-- <button   value="Add" id="buttonsearch"  class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>!-->
     <div id="result" ></div>
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

                    {{csrf_field()}}
                    <div class="form-group error">

                        <label for="inputTask" class="col-sm-3 control-label">Nome</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control has-error" id="customers_lastname" name="customers_lastname" placeholder="Nome" value="">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Email</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" id="customers_email_address" name="customers_email_address" placeholder="Email" value="">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="inputEmail3" class="col-sm-3 control-label">Password</label>
                        <div class="col-sm-9">
                            <input type="password" class="form-control" id="customers_password" name="customers_password" placeholder="Password" value="">
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



<table  class="table">
    <thead>
    <tr>
        <th>Nome
            <a href="{{url('name/asc')}}">Asc</a>
            <a href="{{url('name/desc')}}">Desc</a>
            <a href="{{url('tabellacustomers')}}">Reset</a>
        </th>
        <th>Email
            <a href="{{url('email/asc')}}">Asc</a>
            <a href="{{url('email/desc')}}">Desc</a>
            <a href="{{url('tabellacustomers')}}">Reset</a>
        </th>
        <th>Agente
            <a href="{{url('agente/asc')}}">Asc</a>
            <a href="{{url('agente/desc')}}">Desc</a>
            <a href="{{url('tabellacustomers')}}">Reset</a>

        </th>
        <th>Opzioni</th>
    </tr>

    </thead>
    @foreach($data as $task)

    <tr id="task{{$task->customers_id}}">
            <td>{{$task->customers_lastname}}</td>
            <td>{{$task->customers_email_address}}</td>
            <td>Agente Smith</td>
            <td>

                <button class="btn btn-info" data-toggle="modal" data-target="#viewModal" onclick="fun_view('{{$task -> customers_id}}')">Dettagli</button>
                <button class="btn btn-warning" data-toggle="modal" data-target="#editModal" onclick="fun_edit('{{$task -> customers_id}}')">Edit</button>
                <button class="btn btn-danger" data-target="#myModal" onclick="fun_delete('{{$task -> customers_id}}')">Delete</button>

            </td>
        </tr>
        @endforeach

        </table>
</div>
{{$data->links()}}

<input type="hidden" name="hiddens" id="hiddens" value="{{url('searchcustomers')}}">
<input type="hidden" name="hidden_view" id="hidden_view" value="{{url('crud/view')}}">
<input type="hidden" name="hidden_delete" id="hidden_delete" value="{{url('crud/delete')}}">


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

                <p><b>Email : </b><span id="view_email" class="text-success"></span></p>
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
                <form action="{{ url('crud/update') }}" method="post">
                    {{ csrf_field() }}
                    <div class="form-group">
                        <div class="form-group">
                            <label for="edit_name"> Name:</label>
                            <input type="text" class="form-control" id="edit_name" name="edit_name">
                        </div>

                        <label for="edit_email">Email :</label>
                        <input type="email" class="form-control" id="edit_email" name="edit_email">
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
                data: {"id":id,_token: "{{ csrf_token() }}"},
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

                $("#edit_id").val(result);
                $("#edit_name").val(result);
                $("#edit_email").val(result);
            }
        });
    }

    function fun_view(id)
    {
        var view_url = $("#hidden_view").val();

        $.ajax({
            url: view_url,
            type:"GET",
            data: {"id":id},
            success: function(result){

                $("#view_fname").text(result);
                $("#view_email").text(result);
            }
        });
    }


</script>

<script type="text/javascript">
    $(document).ready(function () {
       $('#search_text').keyup(function () {
           var view_url2 = $("#hiddens").val();

           var txt=$(this).val();
              $('#result').html('');
              $.ajax({
                  url:view_url2,
                  type :"get",
                  data:{"search":txt},

                  success:function(data){

                          $('#result').html(data);

                  },

              })

       })
    })



</script>


