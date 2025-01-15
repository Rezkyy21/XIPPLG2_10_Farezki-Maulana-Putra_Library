<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Books extends Model
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'books'; 

    /**
     * The primary key associated with the table.
     *
     * @var string
     */
    protected $primaryKey = ['id','user_id','category_id'];
    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = true;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['title', 'writer', 'publisher', 'year'];

    protected function setKeysForSaveQuery($query)
    {
        foreach ($this->primaryKey as $key) {
            $query->where($key, '=', $this->getAttribute($key));
        }

        return $query;
    }
}
