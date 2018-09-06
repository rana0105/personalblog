<div class="row">
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Name:</strong>
            {{ $role->name }}
        </div>
    </div>
    <div class="col-xs-12 col-sm-12 col-md-12">
        <div class="form-group">
            <strong>Permissions:</strong>
            <div class="row">
                @if(!empty($rolePermissions))
                    @foreach($rolePermissions as $v)
                    <div class="col-md-3">
                        <label class="label label-success">{{ $v->display_name }}</label>
                    </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>
</div>