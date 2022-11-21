<?php

namespace App\Http\Controllers;
use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\Arabic;
use App\Models\Datasurah;
use App\Models\Thai;

class NoteController extends Controller
{
    // /**
    //  * Display a listing of the resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function index()
    // {
    //     //
    // }

    // /**
    //  * Show the form for creating a new resource.
    //  *
    //  * @return \Illuminate\Http\Response
    //  */
    // public function create()
    // {
    //     //
    // }

    // /**
    //  * Store a newly created resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @return \Illuminate\Http\Response
    //  */
    // public function store(Request $request)
    // {
    //     //
    // }

    // /**
    //  * Display the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function show($id)
    // {
    //     //
    // }

    // /**
    //  * Show the form for editing the specified resource.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function edit($id)
    // {
    //     //
    // }

    // /**
    //  * Update the specified resource in storage.
    //  *
    //  * @param  \Illuminate\Http\Request  $request
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id)
    // {
    //     //
    // }

    public function index()
    {
        //
        $datas = Datasurah::all();
        $data = Note::paginate(5);

        if(Auth::id()){
            $userid=Auth::user()->id;
            $data = Note::where('user_id',$userid)->get();
            return view('notes.index', compact('data','datas'));
        }
        // $data = Note::with('user')->find($id);
        // return view('notes.index', compact('data'))
        //         ->with('i', (request()->input('page', 1) - 1) * 5);

                // $users = User::paginate(5);
                // $tafseers = Tafseer::paginate(5);
                
               // return view('notes.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        // return view('notes.create');
        return view('enduser.detailuser');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'title' => 'required',
            'description' => 'required'
            // 'datasurah_id' => 'required',
            // 'id' => 'required',
            // 'users_id' => 'required'
        ]);
      //  Note::create($request->all());
     //User::create($data);
   $note = new Note;
   $note->title=$request->title;
   $note->description=$request->description;
   $note->user_id=Auth::user()->id;
   $note->save();
        return redirect()->route('notes.index')
                        ->with('success','สร้างโน้ตใหม่สำเร็จ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note)
    {
        //
        return view('notes.show',compact('note'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Note $note)
    {
        //
        return view('notes.edit',compact('note'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Note $note)
    {
        //
        $request->validate([
            'title' => 'required',
            'description' => 'required'
            // 'datasurah_id' => 'required',
            // 'id' => 'required',
            // 'users_id' => 'required'
        ]);
        $note->update($request->all());
    
        return redirect()->route('notes.index')
                        ->with('success','อัตเดตโน้ตสำเร็จ');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        //
        $note->delete();
    
        // return redirect()->route('notes.index')
        //                 ->with('success','ลบโน้ตสำเร็จ');

        //                 $user->delete();
         return back();
    }
    
}
