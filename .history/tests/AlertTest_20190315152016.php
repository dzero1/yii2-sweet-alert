<?php

namespace dzero1\alert\tests;

use Yii;
use dzero1\alert\Alert;

/**
 * Class AlertTest
 *
 * @package dzero1\alert\tests
 */
class AlertTest extends TestCase
{
    public function testNoAlert()
    {
        $widget = Yii::createObject(Alert::className());
        $this->assertFalse(isset($widget->options['title']));
    }

    public function testRenderAlertFromSessionFlash()
    {
        $flashMessage = 'Test flash message';
        Yii::$app->session->addFlash('success', $flashMessage);
        $widget = Yii::createObject(Alert::class);
        $this->assertEquals($flashMessage, $widget->options['title']);
    }
}
