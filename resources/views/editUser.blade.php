<form action="" method="POST">
    @csrf

    <div class="flex flex-col flex-wrap w-1/3 justify-between">
        <label> Name</label class="pt-2">
        <input type="text" class="h-7" name="name" value="{{$user->name}}">
    </div>
    <div class="flex flex-col flex-wrap w-1/3 justify-between">
        <label> eMail</label class="pt-2">
        <input type="text" class="h-7" name="email" value="{{$user->email}}">
    </div>
    <div class="flex flex-col flex-wrap w-1/3 justify-between">
        <label> right</label class="pt-2">
        <input type="number" class="h-7" max=3 min=0 name="right" value="{{$user->right}}">
    </div>
    <input type="submit" class="px-16 shadow-sm sm:rounded-lg mt-8 border-2 bg-green-200" value="Valider" />
</form>
