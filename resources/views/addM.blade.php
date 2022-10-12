@php
use App\Models\Favoris;
@endphp
<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h1 class="font-semibold text-xl text-gray-800 leading-tight">
                    Ajouter une machine
                </h1>

                </div>
            </div>
            <script src="/js/admin.js"></script>
            <div class=" mt-10 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight pb-6"> Position </h2>
                    <div class="flex flex-rowf flex-wrap w-1/3 justify-between"><label> Latitude :</label class="pt-2"><input type="text" id='lat' class="h-7" name="latitude" value="" disabled>      </div>              
                    <div class="flex flex-row flex-wrap w-1/3 justify-between"><label> Longitude :</label class="pt-2"><input type="text" id='lng' class="h-7" name="longitude" value="" disabled>        </div>  
                    <button class="px-16 shadow-sm sm:rounded-lg mt-8 border-2 bg-green-200" onclick="getLocation()">Actualiser Location</button>                  
                </div>
            </div>
            <div class=" mt-10 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight pb-6"> Information </h2>
                    <div class="flex flex-row flex-wrap w-1/3 justify-between"><label> Nom :</label class="pt-2"><input type="text" id='lat' name="name" class="h-7" value="" placeholder="Ex : Machine SUP RDC">      </div>              
                    <div class="flex flex-row flex-wrap w-1/3 justify-between"><label> Code :</label class="pt-2"><input type="text" id='lng' name="code" class="h-7" value="" placeholder="Code sur la machine">        </div>                 
                </div>
            </div>
            <button class="pl-1/3 text-center sm:w-full lg:w-1/3 shadow-sm sm:rounded-lg mt-8 border-2 bg-green-200" onclick="addM()">Ajouter</button>
        </div>
    </div>
</x-app-layout>
