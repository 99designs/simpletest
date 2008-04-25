<?php
// $Id$
require_once(dirname(__FILE__) . '/../autorun.php');
require_once(dirname(__FILE__) . '/../socket.php');
Mock::generate('SimpleSocket');

class TestOfSimpleStickyError extends UnitTestCase {
    
    function testSettingError() {
        $error = new SimpleStickyError();
        $this->assertFalse($error->isError());
        $error->setError('Ouch');
        $this->assertTrue($error->isError());
        $this->assertEqual($error->getError(), 'Ouch');
    }
    
    function testClearingError() {
        $error = new SimpleStickyError();
        $error->setError('Ouch');
        $this->assertTrue($error->isError());
        $error->clearError();
        $this->assertFalse($error->isError());
    }
}
?>