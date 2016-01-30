<?php

/**
 * Part of the Attachfiles package.
 *
 * NOTICE OF LICENSE
 *
 * Licensed under MIT License.
 *
 * This source file is subject to the MIT License that is
 * bundled with this package in the LICENSE file.
 *
 * @package    Attachfiles
 * @version    1.0.0
 * @author     AngryDeer
 * @license    MIT
 * @copyright  (c) 2016, DP Studio
 * @link       http://angrydeer.ru
 */

namespace Angrydeer\Attachfiles;

use Illuminate\Database\Eloquent\Model;

class IlluminateAttached extends Model
{
    /**
     * {@inheritdoc}
     */
    public $timestamps = false;

    /**
     * {@inheritdoc}
     */
    public $table = 'attached';
}
