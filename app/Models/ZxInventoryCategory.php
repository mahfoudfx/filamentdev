<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ZxInventoryCategory extends Model
{
    use HasFactory;

    use HasTranslations;
    public $translatable = ['description'];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'parent_id',
        'category_name_id',
        'description',
        'enabled',
        'icon_id',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'parent_id' => 'integer',
        'category_name_id' => 'integer',
        'description' => 'array',
        'enabled' => 'boolean',
        'icon_id' => 'integer',
    ];

    public function zxInventoryCategories()
    {
        return $this->belongsToMany(ZxInventoryCategory::class);
    }

    public function parent()
    {
        return $this->belongsTo(ZxInventoryCategory::class);
    }

    public function categoryName()
    {
        return $this->belongsTo(ZxInventoryCategoryName::class);
    }

    public function icon()
    {
        return $this->belongsTo(ZxIcon::class);
    }

    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->categoryName->name,
        );
    }
}
