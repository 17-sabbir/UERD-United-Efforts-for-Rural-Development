<?php

use Illuminate\Support\Facades\DB;

function application()
{
    return DB::table('applications')->first();
}

function contact_person()
{
    return DB::table('contacts')
        ->where('type', 'person')
        ->where('status', 'active')
        ->orderBy('id', 'desc')
        ->first();
}









