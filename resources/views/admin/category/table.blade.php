

    @foreach($categories as $category)
    <tr>
        <td>{!! $category->name !!}</td>
        <td>{!! $category->image !!}</td>
        <td class="text-center">
            {!! Form::open(['route' => ['admin.category.destroy', $category->id], 'method' => 'delete']) !!}
            {{ csrf_field() }}
            <div class='btn-group'>
                <a href="{{route('admin.category.show',[$category->id])}}" class="glyphicon glyphicon-eye-open" style="float:left;"></i></a>
                <a href="{{route('admin.category.edit',[$category->id])}}" class='btn btn-default btn-xs' style="float:left;" ><i class="glyphicon glyphicon-edit"></i></a>
                {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Ok to delete ?')"]) !!}
            </div>
            {!! Form::close() !!}                                
        </td>
    </tr>
    @endforeach

