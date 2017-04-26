

@foreach($users as $user)
<tr>
    <td>{!! $user->name !!}</td>
    <td>{!! $user->email !!}</td>
    <td>
        @if(!empty($user->roles))
        @foreach($user->roles as $v)
        <label class="label label-success">{{ $v->display_name }}</label>
        @endforeach
        @endif
    </td>
    <td class="text-center">
        {!! Form::open(['route' => ['admin.users.destroy', $user->id], 'method' => 'delete']) !!}
        {{ csrf_field() }}
        <div class='btn-group'>
            <a href="{{route('admin.users.show',[$user->id])}}" class="glyphicon glyphicon-eye-open" style="float:left;"></i></a>
            <a href="{{route('admin.users.edit',[$user->id])}}" class='btn btn-default btn-xs' style="float:left;" ><i class="glyphicon glyphicon-edit"></i></a>
            {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Ok to delete ?')"]) !!}
        </div>
        {!! Form::close() !!}                                
    </td>
</tr>
@endforeach

