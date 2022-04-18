@extends('admin.admin-app')

@section('title', 'User List')


@section('head_script')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{asset('admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin-lte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{asset('admin-lte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css')}}">
@endsection


@section('content')
<div class="row">
    
  <div class="col-lg-12">
    <div class="card card-primary card-outline">
      <div class="card-header">
        <h5 class="m-0">User List</h5>
      </div>
      <div class="card-body">

                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Platform(s)</th>
                    <th>Engine version</th>
                    <th>CSS grade</th>
                  </tr>
                  </thead>
                  <tbody>
                  <tr>
                    <td>Trident</td>
                    <td>Internet
                      Explorer 4.0
                    </td>
                    <td>Win 95+</td>
                    <td> 4</td>
                    <td>X</td>
                  </tr>
                  <tr>
                    <td>Trident</td>
                    <td>Internet
                      Explorer 5.0
                    </td>
                    <td>Win 95+</td>
                    <td>5</td>
                    <td>C</td>
                  </tr>
                  
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>Rendering engine</th>
                    <th>Browser</th>
                    <th>Platform(s)</th>
                    <th>Engine version</th>
                    <th>CSS grade</th>
                  </tr>
                  </tfoot>
                </table>
      </div>
    </div>
  </div>
</div>

@endsection


@section('page_header')

<div class="col-sm-6">
    <h1 class="m-0">Dashboard</h1>
  </div><!-- /.col -->
  <div class="col-sm-6">
    <ol class="breadcrumb float-sm-right">
      <li class="breadcrumb-item"><a href="{{route('admin.dashboard')}}">Home</a></li>
      <li class="breadcrumb-item active">Dashboard</li>
    </ol>
  </div>
@endsection


@section('footer_script')

<!-- DataTables  & Plugins -->
<script src="{{ asset('admin-lte/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{ asset('admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{ asset('admin-lte/plugins/datatables-re')}}sponsive/js/dataTables.responsive.min.js"></script>
<script src="{{ asset('admin-lte/plugins/datatables-responsive/js/responsive.bootstrap4.mi')}}n.js"></script>
<script src="{{ asset('admin-lte/plugins/datatables-buttons/js/dataTables.buttons.min.js')}}"></script>
<script src="{{ asset('admin-lte/plugins/datatables-buttons/js/buttons.bootstrap4.min.js')}}"></script>
<script src="{{ asset('admin-lte/plugins/jszip/jszip.min.js')}}"></script>
<script src="{{ asset('admin-lte/plugins/pdfmake/pdfmake.min.js')}}"></script>
<script src="{{ asset('admin-lte/plugins/pdfmake/vfs_fonts.js')}}"></script>
<script src="{{ asset('admin-lte/plugins/datatables-buttons/js/buttons.html5.min.js')}}"></script>
<script src="{{ asset('admin-lte/plugins/datatables-buttons/js/buttons.print.min.js')}}"></script>
<script src="{{ asset('admin-lte/plugins/datatables-buttons/js/buttons.colVis.min.js')}}"></script>

<script>
  $(function () {
    $("#example1").DataTable({
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

    
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>


@endsection
