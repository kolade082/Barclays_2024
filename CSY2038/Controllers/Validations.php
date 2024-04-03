<?php

namespace CSY2038\Controllers;
use CSY\MyPDO;
class Validations
{
    public function validateRegisterForm($firstName, $lastName, $email, $password, $usertype)
    {
        $errors = [];

        if (empty($firstName)) {
            $errors[] = 'Firstname is required';
        }
        if (empty($lastName)) {
            $errors[] = 'Lastname is required';
        }
        if (empty($password)) {
            $errors[] = 'Password is required';
        }
        if (empty($email)) {
            $errors[] = 'Email is required';
        }
        if (empty($usertype)) {
            $errors[] = 'Usertype is required';
        }

        return $errors;
    }
    public function validateloginForm($username, $password)
    {
        $errors = [];

        if (empty($username)) {
            $errors[] = 'Username is required';
        }
        if (empty($password)) {
            $errors[] = 'Password is required';
        }

        return $errors;
    }

    public function validateEmail($email) {
        $errors = [];

        // Check if the email is valid
//        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
//            $errors[] = 'Please enter a valid email address.';
//        }
        if (empty($email)) {
            $errors[] = 'Email is required';
        }
        return $errors;
    }

    public function validateFirstName($firstName) {
        // Example: check that the name is not empty and matches a pattern
        if (empty($firstName)) {
            return "First name is required.";
        }
        if (!preg_match("/^[a-zA-Z-' ]*$/", $firstName)) {
            return "Only letters and white space allowed in first name.";
        }
        return ""; // No error
    }

    public function validateLastName($lastName) {
        if (empty($lastName)) {
            return "Last name is required.";
        }
        if (!preg_match("/^[a-zA-Z-' ]*$/", $lastName)) {
            return "Only letters and white space allowed in last name.";
        }
        return ""; // No error
    }

    public function validateDob($dob) {
        if (empty($dob)) {
            return "Date of birth is required.";
        }
        $dobDateTime = new \DateTime($dob);
        $now = new \DateTime();
        if ($dobDateTime > $now) {
            return "Date of birth cannot be in the future.";
        }
        return "";
    }


    public function validatePassword($password) {
        // Example: check the password meets certain strength criteria
        if (empty($password)) {
            return "Password is required.";
        }
        if (strlen($password) < 8) {
            return "Password must be at least 8 characters.";
        }
        if (!preg_match("#[0-9]+#", $password)) {
            return "Password must include at least one number.";
        }
        if (!preg_match("#[a-zA-Z]+#", $password)) {
            return "Password must include at least one letter.";
        }
        return ""; // No error
    }

    public function validateAddressLine($addressLine1) {
        if (empty($addressLine1)) {
            return "Address line 1 is required.";
        }
        // Add any specific address validation you might need here
        return ""; // No error
    }

    public function validateCity($city) {
        if (empty($city)) {
            return "City is required.";
        }
        // Add any specific city validation you might need here
        return ""; // No error
    }

    public function validatePostcode($postcode) {
        if (empty($postcode)) {
            return "Postcode is required.";
        }
        // Add any specific postcode validation you might need here
        return ""; // No error
    }

    public function validateCountry($country) {
        // Assuming you have a list of countries
        $validCountries = ['United Kingdom', 'United States', 'Canada']; // etc...
        if (empty($country)) {
            return "Country is required.";
        }
        if (!in_array($country, $validCountries)) {
            return "Invalid country selected.";
        }
        return ""; // No error
    }
}