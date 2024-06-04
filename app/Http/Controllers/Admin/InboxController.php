<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

class InboxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [];
        $emails = Contact::sort('desc')->paginate(10);

        $data['title'] = "Inbox";
        $data['section'] = "Inbox";
        $data['page'] = "Inbox";

        view()->share('breadcrumbs', $data);

        return view('admin.inbox.index', compact('emails'));
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = [];

        $data['title'] = "Message";
        $data['section'] = "Inbox";
        $data['page'] = "Message";

        view()->share('breadcrumbs', $data);

        $email = Contact::find($id);
    	if(!isset($email) || empty($email)) {
    		abort(404);
    	}

        $email->is_read = 1;
        $email->save();

        return view('admin.inbox.show', compact('email'));
    }
}
