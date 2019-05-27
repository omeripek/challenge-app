@extends('challenge::layouts.master')

@section('content')
<main role="main">

    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">{{ Auth::user()->name }} vs {{ $userY->name }}</h1>
            <div class="row">
                <div class="col-md-2">
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <svg class="bd-placeholder-img card-img-top" width="100%" height="150" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>{{ Auth::user()->name }} </title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">User: {{ Auth::user()->name }} </text></svg>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card mb-4 shadow-sm">
                        <svg class="bd-placeholder-img card-img-top" width="100%" height="150" xmlns="http://www.w3.org/2000/svg" preserveAspectRatio="xMidYMid slice" focusable="false" role="img" aria-label="Placeholder: Thumbnail"><title>{{ $userY->name }}</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">User: {{ $userY->name }}</text></svg>
                    </div>
                </div>
                <div class="col-md-2">
                </div>
            </div>
        </div>
    </section>

    <div class="album py-5 bg-light mb-5">
        <div class="container">
            <form  action="{{ route('challenge.result', @$challengeId)}}/{{ Auth::user()->id }}/{{ $userY->id }}" method="post">
              {{ csrf_field() }}
              @include('admincp::layouts.partials.errors')
              @include('admincp::layouts.partials.alert')
                <table class="table table-bordered table-dark">
                  <thead>
                    <tr>
                      <th scope="col">Question Texts</th>
                      <th scope="col">Answer A</th>
                      <th scope="col">Answer B</th>
                      <th scope="col">Answer C</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($questions as $question)
                      <tr>
                        <td>{{ $question->questionText }}
                          <input type="hidden" name="QuestionId[]" value="{{ $question->id }}">
                        </td>
                        <td>
                          <div class="form-check">
                            <input class="form-check-input" type="hidden" name="answer[{{$question->id}}]" value="uncheck">
                                <input class="form-check-input" type="radio" name="answer[{{$question->id}}]" id="answer" value="{{ $question->answerA }}">
                                <label class="form-check-label" for="answer[{{$question->id}}]">
                                  {{ $question->answerA }}
                                </label>
                          </div>
                        </td>
                        <td>
                          <div class="form-check">
                                <input class="form-check-input" type="radio" name="answer[{{$question->id}}]" id="answer" value="{{ $question->answerB }}">
                                <label class="form-check-label" for="answer[{{$question->id}}]">
                                  {{ $question->answerB }}
                                </label>
                          </div>
                        </td>
                        <td>
                          <div class="form-check">
                                <input class="form-check-input" type="radio" name="answer[{{$question->id}}]" id="answer" value="{{ $question->answerC }}">
                                <label class="form-check-label" for="answer[{{$question->id}}]">
                                  {{ $question->answerC }}
                                </label>
                          </div>
                        </td>
                      </tr>
                    @endforeach
                  </tbody>

                </table>
                <button type="submit" class="btn btn-primary float-right">Send Your Answers >> </button>
            </form>
        </div>
    </div>

</main>
@stop
