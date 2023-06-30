
@extends('common.master')

@section('content')
    <section class="section">
        <div class="container">
            <div class="columns">
                <div class="column is-12">
                    <form method="POST" action="/houses/{{ $house->id }}">
                        @csrf
                        @method('PUT')
                        <div class="card">
                            <header class="card-header">
                                <p class="card-header-title">
                                    Edit article
                                </p>
                            </header>

                            <div class="card-content">
                                <div class="content">
                                    <div class="field">
                                        <label class="label">Name</label>
                                        <div class="control">
                                            <input name="name" class="input @error('name') is-danger @enderror"
                                                   id="name"
                                                   value="{{ $house->name }}"
                                                   type="text" placeholder="Your name here...">
                                        </div>
                                        @error('name')
                                        <p class="help is-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="field">
                                        <label class="label">Color</label>
                                        <div class="control">
                                            <input name="color" class="input @error('color') is-danger @enderror"
                                                   id="color"
                                                   value="{{ $house->color }}"
                                                   type="text" placeholder=" color here...">
                                        </div>
                                        @error('color')
                                        <p class="help is-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="Points">
                                        <label class="label">Points</label>
                                        <div class="control">
                                            <input name="points" class="input @error('points') is-danger @enderror"
                                                   id="points"
                                                   value="{{ $house->points }}"
                                                   type="text" placeholder="Your points here...">
                                        </div>
                                        @error('body')
                                        <p class="help is-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                </div>
                                <div class="field is-grouped">

                                    <div class="control">
                                        <button type="submit" class="button is-primary">Submit</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
@endsection


