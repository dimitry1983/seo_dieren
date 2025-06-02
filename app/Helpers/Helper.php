<?php

use App\Models\News;
use App\Models\Page;
use Filament\Forms;
use Filament\Forms\Form;
use Mohamedsabil83\FilamentFormsTinyeditor\Components\TinyEditor;
use Awcodes\Curator\Components\Forms\CuratorPicker;
use Filament\Forms\Components\Builder as FilamentBuilder;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Repeater;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Toggle;


if(!function_exists('domain')){
    function domain(){
        if(!empty(@$_SERVER['HTTP_X_FORWARDED_HOST'])) {
            $domain = @$_SERVER['HTTP_X_FORWARDED_HOST'];
        } else {
            if(!empty(@$_SERVER['HTTP_HOST'])) {
                $domain = $_SERVER['HTTP_HOST'];
            } else {
                return '';
            }
        }

        $domain = str_ireplace('www.', '', $domain);

        if(substr_count($domain, '.') > 1) {
            $domain = explode('.', $domain);
            return $domain[count($domain)-2] . '.' . end($domain);
        }

        return $domain;
    }
}


if(!function_exists('pr')){
    function pr($data){
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }
}

if (!function_exists('isDefaultLanguage')) {
    function isDefaultLanguage($locale)
    {
        
        return $result = $locale === config('app.fallback_locale');
    }
}

if(!function_exists('sanitize_title')){
    function  sanitize_title($title){
        $title = strtolower(str_replace(' ', '-', trim($title)));
        return preg_replace('/[^A-Za-z0-9\-]/', '', $title);
    }
}


if(!function_exists('filterOutDefaultLanguage')){
    function filterOutDefaultLanguage($url){
        $default_language = '/'.config('app.fallback_locale');
        return $url = str_replace($default_language, '', $url);     
    }
} 

if (!function_exists('isDefaultLanguage')) {
    function isDefaultLanguage($locale)
    {
        
        return $result = $locale === config('app.fallback_locale');
    }
}

if(!function_exists('decimals')){
    function decimals($amount){
        $newAmount = number_format($amount,2, ",", ".");
        return $newAmount;
    }
}

if(!function_exists('datenow')){
    function datenow() {
        return date('y-m-d H:i:s');
    }
}


if(!function_exists('CaptilizedNames')){
    function CaptilizedNames($name){
        $name=strtolower($name);
        $realname=ucwords($name);
        return $realname;
    }
}

//http://www.neowin.net/forum/topic/377801-php-how-to-br2nl/
if(!function_exists('br2nl')){
    function br2nl($str) {
        $str = preg_replace("/(\r\n|\n|\r)/", "", $str);
        return preg_replace("=<br */?>=i", "\n", $str);
    }
}

if(!function_exists('returnDayNumber')){
    function returnDayNumber($day) {
        
        $daynum = date("N", strtotime($day));

        return $daynum;
    }
}

// generate random password
if(!function_exists('generatePassword')){
    function generatePassword() {
        $sWachtwoord = '';
        $sWachtwoord .= substr ( "bcdfghjkmnpqrstvwxz", mt_rand ( 0, 18 ), 1 );
        $sWachtwoord .= substr ( "aeuy", mt_rand ( 0, 3 ), 1 );
        $sWachtwoord .= substr ( "bcdfghjkmnpqrstvwxz", mt_rand ( 0, 18 ), 1 );
        $sWachtwoord .= substr ( "abcd", mt_rand ( 0, 4 ), 1 );
        $sWachtwoord .= substr ( "bcdfghjkmnpqrstvwxz", mt_rand ( 0, 18 ), 1 );
        $sWachtwoord .= substr ( "aeuy", mt_rand ( 0, 3 ), 1 );
        $sWachtwoord .= substr ( "bcdfghjkmnpqrstvwxz", mt_rand ( 0, 18 ), 1 );
        $sWachtwoord .= substr ( "23456789", mt_rand ( 0, 7 ), 1 );
        return ($sWachtwoord);
    }
}

