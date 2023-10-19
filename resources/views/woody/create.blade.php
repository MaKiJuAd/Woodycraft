<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Creer Customer') }}
        </h2>
    </x-slot>
    <x-matieres-card>
        <!-- Message de réussite -->
        @if (session()->has('message'))
            <div class="mt-3 mb-4 list-disc list-inside text-sm text-green-600">
                {{ session('message') }}
            </div>
        @endif
        <form action="{{ route('customer.store') }}" method="post">
            @csrf
            <div>
                <x-input-label for="forename" :value="__('forename :')" />
                <x-text-input  id="forename" class="block mt-1 w-full" type="text" name="forename" :value="old('forename')" required autofocus />
                <x-input-error :messages="$errors->get('forename')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="surname" :value="__('surname :')" />
                <x-text-input  id="surname" class="block mt-1 w-full" type="text" name="surname" :value="old('surname')" required autofocus />
                <x-input-error :messages="$errors->get('surname')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="add1" :value="__('add1 :')" />
                <x-text-input  id="add1" class="block mt-1 w-full" type="text" name="add1" :value="old('add1')" required autofocus />
                <x-input-error :messages="$errors->get('add1')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="add2" :value="__('add2 :')" />
                <x-text-input  id="add2" class="block mt-1 w-full" type="text" name="add2" :value="old('add2')" required autofocus />
                <x-input-error :messages="$errors->get('add2')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="add3" :value="__('add3 :')" />
                <x-text-input  id="add3" class="block mt-1 w-full" type="text" name="add3" :value="old('add3')" required autofocus />
                <x-input-error :messages="$errors->get('add3')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="postcode" :value="__('postcode :')" />
                <x-text-input  id="postcode" class="block mt-1 w-full" type="number" name="postcode" :value="old('postcode')" required autofocus />
                <x-input-error :messages="$errors->get('postcode')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="phone" :value="__('phone :')" />
                <x-text-input  id="phone" class="block mt-1 w-full" type="phone" name="phone" :value="old('phone')" required autofocus />
                <x-input-error :messages="$errors->get('phone')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="email" :value="__('email :')" />
                <x-text-input  id="email" class="block mt-1 w-full" type="text" name="email" :value="old('email')" required autofocus />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>
            <div>
                <x-input-label for="registered" :value="__('registered :')" class="hidden"/>
                <x-text-input  id="registered" class="block mt-1 w-full" class="hidden" type="number" min=1 max=1 name="registered" :value=1 required autofocus />
                <x-input-error :messages="$errors->get('registered')" class="mt-2" />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-primary-button class="ml-3">
                    {{ __('Send') }}
                </x-primary-button>
            </div>
        </form>
    </x-matieres-card>
</x-app-layout>
