<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Person List</title>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/bootstrap.min.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/jquery.dataTables.css'?>">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url().'assets/css/dataTables.bootstrap4.css'?>">
</head>
<body>
<div class="container">
    <!-- Page Heading -->
    <div class="row">
        <h1 class="text-center">Person List</h1>
        <div class="col-12">
            <div class="col-md-12">
              <?php
              if (isset($data)) {
              ?>
                <div class="alert alert-danger fade in alert-dismissible show" id="error_div_edit" style="display:none">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true" style="font-size:20px">×</span>
                    </button>
                    <strong>Error!</strong> <span id="error_message_edit"><ul>
                    <?php
                    foreach ($data as $index=>$value) {
                    ?>
                        <li><?php echo $value; ?></li>
                    <?php
                    }
                    ?></ul>
                    </span>.
                </div>
              <?php
              }
              ?>

                    <div class="float-right"><a href="javascript:void(0);" class="btn btn-primary" data-toggle="modal" data-target="#Modal_Add"><span class="fa fa-plus"></span> Add New</a></div>

            </div>


            <table class="table table-striped" id="mydata">
                <thead>
                    <tr>
                        <th>Person Name</th>
                        <th>Person Date of Birth</th>
                        <th>Person Email</th>
                        <th>Person Favorite Color</th>
                        <th style="text-align: right;">Actions</th>
                    </tr>
                </thead>
                <tbody id="show_data">

                </tbody>
            </table>
        </div>
    </div>

</div>
;
        <!-- MODAL ADD -->
            <form id="formAdd">
            <div class="modal fade" id="Modal_Add" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="alert alert-danger fade in alert-dismissible show" id="error_div" style="display:none">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true" style="font-size:20px">×</span>
                  </button>
                  <strong>Error!</strong> <span id="error_message">Here is the Error Message</span>.
              </div>
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Add New person</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                    <br>
                  </div>
                  <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Person Name</label>
                            <div class="col-md-10">
                              <input type="text" name="name" id="person_name" class="form-control" placeholder="Person Name" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Person DOB</label>
                            <div class="col-md-10">
                              <input type="date" name="DOB" id="person_dob" class="form-control" placeholder="Person Date of Birth" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Person Email</label>
                            <div class="col-md-10">
                              <input type="email" name="email" id="person_email" class="form-control" placeholder="Person Email" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Favorite Color</label>
                            <div class="col-md-10">
                              <input type="email" name="favorite_color" id="person_favorite_color" class="form-control" placeholder="Favorite Color" required>
                            </div>
                        </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" type="submit" id="btn_save" class="btn btn-primary">Save</button>
                  </div>
                </div>
              </div>
              <br>
            </div>
            </form>
        <!--END MODAL ADD-->

        <!-- MODAL EDIT -->
        <form id="formEdit">
            <div class="modal fade" id="Modal_Edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="alert alert-danger fade in alert-dismissible show" id="error_div_edit" style="display:none">
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true" style="font-size:20px">×</span>
                  </button>
                  <strong>Error!</strong> <span id="error_message_edit">Here is the Error Message</span>.
              </div>
              <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit person</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">person ID</label>
                            <div class="col-md-10">
                              <input type="text" name="person_id_edit" id="person_id_edit" class="form-control" placeholder="Person ID" readonly>
                              <input type="hidden" name="person_id_edit_hidden" id="person_id_edit_hidden" value="">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Person Name</label>
                            <div class="col-md-10">
                              <input type="text" name="name" id="person_name_edit" class="form-control" placeholder="Person Name" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Person DOB</label>
                            <div class="col-md-10">
                              <input type="date" name="DOB" id="person_dob_edit" class="form-control" placeholder="Person Date of Birth" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Person Email</label>
                            <div class="col-md-10">
                              <input type="email" name="email" id="person_email_edit" class="form-control" placeholder="Person Email" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-md-2 col-form-label">Favorite Color</label>
                            <div class="col-md-10">
                              <input type="email" name="favorite_color" id="person_favorite_color_edit" class="form-control" placeholder="Favorite Color" required>
                            </div>
                        </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" type="submit" id="btn_update" class="btn btn-primary">Update</button>
                  </div>
                </div>
              </div>
            </div>
            </form>
        <!--END MODAL EDIT-->

        <!--MODAL DELETE-->
         <form>
            <div class="modal fade" id="Modal_Delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Delete person</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                       <strong>Are you sure to delete this record?</strong>
                  </div>
                  <div class="modal-footer">
                    <input type="hidden" name="person_code_delete" id="person_code_delete" class="form-control">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="button" type="submit" id="btn_delete" class="btn btn-primary">Yes</button>
                  </div>
                </div>
              </div>
            </div>
            </form>
        <!--END MODAL DELETE-->

