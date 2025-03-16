<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Jadwal Penerbangan') }}
        </h2>
    </x-slot>

    <div class="">
        <div class="">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg ">
                <x-welcome :jadwal="$jadwal" />
            </div>
        </div>
    </div>
</x-app-layout>
