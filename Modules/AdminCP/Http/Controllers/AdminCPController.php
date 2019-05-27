<?php

namespace Modules\AdminCP\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller;
use App\User;
use Modules\Challenge\Entities\Challenge;
use Modules\Question\Entities\Question;

class AdminCPController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth','role:admin']);
    }

    /**
     * Display a listing of the resource.
     * @return Response
     */
    public function index()
    {
        $totalQuestions = Question::count();
        $totalChallenges = Challenge::count();
        $totalUsers = User::count();
        return view('admincp::index', compact('totalUsers', 'totalQuestions', 'totalChallenges'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Response
     */
    public function addForm($id = 0)
    {
        $question = new Question;
        if ($id > 0) {
            $question = Question::find($id);
        }
        return view('admincp::add-question', compact('question'));
    }

    public function create($id = 0, Request $request)
    {

        $request->validate([
            'questionText' => 'required',
            'correctAnswer' => 'required'
        ]);

        $data = request()->only('questionText', 'answerA', 'answerB', 'answerC', 'correctAnswer');

        if ($id>0) {
            $question = Question::where('id', $id)->firstOrFail();
            $question->update($data);
        }else {
            $question = Question::create($data);
        }
        

        return redirect()
        ->route('add-question.addForm', $question->id)
        ->with('message', ($id>0 ? 'Question updated successfully' : 'New question added successfully'))
        ->with('message_type', 'success');
;
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
    public function show()
    {
        $users = User::latest()
        ->orderByDesc('id')
        ->paginate(10);
        return view('admincp::user-list', compact('users'));
    }

    /**
     * Show the form for editing the specified resource.
     * @return Response
     */
    public function edit()
    {
        return view('admincp::edit');
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
    public function destroy($id)
    {
        if ($id == 1) {
            return redirect()
                ->route('user-list')
                ->with('message', 'You can not delete this user!')
                ->with('message_type', 'danger');
        }else {
            User::destroy($id);
        }

        return redirect()
            ->route('user-list')
            ->with('message', 'User deleted!')
            ->with('message_type', 'success');
    }

    public function details($id)
    {
        
    }

    /*
    Delete Question 
    */
    public function delete($id) 
    {
        Question::destroy($id);

        return redirect()
            ->route('question.index')
            ->with('message', 'Question deleted!')
            ->with('message_type', 'success');
    }
}
