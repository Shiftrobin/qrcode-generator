@extends('backend.layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Vendor</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Vendor</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <!-- Main row -->
        <div class="row">
          <!-- Left col -->
          <section class="col-md-12">
            <!-- Custom tabs (Charts with tabs)-->
            <div class="card">
              <div class="card-header">
                <h3>Edit Vendor 
                  <a class="btn btn-success float-right btn-sm" href="{{route('vendors.view')}}"><i class="fa fa-list"></i> Vendor List</a>
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <form method="post" action="{{route('vendors.update')}}" id="myForm" enctype="multipart/form-data">
                  @csrf
                  <div class="form-row">
                      <div class="form-group col-md-4">
                          <label class="control-label">Vendor Name</label>
                          <input type="text" value="{{$editData->name}}" name="name" id="name" class="form-control" placeholder="Write your Full name">
                          <font color="red">{{($errors->has('name'))?($errors->first('name')):''}}</font>
                      </div>
                      <div class="form-group col-md-4">
                          <label class="control-label">Vendor Email</label>
                          <input type="email" value="{{$editData->email}}" name="email" id="email" class="form-control">
                          <font color="red">{{($errors->has('email'))?($errors->first('email')):''}}</font>
                      </div>
                      <div class="form-group col-md-4">
                          <label class="control-label">Vendor Mobile</label>
                          <input type="text" value="{{$editData->mobile}}" name="mobile" id="mobile" class="form-control">
                          <font color="red">{{($errors->has('mobile'))?($errors->first('mobile')):''}}</font>
                      </div>
                      <div class="form-group col-md-4">
                          <label class="control-label">Store Name</label>
                          <input type="text" value="{{$editData->store_name}}" name="store_name" id="store_name" class="form-control">
                          <font color="red">{{($errors->has('store_name'))?($errors->first('store_name')):''}}</font>
                      </div>
                      <div class="form-group col-md-4">
                        <label for="image">Store Logo <span style="color:red;">200px X 200px</span></label>
                        <input type="file" name="store_logo" class="form-control" id="image">
                      </div>
                      <div class="form-group col-md-2">
                        <img id="showImage" src="{{(!empty($editData->store_logo))?url('public/upload/store_images/'.$editData->store_logo):url('public/upload/no_image.png')}}" style="width: 80px;height: 70px;border:1px solid #000;">
                      </div>
                      <div class="form-group col-md-12">
                          <label class="control-label">Store Address</label>
                          <input type="text" value="{{$editData->store_address}}" name="store_address" id="store_address" class="form-control">
                          <font color="red">{{($errors->has('store_address'))?($errors->first('store_address')):''}}</font>
                      </div>
                      <div class="form-group col-md-12">
                          <label class="control-label">Google Map Embed</label>
                          <textarea name="map_link" class="form-control" rows="5">{{@$editData->map_link}}</textarea>
                          <font color="red">{{($errors->has('map_link'))?($errors->first('map_link')):''}}</font>
                      </div>
                      <div class="form-group col-md-6">
                        <input type="submit" value="Update" class="btn btn-primary">
                      </div>
                  </div>
                </form>
              </div><!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>
          <!-- right col -->
        </div>
        <!-- /.row (main row) -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <script type="text/javascript">
    $(document).ready(function () {
        $('#myForm').validate({
            rules: {
                store_name: {
                    required: true,
                },
                store_address: {
                    required: true,
                },
                map_link: {
                    required: true,
                },
                name: {
                    required: true,
                },
                email: {
                    required: true,
                    email: true,
                }
            },
            messages: {
            },
            errorElement: 'span',
            errorPlacement: function (error, element) {
                error.addClass('invalid-feedback');
                element.closest('.form-group').append(error);
            },
            highlight: function (element, errorClass, validClass) {
                $(element).addClass('is-invalid');
            },
            unhighlight: function (element, errorClass, validClass) {
                $(element).removeClass('is-invalid');
            }
        });
    });
  </script>
@endsection