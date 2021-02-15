<?php

namespace App\Contracts;

interface ContactUsContract
{
	public function all();

	public function getById($id);

	public function create(array $attribute);

	public function update($id,array $attribute);

	public function delete($id);
}
