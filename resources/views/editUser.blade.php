<div class="flex flex-col flex-wrap w-1/3 justify-between">
        <label> Name</label class="pt-2">
        <input type="text" class="h-7" id="name" value="{{$user->name}}">
    </div>
    <div class="flex flex-col flex-wrap w-1/3 justify-between">
        <label> eMail</label class="pt-2">
        <input type="text" class="h-7" id="email" value="{{$user->email}}" disabled>
    </div>
    <div class="flex flex-col flex-wrap w-1/3 justify-between">
        <label> right</label class="pt-2">
        <input type="number" class="h-7" max=3 min=0 id="right" value="{{$user->right}}">
    </div>
    <input type="button" onclick="updateUser()" class="px-16 shadow-sm sm:rounded-lg mt-8 border-2 bg-green-200" value="Valider" />