<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery-3.3.1.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/bootstrap.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.dataTables.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/dataTables.bootstrap4.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/jquery.validate.js'?>"></script>
<script type="text/javascript" src="<?php echo base_url().'assets/js/validations.js'?>"></script>

<script type="text/javascript">
    $(document).ready(function(){
        show_person(); //call function show all person



        //function show all person
        function show_person(){
            $.ajax({
                type  : 'ajax',
                url   : '<?php echo site_url('person/person_data')?>',
                async : true,
                dataType : 'json',
                success : function(data){
                    //console.log(data);
                    var html = '';
                    var i;
                    for(i=0; i<data.length; i++){
                        html += '<tr>'+
                                '<td>'+data[i].name+'</td>'+
                                '<td>'+data[i].DOB+'</td>'+
                                '<td>'+data[i].email+'</td>'+
                                '<td>'+data[i].favorite_color+'</td>'+
                                '<td style="text-align:right;">'+
                                    '<a href="javascript:void(0);" class="btn btn-info btn-sm item_edit" data-person_id="'+data[i].id+'" data-person_name="'+data[i].name+'" data-person_email="'+data[i].email+'" data-person_dob="'+data[i].DOB+'" data-person_favorite="'+data[i].favorite_color+'">Edit</a>'+' '+
                                    '<a href="javascript:void(0);" class="btn btn-danger btn-sm item_delete" data-person_id="'+data[i].id+'">Delete</a>'+
                                '</td>'+
                                '</tr>';
                    }
                    $('#show_data').html(html);
                    $('#mydata').dataTable();
                }

            });
        }

        //Save person
        $('#btn_save').on('click',function(){
            var person_name = $('#person_name').val();
            var person_dob = $('#person_dob').val();
            var person_email = $('#person_email').val();
            var person_favorite_color = $('#person_favorite_color').val();
            if (!validateFields()) {
                return;
            }
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('person/save')?>",
                dataType : "JSON",
                data : {
                    person_name:person_name,
                    person_dob:person_dob,
                    person_email:person_email,
                    person_favorite_color:person_favorite_color
                },
                success: function(data){
                    //console.log(data);
                    $('#person_name').val("");
                    $('#person_dob').val("");
                    $('#person_email').val("");
                    $('#person_favorite_color').val("");
                    $('#Modal_Add').modal('hide');
                    show_person();
                }
            });
            return false;
        });

        //get data for update record
        $('#show_data').on('click','.item_edit',function(){
            var person_id = $(this).data('person_id');
            var person_name = $(this).data('person_name');
            var person_dob = $(this).data('person_dob');
            var person_favorite = $(this).data('person_favorite');
            var person_email = $(this).data('person_email');

            $('#Modal_Edit').modal('show');
            $('#person_id_edit').val(person_id);
            $('#person_name_edit').val(person_name);
            $('#person_dob_edit').val(person_dob);
            $('#person_email_edit').val(person_email);
            $('#person_favorite_color_edit').val(person_favorite);
        });

        //update record to database
         $('#btn_update').on('click',function(){
            var person_id = $('#person_id_edit').val();
            var person_name = $('#person_name_edit').val();
            var person_dob = $('#person_dob_edit').val();
            var person_email = $('#person_email_edit').val();
            var person_favorite_color = $('#person_favorite_color_edit').val();
            if (!validateFields(true)) {
                return;
            }
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('person/update')?>",
                dataType : "JSON",
                data : {
                    person_id:person_id,
                    person_name:person_name,
                    person_dob:person_dob,
                    person_email:person_email,
                    person_favorite_color:person_favorite_color
                },
                success: function(data){
                    //console.log(data);
                    $('#person_id_edit').val("");
                    $('#person_name_edit').val("");
                    $('#person_dob_edit').val("");
                    $('#person_email_edit').val("");
                    $('#person_favorite_color_edit').val("");
                    $('#Modal_Edit').modal('hide');
                    show_person();
                }
            });
            return false;
        });

        //get data for delete record
        $('#show_data').on('click','.item_delete',function(){
            var person_code = $(this).data('person_id');

            $('#Modal_Delete').modal('show');
            $('[name="person_code_delete"]').val(person_code);
        });

        //delete record to database
         $('#btn_delete').on('click',function(){
            var person_code = $('#person_code_delete').val();
            $.ajax({
                type : "POST",
                url  : "<?php echo site_url('person/delete')?>",
                dataType : "JSON",
                data : {person_id:person_code},
                success: function(data){
                    $('[name="person_code_delete"]').val("");
                    $('#Modal_Delete').modal('hide');
                    show_person();
                }
            });
            return false;
        });

    });

</script>
</body>
</html>
