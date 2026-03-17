<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    protected $fillable = ['title', 'description', 'file', 'status'];

    protected $formatFields = ['title', 'description'];

    public function setAttribute($key, $value)
    {
        if (in_array($key, $this->formatFields)) {
            $value = strtolower($value);
        }
        return parent::setAttribute($key, $value);
    }

    public function getAttribute($key)
    {
        return parent::getAttribute($key);

        if (in_array($key, $this->formatFields) && $value) {
            return ucfirst($value);
        }
        return $value;
    }

    public function scopeAllNews($query)
    {
        return $query->orderBydesc('status', 1)->latest();
    }
    public function scopeActive($query)
    {
        return $query->where('status', 1)->latest();
    }
}
