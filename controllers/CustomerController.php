<?php
require_once __DIR__ . '/../models/CustomerModel.php';

class CustomerController
{
    public function indexPaginated($page = 1, $limit = 10)
    {
        $offset = ($page - 1) * $limit;
        return CustomerModel::all($offset, $limit);
    }

    public function count()
    {
        return CustomerModel::countAll();
    }

    public function store($data)
    {
        return CustomerModel::store($data);
    }

    public function edit($id)
    {
        return CustomerModel::find($id);
    }

    public function update($id, $data)
    {
        return CustomerModel::update($id, $data);
    }

    public function delete($id)
    {
        return CustomerModel::delete($id);
    }

    public function salesReps()
    {
        return CustomerModel::getSalesReps();
    }
}
