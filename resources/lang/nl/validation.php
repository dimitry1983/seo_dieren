<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Validatie Taalregels
    |--------------------------------------------------------------------------
    |
    | De volgende taalregels bevatten de standaard foutmeldingen die door
    | de validator worden gebruikt. Sommige van deze regels hebben meerdere
    | versies, zoals de grootte regels. Pas deze berichten gerust aan.
    |
    */

    'accepted' => 'Het veld :attribute moet geaccepteerd worden.',
    'accepted_if' => 'Het veld :attribute moet geaccepteerd worden wanneer :other is :value.',
    'active_url' => 'Het veld :attribute moet een geldige URL zijn.',
    'after' => 'Het veld :attribute moet een datum na :date zijn.',
    'after_or_equal' => 'Het veld :attribute moet een datum na of gelijk aan :date zijn.',
    'alpha' => 'Het veld :attribute mag alleen letters bevatten.',
    'alpha_dash' => 'Het veld :attribute mag alleen letters, cijfers, streepjes en underscores bevatten.',
    'alpha_num' => 'Het veld :attribute mag alleen letters en cijfers bevatten.',
    'array' => 'Het veld :attribute moet een array zijn.',
    'ascii' => 'Het veld :attribute mag alleen enkel-byte alfanumerieke tekens en symbolen bevatten.',
    'before' => 'Het veld :attribute moet een datum voor :date zijn.',
    'before_or_equal' => 'Het veld :attribute moet een datum voor of gelijk aan :date zijn.',
    'between' => [
        'array' => 'Het veld :attribute moet tussen :min en :max items bevatten.',
        'file' => 'Het veld :attribute moet tussen :min en :max kilobytes groot zijn.',
        'numeric' => 'Het veld :attribute moet tussen :min en :max liggen.',
        'string' => 'Het veld :attribute moet tussen :min en :max tekens bevatten.',
    ],
    'boolean' => 'Het veld :attribute moet true of false zijn.',
    'can' => 'Het veld :attribute bevat een ongeautoriseerde waarde.',
    'confirmed' => 'De bevestiging van het veld :attribute komt niet overeen.',
    'contains' => 'Het veld :attribute mist een vereiste waarde.',
    'current_password' => 'Het wachtwoord is onjuist.',
    'date' => 'Het veld :attribute moet een geldige datum zijn.',
    'date_equals' => 'Het veld :attribute moet een datum gelijk aan :date zijn.',
    'date_format' => 'Het veld :attribute moet overeenkomen met het formaat :format.',
    'decimal' => 'Het veld :attribute moet :decimal decimalen bevatten.',
    'declined' => 'Het veld :attribute moet geweigerd worden.',
    'declined_if' => 'Het veld :attribute moet geweigerd worden wanneer :other is :value.',
    'different' => 'Het veld :attribute en :other moeten verschillend zijn.',
    'digits' => 'Het veld :attribute moet :digits cijfers bevatten.',
    'digits_between' => 'Het veld :attribute moet tussen :min en :max cijfers bevatten.',
    'dimensions' => 'Het veld :attribute heeft ongeldige afbeeldingsafmetingen.',
    'distinct' => 'Het veld :attribute heeft een dubbele waarde.',
    'doesnt_end_with' => 'Het veld :attribute mag niet eindigen met een van de volgende: :values.',
    'doesnt_start_with' => 'Het veld :attribute mag niet beginnen met een van de volgende: :values.',
    'email' => 'Het veld :attribute moet een geldig e-mailadres zijn.',
    'ends_with' => 'Het veld :attribute moet eindigen met een van de volgende: :values.',
    'enum' => 'De geselecteerde :attribute is ongeldig.',
    'exists' => 'De geselecteerde :attribute is ongeldig.',
    'extensions' => 'Het veld :attribute moet een van de volgende extensies hebben: :values.',
    'file' => 'Het veld :attribute moet een bestand zijn.',
    'filled' => 'Het veld :attribute moet een waarde hebben.',
    'gt' => [
        'array' => 'Het veld :attribute moet meer dan :value items bevatten.',
        'file' => 'Het veld :attribute moet groter zijn dan :value kilobytes.',
        'numeric' => 'Het veld :attribute moet groter zijn dan :value.',
        'string' => 'Het veld :attribute moet meer dan :value tekens bevatten.',
    ],
    'gte' => [
        'array' => 'Het veld :attribute moet :value items of meer bevatten.',
        'file' => 'Het veld :attribute moet groter dan of gelijk aan :value kilobytes zijn.',
        'numeric' => 'Het veld :attribute moet groter dan of gelijk aan :value zijn.',
        'string' => 'Het veld :attribute moet groter dan of gelijk aan :value tekens bevatten.',
    ],
    'hex_color' => 'Het veld :attribute moet een geldige hexadecimale kleur zijn.',
    'image' => 'Het veld :attribute moet een afbeelding zijn.',
    'in' => 'De geselecteerde :attribute is ongeldig.',
    'in_array' => 'Het veld :attribute moet bestaan in :other.',
    'integer' => 'Het veld :attribute moet een geheel getal zijn.',
    'ip' => 'Het veld :attribute moet een geldig IP-adres zijn.',
    'ipv4' => 'Het veld :attribute moet een geldig IPv4-adres zijn.',
    'ipv6' => 'Het veld :attribute moet een geldig IPv6-adres zijn.',
    'json' => 'Het veld :attribute moet een geldig JSON-tekenreeks zijn.',
    'list' => 'Het veld :attribute moet een lijst zijn.',
    'lowercase' => 'Het veld :attribute moet in kleine letters zijn.',
    'lt' => [
        'array' => 'Het veld :attribute moet minder dan :value items bevatten.',
        'file' => 'Het veld :attribute moet minder dan :value kilobytes groot zijn.',
        'numeric' => 'Het veld :attribute moet kleiner zijn dan :value.',
        'string' => 'Het veld :attribute moet minder dan :value tekens bevatten.',
    ],
    'lte' => [
        'array' => 'Het veld :attribute mag niet meer dan :value items bevatten.',
        'file' => 'Het veld :attribute mag niet groter dan of gelijk zijn aan :value kilobytes.',
        'numeric' => 'Het veld :attribute mag niet groter zijn dan :value.',
        'string' => 'Het veld :attribute mag niet meer dan :value tekens bevatten.',
    ],
    'mac_address' => 'Het veld :attribute moet een geldig MAC-adres zijn.',
    'max' => [
        'array' => 'Het veld :attribute mag niet meer dan :max items bevatten.',
        'file' => 'Het veld :attribute mag niet groter zijn dan :max kilobytes.',
        'numeric' => 'Het veld :attribute mag niet groter zijn dan :max.',
        'string' => 'Het veld :attribute mag niet meer dan :max tekens bevatten.',
    ],
    'max_digits' => 'Het veld :attribute mag niet meer dan :max cijfers bevatten.',
    'mimes' => 'Het veld :attribute moet een bestand van het type: :values zijn.',
    'mimetypes' => 'Het veld :attribute moet een bestand van het type: :values zijn.',
    'min' => [
        'array' => 'Het veld :attribute moet minstens :min items bevatten.',
        'file' => 'Het veld :attribute moet minstens :min kilobytes groot zijn.',
        'numeric' => 'Het veld :attribute moet minstens :min zijn.',
        'string' => 'Het veld :attribute moet minstens :min tekens bevatten.',
    ],
    'min_digits' => 'Het veld :attribute moet minstens :min cijfers bevatten.',
    'missing' => 'Het veld :attribute moet ontbreken.',
    'missing_if' => 'Het veld :attribute moet ontbreken wanneer :other is :value.',
    'missing_unless' => 'Het veld :attribute moet ontbreken tenzij :other is :value.',
    'missing_with' => 'Het veld :attribute moet ontbreken wanneer :values aanwezig zijn.',
    'missing_with_all' => 'Het veld :attribute moet ontbreken wanneer :values aanwezig zijn.',
    'multiple_of' => 'Het veld :attribute moet een veelvoud van :value zijn.',
    'not_in' => 'De geselecteerde :attribute is ongeldig.',
    'not_regex' => 'Het formaat van het veld :attribute is ongeldig.',
    'numeric' => 'Het veld :attribute moet een getal zijn.',
    'password' => [
        'letters' => 'Het veld :attribute moet minstens één letter bevatten.',
        'mixed' => 'Het veld :attribute moet zowel een hoofdletter als een kleine letter bevatten.',
        'numbers' => 'Het veld :attribute moet minstens één cijfer bevatten.',
        'symbols' => 'Het veld :attribute moet minstens één symbool bevatten.',
        'uncompromised' => 'Het opgegeven :attribute is eerder gelekt. Kies een ander :attribute.',
    ],
    'present' => 'Het veld :attribute moet aanwezig zijn.',
    'present_if' => 'Het veld :attribute moet aanwezig zijn wanneer :other is :value.',
    'present_unless' => 'Het veld :attribute moet aanwezig zijn tenzij :other is :value.',
    'present_with' => 'Het veld :attribute moet aanwezig zijn wanneer :values aanwezig zijn.',
    'present_with_all' => 'Het veld :attribute moet aanwezig zijn wanneer :values aanwezig zijn.',
    'prohibited' => 'Het veld :attribute is verboden.',
    'prohibited_if' => 'Het veld :attribute is verboden wanneer :other is :value.',
    'prohibited_if_accepted' => 'Het veld :attribute is verboden wanneer :other is geaccepteerd.',
    'prohibited_if_declined' => 'Het veld :attribute is verboden wanneer :other is afgewezen.',
    'prohibited_unless' => 'Het veld :attribute is verboden tenzij :other in :values is.',
    'prohibits' => 'Het veld :attribute voorkomt dat :other aanwezig is.',
    'regex' => 'Het formaat van het veld :attribute is ongeldig.',
    'required' => 'Het veld :attribute is verplicht.',
    'required_array_keys' => 'Het veld :attribute moet de volgende items bevatten: :values.',
    'required_if' => 'Het veld :attribute is verplicht wanneer :other is :value.',
    'required_if_accepted' => 'Het veld :attribute is verplicht wanneer :other is geaccepteerd.',
    'required_if_declined' => 'Het veld :attribute is verplicht wanneer :other is afgewezen.',
    'required_unless' => 'Het veld :attribute is verplicht tenzij :other in :values is.',
    'required_with' => 'Het veld :attribute is verplicht wanneer :values aanwezig zijn.',
    'required_with_all' => 'Het veld :attribute is verplicht wanneer :values aanwezig zijn.',
    'required_without' => 'Het veld :attribute is verplicht wanneer :values niet aanwezig zijn.',
    'required_without_all' => 'Het veld :attribute is verplicht wanneer geen van :values aanwezig is.',
    'same' => 'Het veld :attribute moet overeenkomen met :other.',
    'size' => [
        'array' => 'Het veld :attribute moet :size items bevatten.',
        'file' => 'Het veld :attribute moet :size kilobytes groot zijn.',
        'numeric' => 'Het veld :attribute moet :size zijn.',
        'string' => 'Het veld :attribute moet :size tekens bevatten.',
    ],
    'starts_with' => 'Het veld :attribute moet beginnen met een van de volgende: :values.',
    'string' => 'Het veld :attribute moet een string zijn.',
    'timezone' => 'Het veld :attribute moet een geldige tijdzone zijn.',
    'unique' => 'Het veld :attribute is al in gebruik.',
    'uploaded' => 'Het veld :attribute is niet geüpload.',
    'uppercase' => 'Het veld :attribute moet in hoofdletters zijn.',
    'url' => 'Het veld :attribute moet een geldige URL zijn.',
    'ulid' => 'Het veld :attribute moet een geldige ULID zijn.',
    'uuid' => 'Het veld :attribute moet een geldig UUID zijn.',

    /*
    |--------------------------------------------------------------------------
    | Aangepaste Validatie Taalregels
    |--------------------------------------------------------------------------
    |
    | Hier kun je aangepaste validatiemeldingen voor velden opgeven door
    | de conventie "attribuut.regel" te gebruiken om de regels te benoemen.
    | Dit maakt het snel om een specifieke aangepaste taalregel voor een veldregel
    | op te geven.
    |
    */

    'custom' => [
        'attribute-name' => [
            'rule-name' => 'aangepaste-bericht',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Aangepaste Validatie Attributen
    |--------------------------------------------------------------------------
    |
    | De volgende taalregels worden gebruikt om onze placeholder voor attributen
    | te vervangen door iets meer leesbaars zoals "E-mailadres" in plaats van "email".
    | Dit helpt ons de berichten expressiever te maken.
    |
    */

    'attributes' => [],
];
