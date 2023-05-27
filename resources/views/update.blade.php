@extends('master')
@section('content')
<div class="container">
<div class="col-md-6 mx-auto">  
<div class="row">

<div class="card text-center">
    
  <div class="card-header" style="background-color:blue">
    <h2>update client info</h2>
  </div>
  <div class="card-body">
  <form action="{{url('update/'.$clients->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
  <div class="mb-3 row">
    <label  class="col-sm-4 col-form-label">Client Name</label>
    <div class="col-sm-8">
      <input type="text" name="c_name" required class="form-control" value="{{$clients->c_name}}">
    </div>
  </div>
  <div class="mb-3 row">
    <label class="col-sm-4 col-form-label">Client Address</label>
    <div class="col-sm-8">
      <input type="text" name="c_address" required class="form-control" value="{{$clients->c_address}}">
    </div>
  </div>
  <div class="mb-3 row">
    <label class="col-sm-4 col-form-label">Client Contact</label>
    <div class="col-sm-8">
      <input type="text" name="c_mobile" required class="form-control" value="{{$clients->c_mobile}}">
    </div>
  </div>
  <div class="mb-3 row">
          <label class="col-sm-4 col-form-label">Select Gender</label>
          <div class="col-sm-8">
          <select name="c_gender"  required class="form-control" id="cars">
            <option vlalue="{{$clients->c_gender}}">Select</option>
            <option value="Male">M</option>
            <option value="Female">F</option>
          </select>
          </div>
          </div>
          
          <div class="mb-3 row upload-options">
            <label class="col-sm-4 col-form-label"> Upload image</label>
            <div class="col-sm-8">
            <input type="file" name="c_image" required class="upload-file form-contol" accept="uploads/clients/" value="{{$clients->c_image}}" />
            </div> 
          </div>
  <button type="submit" class="btn btn-primary">Update client</button>
</form>
</div>
</div>
</div>
</div>
@endsection