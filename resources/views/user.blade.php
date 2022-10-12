@php
use App\Models\User;
@endphp

<x-app-layout>
    <link rel="stylesheet" href="/css/dataTables.min.css">
    <script src="/js/dataTables.min.js"></script>
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
                    <h2 class="font-semibold text-xl text-gray-800 leading-tight pb-6"> Utilisateur</h2>
                    
                    <table id="userTable" class="display" style="width:100%">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>email</th>
                                <th>right</th>
                            </tr>
                        </thead>
                        <tbody>
                             @foreach (User::all() as $aUser)
                                <tr>
                                    <td>{{$aUser->name}}</td>
                                    <td>{{$aUser->email}}</td>
                                    <td>{{$aUser->right}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function () {
            let table = $('#userTable').DataTable();
            $('#userTable tbody').on('click', 'tr', function () {
        editUser(table.row(this).data());
        })
        });
       
    
    </script>
</x-app-layout>
