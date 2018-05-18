
@extends('layouts.app')

@component('mail::message')
# Welcome {{ $name }}
 
This is a welcome email!
 
Thanks,<br>
{{ config('app.name') }}
@endcomponent