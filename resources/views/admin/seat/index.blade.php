@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Seat Lists
@stop

{{-- page level styles --}}
@section('header_styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}" />
    <link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css" />
@stop

{{-- Page content --}}
@section('content')
    <section class="content-header">
        <h1>Seat</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                    Dashboard 
                </a>
            </li>
            <li><a href="#">Seat</a></li>
            <li class="active">Seat Lists</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content paddingleft_right15">
        <div class="row">
            <div class="panel panel-primary ">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title pull-left">
                        <a style="margin-left: -1%;" href="#">
                            <img src="data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAABgAAAAYCAYAAADgdz34AAAABHNCSVQICAgIfAhkiAAAAAlwSFlzAAABuwAAAbsBOuzj4gAAABl0RVh0U29mdHdhcmUAd3d3Lmlua3NjYXBlLm9yZ5vuPBoAAANySURBVEiJlZVNTBNbGIbf055OZ4TSakHai80FREgwBkODwWgUxLi6XONGo0YxrtS40YUu3JD4s9BoYmKixhhjopiISkLMzb2IP7HJjSKiaERNIQqWCgW09GeYzkx7XEAbWqc/vLvzfe95nzMz+c4QzOllU5NVZzRuiSpKb/2jR24sQIwxAUAdgEIALwgh3nhPBwBPGxp4rqDAVVpb22ayWp+/2ry5fAHhGwD0A+gC0A6ghzF2KQnAU1q22G4vyrda4aipsRny81tzDM8HcB3ACgDGubwSAHsZY3sSAElV3aLfPw0ABp4H5fn6XqfTkANjHQCHRt0EYH8C0PjsmapIkg+MAQCWOBwOUly8LQfAqrmTa8mUAACAqqouKRwGAFjsdp7y/KEcALqcDerMTHvQ5/MDACEEvMm0vKehwZZl/xAANU1PTAIMWyxvgpOTE/F1UVlZicFsPpwF8BSAR6MuAfgnCbC9vT2qRCLj8bVgNhM9pX9nSieE/ABwJgUSAuACcDYJAACqojyZCQQS64Li4mU9TU11WSDXAGwCcB7AHQAthJAthJAYAJD55peNjTW26urHSysqrGokAs+HD1BEMQhgdL6PMSbKqnqjrrPzErIoCcAAMrBz56fyNWsq/V4vCCEw2+2aG8fcbv+PkZH9zocPOzIBaAqN9UvSd8ZYZYHNhnG3G1MeTywSCr1nWh+TsbxsT0BTC7Isd0nT0xsFiwX2qiowxnSfXS6xtqPjr2xhuQEUpTMwMXFEsFgKgdmZWGQ2l/dt3fp/xiRCfEwUTzq7ul4nlVN9DCADO3Z8LK+vr1rISaOqim/9/Z6psbF167u7R+L130adAEyWZS+LxRaSDz2lKCwtXSZw3Kb5dc27JKYoV8cHB3+yucsvF8WiUfi+fPk2I8tPUg6srd7m5l1Rg3AwWlSyVg0GfHmhiT4tX9jyxwadntK8ae+/sVDodOo3yKgrpx7c+u9un3jheFtzOs/lk/dvd3e8Uy6eaGvR6me8bjnesHrSNzkeEIKP03mksHhNUVRRyBN2a/XTvqLzR29WVqyuej76dVTWU1xJ52MxQo288QCl+tCQ31jd2tqYdH3/NgeJjRyt43luyUpntQHA6XQ+YHZWRoe9vkXh4T8x+4/IDuDCU/c+vR1glBO4TOFxRZTI1LFz+4ZS678AMgZPfA9e9+UAAAAASUVORK5CYII=">
                        Seat lists
                    </h4>
                    <div class="pull-right">
                        <a href="{{ URL::to('admin/seat/create') }}" class="btn btn-sm btn-default"><span
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
                                    <th>Bus_Number</th>
                                    <th>Seat Number</th>
                                    <th>Station</th>
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
                ajax: '{!! route('admin.seat.data') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'bus_number', name: 'bus_number' },
                    { data: 'seat_number', name: 'seat_number' },
                    { data: 'station_name', name: 'station_name' },
                    { data: 'user_first', name: 'user_first' },
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