if(!function_exists('generatePasswordSmall')){
    function generatePasswordSmall() {
        $sWachtwoord = '';
        $sWachtwoord .= substr ( "bcdfghjkmnpqrstvwxz", mt_rand ( 0, 18 ), 1 );
        $sWachtwoord .= substr ( "aeuy", mt_rand ( 0, 3 ), 1 );
        $sWachtwoord .= substr ( "bcdfghjkmnpqrstvwxz", mt_rand ( 0, 18 ), 1 );
        $sWachtwoord .= substr ( "abcd", mt_rand ( 0, 4 ), 1 );
        return ($sWachtwoord);
    }
}


if(!function_exists('filter_url')) {
    function filter_url($value){
           $url = explode('/',$value);
           $teller = count($url);
           $check = 1;
           $nUrl='';
           if (!empty($url)):
                foreach($url as $item):
                    if ($check < $teller){
                        if ($check == 1){
                            $nUrl .= $item.'/' ;
                        }
                        else{
                            $nUrl .= $item.'/' ;
                        }
                    }
                    $check++;
                endforeach;
            endif;
        return $nUrl;
    }
}

if(!function_exists('urlExists')) {
    function urlExists($url) {
        $headers = @get_headers($url);
        return $headers !== false && strpos($headers[0], '200') !== false;
    }
}


function checkUrl($url){
    $parsedUrl = parse_url($url);
    // echo $path = $parsedUrl['path'];
    // die();
    $array = array('Hello World!', 'Goodbye Earth!', 'Lorem Ipsum');

    $substring = 'earth';
    
    foreach ($array as $string) {
        if (stristr($string, $substring) === false) {
            echo '"' . $substring . '" not found in string: ' . $string . "\n";
        } else {
            echo '"' . $substring . '" found in string: ' . $string . "\n";
        }
    }
}

if(!function_exists('getName')){
    function getName($user){
        
        $name = $user -> name;

        if (!empty($user->first_name) && !empty($user->last_name)){
            $name = $user->first_name.' '.$user->last_name;
        }

        return $name;
    }
}

if(!function_exists('convertDate')){
    function convertDate($date) {
        $date = date('d-m-Y', strtotime('+0 months', strtotime ($date)));
        return $date;
    }
}

if(!function_exists('convertDate1')){
    function convertDate1($date) {
        $date = date('d-M-Y', strtotime('+0 months', strtotime ($date)));
        return $date;
    }
}

if(!function_exists('convertDate2')){
    function convertDate2($date) {
        $date = date('Y-m-d H:i:s', strtotime('+0 months', strtotime ($date)));
        return $date;
    }
}

if(!function_exists('getAnchor')){
    function getAnchor(){

    }
}

if(!function_exists('convertColor')){
    function convertColor($color){
        $data['colororange']= '#ed9c28';
        $data['colorgreen']= '#17a08c';
        $data['colorblue']= '#29406f';
        $data['colorlightblue']= '#028af3';
        $data['colorpurple']= '#bd70ee';
        $data['coloryellow']= '#e6e85d';
        return $data[$color];
    }
}

if(!function_exists('convertDateForDB')){
    function convertDateForDB($date) {
        $date = explode('00',$date);
        $tempdate = explode('-',$date[0]);
        return trim($tempdate[2]).'-'.$tempdate[1].'-'.$tempdate[0];
    }
}

if(!function_exists('convertDateForDBslash')){
    function convertDateForDBslash($date) {
        $date = explode('/', $date);
        return trim($date[2]) .'-'. trim($date[0]) .'-'. trim($date[1]) .' 00:00:00';
    }
}

/*
 * roel: insert part and total return percent
 */
function procent($part, $total){
    $value = (($part / $total) * 100);
    return $value == 0 ? 100 : $value;

}

function dateDiff($start, $end) {
    $start_ts = strtotime($start);
    $end_ts = strtotime($end);
    $diff = $end_ts - $start_ts;
    return  round($diff / 86400);
}

function makeSlug($name) {
    // Turn names such as "It's wrinkled!" into slugs such as "its-wrinkled"
    $slug = strtolower ( $name ); // Make the string lowercase
    $slug = str_replace ( '\'', '', $slug ); // Take out apostraphes. CakePHP takes care of escaping strings before putting them into SQL queries. This is purely for aesthetic purposes - changing "that-s-cool" into "thats-cool"
    $slug = @ereg_replace ( '[^[:alnum:]]+', '-', $slug ); // Turn any group of non-alphanumerics into a single hyphen
    $slug = trim ( $slug, '-' ); // Remove unnecessary hyphens from beginning and end
    return $slug;
}

