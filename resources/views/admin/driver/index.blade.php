@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
Driver Lists
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}" />
    <link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css" />
@stop


{{-- Page content --}}
@section('content')
    <section class="content-header">
        <h1>Driver</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                    Dashboard 
                </a>
            </li>
            <li><a href="#">Driver</a></li>
            <li class="active">Driver Lists</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content paddingleft_right15">
        <div class="row">
            <div class="panel panel-primary ">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title pull-left"><i class="livicon" data-name="users" data-size="16"
                        data-loop="true" data-c="#fff" data-hc="white"></i>
                    Driver lists
                    </h4>
                    <div class="pull-right">
                        <a href="{{ URL::to('admin/driver/create') }}" class="btn btn-sm btn-default"><span
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
                                    <th>Full name</th>
                                    <th>Email</th>
                                    <th>Ph_number</th>
                                    <th>Birth_date</th>
                                    <th>Address</th>
                                    <th>Created_at</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if(!empty($drivers))
                                @foreach ($drivers as $driver)
                                    <tr>
                                        <td>{{ $driver->id }}</td>
                                        <td>{{ $driver->first_name}} {{ $driver->last_name}} {{ $driver->third_name}}</td>
                                        <td>{{ $driver->email}}</td>
                                        <td>{{ $driver->ph_number }}</td>
                                        <td>{{ $driver->dob }}</td>
                                        <td>{{ $driver->address}}</td>
                                        {{-- <td>{{ $test->comments->count() }}</td> --}}
                                        <td>{{ $driver->created_at->diffForHumans() }}</td>
                                        <td>
                                        
                                            <a href="{{ URL::to('admin/driver/' . $driver->id . '/edit' ) }}"><i class="livicon"
                                                                                                            data-name="edit"
                                                                                                            data-size="18"
                                                                                                            data-loop="true"
                                                                                                            data-c="#428BCA"
                                                                                                            data-hc="#428BCA"
                                                                                                            title="Edit driver"></i></a>
                                            <a href="#" data-toggle="modal"
                                            data-target="#delete"><i class="livicon" data-name="remove-alt"
                                                                                data-size="18" data-loop="true" data-c="#f56954"
                                                                                data-hc="#f56954"
                                                                                title="Delete driver"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>    <!-- row-->
    </section>


    <!--Model 1 -->
    <div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="user_delete_confirm_title"
            aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title" id="user_delete_confirm_title">Delete driver</h4>
                </div>
                <div class="modal-body">
                    Are you sure to delete this Driver? This operation is irreversible
                            
                </div>
                <div class="modal-footer">
                    <button type="button" style="margin-right: 1%" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    {!!Form::open(['url' => ['admin/driver', $driver->id], 'method' => 'Post', 'class' => 'pull-right']) !!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                    {!!Form::close() !!}
                </div>
                        
            </div>
        </div>
    </div>

    <script>
        $('#exampleModal').on('show.bs.modal', event => {
            var button = $(event.relatedTarget);
            var modal = $(this);
            // Use above variables to manipulate the DOM
            
        });
    </script>
      
@stop

{{-- page level scripts --}}
@section('footer_scripts')
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/jquery.dataTables.js') }}"></script>
    <script type="text/javascript" src="{{ asset('assets/vendors/datatables/js/dataTables.bootstrap.js') }}"></script>

    <script>
        $(document).ready(function() {
            $('#table').DataTable();
        });
    </script>

    
    <script>
        $(function () {
            $('body').on('hidden.bs.modal', '.modal', function () {
                $(this).removeData('bs.modal');
            });
        });
    </script>
@stop
