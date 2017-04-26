<?php 

use App\Helpers\Util; 
    
?>
<div class="form-group col-sm-12">
    <label class = "col-sm-4" > ID: </label>
    <p class="col-sm-8">{!! $food->id !!}</p>
</div>

<div class="form-group col-sm-12">
    <label class = "col-sm-4" > Name: </label>
     <p class="col-sm-8">{!! $food->name !!}</p>
</div>
<div class="form-group col-sm-12">
    <label class = "col-sm-4" > Image: </label> 
     <img class="col-sm-8" src="{{ URL::to('/') . Util::getImage($folder,$food->image)}}" style="width:200px;height:200px" >
</div>
<div class="form-group col-sm-12">
    <label class = "col-sm-4" > Creat At: </label>
     <p class="col-sm-8">{!! $food->created_at !!}</p>
</div>

<div class="form-group col-sm-12">
    <label class = "col-sm-4" > Update At : </label>
     <p class="col-sm-8">{!! $food->updated_at !!}</p>
</div>

