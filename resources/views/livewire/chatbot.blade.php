<div class="fixed bottom-4 right-4 z-50" x-data="{ open: false }">
    <!-- Toggle Button (Icon) -->
    <button @click="open = !open" class="bg-blue-500 hover:bg-blue-700 text-white rounded-full w-12 h-12 flex items-center justify-center shadow-lg focus:outline-none focus:ring-2 focus:ring-blue-400">
        <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-4l-2 2L9 16z" />
        </svg>
    </button>

    <!-- Chat Window -->
    <div
        x-show="open"
        @click.outside="open = false"
        x-transition:enter="transition ease-out duration-300 transform"
        x-transition:enter-start="opacity-0 scale-90"
        x-transition:enter-end="opacity-100 scale-100"
        x-transition:leave="transition ease-in duration-200 transform"
        x-transition:leave-start="opacity-100 scale-100"
        x-transition:leave-end="opacity-0 scale-90"
        class="bottom-16 right-0 max-w-md w-full shadow-lg rounded-md overflow-hidden bg-white"
        style="max-width: calc(100vw - 20px);"
    >
        <!-- Chat Header -->
        <div class="p-4 bg-gray-100 border-b">
            <h2 class="text-lg font-semibold text-gray-800">Chat with Karis Boutique</h2>
        </div>

        <!-- Chat Messages -->
        <div class="p-4 overflow-y-auto h-[400px] space-y-2" id="chatbot-messages" style="max-height: 400px;">
            @foreach ($conversation as $message)
                <div class="{{ isset($message['user']) ? 'bg-gray-200 text-gray-800 rounded-md p-2 self-start' : 'bg-blue-500 text-white rounded-md p-2 self-end' }} max-w-[80%]">
                    @if (isset($message['user']))
                        <strong>You:</strong> {{ $message['user'] }}
                    @else
                        <strong>Karis Bot:</strong> <span wire:ignore>{{ $message['chatbot'] }}</span>
                    @endif
                </div>
            @endforeach

            <!-- Typing Indicator -->
            @if ($isTyping)
                <div class="bg-blue-100 text-blue-700 rounded-md p-2 self-end max-w-[60%]">
                    Karis Bot is typing...
                </div>
            @endif
        </div>

        <!-- Chat Input -->
        <div class="p-3 border-t">
            <form wire:submit.prevent="sendMessage" class="flex items-center">
                <input wire:model="message" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" placeholder="Ask me anything...">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline ml-2">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 8 0 000 16zm3.707-8.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                    </svg>
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    document.addEventListener('livewire:load', function () {
        Livewire.on('update-chatbot-response', function (response) {
            const chatbotMessages = document.getElementById('chatbot-messages');
            const lastBotMessage = chatbotMessages.querySelector('.bg-blue-500:last-child span');
            if (lastBotMessage) {
                lastBotMessage.textContent = response;
                chatbotMessages.scrollTop = chatbotMessages.scrollHeight;
            } else {
                const newBotMessage = document.createElement('div');
                newBotMessage.className = 'bg-blue-500 text-white rounded-md p-2 self-end max-w-[80%]';
                newBotMessage.innerHTML = '<strong>Karis Bot:</strong> <span wire:ignore>' + response + '</span>';
                chatbotMessages.appendChild(newBotMessage);
                chatbotMessages.scrollTop = chatbotMessages.scrollHeight;
            }
        });

        Livewire.on('chatbot-finished-typing', function () {
            const chatbotMessages = document.getElementById('chatbot-messages');
            chatbotMessages.scrollTop = chatbotMessages.scrollHeight;
        });

        // Scroll to the bottom on initial load
        const chatbotMessages = document.getElementById('chatbot-messages');
        chatbotMessages.scrollTop = chatbotMessages.scrollHeight;
    });
</script>
