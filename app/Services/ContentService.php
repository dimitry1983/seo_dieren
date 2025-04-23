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

        $response = $this->generateResponseWithOpenAI($command);

        // Retry once after 1 second if response is empty or null
        if (empty($response)) {
            sleep(1);
            $response = $this->generateResponseWithOpenAI($command);
        }
        
       
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
        try {
            $response = Http::withHeaders([
                'Authorization' => 'Bearer ' . $this->openaiApiKey,
            ])->post('https://api.openai.com/v1/chat/completions', [
                'model' => 'gpt-3.5-turbo',
                'messages' => [
                    ['role' => 'system', 'content' => 'You are a TitleTag assistant.'],
                    ['role' => 'user', 'content' => $command],
                ],
                'max_tokens' => 1800,
                'temperature' => 0.5,
            ]);
          
            $response->throw(); // Throws exception if status code is not 2xx
    
            $result = $response->json();

            return $result['choices'][0]['message']['content'] ?? 'Sorry, I couldn\'t generate a response.';
    
        } catch (\Illuminate\Http\Client\RequestException $e) {
            // Dump the full response body and status
            dd([
                'message' => $e->getMessage(),
                'status' => $e->response->status(),
                'body' => $e->response->body(),
            ]);
        } catch (\Exception $e) {
            dd([
                'message' => $e->getMessage(),
            ]);
        }
    }
}