@extends('backend.layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Sub-Category</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Sub-Category</li>
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
                <h3>
                  @if(isset($editData))
                  Edit Sub-Category
                  @else
                  Add Sub-Category
                  @endif
                  <a class="btn btn-success float-right btn-sm" href="{{route('categories.sub.category.view')}}"><i class="fa fa-list"></i> Sub-Category List</a>
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <form method="post" action="{{(@$editData)?route('categories.sub.category.update',$editData->id):route('categories.sub.category.store')}}" id="myForm" enctype="multipart/form-data">
                  @csrf
                  <div class="form-row">
                    <div class="form-group col-md-6">
                      <label>Category Name</label>
                      <select name="category_id" class="form-control">
                        <option value="">Select Category</option>
                        @foreach($categories as $category)
                        <option value="{{$category->id}}" {{(@$editData->category_id==$category->id)?'selected':''}}>{{$category->name}}</option>
                        @endforeach
                      </select>
                    </div>
                    <div class="form-group col-md-6">
                      <label>Sub-Category Name</label>
                      <input type="text" name="name" value="{{@$editData->name}}" class="form-control" placeholder="Write Sub-Category Name">
                      <font color="red">{{($errors->has('name'))?($errors->first('name')):''}}</font>
                    </div>
                    <div class="form-group col-md-2">
                      <label for="image">Show Status</label>
                      <select name="status" class="form-control">
                        <option value="">Select Status</option>
                        <option value="1" {{(@$editData->status=="1")?"selected":""}}>Yes</option>
                        <option value="0" {{(@$editData->status=="0")?"selected":""}}>No</option>
                      </select>
                    </div>
                    <div class="form-group col-md-4">
                      <label for="image">Image <span style="color: red;">(Size:640px X 640px)</span></label>
                      <input type="file" name="image" class="form-control" id="image">
                    </div>
                    <div class="form-group col-md-2">
                      <img id="showImage" src="{{(!empty($editData->image))?url('public/upload/sub_category_images/'.$editData->image):url('public/upload/no_image.png')}}" style="width: 120px;border:1px solid #000;">
                    </div>
                    <div class="form-group col-md-4" style="padding-top:30px">
                      <button type="submit" class="btn btn-primary">{{(@$editData)?"Update":"Submit"}}</button>
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
          category_id: {
            required: true,
          },
          name: {
            required: true,
          },
          status: {
            required: true,
          },
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