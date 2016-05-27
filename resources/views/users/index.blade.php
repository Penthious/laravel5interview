@extends('layouts.app')

@section('css')

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.12/css/jquery.dataTables.min.css">

@stop

@section('content')

<div class="container">
    <table id="myTable" class="display">
        <thead>

            <tr>
@foreach ($tableHead as $head)
        <th>
            {{{$head}}}
        </th>

@endforeach
</tr>
</thead>
<tbody>


    @foreach ($users as $user)
        <tr>
            <td>
                {{{$user->name}}}

            </td>
            <td>
                {{{$user->email}}}

            </td>
            <td>
                {{{$user->role}}}
            </td>

            <td>
                <a href="{{{action('UserController@edit' , $user->id)}}}" class="btn btn-success btn-sm">Edit</a>

            </td>
            <td>
                {!! Form::open(['method' => 'DELETE', 'action' => ['UserController@adminDestroyer', $user->id], 'class' => 'form-horizontal']) !!}
                {{ Form::submit('Delete', ['class' => "btn btn-danger btn-sm delete"])}}
                {!! Form::close() !!}

            </td>

        </tr>
    @endforeach
    </tbody>
</table>
</div>



@stop

@section('js')

    <script src="https://cdn.datatables.net/1.10.12/js/jquery.dataTables.min.js"></script>
    <script src="/js/accountDelete.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#myTable').DataTable();
        });
    </script>

@stop
