<?php
namespace App\Repositories;
use App\Repositories\BaseRepository;
use App\Http\Requests\Request;
use App\Models\Contact;


class ContactRepository extends BaseRepository
{
    
    function __construct(Contact $contact)
    {
        $this->model = $contact;
    }

}