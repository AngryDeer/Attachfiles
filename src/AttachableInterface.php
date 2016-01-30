<?php

/**
 * Part of the Attachfiles package.
 *
 * NOTICE OF LICENSE
 *
 * Licensed under MIT License.
 *
 * This source file is subject to MIT License that is
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

use Illuminate\Database\Eloquent\Builder;

interface AttachableInterface
{


    /**
     * Returns the Eloquent attaches model name.
     *
     * @return string
     */
    public static function getAttachesModel();

    /**
     * Sets the Eloquent attaches model name.
     *
     * @param  string  $model
     * @return void
     */
    public static function setAttachesModel($model);

    /**
     * Returns the slug generator.
     *
     * @return string
     */
    public static function getSlugGenerator();

    /**
     * Sets the slug generator.
     *
     * @param  string  $name
     * @return void
     */
    public static function setSlugGenerator($name);

    /**
     * Returns the entity Eloquent attach model object.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphToMany
     */
    public function attaches();

    /**
     * Returns all the attaches under the entity namespace.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function allAttaches();

    /**
     * Returns the entities with only the given attaches.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string|array  $attaches
     * @param  string  $type
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function scopeWhereAttach(Builder $query, $attaches, $type = 'slug');

    /**
     * Returns the entities with one of the given attaches.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string|array  $attaches
     * @param  string  $type
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function scopeWithAttach(Builder $query, $attaches, $type = 'slug');

    /**
     * Returns the entities that do not have one of the given attaches.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string|array  $attaches
     * @param  string  $type
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public static function scopeWithoutAttach(Builder $query, $attaches, $type = 'slug');

    /**
     * Attaches multiple attaches to the entity.
     *
     * @param  string|array  $attaches
     * @return bool
     */
    public function attach($attaches);

    /**
     * Detaches multiple attaches from the entity or if no attaches are
     * passed, removes all the attached attaches from the entity.
     *
     * @param  string|array|null  $attaches
     * @return bool
     */
    public function unattach($attaches = null);

    /**
     * Attaches or detaches the given attaches.
     *
     * @param  string|array  $attaches
     * @param  string  $type
     * @return bool
     */
    public function setAttaches($attaches, $type = 'name');

    /**
     * Attaches the given attach to the entity.
     *
     * @param $filename
     * @param null $title
     * @param null $alt
     * @param null $desc
     * @return mixed
     */
    public function addAttach($filename, $title = null, $alt=null, $desc=null);


    /**
     * Attaches the given attach to the entity.
     *
     * @param $filename
     * @param null $title
     * @param null $alt
     * @param null $desc
     * @return mixed
     */
    public function updateOrNewAttach($filename, $title = null, $alt=null, $desc=null);



    /**
     * Keep only attached from filenames
     *
     * @param $filenames
     * @return mixed
     */
    public function keepOnly($filenames);


    /**
     * Detaches the given attach from the entity.
     *
     * @param  string  $name
     * @return void
     */
    public function removeAttach($name);

    /**
     * Prepares the given attaches before being saved.
     *
     * @param  string|array  $attaches
     * @return array
     */
    public function prepareAttaches($attaches);

    /**
     * Creates a new model instance.
     *
     * @return \Illuminate\Database\Eloquent\Model
     */
    public static function createAttachesModel();
}
