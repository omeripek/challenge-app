<?php

namespace Modules\Challenge\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\User;
use Modules\Challenge\Entities\Challenge;
use Modules\Challenge\Entities\ChallengeRequest;
use Modules\Challenge\Entities\ChallengeDetail;
use Modules\Question\Entities\Question;
use Auth;

class ChallengeController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth','role:user|admin']);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $users = User::orderBy('id')
        ->paginate(12);
        return view('challenge::index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function create()
    {
        return view('challenge::create');
    }

    /**
     * Store a newly created resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function store(Request $request)
    {
    }

    /**
     * Show the specified resource.
     * @return Response
     */
    public function show($id)
    {
        $questionList = Question::orderByRaw('RAND()')->take(5)->get();
        $questions = $questionList->sort();

        $user = new User;
        if ($id > 0) {
            $user = User::find($id);
        }
        return view('challenge::challengegame', compact('user', 'questions'));
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('challenge::edit');
    }

    /**
     * Update the specified resource in storage.
     * @param  Request $request
     * @return Response
     */
    public function update(Request $request)
    {
    }

    /**
     * Remove the specified resource from storage.
     * @return Response
     */
    public function destroy()
    {
    }

    /**
     * Show for challenge details
     */
    public function showDetails($id = NULL) {
        return view('challenge::details', compact($id));
    }

    /**
     * Show for challenge list
     */
    public function list() {
        $challengeRequests = ChallengeRequest::orderBy('id')
        ->paginate(15);
        return view('challenge::list', compact('challengeRequests'));
    }

     /**
     * Show for challenge statistics
     */
    public function statistics() {
        $challengeDetails = ChallengeDetail::orderBy('id')
        ->paginate(15);
        return view('challenge::statistics', compact('challengeDetails'));
    }

    public function addChallenge($id = 0, Request $request) {

        $playerXId = Auth::user()->id;

        $questionArray = request('QuestionId');
        $questionList = implode( ", ", $questionArray );

        $answerArray = request('answer');
        //dd($answerArray);
        $playerXAnswerList = implode(", ", $answerArray );

        //dd($questionList);

        if ($id>0) {
            $playerYId = $id;
            $playerYAnswerList = " ";
            $challengerequest = ChallengeRequest::create([
                'playerXId' =>  $playerXId,
                'playerXConfirm' => 1,
                'playerYId' => $playerYId,
                'playerYConfirm' => 0
            ]);

            if($challengerequest) {
               $challengedetail = ChallengeDetail::create([
                'questionList' =>  $questionList,
                'playerXAnswerList' => $playerXAnswerList,
                'playerYAnswerList' => $playerYAnswerList
            ]); 
            }
        }

        return redirect()
        ->route('challenge.list')
        ->with('message', 'Your Challenge Request Created Succesfully, Please Wait For Accept Your Opponent')
        ->with('message_type', 'success');
    }

    /**
     * Accept challenge
     */
    public function accept($id) {
        $challengeReq = ChallengeRequest::find($id);
        $challengeReq->playerYConfirm = 1;
        $challengeReq->save();

        return redirect()
        ->route('challenge.list')
        ->with('message', 'Congratulations! You Accepted the Challenge, You Can Play Now! Good Luck! :)')
        ->with('message_type', 'success');
    }

    /**
     * Reject challenge, it will delete request
     */
    public function reject($id) {
        $challengeDel = ChallengeRequest::find($id);
        $challengeDel->delete();

        return redirect()
        ->route('challenge.list')
        ->with('message', 'You Rejected Challenge Request and It Left Your List!')
        ->with('message_type', 'warning');
    }

    /**
     * After accept challenge
     */
    public function play($id, $userXId, $userYId) {
        // For get same questions for challenge
        $getQuestions = ChallengeDetail::find($id);
        $questionsId = $getQuestions->questionList;
        $challengeId = $getQuestions->id;

        // Get questions data to array
        $questionsArr = explode(', ', $questionsId); 
        $questionList = Question::whereIn('id', $questionsArr)->get();
        $questions = $questionList->sort();
        //$questions = Question::whereIn('id', $questionsArr)->orderBy('ASC')->get();

        // Get challengers for validate
        $challengeReqs = ChallengeRequest::find($id);
        $challengerXId = $challengeReqs->playerXId;
        $challengerYId = $challengeReqs->playerYId;

        if ($id >0 && $userXId > 0 && $userYId > 0 ) {
            $userX = User::find($userXId);
            $userY = User::find($userXId);

            // if change any id on browser
            if($challengeId != $id || $challengerXId != $userXId || $challengerYId != $userYId) {
                return redirect()->route('challenge.list');
            }

        return view('challenge::play', compact('userX', 'userY', 'questions', 'challengeId'));

        } else {
            return redirect()->route('challenge.list');
        }
    }

    public function challengeResult($id, $userXId, $userYId) {
        // $cLastDetails for get last challenge updates and update new answers etc.
        $cLastDetails = ChallengeDetail::find($id);
        $challengeReq = ChallengeRequest::find($id);
        $questionsList = $cLastDetails->questionList;

        // Get questions data to array
        $questionsArr = explode(', ', $questionsList); 
        $questionList = Question::whereIn('id', $questionsArr)->get();
        $questions = $questionList->sort();

        $correctAnswers = array();
        foreach ($questions as $id => $question) {
            if($question->correctAnswer == 1){
                $correctAnswers[] = $question->answerA;
            }elseif ($question->correctAnswer == 2) {
                $correctAnswers[] = $question->answerB;
            }else {
                $correctAnswers[] = $question->answerC;
            }
        }
        //dd($correctAnswers);

        $answerArray = request('answer');
        //dd($answerArray);
        $playerYAnswers = implode(", ", (array)$answerArray );

        //dd($playerYAnswers);

        if ($id>0 && $userXId > 0 && $userYId > 0) {
            $challengeResult = $cLastDetails->update([
                'playerYAnswerList' => $playerYAnswers
                ]);
            //dd($challengeResult);
            if($challengeResult) { 
                $getPlayerXAnswers = $cLastDetails->playerXAnswerList;
                $getPlayerYAnswers = $cLastDetails->playerYAnswerList;
                $playerXAnswerArr = explode(", ", $getPlayerXAnswers );
                $playerYAnswerArr = explode(", ", $getPlayerYAnswers );
                //dd($playerYAnswerArr);

                $resultX = array_diff($correctAnswers, $playerXAnswerArr);
                $resultY = array_diff($correctAnswers, $playerYAnswerArr);
                $playerXscore = count($questions) - count($resultX);
                $playerYscore = count($questions) - count($resultY);

                $finalResult = $playerXscore . ' - ' . $playerYscore;

                // Now finally record to new update for challenge table
                $challengeRecord = Challenge::create([
                    'playerXId' => $userXId,
                    'playerYId' => $userYId,
                    'challengeDetailId' => $cLastDetails->id,
                    'score' => $finalResult,
                ]); 

                // Get User Informations (belongsTo -> ChallengeRequest -> User)
                $challengerXId = $challengeReq->playerX;
                $challengerYId = $challengeReq->playerY;

                // Winner
                if ($playerXscore > $playerYscore) 
                    $winner = $challengerXId->name;
                elseif ($playerXscore < $playerYscore)
                    $winner = $challengerYId->name;
                else
                    $winner = "";
            }

                // Get challenge detail
                $cFinalDetails = ChallengeDetail::where('id', $challengeReq->id)->first();

                //Delete challenge request after get details
                if($challengeRecord)
                    $challengeReq->delete();


        }


        return view('challenge::result', compact('cFinalDetails', 'questions', 'winner', 'finalResult'))
        ->with('message', 'Woohoo! This challenge completed succesfully and u can see results here!')
        ->with('message_type', 'info');;
    }

    // Find challenge winner

}