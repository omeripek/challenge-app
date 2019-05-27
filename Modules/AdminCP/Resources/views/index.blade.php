@extends('admincp::layouts.master')

@section('content')
<main role="main">

    <section class="jumbotron">
        <div class="container">
          <div class="float-left">
            <h1 class="jumbotron-heading">Welcome to Admin CP</h1>
          </div>
          <div class="float-right">
            <a href="{{ url('/admincp/add-question') }}" class="btn btn-primary btn-lg float-right mb-3">Add New Question</a>
            <a href="{{ url('/admincp/user-list') }}" class="btn btn-secondary btn-lg float-right mb-3 mx-2">User List</a>
          </div>
        </div>
    </section>

    <div class="album py-5 bg-light mb-5">
        <div class="container">
          <div class="row">
            <div class="card text-white bg-primary mb-3 mr-4" style="max-width: 16.3rem;">
              <div class="card-header">Total Users</div>
              <div class="card-body">
                <p class="card-text">There are {{ $totalUsers }} users.</p>
              </div>
            </div>
            <div class="card text-white bg-success mb-3 mr-4" style="max-width: 16.3rem;">
              <div class="card-header">Total Questions</div>
              <div class="card-body">
                <p class="card-text">There are {{ $totalQuestions }} questions</p>
              </div>
            </div>
            <div class="card text-white bg-danger mb-3 mr-4" style="max-width: 16.3rem;">
              <div class="card-header">Total Challenges</div>
              <div class="card-body">
                <p class="card-text">There are {{ $totalChallenges }} chalenges</p>
              </div>
            </div>
           </div>
        </div>
    </div>

</main>
@stop
