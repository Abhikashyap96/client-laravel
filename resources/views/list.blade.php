@extends('master')
@section('content')
<div class="container">
    <div class="col-md-10 mx-auto" style="margin-top:40px">
        <div class="row mx-auto">
        <div class="card text-center">
            <div class="card-header">
               Client info table
            </div>
  <div class="card-body">
  <table class="table table-info table-bordered">
    @if(session()->has('success'))
    <div class="alert alert-success">
        {{session()->get('success')}}
    </div>
    @endif
  <thead>
    <tr class="table-light">
      <th scope="col">id</th>
      <th scope="col">Client Name</th>
      <th scope="col">Client Adress</th>
      <th scope="col">Client Contact</th>
      <th scope="col">Gender</th>
      <th scope="col">Client image</th>
      <th scope="col">Operation</th>
    </tr>
  </thead>
  <tbody>
  @foreach($clients as $client)
    <tr>
       
      <td>{{$client->id}}</th>
      <td>{{$client->c_name}}</td>
      <td>{{$client->c_address}}</td>
      <td>{{$client->c_mobile}}</td>
      <td>{{$client->c_gender}}</td>
      <td>
        @if($client->c_image)
        <img src="uploads/clients/{{$client->c_image}}" alt="" height="50px"width="50px">
        @else
          no image found
        
        @endif
      </td>

      <td>
       

        <a href="{{url('edit/'.$client['id'])}}" class="btn btn-success">Update</a>
        <a id="deleteButton" onclick="deleteButton('{{ $client['id'] }}')" class="btn btn-danger">Delete</a>
      </td>
    </tr>
    @endforeach
</tbody>
<!--Insert code here-->
<div class="container">
<div class="col-md-5 mx-auto">  
<div class="row">
<form action="insert" method="POST" enctype="multipart/form-data">
          @csrf
  <div>
<button type="button" class="btn btn-info btn-lg pull-right" data-toggle="modal" data-target="#myModal">Add Client</button>
</div>
  <!-- Modal -->
  
  <div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
    
      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <!--<button type="button" class="close" data-dismiss="modal">&times;</button>-->
          <h4 class="modal-title">Add client model</h4>
        </div>
        <div class="modal-body">
          <!--My All Code Here-->
          <!--<div class="container">
          <div class="col-md-5 mx-auto">  
          <div class="row">-->

          <div class="card ">
    
          <div class="card-header" style="background-color:blue">
          <h2>Add client info</h2>
          </div>
          <div class="card-body">
          
          <div class="mb-3 row">
          <label  class="col-sm-4 col-form-label">Client Name</label>
          <div class="col-sm-8">
          <input type="text" name="c_name" required class="form-control" value="">
          </div>
          </div>
          <div class="mb-3 row">
          <label class="col-sm-4 col-form-label">Client Address</label>
          <div class="col-sm-8">
          <input type="text" name="c_address" required class="form-control" value="">
          </div>
          </div>
          <div class="mb-3 row">
          <label class="col-sm-4 col-form-label">Client Contact</label>
          <div class="col-sm-8">
          <input type="text" name="c_mobile" required class="form-control" value="">
          </div>
          </div>
          <div class="mb-3 row">
          <label class="col-sm-4 col-form-label">Select Gender</label>
          <div class="col-sm-8">
          <select name="c_gender" required class="form-control" id="cars">
            <option value="">Select</option>
            <option value="Male">M</option>
            <option value="Female">F</option>
          </select>
          </div>
          </div>
          
          <div class="mb-3 row upload-options">
            <label class="col-sm-4 col-form-label"> Upload image</label>
            <div class="col-sm-8">
            <input type="file" name="c_image" required class="upload-file form-contol" accept="uploads/clients/" />
            </div> 
          </div>
       <div class="form-group">
          <button type="submit" class="btn btn-primary float-center">Add client</button>
          </div>
          <!--</form>-->
          </div>
          </div>
          <!--</div>
          </div>
          </div>-->
          <!--End here-->
          <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
          </div>
        </div>
      
   </div>
 </div>
</div>

</form>
</div>
</div>
</div>
<!--Insert code end here-->
</div>
        </div>
    </div>
</div>

<script>
    function deleteButton(id){
      var clickId=id;
        if(confirm("Are you sure ?")){
          $('#deleteButton').attr('href','delete/'+clickId);
        }
    }
</script>
@endsection