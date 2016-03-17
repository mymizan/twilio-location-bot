<?php
/** @package    Location Bot::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");

/**
 * LogController is the controller class for the Log object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package Location Bot::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class MapController extends AppBaseController
{

    /**
     * Override here for any controller-specific functionality
     *
     * @inheritdocs
     */
    protected function Init()
    {
        parent::Init();

        // TODO: add controller-wide bootstrap code
        
        // TODO: if authentiation is required for this entire controller, for example:
        // $this->RequirePermission(ExampleUser::$PERMISSION_USER,'SecureExample.LoginForm');
    }

    /**
     * Displays a list view of Log objects
     */
    public function ListView()
    {
        if (!empty($_GET['l'])) {
            $l = explode(',', $_GET['l']);
            $_POST['lat'] = $l[0];
            $_POST['lng'] = $l[1];
            $this->Render();
        }
        
    }
}

?>
