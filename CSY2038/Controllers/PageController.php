<?php

namespace CSY2038\Controllers;

use CSY\DatabaseTable;
use CSY\MyPDO;

class PageController
{

    private $pdo;

    private DatabaseTable $dbUsers;
    private DatabaseTable $dbAddresses;
    private DatabaseTable $dbWorkAndIncome;
    private DatabaseTable $dbApplications;
    private DatabaseTable $dbCreditData;
    private array $get;
    private array $post;
    private Validations $validator;

    public function __construct(
        DatabaseTable $dbUsers,
        DatabaseTable $dbAddresses,
        DatabaseTable $dbWorkAndIncome,
        DatabaseTable $dbApplications,
        DatabaseTable $dbCreditData,
        array $get,
        array $post
    ) {
        $myDb = new MyPDO();
        $this->pdo = $myDb->db();
        $this->dbUsers = $dbUsers;
        $this->dbAddresses = $dbAddresses;
        $this->get = $get;
        $this->post = $post;
        $this->validator = new Validations();
        $this->dbWorkAndIncome = $dbWorkAndIncome;
        $this->dbApplications = $dbApplications;
        $this->dbCreditData = $dbCreditData;

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
        $email = $this->post['email'] ?? '';
        $errors = $this->validator->validateEmail($email);

        if (empty($errors)) {
            $_SESSION['registration_email'] = $email;
            header('Location: registerPersonalDet');
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
            'password' => $hashedPassword
        ];
//        var_dump($userData);

        $this->dbUsers->insert($userData);
        $userId = $this->dbUsers->getLastInsertedId();
        $_SESSION['user_id'] = $userId;
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
            $addressLine1 = $this->post['address_line1'] ?? '';
            $addressLine2 = $this->post['address_line2'] ?? ''; // Optional
            $city = $this->post['city'] ?? '';
            $postcode = $this->post['postcode'] ?? '';
            $county = $this->post['county'] ?? '';


            // Validate the address details
            $errors['address_line1'] = $this->validator->validateAddressLine($addressLine1);
            $errors['city'] = $this->validator->validateCity($city);
            $errors['postcode'] = $this->validator->validatePostcode($postcode);
            $errors['county'] = $this->validator->validateCounty($county);

            $errors = array_filter($errors); // Remove any non-errors

            if (empty($errors)) {
                // If there are no errors, save the address details
                $this->saveUserAddress($addressLine1, $addressLine2, $city, $postcode, $county);

                // Redirect to the next step or a confirmation page
                header('Location: workAndIncome');
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

    private function saveUserAddress($addressLine1, $addressLine2, $city, $postcode, $county)
    {

        $userId = $_SESSION['user_id'] ?? null;
//        var_dump($userId);
        $addressData = [
            'user_id' => $userId,
            'address_line1' => $addressLine1,
            'address_line2' => $addressLine2,
            'city' => $city,
            'postcode' => $postcode,
            'country' => $county,
        ];

        // Save the address data in the database
        $this->dbAddresses->insert($addressData);

        // You can also store the address in the session if needed immediately after registration
        $_SESSION['address_details'] = $addressData;
    }



    public function workAndIncome() {
        $this->session();
        $errors = [];



        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $housingStatus = $_POST['housingStatus'] ?? '';
            $employmentStatus = $_POST['employmentStatus'] ?? '';
            $occupation = $_POST['occupation'] ?? '';
            $employer = $_POST['employer'] ?? '';
            $annualIncome = $_POST['annualIncome'] ?? '';
            $employmentDuration = $_POST['employmentDuration'] ?? '';
            $creditApproval = $_POST['creditApproval'] ?? '';
            $reasonForUse = $_POST['reasonForUse'] ?? '';
            $monthlyOutgoings = $_POST['monthlyOutgoings'] ?? '';
            $dependents = $_POST['dependents'] ?? '';

//            var_dump($_POST);
            // Perform your validation...

            if (empty($errors)) {
                $this->saveWorkAndIncomeDetails($housingStatus, $employmentStatus, $occupation, $employer, $annualIncome, $employmentDuration
                ,$creditApproval, $reasonForUse, $monthlyOutgoings, $dependents);


                $eligibilityOutcome = $this->checkEligibilityEnhanced();

                $_SESSION['eligibilityOutcome'] = $eligibilityOutcome;
                header('Location: outcomePage');
                exit;
            }
//            var_dump($errors);
        }

        // Render your form again with errors if there are any
        return [
            'template' => 'workAndIncome.html.php',
            'title' => 'Work and Income Details',
            'variables' => ['errors' => $errors]
        ];
    }

    private function saveWorkAndIncomeDetails($housingStatus, $employmentStatus, $occupation, $employer, $annualIncome, $employmentDuration
        ,$creditApproval, $reasonForUse, $monthlyOutgoings, $dependents) {
        $userId = $_SESSION['user_id'] ?? null;
//        var_dump($userId);
        $annualIncome = !empty($annualIncome) ? floatval($annualIncome) : null;
//        $annualIncome = $annualIncome !== '' ? $annualIncome : null;
        $workAndIncomeData = [
            'user_id' => $userId,
            'housing_status' => $housingStatus,
            'employment_status' => $employmentStatus,
            'occupation' => $occupation,
            'employer' => $employer,
            'annual_income' => $annualIncome,
            'employment_duration' => $employmentDuration,
            'credit_approval' => $creditApproval,
            'reason_for_use' => $reasonForUse,
            'monthly_outgoings' => $monthlyOutgoings,
            'dependents' => $dependents
        ];

        $this->dbWorkAndIncome->insert($workAndIncomeData);

    }


    public function checkEligibilityEnhanced() {
        $userId = $_SESSION['user_id'] ?? null;
        $userDetailsArray = $this->dbWorkAndIncome->find('user_id', $userId);

        // Ensure there are user details available.
        if (!$userDetailsArray || count($userDetailsArray) == 0) {
            $_SESSION['eligibilityOutcome'] = "No user details found. Unable to perform eligibility check.";
            header('Location: outcomePage');
            exit;
        }

        // Assuming we're dealing with the first record as the user's details.
        $userDetails = $userDetailsArray[0];
//        var_dump($userDetails);
        $creditScore = $this->calculateCreditScore($userDetails);
        $affordabilityScore = $this->calculateAffordabilityScore($userDetails);

        // Logic to decide eligibility
        if ($creditScore < 560 || $affordabilityScore < 40) {
            $eligibilityOutcome = "Unfortunately, based on our assessment, you're not eligible for a credit card.";
            $this->finalizeApplication($userId, 'Declined', $creditScore, $affordabilityScore);
        } elseif ($creditScore < 800 || $affordabilityScore < 60) {
            $eligibilityOutcome = "Your application is under review.";
            $this->finalizeApplication($userId, 'Under Review', $creditScore, $affordabilityScore);
        } else {
            $eligibilityOutcome = "Congratulations, you're eligible for a credit card!";
            $this->finalizeApplication($userId, 'Approved', $creditScore, $affordabilityScore);
        }

        $_SESSION['eligibilityOutcome'] = $eligibilityOutcome;
        header('Location: outcomePage');
        exit;
    }


    private function calculateCreditScore($userDetails) {
        $baseScore = 300;

        switch ($userDetails['employment_status']) {
            case 'employed':
                $baseScore += 200;
                break;
            case 'self-employed':
                $baseScore += 150;
                break;
            case 'unemployed':
                $baseScore -= 100;
                break;
            case 'retired':
                $baseScore += 100;
                break;
        }

        switch ($userDetails['housing_status']) {
            case 'owner':
                $baseScore += 150;
                break;
            case 'renting':
                $baseScore += 100;
                break;
            case 'living_with_family':
                $baseScore += 50;
                break;
            case 'other':
                $baseScore += 30;
                break;
        }

        if ($userDetails['credit_approval'] === 'yes') {
            $baseScore += 200;
        } else {
            $baseScore -= 200;
        }

        $highRiskReasons = ['debt_consolidation', 'travel', 'medical_expenses'];
        if (in_array($userDetails['reason_for_use'], $highRiskReasons)) {
            $baseScore -= 100;
        } else {
            $baseScore += 50;
        }

        $baseScore -= min(100, $userDetails['dependents'] * 25);

        return min(1000, $baseScore);
    }


    private function calculateAffordabilityScore($userDetails) {
        $baseScore = 50;
        $monthlyIncome = $userDetails['annual_income'] / 12;

        if ($monthlyIncome <= 0) {
            $baseScore -= 50;
        } else {
            $expenseRatio = $userDetails['monthly_outgoings'] / $monthlyIncome;

            if ($expenseRatio < 0.2) {
                $baseScore += 40;
            } elseif ($expenseRatio < 0.4) {
                $baseScore += 30;
            } elseif ($expenseRatio < 0.6) {
                $baseScore += 20;
            } else {
                $baseScore -= 20;
            }
        }

        if ($userDetails['dependents'] <= 2) {
            $baseScore += 10;
        } else {
            $baseScore -= min(50, ($userDetails['dependents'] - 2) * 15);
        }

        return min(100, $baseScore);
    }


    public function outcomePage() {
        $this->session();
        $eligibilityOutcome = $_SESSION['eligibilityOutcome'] ?? 'Your session has expired or you directly accessed this page. Please start over.';

        // Optionally clear the outcome from the session to prevent it from being reused if the page is refreshed
        unset($_SESSION['eligibilityOutcome']);

        return [
            'template' => 'outcomePage.html.php',
            'title' => 'Application Outcome',
            'variables' => ['eligibilityOutcome' => $eligibilityOutcome]
        ];
    }

    public function finalizeApplication($userId, $status, $creditScore, $affordabilityScore) {
        $applicationData = [
            'user_id' => $userId,
            'status' => $status, // 'Under Review', 'Accepted', 'Declined'
            'credit_score' => $creditScore,
            'affordability_score' => $affordabilityScore,
            'created_at' => date('Y-m-d H:i:s'), // Current timestamp
            'updated_at' => date('Y-m-d H:i:s'),
        ];
        // Insert or update the application data in your database
        $this->dbApplications->save($applicationData);
    }


    public function session()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
    }

}
