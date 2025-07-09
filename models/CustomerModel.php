<?php
require_once __DIR__ . '/../config/connection.php';

class CustomerModel
{
    public static function all($offset = 0, $limit = 5)
    {
        global $con;
        $sql = "SELECT c.*, CONCAT(e.firstName, ' ', e.lastName) AS salesRep
                FROM customers c
                LEFT JOIN employees e ON c.salesRepEmployeeNumber = e.employeeNumber
                ORDER BY customerNumber ASC
                LIMIT $offset, $limit";
        $result = mysqli_query($con, $sql);
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }

    public static function countAll()
    {
        global $con;
        $result = mysqli_query($con, "SELECT COUNT(*) AS total FROM customers");
        return mysqli_fetch_assoc($result)['total'] ?? 0;
    }

    public static function find($id)
    {
        global $con;
        $result = mysqli_query($con, "SELECT * FROM customers WHERE customerNumber = '$id'");
        return mysqli_fetch_assoc($result);
    }

    public static function store($data)
    {
        global $con;
        foreach ($data as $key => $val) {
            $$key = mysqli_real_escape_string($con, $val);
        }

        $salesRep = $salesRepEmployeeNumber ? "'$salesRepEmployeeNumber'" : "NULL";

        $sql = "INSERT INTO customers (
            customerNumber, customerName, contactFirstName, contactLastName,
            phone, addressLine1, city, country, postalCode, salesRepEmployeeNumber
        ) VALUES (
            '$customerNumber', '$customerName', '$contactFirstName', '$contactLastName',
            '$phone', '$addressLine1', '$city', '$country', '$postalCode', $salesRep
        )";

        return mysqli_query($con, $sql);
    }

    public static function update($id, $data)
    {
        global $con;
        foreach ($data as $key => $val) {
            $$key = mysqli_real_escape_string($con, $val);
        }

        $salesRep = $salesRepEmployeeNumber ? "'$salesRepEmployeeNumber'" : "NULL";

        $sql = "UPDATE customers SET
                    customerName = '$customerName',
                    contactFirstName = '$contactFirstName',
                    contactLastName = '$contactLastName',
                    phone = '$phone',
                    addressLine1 = '$addressLine1',
                    city = '$city',
                    country = '$country',
                    postalCode = '$postalCode',
                    salesRepEmployeeNumber = $salesRep
                WHERE customerNumber = '$id'";

        return mysqli_query($con, $sql);
    }

    public static function delete($id)
    {
        global $con;
        return mysqli_query($con, "DELETE FROM customers WHERE customerNumber = '$id'");
    }

    public static function getSalesReps()
    {
        global $con;
        $result = mysqli_query($con, "SELECT employeeNumber, firstName, lastName FROM employees");
        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
}
