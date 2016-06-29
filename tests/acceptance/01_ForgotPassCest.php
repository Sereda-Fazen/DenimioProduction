<?php
use \Step\Acceptance;
/**
 * @group 1_password
 */
class ForgotPassCest {

    function forgotSuccess(Step\Acceptance\ForgotPassSteps $I, \Page\ForgotPass $forgotPage)
    {
        $forgotPage->forgot('denimio_test@yahoo.com');
    }

   
    
}
