@extends('headers.header')

@section('content')


    <div>
        <div>도전 번호 : {{ $join->id }}</div>
        <div>챌린지 이름: {{ $join->challenge->challenge_name }}</div>
        <div>유저 이름: {{ $join->user->user_id }}</div>
        <div>시작 날짜: {{ $join->join_date }}</div>
        <div>참여 기간: {{ $join->join_term }}</div>
        <div>참가 비: {{ $join->entry_fee }}</div>
        <div>달성율: {{ $join->achivement }}</div>
    </div>


@include('partials.footer')

@stop

<script src="//code.jquery.com/jquery-1.11.3.min.js"></script>
<script src="/js/challenge.js"></script>
<link rel="stylesheet" href="/css/challenge.css">