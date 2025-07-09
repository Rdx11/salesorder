<?php
require_once __DIR__ . '/../config/connection.php';

class EmployeeModel
{
    public static function all($offset = 0, $limit = 5)
    {
        global $con;
        $query = "SELECT * FROM employees ORDER BY employeeNumber ASC LIMIT $offset, $limit";
        $result = mysqli_query($con, $query);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public static function countAll()
    {
        global $con;
        $result = mysqli_query($con, "SELECT COUNT(*) as total FROM employees");
        return mysqli_fetch_assoc($result)['total'] ?? 0;
    }

    public static function find($id)
    {
        global $con;
        $result = mysqli_query($con, "SELECT * FROM employees WHERE employeeNumber = '$id'");
        return mysqli_fetch_assoc($result);
    }

    public static function store($data)
    {
        global $con;
        $columns = ['employeeNumber', 'firstName', 'lastName', 'extension', 'email', 'officeCode', 'reportsTo', 'jobTitle'];
        foreach ($columns as $col) {
            $$col = mysqli_real_escape_string($con, $data[$col] ?? '');
        }

        $reportsTo = $reportsTo ? "'$reportsTo'" : "NULL";

        $sql = "INSERT INTO employees (employeeNumber, firstName, lastName, extension, email, officeCode, reportsTo, jobTitle)
                VALUES ('$employeeNumber', '$firstName', '$lastName', '$extension', '$email', '$officeCode', $reportsTo, '$jobTitle')";

        return mysqli_query($con, $sql);
    }

    public static function update($id, $data)
    {
        global $con;
        foreach ($data as $key => $val) {
            $$key = mysqli_real_escape_string($con, $val);
        }

        $reportsTo = $reportsTo ? "'$reportsTo'" : "NULL";

        $sql = "UPDATE employees SET
                    firstName = '$firstName',
                    lastName = '$lastName',
                    extension = '$extension',
                    email = '$email',
                    officeCode = '$officeCode',
                    reportsTo = $reportsTo,
                    jobTitle = '$jobTitle'
                WHERE employeeNumber = '$id'";

        return mysqli_query($con, $sql);
    }

    public static function delete($id)
    {
        global $con;
        return mysqli_query($con, "DELETE FROM employees WHERE employeeNumber = '$id'");
    }
}
