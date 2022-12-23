<?php

use Illuminate\Database\Eloquent\Model;

class CatalogCity extends Model
{
    protected $table = "cities";
    protected $fillable =[
        'id',
        'name_uk',
        'name_ru',
        'created_at',
        'updated_at',
        'slug'

    ];
//    public $timestamps = false;
//    public function region()
//    {
//        return $this->hasMany(Region::class);
//}
    public function getSlug()
    {
        $city = CatalogCity::query()->rightJoin('cities', 'name_uk', '=', 'slug')
            ->get();
        return $city;
}
}