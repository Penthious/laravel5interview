@extends('layouts/app')

@section('content')

    <div class="container">
    <div class="row profile">
		<div class="col-md-6">

				<!-- SIDEBAR USER TITLE -->
				<div class="profile-usertitle">
					<div class="profile-usertitle-name">
						{{ $user->name }}
					</div>
					<div class="profile-usertitle-job">
						{{ $user->email }}
					</div>
				</div>
				<!-- END SIDEBAR USER TITLE -->
				<!-- SIDEBAR BUTTONS -->
				<div class="profile-userbuttons">
					<a href="{{{action('UserController@edit' , Auth::user()->id)}}}" class="btn btn-success btn-sm">Edit</a>
                    {!! Form::open(['method' => 'DELETE', 'action' => ['UserController@destroy', $user->id], 'class' => 'form-horizontal']) !!}

                    {{ Form::submit('Delete', ['class' => "btn btn-danger btn-sm"])}}
                    {!! Form::close() !!}

				</div>
				<!-- END SIDEBAR BUTTONS -->
				<!-- SIDEBAR MENU -->
				<div class="profile-usermenu">
					<ul class="nav">
						<li class="active">
							<a href="#">
							<i class="glyphicon glyphicon-home"></i>
							Overview </a>
						</li>
						<li>
							<a href="#">
							<i class="glyphicon glyphicon-user"></i>
							Account Settings </a>
						</li>
						<li>
							<a href="#" target="_blank">
							<i class="glyphicon glyphicon-ok"></i>
							Tasks </a>
						</li>
						<li>
							<a href="#">
							<i class="glyphicon glyphicon-flag"></i>
							Help </a>
						</li>
					</ul>
				</div>
				<!-- END MENU -->
			</div>
		</div>

@stop
