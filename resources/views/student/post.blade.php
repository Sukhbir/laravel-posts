<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <style>
 
 *{box-sizing: border-box;}
html{height: 100%;margin: 0;}

.container { margin: 150px auto; max-width: 960px;}

.tagsinput,.tagsinput *{box-sizing:border-box}
.tagsinput{display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex;-webkit-flex-wrap:wrap;-ms-flex-wrap:wrap;flex-wrap:wrap;background:#fff;font-family:sans-serif;font-size:14px;line-height:20px;color:#556270;padding:5px 5px 0;border:1px solid #e6e6e6;border-radius:2px}
.tagsinput.focus{border-color:#ccc}
.tagsinput .tag{position:relative;background:#556270;display:block;max-width:100%;word-wrap:break-word;color:#fff;padding:5px 30px 5px 5px;border-radius:2px;margin:0 5px 5px 0}
.tagsinput .tag .tag-remove{position:absolute;background:0 0;display:block;width:30px;height:30px;top:0;right:0;cursor:pointer;text-decoration:none;text-align:center;color:#ff6b6b;line-height:30px;padding:0;border:0}
.tagsinput .tag .tag-remove:after,.tagsinput .tag .tag-remove:before{background:#ff6b6b;position:absolute;display:block;width:10px;height:2px;top:14px;left:10px;content:''}
.tagsinput .tag .tag-remove:before{-webkit-transform:rotateZ(45deg);transform:rotateZ(45deg)}
.tagsinput .tag .tag-remove:after{-webkit-transform:rotateZ(-45deg);transform:rotateZ(-45deg)}
.tagsinput div{-webkit-box-flex:1;-webkit-flex-grow:1;-ms-flex-positive:1;flex-grow:1}
.tagsinput div input{background:0 0;display:block;width:100%;font-size:14px;line-height:20px;padding:5px;border:0;margin:0 5px 5px 0}
.tagsinput div input.error{color:#ff6b6b}
.tagsinput div input::-ms-clear{display:none}
.tagsinput div input::-webkit-input-placeholder{color:#ccc;opacity:1}
.tagsinput div input:-moz-placeholder{color:#ccc;opacity:1}
.tagsinput div input::-moz-placeholder{color:#ccc;opacity:1}
.tagsinput div input:-ms-input-placeholder{color:#ccc;opacity:1}
  

  </style>

  <style>
        .error{
            color: #FF0000; 
            }
    </style> 
 <style>
.switch {
  position: relative;
  display: inline-block;
  width: 60px;
  height: 34px;
}

.switch input { 
  opacity: 0;
  width: 0;
  height: 0;
}

.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #ccc;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 26px;
  width: 26px;
  left: 4px;
  bottom: 4px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #2196F3;
}

input:focus + .slider {
  box-shadow: 0 0 1px #2196F3;
}

input:checked + .slider:before {
  -webkit-transform: translateX(26px);
  -ms-transform: translateX(26px);
  transform: translateX(26px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 34px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    
	
    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
	             @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    
      <!-- Navbar Search -->
      <li class="nav-item">
        
       
      </li>

      <!-- Messages Dropdown Menu -->
      
      <!-- Notifications Dropdown Menu -->
	  
      <li class="nav-item">
        <a class="nav-link"  href="#" role="button">
	
			@if(!empty(Auth::user()->name))
			  {{ Auth::user()->name }}
			  
		    @endif
        </a>
      </li>
      <li class="nav-item">
			<form action="{{ route('logout') }}" method="post">
			@csrf
			<button type="submit" class="btn btn-success">Logout</button>
			</form>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{ url('admin')}}" class="brand-link">
      <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Dashboard</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">Admin</a>
        </div>
      </div>

      <!-- SidebarSearch Form -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Dashboard
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="{{ route('student/post')}}" class="nav-link active">
                  <i class="far fa-file nav-icon"></i>
                  <p>Add Post</p>
                </a>
              </li>
             
             
            </ul>
          </li>
       
        </ul>
      </nav>

      <!-- Sidebar Menu -->
  
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Posts</h1>
          </div>
       
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
           

            <div class="card">
              <div class="card-header">
                <h3 class="card-title">View Post</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
              <div class="row">
                  <br><br>
                  <div class="col-lg-2">
                      <a class="btn btn-success" href="#" data-toggle="modal" data-target="#addModal">Add Post</a>
                  </div>
              </div><br>
                <table class="table table-bordered table-striped data-table" id="studentTable">
                  <thead>
                        <tr>
                          <th>No</th>
                          <th>Title</th>
                          <th>Description</th>
                          <th>Image</th>
                          <th>Author</th>
                          <th>Tags</th>
                          <th>Status</th>
                          
                          <!-- <th width="180px">Status</th> -->
                          
                          <th width="80px">Action</th>
                        </tr>
                  </thead>	
                  <tbody>
                  </tbody>
                  </table>

                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>

  <div id="addModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Student Modal content-->
    <div class="modal-content">
      <div class="modal-header">
       
        <h4 class="modal-title">Add New Post</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
	  <div class="modal-body">
		<form id="addStudent" class="uploadFileFrm" name="addStudent" action="{{ route('student.store') }}" method="post" enctype="multipart/form-data">
			@csrf
			<div class="form-group">  
				<label for="Title">Title:</label>
				<input type="text" class="form-control" id="title" placeholder="Enter Title" name="title">
			</div>
			
			<div class="form-group">
				<label for="Description">Description:</label>
				<textarea class="form-control" id="description" name="description" rows="2" placeholder="Enter Description"></textarea>
			</div>
			<div class="form-group">
				<label for="Image">Image:</label>
				<input type="file" class="form-control " id="imgInp" placeholder="Image" name="image">
                   <img id="blah" />
			</div>

			<div class="form-group">
				<label for="Author">Author:</label>
                      <select name="author" id="author" class="author">
					    <option value="">Select Author</option>
						<option value="robert">Robert</option>
						<option value="wilioms">wilioms</option>
						<option value="abc">abc</option>
                      </select>
			 </div>

			<div class="form-group">
					<label for="Image">Tags:</label>
					<input id="form-tags" name="tags" type="text" value=""  class="tags">
			</div>
				
			<button type="submit" id="addsubmit"class="btn btn-primary">Submit</button>
		</form>
	  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>	
<!-- Update Student Modal -->
<div id="updateModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Student Modal content-->
    <div class="modal-content">
      <div class="modal-header">
       
        <h4 class="modal-title">Update Post</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>
	  <div class="modal-body">
		<form id="updateStudent" name="updateStudent" action="{{ route('student.update') }}" method="post" enctype="multipart/form-data">
			<input type="hidden" name="hdnStudentId" id="hdnStudentId"/>
			@csrf
			<div class="form-group">  
				<label for="Title">Title:</label>
				<input type="text" class="form-control" id="update_title" placeholder="Enter Title" name="title">
			</div>
			
			<div class="form-group">
				<label for="Description">Description:</label>
				<textarea class="form-control" id="update_description" name="description" rows="2" placeholder="Enter Description"></textarea>
			</div>

			<div class="form-group">
				   <label for="Image">Image:</label>
				   <input type="file" class="form-control imageName" id="imgInp2" placeholder="Image" name="image">
				  
				   <div><img id="addimage" width="60"/></div>
				     <img id="blah2"/>
		   </div>

			<div class="form-group">
				<label for="Author">Author:</label>
                      <select name="author" id="update_author" class="author">
					    <option value="">Select Author</option>
						<option value="robert">Robert</option>
						<option value="wilioms">wilioms</option>
						<option value="abc">abc</option>
                      </select>
			</div>

			<div class="form-group">
				<label for="Image">Tags:</label>
				<input id="form-tags2" name="upadte_tags" type="text" value="" id="" class="update_tags">
			</div>
			
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>	



  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="float-right d-none d-sm-block">
     
    </div>
    <strong>Copyright &copy; 2022 <a href="https://adminlte.io">AdminLTE.io</a>.</strong> All rights reserved.
  </footer>

  <!-- Control Sidebar -->
  <aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
  </aside>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../../dist/js/demo.js"></script>
<!-- Page specific script -->
<script>

  $(document).ready(function () {


	$.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    var table = $('.data-table').DataTable({
        responsive: true, "lengthChange": false, "autoWidth": false,
     
        processing: true,
        serverSide: true,
        paging: true,
        responsive: true,
	      lengthMenu: [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
        buttons: ["copy", "csv", "excel", "pdf", "print", "colvis"],
	   
        ajax: "{{ route('student.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'title', name: 'title'},
            {data: 'description', name: 'description'},
			      {data: 'image', name: 'image','render': function (data, type, full, meta) { return "<img src=\"/public/images/" + data + "\" height=\"50\"/>";     
            },title: 'Image',orderable: true,searchable: true},
            {data: 'author', name: 'author'},
            {data: 'tags',   name: 'tags'},
            {data: 'Status', name: 'Status'},
            {data: 'action', name: 'action'},
        ]
    });
	


	//Add the Student  
	//var email =  $("#addemail").val();
	$("#addStudent").validate({
		 rules: {
				title: "required",
				description: "required",
				image: "required",
				author: "required",
        tags: "required",
			// 	email: {
			// 			required: true,
			// 			email: true,
			// 			remote: {
			// 				url: "{{ route('checkEmail') }}",
			// 				type: "post",
			// 				data: {
			// 					email:$(email).val(),
			// 					_token:"{{ csrf_token() }}"
			// 					},
			// 				dataFilter: function (data) {
			// 					var json = JSON.parse(data);
			// 					if (json.msg == "true") {
			// 						return "\"" + "Email address already in use" + "\"";
			// 					} else {
			// 						return 'true';
			// 					}
			// 				}
			// 			}
            // },
				
			},
			messages: {
			},
 
		 submitHandler: function(form) {
		  var form_action = $("#addStudent").attr("action");
		  $.ajax({
			//   data: $('#addStudent').serialize(),
			  data: new FormData(this),
			  url: form_action,
			  type: "POST",
			  dataType: 'json',
			  success: function (data) {
				console.log(data);
	      
				  $('#addStudent')[0].reset();
				  $('#addModal').modal('hide');
				  table.draw();
				  myFunction();
				  
			  },
			  error: function (data) {
			  }
		  });
		}
	});
  
 
    //When click edit 
    $('body').on('click', '.btnEdit', function () {
      var student_id = $(this).attr('data-id');
      
      $.get('student/' + student_id +'/edit', function (data) {
          console.log(data);
          $('#updateModal').modal('show');
          $('#updateStudent #hdnStudentId').val(data.id); 
          $('#updateStudent #update_title').val(data.title);
          $('#updateStudent #update_description').val(data.description);
        //  $('#updateStudent .addimage').val(data.image);
		  $("#addimage").attr('src',data.path);
		  $('#updateStudent #update_author').val(data.author);
		  $('#updateStudent .update_tags').val(data.tags);
		  console.log(data.path);
		  console.log(data.tags);
		  console.log(data.author);
      })
   });
    // Update 
	$("#updateStudent").validate({
		 rules: {
			    title: "required",
				description: "required",
				image: "required",
				author: "required",
				
			},
			messages: {
			},
 
		 submitHandler: function(form) {
			//alert('hello');
			
		  var form_action = $("#updateStudent").attr("action");
		  $.ajax({
			//   data: $('#updateStudent').serialize(),
			  data: new FormData(this),
			  url: form_action,
			  type: "POST",
			  dataType: 'json',
			  success: function (data) { 
			    alert('upadte req');
				  $('#updateStudent')[0].reset();
				  table.draw();
				  $('#updateModal').modal('hide');
				   myFunctionupdate();
				 
			  },
			  error: function (data) {
			  }
		  });
		}
	});		
		
   //delete student
	$('body').on('click', '.btnDelete', function () {
        
      var student_id = $(this).attr('data-id');
        console.log(student_id);
        if(confirm('Are you sure to delete this record ?')) {
          $.get('student/' + student_id +'/delete', function (data) {
        
              $('#studentTable tbody #'+ student_id).remove();
          table.draw();
          myFunctionDeleted();
          })
        }
   });	
	
   $('body').on('change', '.toggle-class', function () {
	
	var status = $(this).prop('checked') == true ? 1 : 0; 
	console.log(status);
	var user_id = $(this).data('id'); 
	console.log(user_id);
	 
	$.ajax({
		type: "GET",
		dataType: "json",
		url: '/userChangeStatus',
		data: {'status': status, 'user_id': user_id},
		success: function(data){
			console.log(data[0].status);
			
			
			if(data[0].status=='0'){
				myFunctionStatusDisable();
				$('#toggleID').prop('checked', false);
				
			}else{
				myFunctionStatusEnable();
				$('#toggleID').prop('checked', true);
			
			}
			
			//statusText(data[0].status);
		}
	});
})


// function statusText(status_val) {
//     if (status_val == 1) {
		
//         var status_str = "On (1)";
//     } else {
//         var status_str = "Off (0)";
//     }
//     document.getElementById("textbtn").innerText = status_str;
// }

});	  
</script>



<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">


<script>
function myFunction() {
	Swal.fire({
	position: 'top-end',
	icon: 'success',
	title: 'Record has been Added',
	showConfirmButton: false,
	timer: 1500
	})
}

function myFunctionupdate() {
	Swal.fire({
	position: 'top-end',
	icon: 'success',
	title: 'Record has been Updated',
	showConfirmButton: false,
	timer: 1500
	})
}

function myFunctionDeleted() {
Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'Record has been Deleted',
  showConfirmButton: false,
  timer: 1500
})
}

function myFunctionStatusDisable() {
Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'User Successfully Deactivate',
  showConfirmButton: false,
  timer: 1500
})
}
function myFunctionStatusEnable() {
Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'User Successfully Activate',
  showConfirmButton: false,
  timer: 1500
})
}


</script>
<script>

function abc(){
	let configs = {

		title:"Toast Title",

		message:"Toast Message",

		status: TOAST_STATUS.SUCCESS,

		timeout: 5000

	}
}


</script>
<script>
 
 imgInp.onchange = evt => {
  const [file] = imgInp.files
  if (file) {
    blah.src = URL.createObjectURL(file)
  }
}

imgInp2.onchange = evt => {
  const [file] = imgInp2.files
  if (file) {
    blah2.src = URL.createObjectURL(file)
  }
}

</script>

<script>
function myFunction() {
	Swal.fire({
	position: 'top-end',
	icon: 'success',
	title: 'Record has been Added',
	showConfirmButton: false,
	timer: 1500
	})
}

function myFunctionupdate() {
	Swal.fire({
	position: 'top-end',
	icon: 'success',
	title: 'Record has been Updated',
	showConfirmButton: false,
	timer: 1500
	})
}

function myFunctionDeleted() {
Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'Record has been Deleted',
  showConfirmButton: false,
  timer: 1500
})
}

function myFunctionStatusDisable() {
Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'User Successfully Deactivate',
  showConfirmButton: false,
  timer: 1500
})
}
function myFunctionStatusEnable() {
Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: 'User Successfully Activate',
  showConfirmButton: false,
  timer: 1500
})
}


