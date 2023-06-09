<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Http\Requests\ContactRequest;

class ContactController extends Controller
{
    public function index()
    {
        return view('index');
    }

    public function confirm(ContactRequest $request)
    {
        $contact = $request->only(['sei', 'mei', 'fullname', 'gender', 'email', 'postcode', 'address', 'building_name', 'opinion']);
        $contact['fullname'] = $contact['sei']. $contact['mei'];
        // 郵便番号が全角だった時は半角に変換する
        if (mb_strlen($contact['postcode']) == strlen($contact['postcode'])) {
            // 何もしない
        } else {
            $contact['postcode'] = mb_convert_kana($contact['postcode'], "a");
        }
        // バリデーションを実行
        $validatedData = $request->validated();
        return view('confirm', compact('contact'));
    }

    public function store(ContactRequest $request)
    {
        $contact = $request->only(['fullname', 'gender', 'email', 'postcode', 'address', 'building_name', 'opinion']);
        Contact::create($contact);
        return view('thanks');
    }

    public function manage()
    {
        $contacts = Contact::Paginate(10);
        return view('manage', compact('contacts'));
    }

    public function search(Request $request)
    {
        $contacts = Contact::NameSearch($request->name)
        ->GenderSearch($request->gender)
        ->DateSearch($request->date_first, $request->date_last)
        ->EmailSearch($request->email)
        ->Paginate(10);
        return view('manage', compact('contacts'));
    }

    public function destroy(Request $request)
    {
        Contact::find($request->id)->delete();
        return redirect('/manage');
    }
}
