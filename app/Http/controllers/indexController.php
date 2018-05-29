<?php 

namespace app\Http\controllers;
class IndexController
{
    public function index()
    {
        // ----------------------------------------------------------
        // 1. PREPARE ALL INFORMATION WE WILL NEED TO RENDER THE PAGE
        // (no echo or HTML including in this phase)
        // ----------------------------------------------------------
        define('IN_PRODUCTION', true);
        // setup everything we need for the project
        $site_url = SITE_URL;
        // set the content
        $content = 'homepage/layout.php';
        // ---------------------------------
        // 2. RENDER THE PAGE!
        // echoing and including HTML begins
        // ---------------------------------
        // testing DB connection
        $connection = \enakelemichael\mvc\db::getConnection();
        
        // write the query
        $query = "
            INSERT 
            INTO `region`
            (`name`, `slug`)
            VALUES
            ('Northern Africa', 'northern-africa')
        ";
        // prepare the query and get a statement
        $statement = $connection->prepare($query);
        // execute the statement
        if (false === $statement->execute()) {
            // if the outcome of execute() was false, exit with error message
            \enakelemichael\mvc\db::exitWithError();
        }
        // when we are ready with setup, include the wrapper
        include __DIR__ . '/../../../resources/views/html-wrapper.php'; 
    }
}
?>