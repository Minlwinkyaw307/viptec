<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ContactMessageIndexRequest;
use App\Http\Requests\Admin\ContactMessageShowRequest;
use App\Models\ContactMessage;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    /**
     * @param ContactMessageIndexRequest $request
     * @return Application|Factory|View
     */
    public function index(ContactMessageIndexRequest $request)
    {

        $filter_created_at = $request->get('filter_created_at') ?? null;

        $contact_messages = ContactMessage::query();

        if ($request->get('filter_name') ?? null)
        {
            $name = $request->get('filter_name');
            $contact_messages->where('name', 'like', "%$name%");
        }
        if ($request->get('filter_surname') ?? null)
        {
            $surname = $request->get('filter_surname');
            $contact_messages->where('surname', 'like', "%$surname%");
        }

        if ($request->get('filter_email') ?? null)
        {
            $email = $request->get('filter_email');
            $contact_messages->where('email', 'like', "%$email%");
        }

        if ($filter_created_at) {
            $contact_messages = $contact_messages->whereDate('created_at', $filter_created_at);
        }

        $contact_messages = $contact_messages->paginate($request->get('per_page') ?? 10);
        return view('admin.contact-message.index', [
            'data' => $contact_messages
        ]);
    }

    /**
     * @param ContactMessageShowRequest $request
     * @param $id
     * @return Application|Factory|View
     */
    public function show(ContactMessageShowRequest $request, $id)
    {
        $contact_message = ContactMessage::where('id', $id)->firstOrFail();

        return view('admin.contact-message.create-edit', [
            'data' => $contact_message
        ]);
    }
}