function slugify($text){
    $text = mb_strtolower($text, 'UTF-8');
    $text = htmlentities($text, ENT_QUOTES, 'UTF-8');
    $pattern = array (
        '/&agrave;/' => 'a',
        '/&egrave;/' => 'e',
        '/&igrave;/' => 'i',
        '/&ograve;/' => 'o',
        '/&ugrave;/' => 'u',
        '/&aacute;/' => 'a',
        '/&eacute;/' => 'e',
        '/&iacute;/' => 'i',
        '/&oacute;/' => 'o',
        '/&uacute;/' => 'u',
        '/&acirc;/' => 'a',
        '/&ecirc;/' => 'e',
        '/&icirc;/' => 'i',
        '/&ocirc;/' => 'o',
        '/&ucirc;/' => 'u',
        '/&atilde;/' => 'a',
        '/&etilde;/' => 'e',
        '/&itilde;/' => 'i',
        '/&otilde;/' => 'o',
        '/&utilde;/' => 'u',
        '/&auml;/' => 'a',
        '/&euml;/' => 'e',
        '/&iuml;/' => 'i',
        '/&ouml;/' => 'o',
        '/&uuml;/' => 'u',
        '/&auml;/' => 'a',
        '/&euml;/' => 'e',
        '/&iuml;/' => 'i',
        '/&ouml;/' => 'o',
        '/&uuml;/' => 'u',
        '/&aring;/' => 'a',
        '/&ntilde;/' => 'n',
        '/&ldquo/' => '',
        '/&rdquo/' => '',
        '/&lsquo/' => '',
        '/&rsquo/' => '',
        '/&iquest/' => '',
        '/&iexcl/' => '',
        '/&apos;/' => '',
        '/&amp;/' => '',
        '/&#039;/' => ''
    );
    $text = preg_replace(array_keys($pattern), array_values($pattern), $text);
    $text = preg_replace('/[¿!¡;,:\.\?*=+#@%()"]/', '', trim($text));
    $text = str_replace(' - ', '-', $text);
    $text = str_replace(' ', '-', $text);
    $text = str_replace ( '/', '-', $text ); 
    $text = str_replace('--', '-', $text);
    return strtolower($text);
}

function returnPost($data){

    $POST = array();
    if (!empty($data)):
        foreach($data as $item){
                $POST[$item['name']] = $item['value'];
        }
    endif;
    return $POST;
}

function returnPost1($data){

    $POST = array();
    if (!empty($data)):
        foreach($data as $item){
            $POST[] = $item['value'];
        }
    endif;
    return $POST;
}

function IsGooglebot()
{
    $ua = isset($_SERVER['HTTP_USER_AGENT']) ? $_SERVER['HTTP_USER_AGENT'] : '';
    $ip = $_SERVER['REMOTE_ADDR'];
    $hostname = @gethostbyaddr($ip);

    if(stristr($ua, 'googlebot'))
    {
        if(substr($hostname,-13) != 'googlebot.com')
        {
            return false;
        }
        else
        {
            $real_ip = gethostbyname($hostname);

            if($ip != $real_ip)
            {
                return false;
            }
            else
            {
                // het is de googlebot
                return true;
            }
        }

    }
    elseif(preg_match("/\.google\.[a-z]{2,4}/i", $hostname))
    {
        $real_ip = gethostbyname($hostname);

        if($ip != $real_ip)
        {
            return false;
        }
        else
        {
            // google handmatige controle
            return true;
        }
    }
    elseif($ip == '91.189.225.22')
    {
        // admin
        //return true;
    }

    return false;
}


function returnDays($data){
    $days = [
        '1' => 'maandag',
        '2' => 'dinsdag',
        '3' => 'woensdag',
        '4' => 'donderdag',
        '5' => 'vrijdag',
        '6' => 'zaterdag',
        '0' => 'zondag',
    ];

    return $days[$data];
}

