<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use App\Http\Requests\CreateContactRequest;

class ContactController extends Controller
{
    public function index()
    {
        return view('index');
    }

    // public function store(Request $request)
    // {
    //     $data = $request->all();

    //     if (isset($data['postcode']))
    //         $data['postcode'] = mb_convert_kana($data['postcode'], 'n');

    public function confirm(CreateContactRequest $request)
    {
        $inputs = $request->all();
        return view('confirm', [
            'inputs' => $inputs,
        ]);
        
    }
    public function thanks()
    {
        return view('thanks');
    }

    public function complete(Request $request)
    {
        $gender=$request['gender'];
        $items = $request->all();
        if($gender=="男性"){
            $items['gender']=1;
        }else{
            $items['gender']=2;
        }
        
        Contact::create($items);
        return view('thanks');
        }
    
    public function search()
    {
        $items=Contact::paginate(10);
        return view('search', ['items' => $items]);
    }
    public function find(Request $request)
    {
        $query = Contact::query();
        if($request->input('gender')!=0){
            $query->where('gender', $request->input('gender'));
        }
        if ($request->filled('email')) {
            $query->where('email', $request->input('email'));
        }
        if ($request->filled('name')) {
            $query->where('name','Like','%'.$request->input('name') .'%');
        }
        if($request->filled('date-start') and $request->filled('date-end')){
            $query->whereBetween('created_at',[ $request->input('date-start'), $request->input('date-end')]);
        }else if($request->filled('date-start')){
            $query->where('created_at','>=',$request->input('date-start'));
        }else if($request->filled('date-end')){
            $query->where('created_at','<=',$request->input('date-end'));
        }


        $items=$query->paginate(10);
        return view('search', ['items' => $items]);
    }
    public function destroy(Request $request)
    {
        Contact::where('id',$request->id)->delete();
        return redirect('/search');
    }

}