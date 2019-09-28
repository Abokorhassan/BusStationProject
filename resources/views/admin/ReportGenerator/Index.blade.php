@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Queue Lists
@stop

{{-- page level styles --}}
@section('header_styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}" />
    <link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css" />
@stop

{{-- Page content --}}
@section('content')
    <section class="content-header">
        <h1>Bus Queue Lists</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                    Dashboard 
                </a>
            </li>
            <li><a href="#">Queue</a></li>
            <li class="active">Queue Lists</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content paddingleft_right15">
        <div class="row">
            <div class="panel panel-primary ">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title pull-left">
                        <a style="margin-left: -1%;" href="#">
                            <img style="margin-top: -2%;" src="https://img.icons8.com/color/26/000000/overtime.png">
                        </a>
                        Queue lists
                    </h4>
                    {{-- <div class="pull-right">
                        <a href="{{ URL::to('admin/queue/create') }}" class="btn btn-sm btn-default"><span
                                    class="glyphicon glyphicon-plus"></span> @lang('button.create')</a>
                    </div> --}}
                </div>
                <br />
                <div class="panel-body">
                    <div class="row">
                        <div class="col-sm-6">
                          <h5>Start Date <span class="text-danger"></span></h5>
                          <input type="date" name="start_date" id="start_date" class="form-control datepicker-autoclose" 
                            placeholder="Please select start date"> 
                        </div>
                        <div class="col-sm-6">
                          <h5>End Date <span class="text-danger"></span></h5>
                          <input type="date" name="end_date" id="end_date" class="form-control datepicker-autoclose"
                            placeholder="Please select end date">
                        </div>
                        <div class="col-sm-6">
                          <h5>Bus <span class="text-danger"></span></h5>
                          <input type="text" name="bus_number" id="bus_number" class="form-control datepicker-autoclose" 
                            placeholder="Enter bus">
                        </div>
                        <div class="col-sm-6">
                          <h5>Station <span class="text-danger"></span></h5>
                          <input type="text" name="station_name" id="station_name" class="form-control datepicker-autoclose"
                            placeholder="Enter Station">
                        </div>
                        <div class="col-sm-6">
                          <h5>Route <span class="text-danger"></span></h5>
                          <input type="text" name="route_name" id="route_name" class="form-control datepicker-autoclose" 
                            placeholder="Enter Route">
                        </div>
                        <div class="col-sm-6">
                          <h5>Schedule <span class="text-danger"></span></h5>
                          <input type="text" name="schedule_number" id="schedule_number" class="form-control datepicker-autoclose"
                            placeholder="Enter schedule_number">
                        </div>
                        <br>
                        <div class="text-left col-sm-6" >
                          <button type="text" id="btnFiterSubmitSearch" class="btn btn-info">Filter</button>
                        </div>
                    
                    </div>
                    <div class="table-responsive">
                        <table class="table table-bordered" id="table">
                            <thead>
                                <tr class="filters">
                                    <th>ID</th>
                                    <th>Bus</th>
                                    <th>Schedule</th>
                                    <th>Route</th>
                                    <th>Station</th>
                                    <th>User</th>
                                    <th>Created_at</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>    <!-- row-->
    </section>
      
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}" ></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap.js') }}" ></script>
    
    <script>
        $(document).ready( function () {
          $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
          });
    
          $('#table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
              url: "{{ route('admin.filter.data') }}",
              type: 'GET',
              data: function (d) {
              d.start_date = $('#start_date').val();
              d.end_date = $('#end_date').val();
              d.bus_number = $('#bus_number').val();
              d.station_name = $('#station_name').val();
              d.route_name = $('#route_name').val();
              d.schedule_number = $('#schedule_number').val();
              }
            },
            columns: [
                { data: 'id', name: 'id' },	
                { data: 'bus_number', name: 'bus_number' },
                { data: 'schedule_number', name: 'schedule_number' },
                { data: 'route_name', name: 'route_name' },	
                { data: 'station_name', name: 'station_name' },
                { data: 'user_first', name: 'user_first'},
                { data: 'created_at', name:'created_at'},
            ]
          });
        });
    
        $('#btnFiterSubmitSearch').click(function(){
          $('#table').DataTable().draw(true);
        });
      </script>

    <div class="modal fade" id="delete_confirm" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content"></div>
    </div>
    </div>
    <script>
        $(function () {
            $('body').on('hidden.bs.modal', '.modal', function () {
                $(this).removeData('bs.modal');
            });
        });
    </script>
@stop


