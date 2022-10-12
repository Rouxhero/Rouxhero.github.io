@php
use App\Models\User;
use App\Models\Machine;
@endphp


<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Gestion serveur
        </h2>
    </x-slot>
<script src="/js/utlraAdmin.js"></script>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex flex-col">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight pb-6"> Statistics</h2>
                    
                   <div>Utilisateur inscrit : {{ count(User::all()) }}</div>
                   <div>Machine inscrites : {{ count(Machine::all()) }}</div>
                </div>
            </div>
            <div class="mt-10 bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight pb-6"> Gestion Version </h2>
                    <button class="px-16 shadow-sm sm:rounded-lg mt-8 border-2 bg-blue-200" onclick="GitPull()">Git Pull</button>                  
                    <button class="px-16 shadow-sm sm:rounded-lg mt-8 border-2 bg-blue-200" onclick="SaveDB()">Save Database</button>                  
                    <button class="px-16 shadow-sm sm:rounded-lg mt-8 border-2 bg-blue-200" onclick="freshDB()">refresh Database </button>                  
                    <button class="px-16 shadow-sm sm:rounded-lg mt-8 border-2 bg-blue-200" onclick="cacheDG()">Regenerate cache </button>                  
                </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
