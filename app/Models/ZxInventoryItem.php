<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ZxInventoryItem extends Model
{
    use HasFactory, SoftDeletes;

    use HasTranslations;
    public $translatable = ['name', 'description'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'brand_id',
        'parent_id',
        'variant_or_part',
        'name',
        'description',
        'model_no',
        'barcode',
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
        'brand_id' => 'integer',
        'parent_id' => 'integer',
        'variant_or_part' => 'boolean',
        'name' => 'array',
        'description' => 'array',
        'enabled' => 'boolean',
    ];

    public function zxInventoryCategories()
    {
        return $this->belongsToMany(ZxInventoryCategory::class);
    }

    public function zxInventoryItems()
    {
        return $this->belongsToMany(ZxInventoryItem::class);
    }

    public function zxInventorySkus()
    {
        return $this->hasMany(ZxInventorySku::class);
    }

    public function brand()
    {
        return $this->belongsTo(ZxIcon::class);
    }

    public function parent()
    {
        return $this->belongsTo(ZxInventoryItem::class);
    }
}
