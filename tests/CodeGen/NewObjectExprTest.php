<?php
use CodeGen\NewObjectExpr;

class NewObjectExprTest extends PHPUnit_Framework_TestCase
{
    public function testNewObjectExprWithSplObjectStorage()
    {
        $expr = new NewObjectExpr('SplObjectStorage');
        $code = $expr->render();
        $this->assertEquals('new SplObjectStorage()', $code);
    }

    public function testNewObjectExprWithSplFixedArray()
    {
        $expr = new NewObjectExpr('SplFixedArray', [ 100 ]);
        $code = $expr->render();
        $this->assertEquals('new SplFixedArray(100)', $code);
    }
}
