<?php

namespace CSY2038\Controllers;

use CSY\DatabaseTable;
use CSY\MyPDO;

class AdminController
{
    private DatabaseTable $dbUsers;

    private $pdo; 
    private array $get;
    private array $post;
    private DatabaseTable $dbApplications;
    private DatabaseTable $dbCreditData;
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
        $this->get = $get;
        $this->post = $post;
        $this->validator = new Validations();
        $this->dbApplications = $dbApplications;
        $this->dbCreditData = $dbCreditData;
    }

    public function index()
    {
        $this->session();
        //$this->chklogin();

        return ['template' => 'index.html.php', 'title' => 'Home', 'variables' => []];
    }


//    public function dashboard()
//    {
//        $this->session();
//        //$this->chklogin();
//
//        return [
//            'template' => 'admin/dashboard.html.php',
//            'title' => 'Dashboard',
//            'variables' => [ // Add a 'variables' key to contain your additional data
//                'message' => 'Welcome to the Dashboard!' // The new variable
//            ]
//        ];
//    }
    public function dashboard() {
        $this->session();

        // Fetch all applications
        $allApplications = $this->dbApplications->fetchAllApplicationDetails();
        $statusClasses = [
            'Approved' => 'text-success',
            'Declined' => 'text-danger',
            'Under Review' => 'text-warning',
        ];
        // Filter applications by status
        $totalApplications = count($allApplications);
        $underReviewApplications = count(array_filter($allApplications, function($application) {
            return $application['status'] === 'Under Review';
        }));

        $approvedApplications = count(array_filter($allApplications, function($application) {
            return $application['status'] === 'Approved';
        }));

        $declinedApplications = count(array_filter($allApplications, function($application) {
            return $application['status'] === 'Declined';
        }));


        // Pass the filtered applications to the template
        return [
            'template' => 'admin/dashboard.html.php',
            'title' => 'Dashboard',
            'variables' => [
                'allApplications' => $allApplications,
                'totalApplications' => $totalApplications,
                'underReviewApplications' => $underReviewApplications,
                'approvedApplications' => $approvedApplications,
                'declinedApplications' => $declinedApplications,
                'statusClasses' => $statusClasses,
            ]
        ];
    }

    public function updateApplicationStatus() {
        error_log("updateApplicationStatus called");
        error_log("POST data: " . print_r($_POST, true));
        $applicationId = $_POST['applicationId'] ?? null;
        $newStatus = $_POST['newStatus'] ?? null;
var_dump($applicationId);
        if (in_array($newStatus, ['Approved', 'Declined'])) {
            $this->dbApplications->updateStatus($applicationId, $newStatus);
            header('Location: dashboard');
        } else {

        }
    }

    public function login()
    {
        $template = 'admin/login.html.php';
        $errors = [];
        $message = '';

        if ($this->post) {
            if (isset($this->post['submit'])) {
                $email = $this->post['email'] ?? '';
                $password = $this->post['password'] ?? '';

                $errors = $this->validator->validateLoginForm($email, $password);
                if (empty($errors)) {
                    $user = $this->dbUsers->find("email", $this->post['email']);
                    if ($user) {
                        $chkPassword = password_verify($this->post['password'], $user[0]["password"]);
                        if ($chkPassword) {
                            // Valid login
                            $this->session();
                            $_SESSION['loggedin'] = $user[0]['id'];
                            $_SESSION['userDetails'] = $user[0];
                            // Removed usertype session storage and redirection based on usertype
                            header('Location: dashboard'); // Direct all users to a common homepage or dashboard after login
                            exit; // Ensure script execution ends here
                        } else {
                            $message = "Invalid Credentials"; // Incorrect password
                        }
                    } else {
                        $message = "Invalid Credentials"; // Email not found
                    }
                }
            }
        }
        return [
            'template' => $template,
            'title' => 'Login',
            'variables' => [
                'errors' => $errors,
                'message' => $message
            ]
        ];
    }

//    public function login()
//    {
//        $template = 'admin/login.html.php';
//        $errors = [];
//        $message = '';
//
//        if ($this->post) {
//            if (isset($this->post['submit'])) {
//                $email = $this->post['email'] ?? '';
//                $password = $this->post['password'] ?? '';
//
//                $errors = $this->validator->validateLoginForm($email, $password);
//                if (empty($errors)) {
//                    $user = $this->dbUsers->find("email", $this->post['email']);
//                    if ($user) {
//                        $chkPassword = password_verify($this->post['password'], $user[0]["password"]);
//                        if ($chkPassword) {
//                            // Valid login
//                            $this->session();
//                            $_SESSION['loggedin'] = $user[0]['id'];
//                            $_SESSION['userDetails'] = $user[0];
//                            $_SESSION['usertype'] = $user[0]['usertype']; // Store usertype in session
//
//                            // Redirect based on usertype
//                            if ($user[0]['usertype'] === 'admin') {
//                                header('Location: dashboard');
//                            } elseif ($user[0]['usertype'] === 'customer') {
//                                header('Location: index'); // Assuming 'index' is the route for the customer homepage
//                            } else {
//                                // Handle unexpected usertype
//                                $message = "Invalid User Type"; // You might want to handle this more gracefully
//                            }
//                            exit; // Ensure script execution ends here
//                        } else {
//                            $message = "Invalid Credentials"; // Incorrect password
//                        }
//                    } else {
//                        $message = "Invalid Credentials"; // Email not found
//                    }
//                }
//            }
//        }
//        return [
//            'template' => $template,
//            'title' => 'Login',
//            'variables' => [
//                'errors' => $errors,
//                'message' => $message
//            ]
//        ];
//    }



    public function logout()
    {
        session_start();
        session_unset();
        session_destroy();

        header('Location: index');
    }


    public function users()
    {
        $this->session();
        $this->chklogin();

        $users = $this->dbUsers->findAll();

        return [
            'template' => 'admin/user.html.php', 'title' => 'Users',
            'variables' => ["users" => $users]
        ];
    }
    public function deleteuser()
    {
        $this->session();
        $this->chklogin();
        $user = $this->dbUsers->delete("id", $this->post['id']);
        header('location: users');
        //            exit();
    }


    /**
     * @return void
     */
    public function session()
    {
        if (!isset($_SESSION)) {
            session_start();
        }
    }

    public function chklogin(): void
    {

        if (!isset($_SESSION['loggedin'])) {
            header("Location: login");
            exit();
        }
    }
}
