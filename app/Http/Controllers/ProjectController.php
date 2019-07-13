<?php

namespace App\Http\Controllers;
use App\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        return view('projects.create',['company'=>$id]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if(Auth::check()){
        $validateData = $request->validate([
          'name'=>'required|min:3|max:20',
          'image'=>'required|image|mimes:jpg,png,jpeg,gif,svg'
        ]);



        $file_name = $request->file('image')->getClientOriginalName();
        $extension = $request->file('image')->getClientOriginalExtension();
        $request->file('image')->move(public_path('image'),$file_name);
        $project = Project::create([
          'name'=>$request->input('name'),
          'description'=>$request->input('description'),
          'image'=>$file_name,
          'user_id'=>Auth::user()->id,
          'company_id'=>$request->input('cid')
        ]);
        if($project){
          return redirect()->route('company.show',[$project->company_id])->with('success','Successfully created');
        }else{
          return redirect()->route('company.show',[$project->company_id])->with('error','can not created project right now');
        }
      }else{
        return view('auth.login');
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $project = Project::find($id);
        return view('projects.show',['project'=>$project]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
          $project = Project::find($id);
          return view('projects.edit',['pro'=>$project]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

          $project = Project::where('id',$id)->update([
            'name'=>$request->input('name'),
            'description'=>$request->input('description')
          ]);
          $p = Project::find($id);
          if($project){
            return redirect()->route('company.show',[$p->company_id])->with('success','Successfully updated');
          }else{
            return back()->withInput()->with('error','sorry some error occred');
          }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $project = Project::find($id);
        if($project->delete()){
          return redirect()->route('company.show',$project->company_id)->with('success','Successfully deleted');
        }else{
          return redirect()->route('company.show',$project->company_id)->with('error','sorry can not delete right now');
        }
    }
}
