@extends('layouts/app')

@section('content')

    <div class="container">
    <div class="row profile">
		<div class="col-md-12 text-center">

				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						Name: {{ $user->name }}
					</div>
					<div class="profile-usertitle-job">
						Email: {{ $user->email }}
					</div>
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
				<div class="profile-userbuttons">
					<a href="{{{action('UserController@edit' , Auth::user()->id)}}}" class="btn btn-success btn-sm">Edit</a>
                    <a href="{{{action('UserController@editPassword' , Auth::user()->id)}}}" class="btn btn-success btn-sm">Change password</a>
                    {!! Form::open(['method' => 'DELETE', 'action' => ['UserController@destroy', $user->id], 'id' => 'delete', 'class' => 'form-horizontal delete']) !!}

                    {{ Form::submit('Delete', ['class' => "btn btn-danger btn-sm"])}}
                    {!! Form::close() !!}

				</div>

		</div>
	</div>
    <hr>
@stop
 @section('js')
     <script src="/js/accountDelete.js"></script>
 @stop