</script>
<script>

function abc(){
	let configs = {

		title:"Toast Title",

		message:"Toast Message",

		status: TOAST_STATUS.SUCCESS,

		timeout: 5000

	}
}


</script>
<script>
 
 imgInp.onchange = evt => {
  const [file] = imgInp.files
  if (file) {
    blah.src = URL.createObjectURL(file)
  }
}

imgInp2.onchange = evt => {
  const [file] = imgInp2.files
  if (file) {
    blah2.src = URL.createObjectURL(file)
  }
}

</script>

<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.0/sweetalert.min.js"></script>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="sweetalert2.min.js"></script>
<link rel="stylesheet" href="sweetalert2.min.css">

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.js"></script>

<script src="https://cdn.jsdelivr.net/gh/gitbrent/bootstrap4-toggle@3.6.1/js/bootstrap4-toggle.min.js"></script>

<script>
  $(function() {

	$('#form-tags').tagsInput({
		'onAddTag': function(input, value) {
			console.log('tag added', input, value);
		},
		'onRemoveTag': function(input, value) {
			console.log('tag removed', input, value);
		},
		'onChange': function(input, value) {
			console.log('change triggered', input, value);
		}
	});

	

	

});

$(function() {

$('#form-tags2').tagsInput({
		'onAddTag': function(input, value) {
			console.log('tag added', input, value);
		},
		'onRemoveTag': function(input, value) {
			console.log('tag removed', input, value);
		},
		'onChange': function(input, value) {
			console.log('change triggered', input, value);
		}
	});
	
});

