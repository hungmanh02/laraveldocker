<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;

class ContactController extends Controller
{
    public function form_contact(){
        return view('form');
    }
    public function creat_form(Request $request){
        $contact = new Contact;
        $contact->name = $request->name;
        $contact->address = $request->address;
        $contact->phone = $request->phone;
        $contact->birth_day = $request->birth_day;
        $contact->save();
        return redirect()->route('index')->with('success','contact add succsess');
        
    }
    public function show_list(){
        $contacts=Contact::all();
        return view('show',['contacts'=>$contacts]);

    }
    public function detail($id){
        $detail=DB::table('contacts')->where('id',$id)->first();
        return view('detail',['detail'=>$detail]);
    }
    public function edit($id){
        $edit=DB::table('contacts')->where('id',$id)->first();
        return view('editcontact',['edit'=>$edit]);
    }
    public function update($id,Request $request){
        
        DB::table('contacts')->where('id',$id)->update([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'address'=>$request->address,
            'birth_day'=>$request->birth_day,
        ]);
        return redirect()->route('edit',$id)->with('success','contact update succsess');
    }
    public function filter(Request $request){
        // $con=Contact::all();
        // $birthday=Carbon::parse($con->birth_day)->age;
        // dd($birthday);
        $fromDate=$request->input('fromDate');
        $toDate=$request->input('toDate');
        $query=DB::table('contacts')
        ->where('birth_day','>=',$fromDate)
        ->where('birth_day','<=',$toDate)
        ->get();
        return view('filter',['query'=>$query]);
    }
    public function delete($id){
        DB::table('contacts')->where('id',$id)->delete();
        return redirect()->back()->with('success','contact delete succsess');
    }
    public function search(Request $request){
        $search=$request->input($request->search);
        if ($request->search != '') {
            $searchs=DB::table('contacts')->where('name', 'like', '%' . $search . '%')
            ->orWhere('phone', 'like', '%' . $search . '%')->get();
            
        }else{
            return redirect()->route('search')->with('error','Không tìm thấy');
        }
        return view('search',['searchs'=>$searchs]);
    }
}
