<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;

class OpenAIController extends Controller
{
    public function generateText(Request $request)
    {
        // Get the prompt input from the request
        $prompt = $request->input('prompt', 'Your prompt here');

        // Initialize the Guzzle client
        $client = new Client();
        
        // Hugging Face GPT-2 model endpoint
        $url = "https://api-inference.huggingface.co/models/gpt2"; 

        try {
            // Make the POST request to Hugging Face API
            $response = $client->post($url, [
                'headers' => [
                    'Authorization' => 'Bearer ' . env('HUGGING_FACE_API_KEY'), // Correct format for Authorization header
                    'Content-Type' => 'application/json', // Ensure it's sent as JSON
                ],
                'json' => [
                    'inputs' => $prompt, // The prompt to send to the model
                    'parameters' => [
                        'max_length' => 50, // Set the max length for the generated text
                    ],
                ],
            ]);

            // Decode the response
            $data = json_decode($response->getBody()->getContents(), true);

            // Return the generated text as JSON response
            return response()->json(['generated_text' => $data[0]['generated_text'] ?? '']);
        } catch (\Exception $e) {
            // Handle any errors
            return response()->json(['error' => 'Failed to generate text: ' . $e->getMessage()], 500);
        }
    }
}
