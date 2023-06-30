@extends('common.master')
@section('content')
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-12">

                    <div class="content">
                      <p> NAME:  {{ $house->name}}</p>
                       <p> COLOR: {{$house->color}}</p>
                       <p> POINTS: {{$house->points}}</p>
                        @foreach($house->users as $user)

                            <p>User Name: {{ $user->name }}</p>
                            <p>User Email: {{ $user->email }}</p>

                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection



