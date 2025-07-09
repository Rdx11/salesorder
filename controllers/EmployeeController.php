<?php
require_once __DIR__ . '/../models/EmployeeModel.php';

class EmployeeController
{
    public function indexPaginated($page = 1, $limit = 10)
    {
        $offset = ($page - 1) * $limit;
        return EmployeeModel::all($offset, $limit);
    }

    public function count()
    {
        return EmployeeModel::countAll();
    }

    public function store($data)
    {
        return EmployeeModel::store($data);
    }

    public function edit($id)
    {
        return EmployeeModel::find($id);
    }

    public function update($id, $data)
    {
        return EmployeeModel::update($id, $data);
    }

    public function delete($id)
    {
        return EmployeeModel::delete($id);
    }
}
