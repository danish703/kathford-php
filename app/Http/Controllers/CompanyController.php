<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Company;
use App\Comment;

use Illuminate\Support\Facades\Auth;
class CompanyController extends Controller
{


  public function __construct()
  {
      $this->middleware('auth');
  }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies =  Company::where('user_id',Auth::user()->id)->get();  # SELECT * FRom `company` where id =
        return view('companies.index')->with(['companies'=>$companies]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
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
          $company = Company::create([
            'name'=>$request->input('name'),
            'description'=>$request->input('description'),
            'user_id'=>Auth::user()->id
          ]);
          if($company){
            return redirect()->route('company.show',[$company->id])->with('success','Successfully company created');
          }else{
            return redirect()->route('company.index')->with('error','sorry can not add company now');
          }
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
        $cmp = Company::find($id); #SELECT * FROM company where id= 1
        #$project = DB::table('project')->where('company_id',$id)->get(); # SELECT * From `project` where compan_id=$id
        $comment = Comment::where([
          'commentable_id'=>$id,
          'commentable_type'=>'Company'
        ])->get();
        return view('companies.show',['company'=>$cmp,'comment'=>$comment]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $company = Company::find($id);
        return view('companies.edit',['company'=>$company]);
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
        $companyUpdate = Company::where('id',$id)->update([
            'name'=>$request->input('name'),
            'description'=>$request->input('description')
        ]); # UPDATE `company` SET name = 'kathford ', description = '' WHERE id = 1

        if($companyUpdate){
          return redirect()->route('company.show',['company'=>$id])
          ->with('success','Successfully update');
        }
        return back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $company = Company::find($id);
        if($company->delete()){
          return redirect()->route('company.index')->with('success','Successfully deleted');
        }
        return back()->withInput()->with('error','Company Can not delete right now');
    }
}
