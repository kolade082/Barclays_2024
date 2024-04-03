<?php

namespace CSY2038\Controllers;

use CSY\DatabaseTable;
use CSY\MyPDO;

class PageController
{

    private $pdo;

    private DatabaseTable $dbUsers;
    // private MyPDO $pdo; 
    private array $get;
    private array $post;
    private Validations $validator;

    public function __construct(
        DatabaseTable $dbUsers,
        array $get,
        array $post
    ) {
        $myDb = new MyPDO();
        $this->pdo = $myDb->db();
        $this->dbUsers = $dbUsers;
        $this->get = $get;
        $this->post = $post;
        $this->validator = new Validations();
    }

    public function home()
    {
        return ['template' => 'index.html.php', 'title' => 'Home', 'variables' => []];
    }



    public function about()
    {
        return ['template' => 'about.html.php', 'title' => 'About', 'variables' => []];
    }

    public function registerEmail()
    {
        $this->session();
        $errors = [];

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($this->post['email'])) {
//            var_dump($_POST);
            $email = $this->post['email'] ?? '';
            $errors = $this->validator->validateEmail($email);
//            var_dump($email, $errors);
            if (empty($errors)) {
                $_SESSION['registration_email'] = $email;
//                var_dump($_SESSION);
                header('Location: registerPersonalDet');
//                var_dump('Redirecting to registerPersonalDet');
                exit;
            }
        }

        return [
            'template' => 'registerEmail.html.php',
            'title' => 'Register Email',
            'variables' => [
                'errors' => $errors
            ]
        ];
    }

    public function registerPersonalDet()
    {
        $this->session();
        $errors = [];

//        var_dump($_SESSION);
        if (!isset($_SESSION['registration_email'])) {
            header('Location: registerEmail');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//            var_dump($_POST);
            // Collect the post data
            $firstName = $this->post['first-name'] ?? '';
            $lastName = $this->post['last-name'] ?? '';
            $dobDay = $this->post['dob-day'] ?? '';
            $dobMonth = $this->post['dob-month'] ?? '';
            $dobYear = $this->post['dob-year'] ?? '';
            $dob = $dobYear . '-' . $dobMonth . '-' . $dobDay;
            $password = $this->post['password'] ?? '';

            // Validate the personal details here
            $errors['first-name'] = $this->validator->validateFirstName($firstName);
            $errors['last-name'] = $this->validator->validateLastName($lastName);
            $errors['dob'] = $this->validator->validateDob($dob);
            $errors['password'] = $this->validator->validatePassword($password);

            $errors = array_filter($errors);
//            var_dump($errors);
            if (empty($errors)) {
                $this->saveUserPersonalDetails($firstName, $lastName, $dob, $password);
                header('Location: registerAddress');
                exit;
            }
        }

        return [
            'template' => 'registerPersonalDet.html.php',
            'title' => 'Register Personal Details',
            'variables' => [
                'errors' => $errors
            ]
        ];
    }

    private function saveUserPersonalDetails($firstName, $lastName, $dob, $password)
    {
        // Assuming $_SESSION['registration_email'] is already set
        $email = $_SESSION['registration_email'];

        // Hash the password for security
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Prepare the user data array
        $userData = [
            'email' => $email,
            'first_name' => $firstName,
            'last_name' => $lastName,
            'date_of_birth' => $dob,
            'password' => $hashedPassword,
        ];
//        var_dump($userData);

        $this->dbUsers->insert($userData);

        $_SESSION['personal_details_set'] = true;
    }

    public function registerAddress()
    {
        $this->session();
        $errors = [];

        if (!isset($_SESSION['personal_details_set'])) {
            header('Location: registerPersonalDet');
            exit;
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Collect address details from POST data
            $addressLine1 = $this->post['address-line1'] ?? '';
            $addressLine2 = $this->post['address-line2'] ?? ''; // Optional
            $city = $this->post['city'] ?? '';
            $postcode = $this->post['postcode'] ?? '';
            $country = $this->post['country'] ?? '';

            // Validate the address details
            $errors['address-line1'] = $this->validator->validateAddressLine($addressLine1);
            $errors['city'] = $this->validator->validateCity($city);
            $errors['postcode'] = $this->validator->validatePostcode($postcode);
            $errors['country'] = $this->validator->validateCountry($country);

            $errors = array_filter($errors); // Remove any non-errors

            if (empty($errors)) {
                // If there are no errors, save the address details
                $this->saveUserAddress($addressLine1, $addressLine2, $city, $postcode, $country);

                // Redirect to the next step or a confirmation page
//                header('Location: registrationConfirmation');
                exit;
            }
        }

        return [
            'template' => 'registerAddress.html.php',
            'title' => 'Register Address',
            'variables' => [
                'errors' => $errors
            ]
        ];
    }

    private function saveUserAddress($addressLine1, $addressLine2, $city, $postcode, $country)
    {
        // Assuming you have a user's ID or email stored in the session
        $userId = $_SESSION['user_id'] ?? null; // Replace with actual user identification logic

        $addressData = [
            'user_id' => $userId,
            'address_line1' => $addressLine1,
            'address_line2' => $addressLine2,
            'city' => $city,
            'postcode' => $postcode,
            'country' => $country,
        ];

        // Save the address data in the database
        $this->dbAddresses->insert($addressData);

        // You can also store the address in the session if needed immediately after registration
        $_SESSION['address_details'] = $addressData;
    }



    public function session()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
    }

}
