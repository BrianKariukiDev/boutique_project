<div class="w-full max-w-[85rem] py-10 px-4 sm:px-6 lg:px-8 mx-auto">
    <div class="flex h-full items-center">
        <main class="w-full max-w-md mx-auto p-6">
            <div class="bg-white border border-gray-200 rounded-xl shadow-sm dark:bg-gray-800 dark:border-gray-700">
                <div class="p-4 sm:p-7">
                    <div class="text-center">
                        <h1 class="block text-2xl font-bold text-gray-800 dark:text-white">Sign up</h1>
                        <p class="mt-2 text-sm text-gray-600 dark:text-gray-400">
                            Already have an account?
                            <a wire:navigate
                                class="text-blue-600 decoration-2 hover:underline font-medium dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600"
                                href="/login">
                                Sign in here
                            </a>
                        </p>
                    </div>
                    <hr class="my-5 border-slate-300">
                    
                    <!-- Form -->
                    <form wire:submit.prevent='save'>
                        <div class="grid gap-y-4">
                            <!-- Name -->
                            <div>
                                <label for="name" class="block text-sm mb-2 dark:text-white">Name</label>
                                <input type="text" id="name" wire:model="name"
                                    class="pointer-events-auto py-3 px-4 block w-full border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                                @error('name') 
                                    <p class="text-xs text-red-600 mt-2">{{ $message }}</p> 
                                @enderror
                            </div>

                            <!-- Email -->
                            <div>
                                <label for="email" class="block text-sm mb-2 dark:text-white">Email address</label>
                                <input type="email" id="email" wire:model="email"
                                    class="pointer-events-auto py-3 px-4 block w-full border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                                @error('email') 
                                    <p class="text-xs text-red-600 mt-2">{{ $message }}</p> 
                                @enderror
                            </div>

                            <!-- Phone -->
                            <div>
                                <label for="phone" class="block text-sm mb-2 dark:text-white">Phone Number</label>
                                <input type="tel" id="phone" wire:model="phone"
                                    class="pointer-events-auto py-3 px-4 block w-full border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                                @error('phone') 
                                    <p class="text-xs text-red-600 mt-2">{{ $message }}</p> 
                                @enderror
                            </div>

                            <!-- City -->
                            <div>
                                <label for="city" class="block text-sm mb-2 dark:text-white">City</label>
                                <input type="text" id="city" wire:model="city"
                                    class="pointer-events-auto py-3 px-4 block w-full border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                                @error('city') 
                                    <p class="text-xs text-red-600 mt-2">{{ $message }}</p> 
                                @enderror
                            </div>

                            <!-- Password -->
                            <div>
                                <label for="password" class="block text-sm mb-2 dark:text-white">Password</label>
                                <input type="password" id="password" wire:model="password"
                                    class="pointer-events-auto text-white py-3 border px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-slate-900 dark:border-gray-700 dark:text-gray-400 dark:focus:ring-gray-600">
                                @error('password') 
                                    <p class="text-xs text-red-600 mt-2">{{ $message }}</p> 
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <button type="submit"
                                class="hover:cursor-pointer w-full py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 dark:focus:outline-none dark:focus:ring-1 dark:focus:ring-gray-600">
                                Sign up
                            </button>
                        </div>
                    </form>
                    <!-- End Form -->
                </div>
            </div>
        </main>
    </div>
</div>
