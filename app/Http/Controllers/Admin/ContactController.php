<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request as BaseRequest;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use Request;
use DB;

class ContactController extends Controller
{

    protected $itemPerPage = 10;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $messages = Contact::orderBy('seen', 'asc')->orderBy('created_at', 'desc')->paginate($this->itemPerPage);
        return view('admin.contacts.index', compact('messages'));
    }

    public function checkAll()
    {
        if(Request::ajax())
        {
            $result['error'] = false;
            try{
                DB::update('update contacts set seen = 1');
            } catch(Exception $e){
                $result['error'] = true;
            }
            return response()->json($result);
        }
    }

    public function seenContact($id) 
    {
        if(Request::ajax())
        {
            $result['error'] = false;
            try{
                $contact = Contact::findOrFail($id);
                $contact->seen = ($contact->seen) ? 0 : 1;
                $contact->save();
            } catch(ModelNotFoundException $e){
                $result['error'] = true;
            }

            return response()->json($result);
        }
    }
}