/* jQuery Tags Input Revisited Plugin
 *
 * Copyright (c) Krzysztof Rusnarczyk
 * Licensed under the MIT license */

(function($) {
	var delimiter = [];
	var inputSettings = [];
	var callbacks = [];

	$.fn.addTag = function(value, options) {
		options = jQuery.extend({
			focus: false,
			callback: true
		}, options);
		
		this.each(function() {
			var id = $(this).attr('id');

			var tagslist = $(this).val().split(_getDelimiter(delimiter[id]));
			if (tagslist[0] === '') tagslist = [];

			value = jQuery.trim(value);
			
			if ((inputSettings[id].unique && $(this).tagExist(value)) || !_validateTag(value, inputSettings[id], tagslist, delimiter[id])) {
				$('#' + id + '_tag').addClass('error');
				return false;
			}
			
			$('<span>', {class: 'tag'}).append(
				$('<span>', {class: 'tag-text'}).text(value),
				$('<button>', {class: 'tag-remove'}).click(function() {
					return $('#' + id).removeTag(encodeURI(value));
				})
			).insertBefore('#' + id + '_addTag');

			tagslist.push(value);

			$('#' + id + '_tag').val('');
			if (options.focus) {
				$('#' + id + '_tag').focus();
			} else {
				$('#' + id + '_tag').blur();
			}

			$.fn.tagsInput.updateTagsField(this, tagslist);

			if (options.callback && callbacks[id] && callbacks[id]['onAddTag']) {
				var f = callbacks[id]['onAddTag'];
				f.call(this, this, value);
			}
			
			if (callbacks[id] && callbacks[id]['onChange']) {
				var i = tagslist.length;
				var f = callbacks[id]['onChange'];
				f.call(this, this, value);
			}
		});

		return false;
	};

	$.fn.removeTag = function(value) {
		value = decodeURI(value);
		
		this.each(function() {
			var id = $(this).attr('id');

			var old = $(this).val().split(_getDelimiter(delimiter[id]));

			$('#' + id + '_tagsinput .tag').remove();
			
			var str = '';
			for (i = 0; i < old.length; ++i) {
				if (old[i] != value) {
					str = str + _getDelimiter(delimiter[id]) + old[i];
				}
			}

			$.fn.tagsInput.importTags(this, str);

			if (callbacks[id] && callbacks[id]['onRemoveTag']) {
				var f = callbacks[id]['onRemoveTag'];
				f.call(this, this, value);
			}
		});

		return false;
	};

	$.fn.tagExist = function(val) {
		var id = $(this).attr('id');
		var tagslist = $(this).val().split(_getDelimiter(delimiter[id]));
		return (jQuery.inArray(val, tagslist) >= 0);
	};

	$.fn.importTags = function(str) {
		var id = $(this).attr('id');
		$('#' + id + '_tagsinput .tag').remove();
		$.fn.tagsInput.importTags(this, str);
	};

	$.fn.tagsInput = function(options) {
		var settings = jQuery.extend({
			interactive: true,
			placeholder: 'Add a tag',
			minChars: 0,
			maxChars: null,
			limit: null,
			validationPattern: null,
			width: 'auto',
			height: 'auto',
			autocomplete: null,
			hide: true,
			delimiter: ',',
			unique: true,
			removeWithBackspace: true
		}, options);

		var uniqueIdCounter = 0;

		this.each(function() {
			if (typeof $(this).data('tagsinput-init') !== 'undefined') return;

			$(this).data('tagsinput-init', true);

			if (settings.hide) $(this).hide();
			
			var id = $(this).attr('id');
			if (!id || _getDelimiter(delimiter[$(this).attr('id')])) {
				id = $(this).attr('id', 'tags' + new Date().getTime() + (++uniqueIdCounter)).attr('id');
			}

			var data = jQuery.extend({
				pid: id,
				real_input: '#' + id,
				holder: '#' + id + '_tagsinput',
				input_wrapper: '#' + id + '_addTag',
				fake_input: '#' + id + '_tag'
			}, settings);

			delimiter[id] = data.delimiter;
			inputSettings[id] = {
				minChars: settings.minChars,
				maxChars: settings.maxChars,
				limit: settings.limit,
				validationPattern: settings.validationPattern,
				unique: settings.unique
			};

			if (settings.onAddTag || settings.onRemoveTag || settings.onChange) {
				callbacks[id] = [];
				callbacks[id]['onAddTag'] = settings.onAddTag;
				callbacks[id]['onRemoveTag'] = settings.onRemoveTag;
				callbacks[id]['onChange'] = settings.onChange;
			}

			var markup = $('<div>', {id: id + '_tagsinput', class: 'tagsinput'}).append(
				$('<div>', {id: id + '_addTag'}).append(
					settings.interactive ? $('<input>', {id: id + '_tag', class: 'tag-input', value: '', placeholder: settings.placeholder}) : null
				)
			);

			$(markup).insertAfter(this);

			$(data.holder).css('width', settings.width);
			$(data.holder).css('min-height', settings.height);
			$(data.holder).css('height', settings.height);

			if ($(data.real_input).val() !== '') {
				$.fn.tagsInput.importTags($(data.real_input), $(data.real_input).val());
			}
			
			// Stop here if interactive option is not chosen
			if (!settings.interactive) return;
			
			$(data.fake_input).val('');
			$(data.fake_input).data('pasted', false);
			
			$(data.fake_input).on('focus', data, function(event) {
				$(data.holder).addClass('focus');
				
				if ($(this).val() === '') {
					$(this).removeClass('error');
				}
			});
			
			$(data.fake_input).on('blur', data, function(event) {
				$(data.holder).removeClass('focus');
			});

			if (settings.autocomplete !== null && jQuery.ui.autocomplete !== undefined) {
				$(data.fake_input).autocomplete(settings.autocomplete);
				$(data.fake_input).on('autocompleteselect', data, function(event, ui) {
					$(event.data.real_input).addTag(ui.item.value, {
						focus: true,
						unique: settings.unique
					});
					
					return false;
				});
				
				$(data.fake_input).on('keypress', data, function(event) {
					if (_checkDelimiter(event)) {
						$(this).autocomplete("close");
					}
				});
			} else {
				$(data.fake_input).on('blur', data, function(event) {
					$(event.data.real_input).addTag($(event.data.fake_input).val(), {
						focus: true,
						unique: settings.unique
					});
					
					return false;
				});
			}
			
			// If a user types a delimiter create a new tag
			$(data.fake_input).on('keypress', data, function(event) {
				if (_checkDelimiter(event)) {
					event.preventDefault();
					
					$(event.data.real_input).addTag($(event.data.fake_input).val(), {
						focus: true,
						unique: settings.unique
					});
					
					return false;
				}
			});
			
			$(data.fake_input).on('paste', function () {
				$(this).data('pasted', true);
			});
			
			// If a user pastes the text check if it shouldn't be splitted into tags
			$(data.fake_input).on('input', data, function(event) {
				if (!$(this).data('pasted')) return;
				
				$(this).data('pasted', false);
				
				var value = $(event.data.fake_input).val();
				
				value = value.replace(/\n/g, '');
				value = value.replace(/\s/g, '');
				
				var tags = _splitIntoTags(event.data.delimiter, value);
				
				if (tags.length > 1) {
					for (var i = 0; i < tags.length; ++i) {
						$(event.data.real_input).addTag(tags[i], {
							focus: true,
							unique: settings.unique
						});
					}
					
					return false;
				}
			});
			
			// Deletes last tag on backspace
			data.removeWithBackspace && $(data.fake_input).on('keydown', function(event) {
				if (event.keyCode == 8 && $(this).val() === '') {
					 event.preventDefault();
					 var lastTag = $(this).closest('.tagsinput').find('.tag:last > span').text();
					 var id = $(this).attr('id').replace(/_tag$/, '');
					 $('#' + id).removeTag(encodeURI(lastTag));
					 $(this).trigger('focus');
				}
			});

			// Removes the error class when user changes the value of the fake input
			$(data.fake_input).keydown(function(event) {
				// enter, alt, shift, esc, ctrl and arrows keys are ignored
				if (jQuery.inArray(event.keyCode, [13, 37, 38, 39, 40, 27, 16, 17, 18, 225]) === -1) {
					$(this).removeClass('error');
				}
			});
		});

		return this;
	};
	
	$.fn.tagsInput.updateTagsField = function(obj, tagslist) {
		var id = $(obj).attr('id');
		$(obj).val(tagslist.join(_getDelimiter(delimiter[id])));
	};

	$.fn.tagsInput.importTags = function(obj, val) {
		$(obj).val('');
		
		var id = $(obj).attr('id');
		var tags = _splitIntoTags(delimiter[id], val); 
		
		for (i = 0; i < tags.length; ++i) {
			$(obj).addTag(tags[i], {
				focus: false,
				callback: false
			});
		}
		
		if (callbacks[id] && callbacks[id]['onChange']) {
			var f = callbacks[id]['onChange'];
			f.call(obj, obj, tags);
		}
	};
	
	var _getDelimiter = function(delimiter) {
		if (typeof delimiter === 'undefined') {
			return delimiter;
		} else if (typeof delimiter === 'string') {
			return delimiter;
		} else {
			return delimiter[0];
		}
	};
	
	var _validateTag = function(value, inputSettings, tagslist, delimiter) {
		var result = true;
		
		if (value === '') result = false;
		if (value.length < inputSettings.minChars) result = false;
		if (inputSettings.maxChars !== null && value.length > inputSettings.maxChars) result = false;
		if (inputSettings.limit !== null && tagslist.length >= inputSettings.limit) result = false;
		if (inputSettings.validationPattern !== null && !inputSettings.validationPattern.test(value)) result = false;
		
		if (typeof delimiter === 'string') {
			if (value.indexOf(delimiter) > -1) result = false;
		} else {
			$.each(delimiter, function(index, _delimiter) {
				if (value.indexOf(_delimiter) > -1) result = false;
				return false;
			});
		}
		
		return result;
	};
 
	var _checkDelimiter = function(event) {
		var found = false;
		
		if (event.which === 13) {
			return true;
		}

		if (typeof event.data.delimiter === 'string') {
			if (event.which === event.data.delimiter.charCodeAt(0)) {
				found = true;
			}
		} else {
			$.each(event.data.delimiter, function(index, delimiter) {
				if (event.which === delimiter.charCodeAt(0)) {
					found = true;
				}
			});
		}
		
		return found;
	 };
	 
	 var _splitIntoTags = function(delimiter, value) {
		 if (value === '') return [];
		 
		 if (typeof delimiter === 'string') {
			 return value.split(delimiter);
		 } else {
			 var tmpDelimiter = '∞';
			 var text = value;
			 
			 $.each(delimiter, function(index, _delimiter) {
				 text = text.split(_delimiter).join(tmpDelimiter);
			 });
			 
			 return text.split(tmpDelimiter);
		 }
		 
		 return [];
	 };
})(jQuery);

</script>


</body>
</html>
