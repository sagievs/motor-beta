<?php

namespace App;

class Category extends Model
{
    protected function tree($data)
    {
        $tree = [];
        foreach ($data as $id=>&$node) {
            if(!$node['parent_id'])
                $tree[$id] = &$node;
            else
                $data[$node['parent_id']]['childs'][$node['id']] = &$node;
        }
        return $tree;
    }
    public function children()
    {
        return $this->hasMany(self::class, 'parent_id');
    }
    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }
    public function products()
    {
        return $this->hasMany(Product::class);
    }
    public function grandproducts()
    {
        return $this->hasManyThrough('App\Product', 'App\Category', 'parent_id', 'category_id', 'id');
        // return $this->hasManyThrough('App\Product', 'App\children');
    }
    public function getParentsNames($category) {
        if($this->parent) {
            if($this->title == $category->title){
                return $this->parent->getParentsNames($this).'<li class="breadcrumb-item">'.$this->title.'</li>';
            }
            else {
                return $this->parent->getParentsNames($this).'<li class="breadcrumb-item"><a href="/catalog/">'.$this->title.'</a></li>';
            }
        } else {
            return '<li class="breadcrumb-item"><a href="/catalog/'.$this->id.'">'.$this->title.'</a></li>';
        }
    }
    
    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function scopeFilter($query, $q)
    {
        if($q)
        {
            $query->where('title', 'like', '%' .$q. '%');
        }
    }

}
