<?php

namespace App\Repositories;
use App\Contracts\ContactUsContract;
use App\Model\ContactUs;

/**
 * Class ContactUsRepository.
 */
class ContactUsRepository implements ContactUsContract
{
    /**
     * @return string
     *  Return the model
     */
    // public function model()
    // {
        //return YourModel::class;
    // }
    private $model;

    public function __construct(ContactUs $model)
    {
        $this->model = $model;
    }
    
    public function all()
    {
        return $this->model->get();
    }

    public function getById($id)
    {
        return $this->model->findOrFail($id);
    }

    public function create(array $attribute)
    {
        return $this->model->create($attribute);
    }

    public function update($id,array $attribute)
    {
        $contact = $this->model->findOrFail($id);
        $contact->update($attribute);
        return $contact;
    }

    public function delete($id)
    {
        $data =  $this->getById($id);
        $data->delete();
        return $data;
    }
}
