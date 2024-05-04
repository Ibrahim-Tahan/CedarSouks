@extends('layouts.master')
@section('content')
<link rel="stylesheet" href="{{ asset('css/authenthication.css') }}">
<link rel="stylesheet" href="{{ asset('css/navstyle.css') }}">
<style>

    body {
        font-family: Arial, sans-serif;
        background-color: #f9f9f9;
        margin: 0;
        padding: 0;
    }
    h1 {
        margin-top: 20px;
        text-align: center;
        color: #333;
    }
    .user-list {
        list-style-type: none;
        padding: 0;
        margin: 0;
    }
    .user-item {
        padding: 15px;
        border-bottom: 1px solid #ddd;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }
    .user-item:hover {
        background-color: #e6e6e6;
    }
</style>
<h1>Messages:</h1>
<ul class="user-list">
    @foreach ($users as $user)
    <li class="user-item" onclick="location.href='{{ route('chatBuyer', ['buyerid' => $id, 'sellerid' => $user->id]) }}';">
        {{ $user->fullname }}
        @foreach($unreadcount as $uc)
        @if($uc->sender_id==$user->id)
         <span style=" background-color: red; color: white;border-radius: 50%;padding: 5px 8px;font-size: 12px; ">{{$uc->unread_count}}</span>
        @endif
    @endforeach
    </li>    
    @endforeach
</ul>
@endsection