if (!function_exists('render_stars')) {
    function render_stars($rating, $maxStars = 5)
    {
        $html = '<span class="rating  text-yellow-500 text-xs">';
        $fullStars = floor($rating);
        $halfStar = ($rating - $fullStars >= 0.5) ? 1 : 0;
        $emptyStars = $maxStars - $fullStars - $halfStar;

        for ($i = 0; $i < $fullStars; $i++) {
            $html .= '<i class="fa-solid fa-star"></i> ';
        }

        if ($halfStar) {
            $html .= '<i class="fa-solid fa-star-half-stroke"></i> ';
        }

        for ($i = 0; $i < $emptyStars; $i++) {
            $html .= '<i class="fa-regular fa-star"></i> ';
        }

        $html .= '</span>';

        return $html;
    }
}


function timeago($date) {
    date_default_timezone_set(config('app.timezone'));
    $timestamp = strtotime($date);
    $strTime = array('s', 'm', 'h', 'd', 'mo', 'y');
    $length = array('60', '60', '24', '30', '12', '10');

    $currentTime = time();
    if($currentTime >= $timestamp) {
        $diff     = time()- $timestamp;
        for($i = 0; $diff >= $length[$i] && $i < count($length)-1; $i++) {
            $diff = $diff / $length[$i];
        }

        $diff = round($diff);
        return $diff . $strTime[$i];
    }
}

function getNormalImage($img){
    return  $cleanPath = str_replace(['\\', '/100x100/'], ['/', '/'], $img);
}

// function getNavigation(){

  
//     //Get all the Navigations
//     $navigations = Navigation::remember(60 * 60 * 24)->get();

//     $navs = array();

//     if(!empty($navigations)){
//         foreach($navigations as $navigation){
//             $navs[$navigation->slug] = $navigation->content;

//             // Resolve main child menu
//             if($navigation->slug == 'main-menu'){
//                 $domain = resolveChildDomain();
//                 $category = Category::remember(60 * 60 * 24)->where('domain', $domain)->first();
//                 if(!empty($category)){
//                     $category = $category->toArray();
//                     if(!empty($category['navigation'])){
//                         $_navigation = Navigation::find($category['navigation']);
//                         if(!empty($_navigation)){
//                             $navs[$navigation->slug] = $_navigation->content;
//                         }
//                     }
//                 }
//             }
//             //dynamic menu subdomain
//             $category = Session::get('category');
//             if (!empty($category)){
//                 if ($category['navigation_footer_1'] > 0){
//                     $navs['footer-menu-1'] = Navigation::find($category['navigation_footer_1'])->content;
//                 }
//                 if ($category['navigation_footer_2'] > 0){
//                     $navs['footer-menu-2'] = Navigation::find($category['navigation_footer_2'])->content;
//                 }
//             }
//         }
//     }
//     return $navs;
// }


