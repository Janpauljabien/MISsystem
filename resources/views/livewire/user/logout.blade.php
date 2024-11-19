<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use function Livewire\Volt\{state};

//

$logout = function () {
    Auth::logout();
    Session::flush();
    return redirect()->route('login');
}

?>
<div class="w-full hover:bg-blue hover:text-white flex-center p-2 cursor-pointer" wire:click.prevent="logout">
    <span>Logout</span>
</div>