@extends('backend.layouts.master')
@section('content')
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0 text-dark">Manage Contact</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Contact</li>
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
                <h3>Contact List
                  @if($countContact<1)
                  <a class="btn btn-success float-right btn-sm" href="{{route('site-setting.contact.add')}}"><i class="fa fa-plus-circle"></i> Add Contact</a>
                  @endif
                </h3>
              </div><!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-hover table-responsive">
                  <thead>
                    <tr>
                      <th>SL.</th>
                      <th>Address</th>
                      <th>Mobile No</th>
                      <th>Email</th>
                      <th>Facebook</th>
                      <th>Twitter</th>
                      <th>Instagram</th>
                      <th>Linkedin</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($allData as $key => $contact)
                    <tr class="{{$contact->id}}">
                      <td>{{$key+1}}</td>
                      <td>{{$contact->address}}</td>
                      <td>{{$contact->mobile_no}}</td>
                      <td>{{$contact->email}}</td>
                      <td>{{$contact->facebook}}</td>
                      <td>{{$contact->twitter}}</td>
                      <td>{{$contact->instagram}}</td>
                      <td>{{$contact->linkedin}}</td>
                      <td>
                        <a title="Edit" class="btn btn-sm btn-primary" href="{{route('site-setting.contact.edit',$contact->id)}}"><i class="fa fa-edit"></i></a>

                        <!-- <a title="Delete" id="delete" class="btn btn-sm btn-danger" href="{{route('site-setting.contact.delete')}}" data-token="{{csrf_token()}}" data-id="{{$contact->id}}"><i class="fa fa-trash"></i></a> -->
                        
                      </td>
                    </tr>
                    @endforeach
                  </tbody>
                </table>
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
@endsection