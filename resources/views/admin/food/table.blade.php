

    @foreach($foods as $food)
    <tr>
        <td>{!! $food->user->name !!}</td>
        <td>{!! $food->category->name !!}</td>
                <td>{!! $food->name !!}</td>
        <td>{!! $food->content !!}</td>

        <td class="text-center">
            {!! Form::open(['route' => ['admin.food.destroy', $food->id], 'method' => 'delete']) !!}
            {{ csrf_field() }}
            <div class='btn-group'>
                <a href="{{route('admin.food.show',[$food->id])}}" class="glyphicon glyphicon-eye-open" style="float:left;"></i></a>
                <a href="{{route('admin.food.edit',[$food->id])}}" class='btn btn-default btn-xs' style="float:left;" ><i class="glyphicon glyphicon-edit"></i></a>
                {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Ok to delete ?')"]) !!}
            </div>
            {!! Form::close() !!}                                
        </td>
    </tr>
    @endforeach

