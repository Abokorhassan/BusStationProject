@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Accident Lists
@stop

{{-- page level styles --}}
@section('header_styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}" />
    <link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css" />
@stop


{{-- Page content --}}
@section('content')
    <section class="content-header">
        <h1>Accident</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                    Dashboard 
                </a>
            </li>
            <li><a href="#">Accident</a></li>
            <li class="active">Accident Lists</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content paddingleft_right15">
        <div class="row">
            <div class="panel panel-primary ">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title pull-left">
                        <img  style="margin-top: -2%;" src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABkAAAAZCAYAAADE6YVjAAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAABzQAAAc0BnvLTTgAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAAN9SURBVEiJvZVfbFNlFMB/57tdq1NBMQhthxqJCWGuihEBY8gGXdHEDCNJIcbgtnag8mZiwsNMwHdNNOGhrkU0PjWSKChZaMsCMWqMZgbxAUxEAm3FkGWZM3Htvff4wFpu62hdNJyne/7c8zvnfOfeD26BSCtndzbrn14286kKT6B8ds/Ukn0/xeOV/xUSymcSoGkAVdmD0fOiugeRHzDOkVLf3mv/GRLOZ75VdD1o0Reo9thz/ovA0nn3HMJRhVR5a/JM6FRmAFc/FvRgMTrytjePaQVR9OH5WjJOJbDTAwAIoLwoyulQPjOO2F+BnFbkzeY8bSDsB6ZwTFpV97aI3IZjHXOcSgJhdFGQcjSZKllXVhifGwQe87h+VlfWC/KUx7bJsnz5jqpzdFEQAPoO2K4rr3iqLhqbjeVY4jtRM+uJHAf5xPZZX64qpFYvCvLgxAd3I7qzjhDJXnkmOQWg2MOe0FQpmnxL0Xcctc6ET75f79zXDlJx7N0gnTVdlNiqk5mQIzykosladyWr+DlAKTpyKFhIz2BMDtX7ENG2EJDmA+92jBYbQ+QEfQfsmuraTFoWvyOi0GZcwUJ6M7C2bRnoJa9uGSLA2ZreEiLQYm1viIr5senFiCJ1200hK08cXo6y418wZit+JhqgSo+ItoeYDh0EAq2yC/wiSOza04k/GuxCxDVWG4iqIK2+cFD0I+lc8kgxmvjaa+8aTy8D7vqtd7B+Tj6A5ROH7vQ5geMCawT266nDZWC1J+MxDLMou+YLu1CeWjpMNO78g25pBJVztc2qQzrs215FtPd6r3pZYJ/eeO2LUn9yO0A4n3YVXgKuEo87XfmxiItkRXWw2D/yDYBrZAOezapDEB2a1y8I/vOuVgc8MecAunJjvS4SAgXoCefTL7vKKIacIsfDE2PrXEdGUQZE9QUvpHYmndenwhF1q0N4/wTKumAhvdkVyYNuqcUrvI4hV9qafM3BbDBV4wrE/Za1ttZVQydqdIe4ctAoZ1VINsxYiIkSa7Apk6X+5EaAlYXMs8Z1HrWFBwQz+Wvf0DRN4gMobxn5HngOIJgfmxFkE7CiOdgj79UeLNWEitwhwkWQNxYKXvD67c5m/dP3zmxXZRiI0bjqc8C7gAqEFR53HP+TV7ft/vNmFbW84wFCudT9iHkekdubfar8FbCsDxca0S2XvwFUMle0SdZ2YQAAAABJRU5ErkJggg==">
                    Accident list
                    </h4>
                    <div class="pull-right">
                        <a href="{{ URL::to('admin/accident/create') }}" class="btn btn-sm btn-default"><span
                                    class="glyphicon glyphicon-plus"></span> @lang('button.create')</a>
                    </div>
                </div>
                <br />
                <div class="panel-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="table">
                            <thead>
                                <tr class="filters">
                                    <th>ID</th>
                                    <th>Accident Number</th>
                                    <th>Driver</th>
                                    <th>Bus</th>
                                    <th>Latitude</th>
                                    <th>Longitude</th>
                                    <th>User</th>
                                    <th>Route</th>
                                    <th>Station</th>
                                    <th>Created At</th>
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
                ajax: '{!! route('admin.accident.data') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'acc_num', name: 'acc_num' },
                    { data: 'Driver', name: 'Driver' },
                    { data: 'Bus', name: 'Bus' },
                    { data: 'acc_lat', name: 'acc_lat' },
                    { data: 'acc_long', name: 'acc_long' },
                    { data: 'User', name: 'User' },
                    { data: 'route_id', name: 'route_id' },
                    { data: 'Station', name: 'Station' },
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
