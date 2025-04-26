<?php

use App\Livewire\Page\Todo as TodoPage;
use Illuminate\Support\Facades\Route;

Route::get('/', TodoPage::class);