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

namespace FlameCore\Gatekeeper\Listing;

/**
 * IP matching list
 *
 * @author   Christian Neff <christian.neff@gmail.com>
 */
class IPList extends AbstractList
{
    /**
     * List of IPs
     *
     * @var string[]
     */
    protected $list = array();

    /**
     * {@inheritdoc}
     */
    public function match($value)
    {
        foreach ($this->list as $checkValue) {
            if (strpos($checkValue, '/')) {
                list($checkIP, $checkMask) = explode('/', $checkValue);
                $checkMask = pow(2, 32) - pow(2, (32 - $checkMask));

                if ((ip2long($value) & $checkMask) == (ip2long($checkIP) & $checkMask)) {
                    return true;
                }
            } else {
                if ((string) $value === $checkValue) {
                    return true;
                }
            }
        }

        return false;
    }

    /**
     * Gets the IP list.
     *
     * @return string[]
     */
    public function get()
    {
        return $this->list;
    }

    /**
     * {@inheritdoc}
     */
    public function add($values)
    {
        $ips = array_map('strval', (array) $values);

        $this->list = $this->merge($this->list, $ips);
    }

    /**
     * {@inheritdoc}
     */
    protected function addFileEntry($value)
    {
        $this->add($value);
    }
}
