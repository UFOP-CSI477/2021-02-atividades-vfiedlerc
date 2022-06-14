<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Record
 *
 * @property $id
 * @property $name
 * @property $equipment_id
 * @property $user_id
 * @property $description
 * @property $due_date
 * @property $type
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Record extends Model
{

    static $rules = [
		'equipment_id' => 'required',
		'user_id' => 'required',
		'description' => 'required',
		'due_date' => 'required',
		'type' => 'required',
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['equipment_id','user_id','description','due_date','type'];



}
