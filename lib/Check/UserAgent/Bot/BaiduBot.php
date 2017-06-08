<?php
/**
 * FlameCore Gatekeeper
 * Copyright (C) 2015 IceFlame.net
 *
 * Permission to use, copy, modify, and/or distribute this software for
 * any purpose with or without fee is hereby granted, provided that the
 * above copyright notice and this permission notice appear in all copies.
 *
 * @package  FlameCore\Gatekeeper
 * @version  0.1-dev
 * @link     http://www.flamecore.org
 * @license  http://opensource.org/licenses/ISC ISC License
 */

namespace FlameCore\Gatekeeper\Check\UserAgent\Bot;

use FlameCore\Gatekeeper\UserAgent;

/**
 * Analyzes user agents claiming to be Baidu Spider.
 *
 * @author   Michael Hampton <bad.bots@ioerror.us>
 * @author   Christian Neff <christian.neff@gmail.com>
 */
class BaiduBot extends AbstractBot
{
    protected $knownIps = [
        '119.63.192.0/21', '123.125.71.0/24', '180.76.0.0/16', '220.181.0.0/16'
    ];

    public function is(UserAgent $ua)
    {
        return $ua->getBrowserName() == 'baidubot';
    }
}
