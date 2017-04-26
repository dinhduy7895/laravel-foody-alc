
<div class="form-group col-sm-12">

    <div class="form-group has-feedback " >
        <label> Username</label>
        @if(@isset($user_edit))
        <input type="text" class="form-control"  name="name" value="{{$user_edit->name}}" autofocus/>
        @else
        <input type="text" class="form-control"  name="name" value="{{old('name')}}" autofocus/>
        @endif
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        <transition name="fade">
            <span class="help-block" ></span>
        </transition>
    </div>
    <div class="form-group has-feedback" >
        <label> Email</label>
        @if(@isset($user_edit))
        <input type="text" class="form-control"  name="email" value="{{$user_edit->email}}" autofocus/>
        @else
        <input type="text" class="form-control"  name="email" value="{{old('email')}}" autofocus/>
        @endif          
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
        <transition name="fade">
            <span class="help-block" ></span>
        </transition>
    </div>
    <div class="form-group has-feedback" >
        <label> Password</label>
        <input type="password" class="form-control"  name="password" value="{{old('password')}}" />
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
        <transition name="fade">
            <span class="help-block" ></span>
        </transition>
    </div>
    <div class="form-group has-feedback">
        <label> Re-Password</label>
        <input type="password" class="form-control" name="password_confirmation" value="{{old('password_confirmation')}}"/>
    </div>
    <div class="form-group has-feedback">
        <div class="form-group">
            <strong>Role:</strong>
            {!! Form::select('roles[]', $roles,$userRole, array('class' => 'form-control','multiple')) !!}
        </div>
    </div>


</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <button type="submit" class=" btn btn-default">Save</button>
    <a href="{{route('admin.users.index')}}" class="btn btn-default">Cancel</a>
</div>
