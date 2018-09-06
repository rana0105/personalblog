@extends('backend.layouts.app')


@section('content')

<!-- Breadcrumbs-->
    <ol class="breadcrumb">
    <li class="breadcrumb-item">
        <a href="{{url('/')}}">Dashboard</a>
    </li>
    <li class="breadcrumb-item active">Roles</li>
    </ol>
    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif
    <!-- DataTables Example -->
    <div class="card mb-3">
    <div class="card-header">
        <div class="pull-left">
            <i class="fas fa-table"></i>Users Roles Management
        </div>
        @can('role-create')
        <div class="pull-right">
            <a class="btn btn-sm btn-secondary" data-toggle="modal" data-target="#roleCreateModal" href="#"><i class="fa fa-plus" aria-hidden="true"></i>Role</a>
        </div>   
        @endcan
    </div>
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Name</th>
                    <th>Action</th>
                </tr>
            </tfoot>
            <tbody>
                @foreach ($roles as $key => $role)
                <tr>
                    <td>{{ ++$i }}</td>
                    <td>{{ $role->name }}</td>
                    <td>
                        <a class="btn btn-sm btn-light showRole" data-toggle="modal" data-target="#roleShowModal" data-id="{{$role->id}}" href="#"><i class="fa fa-eye" aria-hidden="true"></i></a>
                        @can('role-edit')
                        <a class="btn btn-sm btn-light editRole" data-toggle="modal" data-target="#roleEditModal" data-id="{{$role->id}}" href="#"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a>
                        @endcan
                        @can('role-delete')
                        {!! Form::open(['method' => 'DELETE','route' => ['roles.destroy', $role->id], 'class'=>'delete_form', 'style'=>'display:inline']) !!}
                            <a class="btn btn-sm btn-light delete-btn"><i class="fa fa-trash" aria-hidden="true"></i></a>
                        {!! Form::close() !!}
                        @endcan
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        </div>
    </div>
    <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>
    {!! $roles->render() !!}

{{-- Start Modal 'for' role create --}}
<div class="modal fade bd-example-modal-lg" id="roleCreateModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Role Create</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body">
            @if (count($errors) > 0)
            <div class="alert alert-danger">
                <strong>Whoops!</strong> There were some problems with your input.<br><br>
                <ul>
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            {!! Form::open(array('route' => 'roles.store','method'=>'POST')) !!}
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'form-control')) !!}
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>Permission:</strong>
                        <br/>
                        <div class="row">
                            @foreach($permission as $value)
                            <div class="col-md-3">
                                <div class="checkbox">
                                    <label>{{ Form::checkbox('permission[]', $value->id, false, array('class' => 'name')) }}
                                    {{ $value->display_name }}</label>
                                </div>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                    <button type="submit" class="btn btn-primary">Submit</button>
                </div>
            </div>
            {!! Form::close() !!}
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
    </div>
    {{-- End role create Modal --}}
    
    {{-- Start Modal 'for' role show --}}
    <div class="modal fade bd-example-modal-lg" id="roleShowModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Role Show</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body roleShowAdd">
    
            </div>
            <div class="modal-footer">
            </div>
            </div>
        </div>
    </div>
    {{-- End role show Modal --}}
    
    {{-- Start Modal 'for' role edit --}}
    <div class="modal fade bd-example-modal-lg" id="roleEditModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Role Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body roleEditAdd">
    
            </div>
            <div class="modal-footer">
            </div>
            </div>
        </div>
    </div>
    {{-- End role edit Modal --}}
@endsection

@section('style')
@endsection
@section('script')
<script>
    $(document).ready(function(){
        //show role in modal
        $(document).on('click', 'a.showRole', function() {
            var id = $(this).attr('data-id');
            $.get('roleShowModal/'+id, function(data){
                $('#roleShowModal').find('.roleShowAdd').first().html(data);
            });
        });
        //edit user in modal
        $(document).on('click', 'a.editRole', function() {
            var id = $(this).attr('data-id');
            $.get('roleEditModal/'+id, function(data){
                $('#roleEditModal').find('.roleEditAdd').first().html(data);
            });
        });
        
    });
</script>
@endsection