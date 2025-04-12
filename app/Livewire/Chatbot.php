<?php

namespace App\Livewire;

use Livewire\Component;
use OpenAI\Laravel\Facades\OpenAI;
use Meilisearch\Client as MeilisearchClient;

class Chatbot extends Component
{
    public string $message = '';
    public array $conversation = [];
    public bool $isTyping = false; // To indicate when the chatbot is generating a response
    protected ?MeilisearchClient $meilisearch = null;

    public function mount()
    {
        if (config('services.meilisearch.host') && config('services.meilisearch.key')) {
            $this->meilisearch = new MeilisearchClient(
                config('services.meilisearch.host'),
                config('services.meilisearch.key')
            );
        }
    }

    public function sendMessage()
    {
        if (empty($this->message)) {
            return;
        }

        $userMessage = trim($this->message);
        $this->conversation[] = ['user' => $userMessage];
        $this->message = '';
        $this->isTyping = true;

        // Process the user message and get a response from OpenAI (with optional Meilisearch context)
        $this->getChatbotResponse($userMessage);
    }

    protected function getChatbotResponse(string $userMessage): void
    {
        $context = '';
        if ($this->meilisearch) {
            try {
                $searchResults = $this->meilisearch->index('your_knowledge_base')->search($userMessage)->get()['hits'];
                foreach ($searchResults as $result) {
                    $context .= $result['content'] . "\n\n"; // Adjust based on your data structure
                }
            } catch (\Exception $e) {
                // Log the error or handle it as needed
                Log::error('Meilisearch Error: ' . $e->getMessage());
            }
        }

        $prompt = "Context:\n" . $context . "\nUser: " . $userMessage;

        try {
            $response = OpenAI::chat()->create([
                'model' => 'gpt-3.5-turbo', // Or your preferred model
                'messages' => [
                    ['role' => 'system', 'content' => 'You are a helpful chatbot for Karis Boutique. Use the provided context if relevant to answer the user\'s question.'],
                    ['role' => 'user', 'content' => $prompt],
                ],
                'stream' => true, // Enable streaming for a better user experience
            ]);

            $fullResponse = '';
            foreach ($response as $chunk) {
                $content = $chunk->choices[0]->delta->content;
                if ($content !== null) {
                    $fullResponse .= $content;
                    $this->dispatch('update-chatbot-response', $fullResponse); // Emit an event to update the UI in real-time
                }
            }

            $this->conversation[] = ['chatbot' => $fullResponse];
        } catch (\Exception $e) {
            $this->conversation[] = ['chatbot' => 'Sorry, there was an error processing your request. Please try again later.'];
            \Log::error('OpenAI Error: ' . $e->getMessage());
        } finally {
            $this->isTyping = false;
            $this->dispatch('chatbot-finished-typing'); // Indicate that the chatbot has finished
        }
    }

    public function render()
    {
        return view('livewire.chatbot');
    }
}