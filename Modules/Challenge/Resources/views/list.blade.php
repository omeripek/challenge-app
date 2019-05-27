@extends('challenge::layouts.master')

@section('content')
<main role="main">

 <section class="jumbotron text-center">
        <div class="container">
              @include('admincp::layouts.partials.errors')
              @include('admincp::layouts.partials.alert')
            <h1 class="jumbotron-heading">Welcome Your Challenge List </h1>

            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <svg class="bd-placeholder-img card-img-top" width="100%" height="145" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>Challenger</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Challenger: {{ Auth::user()->name }}</text></svg>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="alert alert-success" role="alert">
                          <h4 class="alert-heading">Welcome {{ Auth::user()->name }}!</h4>
                          <p>You can see your Challenge List here. </p>
                          <hr>
                          <p class="mb-0">Play or Accept or Delete Requests</p>
                        </div>
                </div>
            </div>
        </div>
    </section>

    <div class="album py-5 bg-light mb-5">
        <div class="container">
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">ID</th>
                      <th scope="col">challenge Info</th>
                      <th scope="col">Opponent</th>
                      <th scope="col">Operate</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($challengeRequests as $request)

                      @if( Auth::user()->id == $request->playerYId)

                        @if( $request->playerXConfirm == 1 && $request->playerYConfirm == 1)
                          <tr>
                            <th scope="row">{{ $request->id }}</th>
                            <td>You accepted a challenge is at {{ $request->updated_at }}</td>
                            <td> {{ $request->playerX->name }}</td>
                            <td><a href="{{ url('challenge/list/play', $request->id) }}/{{ $request->playerXId }}/{{ $request->playerYId }}" class="btn btn-success btn-sm">Play </a> </td>
                          </tr>
                        @else
                          <tr>
                            <th scope="row">{{ $request->id }}</th>
                            <td>Your have a challenge request at {{ $request->updated_at }}</td>
                            <td> {{ $request->playerX->name }}</td>
                            <td><a href="{{ url('challenge/list/accept', $request->id) }}" class="btn btn-info btn-sm">Accept </a> <a href="{{ url('challenge/list/reject', $request->id) }}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Reject </a></td>
                          </tr>
                        @endif
                        
                      @endif

                    @endforeach
                  </tbody>
                </table>
                {{ $challengeRequests->links() }}
        </div>
    </div>

</main>
@stop