// Page Builder Schema
function getPageBuilderSchema(){
    $iconOptions = iconOptions();
    $schema = [
        // Header block
        FilamentBuilder\Block::make('Header_big')
        ->schema([
            FileUpload::make('background_image'),
            TextInput::make('title'),
            Textarea::make('description'),
            TextInput::make('cta_title'),
            TextInput::make('cta_url1'),
            TextInput::make('cta_title1'),
            TextInput::make('cta_url2'),
            TextInput::make('cta_title2'),
            TextInput::make('cta_url3'),
            TextInput::make('cta_title3'),
        ]),

      FilamentBuilder\Block::make('intro')
        ->schema([
            FileUpload::make('image_left'),
            TextInput::make('title'),
            RichEditor::make('description'),
            Repeater::make('insurance')
                ->schema([
                    TextInput::make('advantages'),
                ]),
            TextInput::make('cta_url'),
            TextInput::make('cta_title'),    
        ]),

        FilamentBuilder\Block::make('insurances')
            ->schema([
                TextInput::make('title'),
                RichEditor::make('description'),
                Repeater::make('insurance')
                ->schema([
                        FileUpload::make('image'),
                        TextInput::make('title'),
                        TextInput::make('rating'),
                        RichEditor::make('description'),
                        Repeater::make('insurance')
                            ->schema([
                                TextInput::make('title'),
                                TextInput::make('text'),
                                TextInput::make('price'),
                            ]),
                        TextInput::make('cta_url1'),
                        TextInput::make('cta_title1'),
                        TextInput::make('cta_url2'),
                        TextInput::make('cta_title2'),
                    ])
            ]),

            FilamentBuilder\Block::make('information_steps')
                ->schema([
                    TextInput::make('title'),
                    Repeater::make('info_steps')
                        ->schema([
                            TextInput::make('title'),
                            RichEditor::make('description'),
                        ]),    
                ]),

            FilamentBuilder\Block::make('partners')
                 ->schema([
                    TextInput::make('title'),
                    Repeater::make('info_steps')
                        ->schema([
                            FileUpload::make('image'),
                            TextInput::make('url'),   
                        ]),
                ]),

            FilamentBuilder\Block::make('seo_block')
                 ->schema([
                    TextInput::make('title'),
                    select::make('flex_pages')->multiple()->options( function () { 
                        $siteId = session('website')?->id;

                if (!$siteId) {
                    return [];
                }

                return Page::where('site_id', $siteId)
                    ->pluck('title', 'id') // Assuming `slug` is the key, and `title` is the label
                    ->toArray(); })->label(devTranslate('Selecteer pagina\'s', 'Selecteer pagina\'s')),
                ]),


            FilamentBuilder\Block::make('intro_flex')
                ->schema([
                    TextInput::make('title'),
                    RichEditor::make('description'),
                ]),        

            FilamentBuilder\Block::make('insurances_flex')
                ->schema([
                    TextInput::make('title'),
                    RichEditor::make('description'),
                    Repeater::make('insurance')
                    ->schema([
                            FileUpload::make('image'),
                            TextInput::make('title'),
                            TextInput::make('rating'),
                            RichEditor::make('description'),
                            Repeater::make('insurance')
                                ->schema([
                                    TextInput::make('usp'),
                                ]),
                            Repeater::make('insurance')
                                ->schema([
                                    TextInput::make('title'),
                                    TextInput::make('text'),
                                    TextInput::make('price'),
                                ]),
                            TextInput::make('cta_url1'),
                            TextInput::make('cta_title1'),
                            TextInput::make('cta_url2'),
                            TextInput::make('cta_title2'),
                        ])
                ]),

            FilamentBuilder\Block::make('information_steps_flex')
                ->schema([
                    TextInput::make('title'),
                    Repeater::make('info_steps')
                        ->schema([
                            TextInput::make('title'),
                            RichEditor::make('description'),
                        ]),    
                ]),

          FilamentBuilder\Block::make('seo_text_flex')
                ->schema([
                    FileUpload::make('image_left'),
                    TextInput::make('title'),
                    RichEditor::make('description'),
                    Repeater::make('insurance')
                        ->schema([
                            TextInput::make('advantages'),
                        ]),
                    TextInput::make('cta_url'),
                    TextInput::make('cta_title'),    
                ]),


        FilamentBuilder\Block::make('faq_flex')
                ->schema([
                    TextInput::make('big_title'),
                    Repeater::make('faq')
                        ->schema([
                            TextInput::make('question'),
                            RichEditor::make('answer'),
                        ]),    
                ]),

        FilamentBuilder\Block::make('header_blog')
            ->schema([
                FileUpload::make('background_image'),
            ]),
        FilamentBuilder\Block::make('header_blog_detail')
            ->schema([
                FileUpload::make('background_image'),
            ]),
        FilamentBuilder\Block::make('header_contact')
            ->schema([
                FileUpload::make('background_image'),
            ]),
        FilamentBuilder\Block::make('header_over_ons')
            ->schema([
                FileUpload::make('background_image'),
            ]),    
      FilamentBuilder\Block::make('intro_over_ons')
        ->schema([
            FileUpload::make('image_left'),
            TextInput::make('title'),
            RichEditor::make('description'),
            Repeater::make('insurance')
                ->schema([
                    TextInput::make('advantages'),
                ]),
            TextInput::make('cta_url'),
            TextInput::make('cta_title'),    
        ]),
        FilamentBuilder\Block::make('intro_over_ons_block_2')
            ->schema([
                FileUpload::make('image_left'),
                TextInput::make('title'),
                RichEditor::make('description'),
                Repeater::make('insurance')
                    ->schema([
                        TextInput::make('advantages'),
                    ]),
                TextInput::make('cta_url'),
                TextInput::make('cta_title'),    
            ]),
        FilamentBuilder\Block::make('information_steps_over_ons')
                ->schema([
                    TextInput::make('title'),
                    Repeater::make('info_steps')
                        ->schema([
                            TextInput::make('title'),
                            RichEditor::make('description'),
                        ]),    
                ]),    
    ];

    return $schema;
}

