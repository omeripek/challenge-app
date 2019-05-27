@extends('admincp::layouts.master')

@section('content')

<main role="main">

    <section class="jumbotron text-center">
        <div class="container">
            <h1 class="jumbotron-heading">
              Question {{ @$question->id > 0 ? "Update" : "Add" }}
            </h1>
        </div>
    </section>

    <div class="album py-5 bg-light mb-5">
        <div class="container">
            <form  action="{{ route('add-question.create', @$question->id) }}" method="post">
              {{ csrf_field() }}
              @include('admincp::layouts.partials.errors')
              @include('admincp::layouts.partials.alert')

              <div class="form-group">
                <label for="questionText">Question</label>
                <input type="text" class="form-control" id="questionText" name="questionText" placeholder="Question ? " value="{{ old('questionText', $question->questionText) }}">
              </div>
              <div class="form-group">
                <label for="answerA">Answer 1</label>
                <input type="text" class="form-control" id="answerA" name="answerA" placeholder="Answer A" value="{{ old('answerA', $question->answerA) }}">
              </div>
              <div class="form-group">
                <label for="answerB">Answer 2</label>
                <input type="text" class="form-control" id="answerB" name="answerB" placeholder="Answer B" value="{{ old('answerB', $question->answerB) }}">
              </div>
              <div class="form-group">
                <label for="answerC">Answer 3</label>
                <input type="text" class="form-control" id="answerC" name="answerC" placeholder="Answer C" value="{{ old('answerC', $question->answerC) }}">
              </div>
              <div class="form-group">
                <label for="correctAnswer">Correct Answer</label>
                <select class="custom-select mr-sm-2" id="correctAnswer" name="correctAnswer">
                  <option disabled selected value>Choose...</option>
                  <option value="1" @if(old('correctAnswer') == 1) selected @endif>Answer A</option>
                  <option value="2" @if(old('correctAnswer') == 2) selected @endif>Answer B</option>
                  <option value="3" @if(old('correctAnswer') == 3) selected @endif>Answer C</option>
                </select>
              </div>
              <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
    </div>

</main>

@stop
