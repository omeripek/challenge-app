@extends('challenge::layouts.master')

@section('content')
<main role="main">

    <section class="jumbotron text-center">
        <div class="container">
          @include('challenge::layouts.partials.errors')
          @include('challenge::layouts.partials.alert')
            <h1 class="jumbotron-heading">Welcome Your Result Page</h1>
            <div class="row">
                <div class="col-md-12">
                    <div class="alert alert-success" role="alert">
                          <h4 class="alert-heading">Welcome {{ Auth::user()->name }}!</h4>
                          <p>This is your challenge result page and you can see your challange result here! </p>
                          <hr>
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
                      <th scope="col">Challange Date</th>
                      <th scope="col">Questions and Correct Answers</th>
                      <th scope="col">Player 1 Answers</th>
                      <th scope="col">Player 2 Answers</th>
                      <th scope="col">Score</th>
                      <th scope="col">Winner</th>
                    </tr>
                  </thead>
                    <tbody>
                      <tr>
                        <td>Finished Date: <em>{{ $cFinalDetails->updated_at }}</em></td>
                        <td>
                          @foreach($questions as $question)
                            <b>Question: </b> {{ $question->questionText }}
                            <b>Answer:</b> 
                            @if($question->correctAnswer == 1)
                                {{ $question->answerA }} <br />
                              @elseif($question->correctAnswer == 2)
                                {{ $question->answerB }} <br />
                              @else
                                {{ $question->answerC }} <br />
                            @endif
                          @endforeach
                        </td>
                        <td>{{ $cFinalDetails->playerXAnswerList }}</td>
                        <td>{{ $cFinalDetails->playerYAnswerList }}</td>
                        <td>{{ $finalResult }}</td>
                        <td>
                          @if(strlen($winner) > 0)
                              {{ $winner }}
                          @else
                            DRAW
                          @endif
                        </td>
                      </tr>
                    </tbody>
                </table>
            </form>
        </div>
    </div>

</main>
@stop
