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

namespace FlameCore\Gatekeeper\Check;

use FlameCore\Gatekeeper\Visitor;

/**
 * Interface CheckInterface
 *
 * @author   Christian Neff <christian.neff@gmail.com>
 */
interface CheckInterface
{
    const RESULT_OKAY = 0;
    const RESULT_UNSURE = 1;
    const RESULT_BLOCK = 2;

    /**
     * Checks the visitor.
     *
     * @param \FlameCore\Gatekeeper\Visitor $visitor The visitor information
     *
     * @return int|string Returns the check result.
     */
    public function checkVisitor(Visitor $visitor);

    /**
     * Is this check responsible for the given Visitor?
     *
     * @param \FlameCore\Gatekeeper\Visitor $visitor The visitor information
     *
     * @return bool
     */
    public function isResponsibleFor(Visitor $visitor);
}
