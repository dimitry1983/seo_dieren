
# {{ devTranslate('inbox.Contact via website', 'Contact via website') }} <?php
 echo app(\App\Services\SettingService::class)->get('site_name');
?><br>
<br>
<br>


{!! nl2br(e($messageContent)) !!} <br>
<br>
<br>
<br>
<br>


{{ devTranslate('inbox.Bedankt', 'Bedankt') }},<br>

<?php
 echo app(\App\Services\SettingService::class)->get('site_name');
?>
