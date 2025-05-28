<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use RalphJSmit\Laravel\SEO\Support\HasSEO;

class Page extends Model
{

    use HasFactory, SoftDeletes, HasSEO;

    protected $fillable = [
        'title',
        'site_id',
        'content',
        'excerpt',
        'blocks',
        'slug',
        'no_index',
    ];

    protected $casts = [
        'blocks' => 'array', // Automatically cast the 'blocks' field to an array when retrieved
    ];

    public function scopeActive($query){
        return $query->whereNull('deleted_at');
    }

    public function scopeForSite($query)
    {
   
        return $query->where('site_id', session('website')->id);
    }

    // You can define any other methods you need for your pages
    public static function getPage($name){
        return Page::where('slug', $name)->active()->first();
    }

    public static function getBlockInfo($pageData, $type = 'Header-big'): array
    {
       
        // Find the first block of type "Header-big"
        foreach ($pageData as $block) {
            if ($block['type'] === $type) {
                return $block['data'];
            }
        }

        // Return an empty array if no header block is found
        return [];
    }

    public static function getContentBlocks(array $pageData): array
    {
        // Decode the "blocks" JSON field
        $blocks = $pageData;

        // Filter out blocks of type "content"
        $contentBlocks = array_filter($blocks, function ($block) {
            return $block['type'] === 'content';
        });

        // Return only the "data" part of the content blocks
        return array_map(function ($block) {
            return $block['data'];
        }, $contentBlocks);
    }

    public static function getCustomPage($page){
        return Page::ForSite()->where('slug', $page)->first();
    }

    public static function getBlockByType($page, $type){
        $blocks = $page->blocks;
       
        $block = null;
        foreach ($blocks as $b){
            if ($b['type'] == $type){
                $block = $b;
                break;
            }
        }
        return $block['data'];
    }

}