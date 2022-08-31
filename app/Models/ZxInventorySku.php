<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ZxInventorySku extends Model
{
    use HasFactory, SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'item_id',
        'parent_id',
        'batch_no',
        'serial_no',
        'photo_url',
        'enabled',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'item_id' => 'integer',
        'parent_id' => 'integer',
        'enabled' => 'boolean',
    ];

    public function zxInventorySkus()
    {
        return $this->belongsToMany(ZxInventorySku::class);
    }

    public function item()
    {
        return $this->belongsTo(ZxInventoryItem::class);
    }

    public function parent()
    {
        return $this->belongsTo(ZxInventorySku::class);
    }
}
