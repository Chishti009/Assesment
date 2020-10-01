<div class="table-responsive-sm">
    <table class="table table-striped" id="movies-table">
        <thead>
            <tr>
                <th>Name</th>
        <th>Description</th>
        <th>Release Date</th>
        <th>Rating</th>
        <th>Ticket Price</th>
        <th>Country</th>
        <th>Genre</th>
        <th>Photo</th>
                <th colspan="3">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($movies as $movie)
            <tr>
                <td>{{ $movie->name }}</td>
            <td>{{ $movie->description }}</td>
            <td>{{ $movie->release_date }}</td>
            <td>{{ $movie->rating }}</td>
            <td>{{ $movie->ticket_price }}</td>
            <td>{{ $movie->country }}</td>
            <td>{{ $movie->genre }}</td>
            <td>{{ $movie->photo }}</td>
                <td>
                    {!! Form::open(['route' => ['movies.destroy', $movie->id], 'method' => 'delete']) !!}
                    <div class='btn-group'>
                        <a href="{{ route('movies.show', [$movie->id]) }}" class='btn btn-ghost-success'><i class="fa fa-eye"></i></a>
                        <a href="{{ route('movies.edit', [$movie->id]) }}" class='btn btn-ghost-info'><i class="fa fa-edit"></i></a>
                        {!! Form::button('<i class="fa fa-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-ghost-danger', 'onclick' => "return confirm('Are you sure?')"]) !!}
                    </div>
                    {!! Form::close() !!}
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>