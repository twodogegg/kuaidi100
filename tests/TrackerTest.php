<?php

namespace Twodogeggs\Kuaidi100\Tests;

use PHPUnit\Framework\TestCase;
use Twodogeggs\Kuaidi100\Tracker;

class TrackerTest extends TestCase
{
    public function testTrack()
    {
        $kuaidi = new Tracker('uexWYZbd2758');
        $kuaidi->track('zhongtong', '75155689993986');
    }
}