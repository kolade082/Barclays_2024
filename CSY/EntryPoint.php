<?php
namespace CSY;
class EntryPoint
{
    private $routes;
    public function __construct(Routes $routes){
        $this->routes = $routes;
    }
    public function run(): void
    {

            $page = $this->routes->getPage();
        if (!is_array($page) || !isset($page['template']) || !isset($page['variables']) || !isset($page['title'])) {
            // Log the error or handle it as appropriate
            error_log("Page configuration is incomplete or not an array. Received: " . var_export($page, true));
            // Here you might want to redirect to a default error page or display an error message directly.
            echo "An error occurred. Please try again later.";
            exit; // Stop script execution to prevent further errors
        }
            $output = $this->loadTemplate('../templates/' . $page['template'], $page['variables']);
            $title = $page['title'];
            $page_title = $page['title'];

            require '../templates/layout.html.php';

    }
    public function loadTemplate($fileName, $templateVars)
    {
        if (!is_array($templateVars)) {
            // Handle the error or simply return an empty string
            error_log("Template variables must be an array");
            return ''; // or throw new Exception('Template variables must be an array');
        }
        extract($templateVars);
        ob_start();
        require $fileName;
        $output = ob_get_clean();
        return $output;
    }
}
