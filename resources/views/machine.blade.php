@php
use App\Models\Machine;
@endphp

<x-app-layout>
    <link rel="stylesheet" href="/css/dataTables.min.css">
    <script src="/js/dataTables.min.js"></script>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Gestion Machine
        </h2>
    </x-slot>
<script src="/js/utlraAdmin.js"></script>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 flex flex-col">
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight pb-6"> Utilisateur</h2>
                    
                    <table id="machineTable" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Code</th>
                                <th>Author</th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach (Machine::all() as $machine)
                                <tr>
                                    <td>{{$machine->name}}</td>
                                    <td>{{$machine->code}}</td>
                                    <td>{{$machine->author}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>
    <input type="hidden" class="rounded-lg bg-[#67b790e8] pt-1">
    {{-- <td class="rounded-lgpx-[2px] m-[3px] text-center bg-[#67b790e8]">
        <b>Café</b>
    </td> --}}
    <script type="text/javascript">
        $(document).ready(function () {
            let table = $('#machineTable').DataTable();
            $('#machineTable tbody').on('click', 'tr', function () {
        editUser(table.row(this).data());
        })});
       
        
    </script>
</x-app-layout>
