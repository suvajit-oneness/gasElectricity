<?php

namespace App\Http\Controllers;
use App\Repositories\ContactUsRepository;

use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    private $contact;
    public function __construct(ContactUsRepository $contact)
    {
        $this->contact = $contact;
    }

    public function index()
    {
        return $this->contact->all();
    }

    public function update(Request $req,$id)
    {
        return $this->contact->update($id,$req->all());
    }

    public function create(Request $req)
    {
        return $this->contact->create($req->all());
    }

    public function delete(Request $req,$id)
    {
        return $this->contact->delete($id);
    }
}
