<?php
/** @package    Location Bot::Controller */

/** import supporting libraries */
require_once("AppBaseController.php");
require_once("Model/Number.php");
require_once("Helpers/Twilio.php");

/**
 * LogController is the controller class for the Log object.  The
 * controller is responsible for processing input from the user, reading/updating
 * the model as necessary and displaying the appropriate view.
 *
 * @package Location Bot::Controller
 * @author ClassBuilder
 * @version 1.0
 */
class BroadcastController extends AppBaseController
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
        $this->Render();
    }

    

    /**
     * API Method deletes an existing Log record and render response as JSON
     */
    public function Send()
    {
        try
        {

            $criteria = new NumberCriteria();
            $criteria->SetOrder('ASC','');
            $numbers = $this->Phreezer->Query('Number',$criteria);
            $numbers_array =  $numbers->ToObjectArray(true);
            if (count($numbers_array)){
                foreach ($numbers_array as $number) {
                    print_r($number);
                }
            }
            echo "1";

        }
        catch (Exception $ex)
        {
            echo "-1";
        }
    }
}

?>
