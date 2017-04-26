<div class="form-group col-sm-12">
    <label class = "col-sm-4" > ID: </label>
    <p class="col-sm-8">{!! $user->id !!}</p>
</div>

<div class="form-group col-sm-12">
    <label class = "col-sm-4" > Name: </label>
    <p class="col-sm-8">{!! $user->name !!}</p>
</div>
<div class="form-group col-sm-12">
    <label class = "col-sm-4" > Email: </label> 
    <p class="col-sm-8">{!! $user->email !!}</p>
</div>
<div class="form-group col-sm-12">
    <label class = "col-sm-4" > Creat At: </label>
    <p class="col-sm-8">{!! $user->created_at !!}</p>
</div>

<div class="form-group col-sm-12">
    <label class = "col-sm-4" > Update At : </label>
    <p class="col-sm-8">{!! $user->updated_at !!}</p>
</div>
<div class="form-group col-sm-12">
    <strong class='col-sm-4'>Roles:</strong>
    <div class='col-sm-8' >
        @if(!empty($user->roles))
        @foreach($user->roles as $v)
        <label class="label label-success">{{ $v->display_name }}</label>
        @endforeach
        @endif
    </div>
</div>
