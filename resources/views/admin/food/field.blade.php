
<div class="form-group col-sm-12">
     <div class="form-group has-feedback " >
        <label> Category</label>
     
       {{ Form::select('category_id', $categories,$selectCa,['class'=>'form-control']) }}
    </div>
    <div class="form-group has-feedback " >
        <label> Users</label>
     
       {{ Form::select('user_id', $users,$selectUs,['class'=>'form-control']) }}
    </div>
    <div class="form-group has-feedback " >
        <label> Name</label>
        @if(@isset($food_edit))
        <input type="text" class="form-control"  name="name" value="{{$food_edit->name}}" autofocus/>
        @else
        <input type="text" class="form-control"  name="name" value="{{old('name')}}" autofocus/>
        @endif
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        <transition name="fade">
            <span class="help-block" ></span>
        </transition>
    </div>
    <div class="form-group has-feedback" >
        <label> Image</label>
        @if(@isset($food_edit))
        <input type="file" id="imgInp" class="form-control"  name="image" value="{{$food_edit->image}}" autofocus/>
        @else
        <input type="file" id="imgInp" class="form-control"  name="image" value="{{old('image')}}" autofocus/>
        @endif          
    </div>
     <div class="form-group has-feedback " >
        <label> Content</label>
        @if(@isset($food_edit))
        <input type="text" class="form-control"  name="content" value="{{$food_edit->content}}" autofocus/>
        @else
        <input type="text" class="form-control"  name="content" value="{{old('content')}}" autofocus/>
        @endif
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
        <transition name="fade">
            <span class="help-block" ></span>
        </transition>
    </div>



</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    <button type="submit" class=" btn btn-default">Save</button>
    <a href="{{route('admin.users.index')}}" class="btn btn-default">Cancel</a>
</div>
