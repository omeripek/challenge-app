@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>Welcome to Challanger App! </p>
                    <p>If you don't have account for challenge you must a member or if you have an account for challenge you must login. </p>

                    <p class="pt-5">
                        @role('admin')
                            <a href="{{ url('/admincp') }}" class="btn btn-info">AdminCP</a>
                            <a href="{{ url('/question') }}" class="btn btn-info">Questions</a>
                        @endrole

                            <a href="{{ url('/challenge') }}" class="btn btn-success">Challenge X</a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection