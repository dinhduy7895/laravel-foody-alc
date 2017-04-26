<?php 

use App\Helpers\Util; 
    
?>
<div class="form-group col-sm-12">
    <label class = "col-sm-4" > ID: </label>
    <p class="col-sm-8">{!! $category->id !!}</p>
</div>

<div class="form-group col-sm-12">
    <label class = "col-sm-4" > Name: </label>
     <p class="col-sm-8">{!! $category->name !!}</p>
</div>
<div class="form-group col-sm-12">
    <label class = "col-sm-4" > Image: </label> 
     <img class="col-sm-8" src="{{ URL::to('/') . Util::getImage($folder,$category->image)}}" style="width:200px;height:200px" >
</div>
<div class="form-group col-sm-12">
    <label class = "col-sm-4" > Creat At: </label>
     <p class="col-sm-8">{!! $category->created_at !!}</p>
</div>

<div class="form-group col-sm-12">
    <label class = "col-sm-4" > Update At : </label>
     <p class="col-sm-8">{!! $category->updated_at !!}</p>
</div>

