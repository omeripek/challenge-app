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
                          <h4 class="alert-heading">Challange Details</h4>
                          <p>Challange 1 - 25.02.2018 </p>
                          <hr>
                          <p class="mb-0">Your Opponent : User3 and You are winner</p>
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
                      <th scope="col">Questions</th>
                      <th scope="col">Your Answer</th>
                      <th scope="col">Opponent Answer</th>
                      <th scope="col">Correct Answer</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <th scope="row">1</th>
                      <td>Which country is the capital of Ankara?</td>
                      <td>Turkey </td>
                      <td>İstanbul</td>
                      <td>Turkey </td>
                    </tr>

                    <tr>
                      <th scope="row">2</th>
                      <td>Which country is the capital of Ankara?</td>
                      <td> Fransa </td>
                      <td>İstanbul</td>
                      <td>Turkey </td>
                    </tr>
                    <tr>
                      <th scope="row">3</th>
                      <td>Which country is the capital of Ankara?</td>
                      <td> Fransa </td>
                      <td>İstanbul</td>
                      <td>Turkey </td>
                    </tr>
                    <tr>
                      <th scope="row">4</th>
                      <td>Which country is the capital of Ankara?</td>
                      <td> Fransa </td>
                      <td>İstanbul</td>
                      <td>Turkey </td>
                    </tr>
                    <tr>
                      <th scope="row">5</th>
                      <td>Which country is the capital of Ankara?</td>
                      <td> Fransa </td>
                      <td>İstanbul</td>
                      <td>Turkey </td>
                    </tr>

                  </tbody>

                </table>
            </form>
        </div>
    </div>

</main>
@stop
