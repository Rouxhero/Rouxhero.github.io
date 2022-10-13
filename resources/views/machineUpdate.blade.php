<div>
    <div class="w-[46vw] justify-between">
        <label> Machine : {{$machine->name}}</label class="pt-2">
    </div>
    <div class="w-[46vw] h-[1px] bg-[#000000e3]"></div>
    <div class="w-[46vw] justify-between">
        <label> Produit manquants</label class="pt-2">
        <select id="product">
            @foreach ($products as $id=> $product)
            <option value="{{$id}}">{{$product['name']}}(@if ($product['dispo'] == 1) disponible @else rupture @endif)
            </option>
            @endforeach
        </select>
        <input type="button" onclick="updateUser()"
            class="px-16 mb-2 shadow-sm sm:rounded-lg mt-8 border-2 bg-green-200" value="Valider" />
    </div>
    <div class="w-[46vw] h-[1px] bg-[#000000e3]"></div>
    <input type="button" onclick="closeModal();$('#map').show();$('#close-modal').show()"
        class="px-16 shadow-sm sm:rounded-lg mt-8 border-2 bg-green-200" value="Annuler" />
</div>
<input type="hidden" class="rounded-lg bg-[#67b790e8] pt-1">