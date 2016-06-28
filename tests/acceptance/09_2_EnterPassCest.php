<?php
use \Step\Acceptance;
/**
 * @group 1_password
 */
class EnterPassCest {
    
    function enterNewPass (Step\Acceptance\ForgotPassSteps $I)
    {
        $I->gMailAuth();
        $I->remoteWindow();
        $I->newPass();
    }

    /*
        function deleteOldMsg(Step\Acceptance\LoginSteps $I, Page\ForgotPass $deleteMsg){
            $deleteMsg->deleteMsg();

        }
     function invalidRepeatPass (Step\Acceptance\ForgotPassSteps $I, \Page\ForgotPass $forgotPage) {
            $I->moveBack();
            $I->see('Your password reset link has expired.','li.error-msg');

        }
    */
}
