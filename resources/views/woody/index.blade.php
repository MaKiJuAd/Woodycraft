

        @if(Auth::user()->Admin == 1)

            <meta http-equiv="refresh" content="0; URL=http://localhost/Woodycraft/public/dashboard">

        @endif

        @if(Auth::user()->Admin == 0)
            <x-app-layout>
                <x-slot name="header">
                    <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
                        {{ __('index') }}
                    </h2>
                </x-slot>

                <div class="py-12">
                    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                        <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                        </div>
                    </div>
                </div>
                <div style="display: flex;">

                    @foreach($pros as $pro)

                        <img src="{{ asset('storage/'.$pro->image) }}" />
                        <p> NOM :{{ $pro->name }}
                            <br>
                            DESCRIPTION :{{ $pro->description }}</p>

                    @endforeach

                </div>

            </x-app-layout>
        @endif


