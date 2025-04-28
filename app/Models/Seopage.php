<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Seopage extends Model
{
    use HasFactory;

    protected $guarded = [];

    /**
     * Get the parent page for this SEO page.
     */
    public function parent()
    {
        return $this->belongsTo(Page::class, 'parent_page');
    }

    /**
     * Get the site that owns the SEO page.
     */
    public function site()
    {
        return $this->belongsTo(Site::class);
    }
}