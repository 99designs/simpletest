<?php
    // $Id$
    
    if (!defined("SIMPLE_TEST")) {
        define("SIMPLE_TEST", "simpletest/");
    }
    require_once(SIMPLE_TEST . 'unit_tester.php');
    require_once(SIMPLE_TEST . 'expectation.php');
    
    /**
     *    Adapter for sourceforge PHPUnit test case to allow
     *    legacy test cases to be used with SimpleTest.
     */
    class TestCase extends SimpleTestCase {
        
        /**
         *    Constructor. Sets the test name.
         *    @param $label        Test name to display.
         *    @public
         */
        function TestCase($label) {
            $this->SimpleTestCase($label);
        }
        
        /**
         *    Sends pass if the test condition resolves true,
         *    a fail otherwise.
         *    @param $condition      Condition to test true.
         *    @param $message        Message to display.
         *    @public
         */
        function assert($condition, $message = false) {
            parent::assertTrue($condition, $message);
        }
        
        /**
         *    Will test straight equality if set to loose
         *    typing, or identity if not.
         *    @param $first          First value.
         *    @param $second         Comparison value.
         *    @param $message        Message to display.
         *    @public
         */
        function assertEquals($first, $second, $message = false) {
            $this->assertExpectation(
                    new EqualExpectation($first),
                    $second,
                    $message);
        }
        
        /**
         *    Will test straight equality if set to loose
         *    typing, or identity if not.
         *    @param $first          First value.
         *    @param $second         Comparison value.
         *    @param $message        Message to display.
         *    @public
         */
        function assertEqualsMultilineStrings($first, $second, $message = false) {
            $this->assertExpectation(
                    new EqualExpectation($first),
                    $second,
                    $message);
        }                             
        
        /**
         *    Tests a regex match.
         *    @param $pattern        Regex to match.
         *    @param $subject        String to search in.
         *    @param $message        Message to display.
         *    @public
         */
        function assertRegexp($pattern, $subject, $message = false) {
            $this->assertExpectation(
                    new WantedPatternExpectation($pattern),
                    $subject,
                    $message);
        }
        
        /**
         *    Sends an error which we interpret as a fail
         *    with a different message for compatibility.
         *    @param $message        Message to display.
         *    @public
         */
        function error($message) {
            parent::assertTrue(false, "Error triggered [$message]");
        }
         
        /**
         *    Accessor for name.
         *    @public
         */
       function name() {
            return $this->getLabel();
        }
    }
?>