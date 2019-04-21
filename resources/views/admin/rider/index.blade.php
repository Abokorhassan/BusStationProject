@extends('admin/layouts/default')
{{-- Page title --}}
@section('title')
Rider Lists
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
        <h1>Rider</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                    Dashboard 
                </a>
            </li>
            <li><a href="#">Rider</a></li>
            <li class="active">Rider Lists</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content paddingleft_right15">
        <div class="row">
            <div class="panel panel-primary ">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title pull-left"><i class="livicon" data-name="users" data-size="16"
                        data-loop="true" data-c="#fff" data-hc="white"></i>
                        Rider lists
                    </h4>
                    <div class="pull-right">
                        <a href="{{ URL::to('admin/rider/create') }}" class="btn btn-sm btn-default"><span
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
                                    <th>ID_Number</th>
                                    <th>Full name</th>
                                    <th>Ph_number</th>
                                    <th>Gender</th>
                                    <th>User_id</th>
                                    <th>Created_at</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                            @if(!empty($riders))
                                @foreach ($riders as $rider)
                                    <tr>
                                        <td>{{ $rider->id }}</td>
                                        <td>{{ $rider->id_number }}</td>
                                        <td>{{ $rider->first_name}} {{ $rider->last_name}} {{ $rider->third_name}}</td>
                                        <td>{{ $rider->ph_number }}</td>
                                        <td>{{ $rider->gender }}</td>
                                        <td>{{ $rider->user_id }}</td>
                                        {{-- <td>{{ $test->comments->count() }}</td> --}}
                                        <td>{{ $rider->created_at->diffForHumans() }}</td>
                                        <td>
                                        
                                            <a href="{{ URL::to('admin/rider/' . $rider->id . '/edit' ) }}"><i class="livicon"
                                                                                                            data-name="edit"
                                                                                                            data-size="18"
                                                                                                            data-loop="true"
                                                                                                            data-c="#428BCA"
                                                                                                            data-hc="#428BCA"
                                                                                                            title="Edit rider"></i></a>
                                            <a href="#" data-toggle="modal"
                                            data-target="#delete"><i class="livicon" data-name="remove-alt"
                                                                                data-size="18" data-loop="true" data-c="#f56954"
                                                                                data-hc="#f56954"
                                                                                title="Delete rider"></i></a>
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
                    <h4 class="modal-title" id="user_delete_confirm_title">Delete rider</h4>
                </div>
                <div class="modal-body">
                    Are you sure to delete this Rider? This operation is irreversible
                            
                </div>
                <div class="modal-footer">
                    <button type="button" style="margin-right: 1%" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    {{-- {!!Form::open(['url' => ['admin/rider', $rider->id], 'method' => 'Post', 'class' => 'pull-right']) !!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                    {!!Form::close() !!} --}}
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