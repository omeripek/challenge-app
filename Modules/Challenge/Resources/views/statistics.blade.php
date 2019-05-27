@extends('challenge::layouts.master')

@section('content')
<main role="main">

    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">Welcome Your Profile</h1>
            <div class="row">
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <svg class="bd-placeholder-img card-img-top" width="100%" height="145" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>User</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">User: XYZ</text></svg>
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="alert alert-success" role="alert">
                          <h4 class="alert-heading">Welcome User!</h4>
                          <p>This is your profile and you can see your challanges here! </p>
                          <hr>
                          <p class="mb-0">Whenever you need to...</p>
                        </div>
                </div>
            </div>
        </div>
    </section>

    <div class="album py-5 bg-light mb-5">
        <div class="container">
            <form>
                <table class="table table-bordered">
                  <thead>
                    <tr>
                      <th scope="col">?</th>
                      <th scope="col">Your Challange Set</th>
                      <th scope="col">Opponent</th>
                      <th scope="col">Status</th>
                      <th scope="col">Details</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td>Your 1. challange is at 25.05.2019.</td>
                      <td> User2 </td>
                      <td>Winner</td>
                      <td><a href="#" class="btn btn-info">Details >> </a></td>
                    </tr>

                    <tr>
                      <th scope="row">2</th>
                      <td>Your 1. challange is at 25.05.2019.</td>
                      <td> User3 </td>
                      <td>Lose</td>
                      <td><a href="#" class="btn btn-info">Details >> </a></td>
                    </tr>
                    <tr>
                      <th scope="row">3</th>
                      <td>Your 1. challange is at 25.05.2019.</td>
                      <td> User2 </td>
                      <td>Winner</td>
                      <td><a href="#" class="btn btn-info">Details >> </a></td>
                    </tr>
                    <tr>
                      <th scope="row">4</th>
                      <td>Your 1. challange is at 25.05.2019.</td>
                      <td> User22 </td>
                      <td>Lose</td>
                      <td><a href="#" class="btn btn-info">Details >> </a></td>
                    </tr>
                    <tr>
                      <th scope="row">5</th>
                      <td>Your 1. challange is at 25.05.2019.</td>
                      <td> User6 </td>
                      <td>Winner</td>
                      <td><a href="#" class="btn btn-info">Details >> </a></td>
                    </tr>

                  </tbody>

                </table>
            </form>
        </div>
    </div>

</main>
@stop
