<?php 

// app/Services/EmailResponderService.php

namespace App\Services;

use Illuminate\Support\Facades\Http;


class ContentService
{
    protected $openaiApiKey;

    public function __construct()
    {
        // Get OpenAI API key from the .env file
        $this->openaiApiKey = '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';       
    }

    /**
     * Respond to an email based on the category and person specialization.
     *
     * @param  string  $emailContent
     * @param  string  $category
     * @param  string  $personName
     * @return string
     */
    public function createText($command)
    {

        $command = "Geef mij meer informatie over het volgende bedrijf:

Naam: Dierenkliniek Delfland
Provincie: Noord-Holland
Stad: Den Hoorn
Adres: Tramkade 1
Postcode: 2635 BA";
        $command2 = "Geeft mij in json het volgende
CompanyInfo 
    Telephone
    Website
    Description - minimaal 300 woorden

Reviews 
   Name 
   Description
   Rating
   City - optional
   Datum

Zoek alle (echte) reviews over dit bedrijf een geef een dit ook terug in a json format zie hierboven, liefst een stuk of 5, herschrijf de description in andere woorden, wanneer je geen reviews kan vinden dan niks teruggeven.
";

$command3 = "Services 

Ons systeem heeft de volgende services
1. Vaccins
2. Accessoires
3. Consultaties
4. Ontwormen
5. Operaties
6. Spoedgevallen
7. Verkoop van medicijnen
8. Voedingsadvies

Geef in een json string aan , separated welke id's van de services bij dit bedrijf van toepassing zijn  

Categorieen 

Ons systeem heeft de volgende services
1. Honden
2. Katten
3. Overige
4. Asielen
5. Specialisten
6. Noodgevallen

Geef in een json string aan , separated welke id's van de services bij dit bedrijf van toepassing zijn ";   

 
$command4 = "
Openingstijden
  day_of_week
  open_time
  close_time
  is_closed
  notes 

ik heb iedere dag van de week nodig!

Kijk of je blogs kan vinden en herschrijf dit in eigen woorden 1 blog is prima.

Blogs
 Name 
 Excerpt
 Description //lees de title, verzin goeie h2 en h3 titels voor het artikel en maak een artikel hierover van 1200 woorden geeft het artikel terug in html
 CreatedAt";

        $command = $command.' '.$command2;    
        // Generate the email response with OpenAI and inject the template
        $response = $this->generateResponseWithOpenAI($command);

        return $response;
    }

    /**
     * Generate a response using OpenAI.
     *
     * @param  string  $emailContent
     * @param  string  $templateContent
     * @return string
     */
    protected function generateResponseWithOpenAI($command)
    {      
        // OpenAI API request
        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $this->openaiApiKey,
        ])->post('https://api.openai.com/v1/chat/completions', [
            'model' => 'gpt-3.5-turbo', 
            'messages' => [
                ['role' => 'system', 'content' => 'You are a TitleTag assistant.'],
                ['role' => 'user', 'content' => $command], // Make sure $command is set and not empty
            ],
            'max_tokens' => 1800,
            'temperature' => 0.5,
        ]);
        $response->throw();// Throw exception for non-success status codes
            
        //return $response->json()['choices'][0]['text'];
            
       
        // Extract the generated response
        $result = $response->json();
        
        return $result['choices'][0]['message']['content'] ?? 'Sorry, I couldn\'t generate a response.';
    }
}