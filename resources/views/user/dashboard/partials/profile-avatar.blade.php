<?php
    $avatar_url = ($user->avatar) 
    ? asset('img/avatar/' . $user->avatar)    
     : "https://ui-avatars.com/api/?size=128&background=random&name=" . $user->name;
?>

<img src="{{ $avatar_url }}" class="rounded-circle mb-3" alt="foto profil {{ $user->name }}" width="96"  height="96">
