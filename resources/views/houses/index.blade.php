@extends('common.master')

@section('content')
    <section class="hero  is-medium  is-bold is-primary">
        <div class="hero-body">
            <div class="container">
                <p class="title is-2">Users</p>
                <p class="subtitle is-3">The Houses (students) of Hogwarts</p>

            </div>
        </div>
    </section>

    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-full">
                    <div class="content">
                        <div class="has-text-right">
                            <a href="/houses/create" class="button is-primary">Add a new House..</a>
                        </div>
                        <table class="table is-fullwidth">
                            <thead>
                            <tr>
                                <th style="width: 10%">NAME</th>
                                <th style="width: 50%">COLOR</th>
                                <th style="width: 40%">POINTS</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($houses as $house)
                                <tr>
                                    <td>{{ $house->name }}</td>
                                    <td>
                                        <a href="#">
                                            {{ $house->color }}
                                        </a>
                                    </td>
                                    <td>{{ $house->color }}</td>
                                    <td>
                                        <a href="{{ route('houses.edit', $house->id) }}">
                                            <button class="button is-primary"> Edit</button>
                                        </a>
                                    </td>
                                    <td>
                                        <a href="{{ route('houses.show', $house->id) }}">
                                            <button class="button is-secondary"> View</button>
                                        </a>
                                    </td>
                                    <td>
                                        <form method="POST" action="{{ route('houses.destroy', $house) }}"
                                              accept-charset="UTF-8" style="display:inline">

                                            @csrf
                                            @method('DELETE')

                                            <button type="submit" class="button is-danger" title="Delete Student">
                                                Delete
                                            </button>

                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{ $houses->links() }}
                    </div>
                </div>

            </div>
    </section>
@endsection

