@extends('admin/layouts/default')

{{-- Page title --}}
@section('title')
    Route Lists
@stop

{{-- page level styles --}}
@section('header_styles')
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/vendors/datatables/css/dataTables.bootstrap.css') }}" />
    <link href="{{ asset('assets/css/pages/tables.css') }}" rel="stylesheet" type="text/css" />
@stop


{{-- Page content --}}
@section('content')
    <section class="content-header">
        <h1>Route</h1>
        <ol class="breadcrumb">
            <li>
                <a href="{{ route('admin.dashboard') }}"> <i class="livicon" data-name="home" data-size="16" data-color="#000"></i>
                    Dashboard 
                </a>
            </li>
            <li><a href="#">Route</a></li>
            <li class="active">Route Lists</li>
        </ol>
    </section>

    <!-- Main content -->
    <section class="content paddingleft_right15">
        <div class="row">
            <div class="panel panel-primary ">
                <div class="panel-heading clearfix">
                    <h4 class="panel-title pull-left">
                        <img style="margin-top: -6%;" src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHg9IjBweCIgeT0iMHB4Igp3aWR0aD0iMjgiIGhlaWdodD0iMjgiCnZpZXdCb3g9IjAgMCAxNzIgMTcyIgpzdHlsZT0iIGZpbGw6IzAwMDAwMDsiPjxnIGZpbGw9Im5vbmUiIGZpbGwtcnVsZT0ibm9uemVybyIgc3Ryb2tlPSJub25lIiBzdHJva2Utd2lkdGg9IjEiIHN0cm9rZS1saW5lY2FwPSJidXR0IiBzdHJva2UtbGluZWpvaW49Im1pdGVyIiBzdHJva2UtbWl0ZXJsaW1pdD0iMTAiIHN0cm9rZS1kYXNoYXJyYXk9IiIgc3Ryb2tlLWRhc2hvZmZzZXQ9IjAiIGZvbnQtZmFtaWx5PSJub25lIiBmb250LXdlaWdodD0ibm9uZSIgZm9udC1zaXplPSJub25lIiB0ZXh0LWFuY2hvcj0ibm9uZSIgc3R5bGU9Im1peC1ibGVuZC1tb2RlOiBub3JtYWwiPjxwYXRoIGQ9Ik0wLDE3MnYtMTcyaDE3MnYxNzJ6IiBmaWxsPSJub25lIj48L3BhdGg+PGc+PHBhdGggZD0iTTY5LjYwNjI1LDEyMi4xNDY4OHYwYzMuNjI4MTMsLTQuODM3NSA1LjY0Mzc1LC0xMC44ODQzOCA1LjY0Mzc1LC0xNy4zMzQzOGMwLC0xNi4zOTM3NSAtMTMuMTY4NzUsLTI5LjU2MjUgLTI5LjU2MjUsLTI5LjU2MjVjLTE2LjM5Mzc1LDAgLTI5LjU2MjUsMTMuMTY4NzUgLTI5LjU2MjUsMjkuNTYyNWMwLDYuNDUgMi4wMTU2MywxMi40OTY4NyA1LjY0Mzc1LDE3LjMzNDM4djB2MGMwLjEzNDM3LDAuMjY4NzUgMC4yNjg3NSwwLjQwMzEyIDAuNDAzMTIsMC42NzE4N2wyMy41MTU2MywzMS43MTI1bDIzLjUxNTYzLC0zMS44NDY4N2MwLjEzNDM4LC0wLjEzNDM3IDAuMjY4NzUsLTAuMjY4NzUgMC40MDMxMiwtMC41Mzc1eiIgZmlsbD0iI2ZmZmZmZiI+PC9wYXRoPjxwYXRoIGQ9Ik00NS42ODc1LDE1OC41NjI1djBjLTEuMzQzNzUsMCAtMi40MTg3NSwtMC42NzE4OCAtMy4yMjUsLTEuNjEyNWwtMjMuNTE1NjMsLTMxLjg0Njg4Yy0wLjEzNDM3LC0wLjEzNDM3IC0wLjI2ODc1LC0wLjQwMzEyIC0wLjUzNzUsLTAuNjcxODdjLTQuMTY1NjMsLTUuNjQzNzUgLTYuMzE1NjMsLTEyLjQ5Njg3IC02LjMxNTYzLC0xOS42MTg3NWMwLC0xOC41NDM3NSAxNS4wNSwtMzMuNTkzNzUgMzMuNTkzNzUsLTMzLjU5Mzc1YzE4LjU0Mzc1LDAgMzMuNTkzNzUsMTUuMDUgMzMuNTkzNzUsMzMuNTkzNzVjMCw3LjEyMTg4IC0yLjE1LDEzLjg0MDYzIC02LjMxNTYzLDE5LjQ4NDM4bC0wLjEzNDM3LDAuMTM0MzdsLTAuNDAzMTMsMC41Mzc1bC0yMy41MTU2MiwzMS44NDY4OGMtMC44MDYyNSwxLjA3NSAtMS44ODEyNSwxLjc0Njg3IC0zLjIyNSwxLjc0Njg3ek00NS42ODc1LDc5LjI4MTI1Yy0xNC4xMDkzNywwIC0yNS41MzEyNSwxMS40MjE4OCAtMjUuNTMxMjUsMjUuNTMxMjVjMCw1LjM3NSAxLjYxMjUsMTAuNjE1NjMgNC44Mzc1LDE0LjkxNTYyYzAuMTM0MzcsMC4xMzQzOCAwLjI2ODc1LDAuNDAzMTMgMC40MDMxMiwwLjUzNzVsMjAuMjkwNjMsMjcuNTQ2ODdsMjAuNTU5MzcsLTI3Ljk1YzAsMCAwLDAgMCwtMC4xMzQzN2MzLjM1OTM4LC00LjMgNC45NzE4OCwtOS41NDA2MyA0Ljk3MTg4LC0xNC45MTU2M2MwLC0xNC4xMDkzNyAtMTEuNDIxODcsLTI1LjUzMTI1IC0yNS41MzEyNSwtMjUuNTMxMjV6IiBmaWxsPSIjYzRkYWRkIj48L3BhdGg+PHBhdGggZD0iTTExMy4yNzgxMyw0Ny4wMzEyNWMtMi4wMTU2MiwtMi42ODc1IC0zLjA5MDYyLC02LjA0Njg3IC0zLjA5MDYyLC05LjQwNjI1YzAsLTguODY4NzUgNy4yNTYyNSwtMTYuMTI1IDE2LjEyNSwtMTYuMTI1YzguODY4NzUsMCAxNi4xMjUsNy4yNTYyNSAxNi4xMjUsMTYuMTI1YzAsMy4zNTkzOCAtMS4wNzUsNi43MTg3NSAtMy4wOTA2Miw5LjQwNjI1bC0xMy4wMzQzNywxNy43Mzc1eiIgZmlsbD0iIzI3YWI0YSI+PC9wYXRoPjxwYXRoIGQ9Ik0xMjYuMzEyNSw2OC44Yy0xLjM0Mzc1LDAgLTIuNDE4NzUsLTAuNjcxODcgLTMuMjI1LC0xLjYxMjVsLTEzLjAzNDM3LC0xNy43Mzc1Yy0yLjU1MzEzLC0zLjQ5Mzc1IC0zLjg5Njg3LC03LjUyNSAtMy44OTY4NywtMTEuODI1YzAsLTExLjE1MzEzIDkuMDAzMTIsLTIwLjE1NjI1IDIwLjE1NjI1LC0yMC4xNTYyNWMxMS4xNTMxMiwwIDIwLjE1NjI1LDkuMDAzMTIgMjAuMTU2MjUsMjAuMTU2MjVjMCw0LjMgLTEuMzQzNzUsOC4zMzEyNSAtMy43NjI1LDExLjgyNWwtMTMuMTY4NzUsMTcuNzM3NWMtMC44MDYyNSwwLjk0MDYzIC0xLjg4MTI1LDEuNjEyNSAtMy4yMjUsMS42MTI1ek0xMjYuMzEyNSwyNS41MzEyNWMtNi43MTg3NSwwIC0xMi4wOTM3NSw1LjM3NSAtMTIuMDkzNzUsMTIuMDkzNzVjMCwyLjU1MzEzIDAuODA2MjUsNC45NzE4NyAyLjI4NDM4LDcuMTIxODhsOS44MDkzOCwxMy4zMDMxM2w5LjgwOTM3LC0xMy4zMDMxM2MxLjQ3ODEzLC0yLjAxNTYyIDIuMjg0MzgsLTQuNDM0MzggMi4yODQzOCwtNi45ODc1YzAsLTYuODUzMTMgLTUuMzc1LC0xMi4yMjgxMyAtMTIuMDkzNzUsLTEyLjIyODEzek0xNDUuMTI1LDE1OC41NjI1aC0xLjM0Mzc1Yy0yLjI4NDM4LDAgLTQuMDMxMjUsLTEuNzQ2ODcgLTQuMDMxMjUsLTQuMDMxMjVjMCwwIDAsMCAwLC0wLjEzNDM3Yy0wLjgwNjI1LC0xLjYxMjUgLTAuNTM3NSwtMy42MjgxMyAwLjgwNjI1LC00LjgzNzVjMS42MTI1LC0xLjQ3ODEzIDQuMTY1NjIsLTEuMzQzNzUgNS42NDM3NSwwLjI2ODc1bDEuODgxMjUsMi4wMTU2MmMxLjA3NSwxLjIwOTM4IDEuMzQzNzUsMi44MjE4NyAwLjY3MTg3LDQuM2MtMC41Mzc1LDEuNDc4MTIgLTIuMDE1NjIsMi40MTg3NSAtMy42MjgxMiwyLjQxODc1ek0xMjcuNjU2MjUsMTU4LjU2MjVoLTQuMDMxMjVjLTIuMjg0MzgsMCAtNC4wMzEyNSwtMS43NDY4NyAtNC4wMzEyNSwtNC4wMzEyNWMwLC0yLjI4NDM3IDEuNzQ2ODcsLTQuMDMxMjUgNC4wMzEyNSwtNC4wMzEyNWg0LjAzMTI1YzIuMjg0MzgsMCA0LjAzMTI1LDEuNzQ2ODcgNC4wMzEyNSw0LjAzMTI1YzAsMi4yODQzOCAtMS43NDY4Nyw0LjAzMTI1IC00LjAzMTI1LDQuMDMxMjV6TTEwNy41LDE1OC41NjI1aC00LjAzMTI1Yy0yLjI4NDM3LDAgLTQuMDMxMjUsLTEuNzQ2ODcgLTQuMDMxMjUsLTQuMDMxMjVjMCwtMi4yODQzNyAxLjc0Njg4LC00LjAzMTI1IDQuMDMxMjUsLTQuMDMxMjVoNC4wMzEyNWMyLjI4NDM3LDAgNC4wMzEyNSwxLjc0Njg3IDQuMDMxMjUsNC4wMzEyNWMwLDIuMjg0MzggLTEuNzQ2ODgsNC4wMzEyNSAtNC4wMzEyNSw0LjAzMTI1ek04Ny4zNDM3NSwxNTguNTYyNWgtNC4wMzEyNWMtMi4yODQzNywwIC00LjAzMTI1LC0xLjc0Njg3IC00LjAzMTI1LC00LjAzMTI1YzAsLTIuMjg0MzcgMS43NDY4OCwtNC4wMzEyNSA0LjAzMTI1LC00LjAzMTI1aDQuMDMxMjVjMi4yODQzNywwIDQuMDMxMjUsMS43NDY4NyA0LjAzMTI1LDQuMDMxMjVjMCwyLjI4NDM4IC0xLjc0Njg4LDQuMDMxMjUgLTQuMDMxMjUsNC4wMzEyNXpNNjcuMTg3NSwxNTguNTYyNWgtNC4wMzEyNWMtMi4yODQzOCwwIC00LjAzMTI1LC0xLjc0Njg3IC00LjAzMTI1LC00LjAzMTI1YzAsLTIuMjg0MzcgMS43NDY4NywtNC4wMzEyNSA0LjAzMTI1LC00LjAzMTI1aDQuMDMxMjVjMi4yODQzOCwwIDQuMDMxMjUsMS43NDY4NyA0LjAzMTI1LDQuMDMxMjVjMCwyLjI4NDM4IC0xLjc0Njg3LDQuMDMxMjUgLTQuMDMxMjUsNC4wMzEyNXpNMTMyLjM1OTM4LDE0NC43MjE4OGMtMS4wNzUsMCAtMi4xNSwtMC40MDMxMyAtMi45NTYyNSwtMS4zNDM3NWwtMi42ODc1LC0yLjk1NjI1Yy0xLjQ3ODEzLC0xLjYxMjUgLTEuMzQzNzUsLTQuMTY1NjMgMC4yNjg3NSwtNS42NDM3NWMxLjYxMjUsLTEuNDc4MTIgNC4xNjU2MywtMS4zNDM3NSA1LjY0Mzc1LDAuMjY4NzVsMi42ODc1LDIuOTU2MjVjMS40NzgxMiwxLjYxMjUgMS4zNDM3NSw0LjE2NTYyIC0wLjI2ODc1LDUuNjQzNzVjLTAuNjcxODcsMC42NzE4OCAtMS43NDY4NywxLjA3NSAtMi42ODc1LDEuMDc1ek0xMTguNzg3NSwxMjkuOTQwNjNjLTEuMDc1LDAgLTIuMTUsLTAuNDAzMTMgLTIuOTU2MjUsLTEuMzQzNzVsLTIuNjg3NSwtMi45NTYyNWMtMS40NzgxMiwtMS42MTI1IC0xLjM0Mzc1LC00LjE2NTYzIDAuMjY4NzUsLTUuNjQzNzVjMS42MTI1LC0xLjQ3ODEzIDQuMTY1NjIsLTEuMzQzNzUgNS42NDM3NSwwLjI2ODc1bDIuNjg3NSwyLjk1NjI1YzEuNDc4MTIsMS42MTI1IDEuMzQzNzUsNC4xNjU2MyAtMC4yNjg3NSw1LjY0Mzc1Yy0wLjgwNjI1LDAuNjcxODggLTEuNzQ2ODgsMS4wNzUgLTIuNjg3NSwxLjA3NXpNMTA1LjA4MTI1LDExNS4wMjVjLTEuMDc1LDAgLTIuMTUsLTAuNDAzMTIgLTIuOTU2MjUsLTEuMzQzNzVsLTIuNjg3NSwtMi45NTYyNWMtMS40NzgxMiwtMS42MTI1IC0xLjM0Mzc1LC00LjE2NTYyIDAuMjY4NzUsLTUuNjQzNzVjMS42MTI1LC0xLjQ3ODEyIDQuMTY1NjMsLTEuMzQzNzUgNS42NDM3NSwwLjI2ODc1bDIuNjg3NSwyLjk1NjI1YzEuNDc4MTMsMS42MTI1IDEuMzQzNzUsNC4xNjU2MyAtMC4yNjg3NSw1LjY0Mzc1Yy0wLjY3MTg3LDAuODA2MjUgLTEuNzQ2ODcsMS4wNzUgLTIuNjg3NSwxLjA3NXpNMTA0LjQwOTM4LDk5LjU3MTg4Yy0wLjgwNjI1LDAgLTEuNzQ2ODcsLTAuMjY4NzUgLTIuNDE4NzUsLTAuODA2MjVjLTEuNzQ2ODgsLTEuMzQzNzUgLTIuMTUsLTMuODk2ODggLTAuODA2MjUsLTUuNjQzNzVsMi40MTg3NSwtMy4yMjVjMS4zNDM3NSwtMS43NDY4OCAzLjg5Njg4LC0yLjE1IDUuNjQzNzUsLTAuODA2MjVjMS43NDY4NywxLjM0Mzc1IDIuMTUsMy44OTY4NyAwLjgwNjI1LDUuNjQzNzVsLTIuNDE4NzUsMy4yMjVjLTAuODA2MjUsMS4wNzUgLTIuMDE1NjMsMS42MTI1IC0zLjIyNSwxLjYxMjV6TTExNi41MDMxMyw4My40NDY4OGMtMC44MDYyNSwwIC0xLjc0Njg3LC0wLjI2ODc1IC0yLjQxODc1LC0wLjgwNjI1Yy0xLjc0Njg4LC0xLjM0Mzc1IC0yLjE1LC0zLjg5Njg3IC0wLjgwNjI1LC01LjY0Mzc1bDIuNDE4NzUsLTMuMjI1YzEuMzQzNzUsLTEuNzQ2ODcgMy44OTY4OCwtMi4xNSA1LjY0Mzc1LC0wLjgwNjI1YzEuNzQ2ODcsMS4zNDM3NSAyLjE1LDMuODk2ODcgMC44MDYyNSw1LjY0Mzc1bC0yLjQxODc1LDMuMjI1Yy0wLjgwNjI1LDEuMDc1IC0yLjAxNTYzLDEuNjEyNSAtMy4yMjUsMS42MTI1eiIgZmlsbD0iI2M0ZGFkZCI+PC9wYXRoPjxnIGZpbGw9IiNlNzRjM2MiPjxwYXRoIGQ9Ik00NS42ODc1LDkxLjM3NWMtNy40MjEzMywwIC0xMy40Mzc1LDYuMDE2MTcgLTEzLjQzNzUsMTMuNDM3NWMwLDcuNDIxMzMgNi4wMTYxNywxMy40Mzc1IDEzLjQzNzUsMTMuNDM3NWM3LjQyMTMzLDAgMTMuNDM3NSwtNi4wMTYxNyAxMy40Mzc1LC0xMy40Mzc1YzAsLTcuNDIxMzMgLTYuMDE2MTcsLTEzLjQzNzUgLTEzLjQzNzUsLTEzLjQzNzV6Ij48L3BhdGg+PC9nPjwvZz48cGF0aCBkPSIiIGZpbGw9Im5vbmUiPjwvcGF0aD48cGF0aCBkPSIiIGZpbGw9Im5vbmUiPjwvcGF0aD48cGF0aCBkPSIiIGZpbGw9Im5vbmUiPjwvcGF0aD48cGF0aCBkPSIiIGZpbGw9Im5vbmUiPjwvcGF0aD48cGF0aCBkPSJNODYsMTcyYy00Ny40OTY0OSwwIC04NiwtMzguNTAzNTEgLTg2LC04NnYwYzAsLTQ3LjQ5NjQ5IDM4LjUwMzUxLC04NiA4NiwtODZ2MGM0Ny40OTY0OSwwIDg2LDM4LjUwMzUxIDg2LDg2djBjMCw0Ny40OTY0OSAtMzguNTAzNTEsODYgLTg2LDg2eiIgZmlsbD0ibm9uZSI+PC9wYXRoPjxwYXRoIGQ9Ik04NiwxNjguNTZjLTQ1LjU5NjYzLDAgLTgyLjU2LC0zNi45NjMzNyAtODIuNTYsLTgyLjU2djBjMCwtNDUuNTk2NjMgMzYuOTYzMzcsLTgyLjU2IDgyLjU2LC04Mi41NnYwYzQ1LjU5NjYzLDAgODIuNTYsMzYuOTYzMzcgODIuNTYsODIuNTZ2MGMwLDQ1LjU5NjYzIC0zNi45NjMzNyw4Mi41NiAtODIuNTYsODIuNTZ6IiBmaWxsPSJub25lIj48L3BhdGg+PC9nPjwvc3ZnPg==">
                        Route list
                    </h4>
                    <div class="pull-right">
                        <a href="{{ URL::to('admin/route/create') }}" class="btn btn-sm btn-default"><span
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
                                    <th>Name</th>
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
                ajax: '{!! route('admin.route.data') !!}',
                columns: [
                    { data: 'id', name: 'id' },
                    { data: 'name', name: 'name' },
                    { data: 'station_name', name: 'station_name' },
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
