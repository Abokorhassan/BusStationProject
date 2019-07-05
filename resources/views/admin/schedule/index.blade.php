@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Schedule Lists
@stop

{{-- page level styles --}}
@section('header_styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}" />
    <link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css" />
@stop

{{-- Page content --}}
@section('content')
    <section class="content-header">
        <h1>Schedule</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                    Dashboard 
                </a>
            </li>
            <li><a href="#">Schedule</a></li>
            <li class="active">Schedule Lists</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content paddingleft_right15">
        <div class="row">
            <div class="panel panel-primary ">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title pull-left">
                        <a style="margin-left: -1%;" href="#">
                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABYAAAAWCAYAAADEtGw7AAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAABlgAAAZYBofSv5QAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAH6SURBVDiN7ZM9axVhEIWf8+5NQoqAXlJZRJs0FhoLA371RqKCCIKFEC1EC3+CWPiBiCAoWEVQm6CCIgoWNqJpjGnERgKiCAnpVCKYkDvHIuZm7+7mGhurDGwxw5lzzsy8C+vxJzR9cM8lWWfaYBqgt42O+RPZr65E5rvATiBbrcHy7VoKui02ttf3gdpC1+nInARDf3Obgu5aoXbHwcNMLAI4aYvtK0AvRG8yWFoe9inyfKs+g8BmgDzxl0jpViLGoln3Y+SrWNdKM+BXBHP5mhJ9uEhsj3bSmA1rKNcNiBDni8SCc4hGLq/bbFjOV4iTXyw63ZDoNwwsoX1TZlzW+zKxToX9LVc4C5wsETtSSHw1zCGmABQsBkxLhFxaxcvmuisitSbxCPORYJJgkqTPm56Pv65qzFKjf8HU8x/mQcmxEhcjUh9ia9OViZnhvQOIbZh3eeJGZFOdbRznjsd+ysAEjOBSHUtHs/D3ppAYERwvO7YPC32oUg9pjAK77OuRexUJ6nnEyvGk+2YFWPDXA7xpZdY9wj+biCW1Y6AdLcSYy8Cnll7osRit1mI7icKfp3rJMeKI4UehvaN6AgAfqtp9mRgG2xz5n6NGyp4RMbsaQCgLoikqeII1YbzKPYCUTazZwezw7l0zw/sG19yw1vAFkql46f87fgP9/cB2LacxiQAAAABJRU5ErkJggg==">
                        </a>
                        Schedule lists
                    </h4>
                    {{-- <div class="pull-right">
                        <a href="{{ URL::to('admin/schedule/create') }}" class="btn btn-sm btn-default"><span
                                    class="glyphicon glyphicon-plus"></span> @lang('button.create')</a>
                    </div> --}}
                </div>
                <br />
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="table">
                            <thead>
                                <tr class="filters">
                                    <th>ID</th>
                                    <th>Schedule Number</th>
                                    <th>Station</th>
                                    <th>Route</th>
                                    <th>User</th>
                                    <th>Created_at</th>
                                    <th>Actions</th>
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
        $(function() {
            var table = $('#table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '{!! route('admin.schedule.data') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'schedule_number', name: 'schedule_number' },
                    { data: 'Station', name: 'Station' },
                    { data: 'route_id', name: 'route_id'},
                    { data: 'User', name: 'User'},
                    { data: 'created_at', name:'created_at'},
                    { data: 'actions', name: 'actions', orderable: false, searchable: false }
                ]
            });
            table.on( 'draw', function () {
                $('.livicon').each(function(){
                    $(this).updateLivicon();
                });
            } );
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


