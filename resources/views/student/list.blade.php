@extends('layouts.app')
@section('content')
    <div class="row">
        <br><br>
        <div class="col-lg-1">
            <a class="btn btn-success" href="#" data-toggle="modal" data-target="#addModal">Add</a>
        </div>
    </div><br>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table class="table table-bordered data-table" id="studentTable">
		<thead>
			<tr>
			     <th>No</th>
				<th>Title</th>
				<th>Description</th>
				<th>Image</th>
				<th>Author</th>
				<th>Status</th>
				
				<!-- <th width="180px">Status</th> -->
				
				<th width="280px">Action</th>
			</tr>
		</thead>	
		<tbody>
         {{-- @foreach ($students as $student)
            <tr id="{{ $student->id }}">
              
                <td>{{ $student->first_name }}</td>
                <td>{{ $student->last_name }}</td>
                <td>{{ $student->address }}</td>
                <td>
		     <a data-id="{{ $student->id }}" class="btn btn-primary btnEdit">Edit</a>
		    
			 <button type="submit" data-toggle="tooltip" title='Delete' data-id="{{ $student->id }}" class="btn btn-danger btnDelete show_confirm">Delete</button>
                </td>
            </tr>
        @endforeach --}}
		</tbody>
    </table>
	

<!-- Add Student Modal -->
<div id="addModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Student Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Add New Post</h4>
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
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Update Student</h4>
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
			
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	  </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>	

<script>

  $(document).ready(function () {


	$.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    
    var table = $('.data-table').DataTable({
		
        processing: true,
        serverSide: true,
	   "lengthMenu": [[5, 10, 25, 50, -1], [5, 10, 25, 50, "All"]],
	
        ajax: "{{ route('student.index') }}",
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'title', name: 'title'},
            {data: 'description', name: 'description'},
			{data: 'image', name: 'image','render': function (data, type, full, meta) { return "<img src=\"/public/images/" + data + "\" height=\"50\"/>";     
},title: 'Image',orderable: true,searchable: true},
			{data: 'author', name: 'author'},
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
			   
	           
				//   var student = '<tr id="'+data.id+'">';
				// //   student += '<td>' + data.id + '</td>';
				//   student += '<td>' + data.first_name + '</td>';
				//   student += '<td>' + data.last_name + '</td>';
				//   student += '<td>' + data.address + '</td>';
				//   student += '<td><a data-id="' + data.id + '" class="btn btn-primary btnEdit">Edit</a>&nbsp;&nbsp;<a data-id="' + data.id + '" class="btn btn-danger btnDelete">Delete</a></td>';
				//   student += '</tr>';            
				//   $('#studentTable tbody').prepend(student);
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
          $('#updateModal').modal('show');
          $('#updateStudent #hdnStudentId').val(data.id); 
          $('#updateStudent #update_title').val(data.title);
          $('#updateStudent #update_description').val(data.description);
        //  $('#updateStudent .addimage').val(data.image);
		  $("#addimage").attr('src',data.path);
		  $('#updateStudent #update_author').val(data.author);
		  console.log(data.path);
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



@endsection

