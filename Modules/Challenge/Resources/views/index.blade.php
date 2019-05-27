@extends('challenge::layouts.master')

@section('content')
<main role="main">

    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Simple Challange App</h1>
            <p class="lead text-muted">Please select a user for challange with 10 questions. If your opponent accept your challange he/she can answer later.</p>
        </div>
    </section>

    <div class="album py-5 bg-light mb-5">
        <div class="container">
            @hasanyrole('user|admin')
                <div class="row">              
                @foreach($users as $user)
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <svg class="bd-placeholder-img card-img-top" width="100%" height="180" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>{{ $user->name }}</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">User: {{ $user->name }} </text></svg>
                            <div class="card-body">
                                <p class="card-text">Challange with this user or view profile.</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="btn-group">
                                        <a href="{{ url('/challenge/game', $user->id) }}" class="btn btn-sm btn-outline-success" onclick="return confirm('Do you want to challenge with this user?')">Challange with {{ $user->name }}</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </div>

                {{ $users->links() }}
            @else
                You must be a challenger for challenge request. Please contact with admin!
            @endhasanyrole
        </div>
    </div>

</main>
@stop
