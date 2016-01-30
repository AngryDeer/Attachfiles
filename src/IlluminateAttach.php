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

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class IlluminateAttach extends Model
{
    /**
     * {@inheritdoc}
     */
    public $timestamps = false;

    /**
     * {@inheritdoc}
     */
    public $table = 'attaches';

    /**
     * {@inheritdoc}
     */
    protected $fillable = [
        'filename',
        'title',
        'alt',
        'desc',
        'namespace',
    ];

    /**
     * The attached entities model.
     *
     * @var string
     */
    protected static $attachedModel = 'Angrydeer\Attachfiles\IlluminateAttached';

    /**
     * {@inheritdoc}
     */
    public function delete()
    {
        if ($this->exists) {
            $this->attached()->delete();
        }

        return parent::delete();
    }

    /**
     * Returns the polymorphic relationship.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function attachable()
    {
        return $this->morphTo();
    }

    /**
     * Returns this attach attached entities.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function attached()
    {
        return $this->hasMany(static::$attachedModel, 'attach_id');
    }

    /**
     * Finds a attach by its title.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string  $name
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeTitle(Builder $query, $title)
    {
        return $query->whereTitle($title);
    }

    /**
     * Finds a attach by its filename.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @param  string  $slug
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeFilename(Builder $query, $filename)
    {
        return $query->whereFilename($filename);
    }

    /**
     * Returns the attached entities model.
     *
     * @return string
     */
    public static function getAttachedModel()
    {
        return static::$attachedModel;
    }

    /**
     * Sets the attached entities model.
     *
     * @param  string  $attachedModel
     * @return void
     */
    public static function setAttachedModel($attachedModel)
    {
        static::$attachedModel = $attachedModel;
    }
}
