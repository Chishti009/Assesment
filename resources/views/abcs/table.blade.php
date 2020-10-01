<div class="table-responsive-sm">
    <table class="table table-striped" id="abcs-table">
        <thead>
            <tr>
                
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($abcs as $abc)
            <tr>
                
                <td>
                    {!! Form::open(['route' => ['abcs.destroy', $abc->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('abcs.show', [$abc->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('abcs.edit', [$abc->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>