if (!function_exists('devTranslate')) {
    function devTranslate($key, $default = null, $replace = []) {
        if (app()->environment('local') || app()->environment('production') || app()->environment('staging')) {
            return __($default, $replace)  ?? __($key, $replace);
        }

        // Perform the translation with replacement values
        return __($key, $replace);
    }
}

if (!function_exists('iconOptions')) {
    function iconOptions(){
        return $iconOptions = [
            'fa-solid fa-star' => 'Star',
            'fa-solid fa-heart' => 'Heart',
            'fa-solid fa-user' => 'User',
            'fa-solid fa-camera' => 'Camera',
            'fa-solid fa-car' => 'Car',
            'fa-solid fa-envelope' => 'Envelope',
            'fa-solid fa-cog' => 'Settings',
            'fa-solid fa-check' => 'Check',
            'fa-solid fa-times' => 'Close',
            'fa-solid fa-home' => 'Home',
            'fa-solid fa-file' => 'File',
            'fa-solid fa-folder' => 'Folder',
            'fa-solid fa-trash' => 'Trash',
            'fa-solid fa-edit' => 'Edit',
            'fa-solid fa-lock' => 'Lock',
            'fa-solid fa-unlock' => 'Unlock',
            'fa-solid fa-cloud' => 'Cloud',
            'fa-solid fa-shopping-cart' => 'Shopping Cart',
            'fa-solid fa-globe' => 'Globe',
            'fa-solid fa-phone' => 'Phone',
            'fa-solid fa-map-marker' => 'Map Marker',
            'fa-regular fa-star' => 'Star (Regular)',
            'fa-regular fa-heart' => 'Heart (Regular)',
            'fa-light fa-star' => 'Star (Light)',
            'fa-light fa-heart' => 'Heart (Light)',
            'fa-light fa-venus-mars' => 'Man Girl (Light)',
            'fa-light fa-users' => 'Users (Light)',
            'fa-light fa-rectangle-ad' => 'Rectangle ads (Light)',
            'fa-duotone fa-star' => 'Star (Duotone)',
            'fa-duotone fa-heart' => 'Heart (Duotone)',
            'fa-brands fa-github' => 'GitHub',
            'fa-brands fa-facebook' => 'Facebook',
            'fa-brands fa-twitter' => 'Twitter',
            'fa-brands fa-linkedin' => 'LinkedIn',
            'fa-brands fa-instagram' => 'Instagram',
            'fa-brands fa-youtube' => 'YouTube',
            'fa-brands fa-whatsapp' => 'WhatsApp',
            'fa-solid fa-calendar' => 'Calendar',
            'fa-solid fa-bell' => 'Bell',
            'fa-solid fa-paper-plane' => 'Paper Plane',
            'fa-solid fa-book' => 'Book',
            'fa-solid fa-play' => 'Play',
            'fa-solid fa-pause' => 'Pause',
            'fa-solid fa-stop' => 'Stop',
            'fa-solid fa-forward' => 'Forward',
            'fa-solid fa-backward' => 'Backward',
            'fa-solid fa-volume-up' => 'Volume Up',
            'fa-solid fa-volume-mute' => 'Mute',
            'fa-solid fa-search' => 'Search',
            'fa-solid fa-plus' => 'Add',
            'fa-solid fa-minus' => 'Minus',
            'fa-solid fa-arrow-up' => 'Arrow Up',
            'fa-solid fa-arrow-down' => 'Arrow Down',
            'fa-solid fa-arrow-left' => 'Arrow Left',
            'fa-solid fa-arrow-right' => 'Arrow Right',
            'fa-solid fa-info-circle' => 'Info',
            'fa-solid fa-question-circle' => 'Help',
            'fa-solid fa-exclamation-circle' => 'Warning',
        ];
    }
}