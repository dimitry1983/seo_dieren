<?xml version="1.0" encoding="UTF-8"?>
<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">
    @if (!empty($veterinaires)) 
        @foreach ($veterinaires as $item )
            <url>
                <loc>{{route('profile', ['slug' => slugify($item->name) , 'id' => $item->id])}}</loc>
                <lastmod><?php echo $lastmod = date("Y-m-d\Th:m:s+00:00"); ?></lastmod>
                <changefreq>weekly</changefreq>
                <priority>0.9</priority>
            </url>
        @endforeach
    @endif
    
    @if (!empty($blogs)) 
        @foreach ($blogs as $item1 )
            <url>
                <loc>{{ route('blog.detail', [ 'slug' => slugify($item1->name) , 'id' => $item1->id ]) }}</loc>
                <lastmod><?php echo $lastmod = date("Y-m-d\Th:m:s+00:00"); ?></lastmod>
                <changefreq>weekly</changefreq>
                <priority>0.9</priority>
            </url>
        @endforeach
    @endif 
    
    <url>
        <loc>https://www.vergelijkdierenarts.nl</loc>
        <lastmod><?php echo $lastmod = date("Y-m-d\Th:m:s+00:00"); ?></lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.9</priority>
    </url>


    <url>
        <loc>https://www.vergelijkdierenarts.nl/overzicht</loc>
        <lastmod><?php echo $lastmod = date("Y-m-d\Th:m:s+00:00"); ?></lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.9</priority>
    </url>

    <url>
        <loc>https://www.vergelijkdierenarts.nl/blog</loc>
        <lastmod><?php echo $lastmod = date("Y-m-d\Th:m:s+00:00"); ?></lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.9</priority>
    </url>

    <url>
        <loc>https://www.vergelijkdierenarts.nl/over-ons</loc>
        <lastmod><?php echo $lastmod = date("Y-m-d\Th:m:s+00:00"); ?></lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.9</priority>
    </url>

    <url>
        <loc>https://www.vergelijkdierenarts.nl/contact</loc>
        <lastmod><?php echo $lastmod = date("Y-m-d\Th:m:s+00:00"); ?></lastmod>
        <changefreq>weekly</changefreq>
        <priority>0.9</priority>
    </url>

</urlset> 