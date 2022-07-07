@extends('/layouts/main')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.5/css/bulma.css" />

<div class="medium-6 large-5">
    <br/>
    <h1 class="title">Contactez-nous par internet</h1>

    <form action="/contact" method="POST">
        @csrf

        <div class="field">
            <label>Nom:

                <div class="control">
                    <input
                        class="input @error('name') is-danger  @enderror"
                        type="text"
                        name="name"
                        id="name"
                        placeholder="NOM Prénom"
                        value="{{ old('name') }}">

                    @error('name')
                        <p class="help is-danger">{{ $errors->first('name') }}</p>
                    @enderror
                </div>
            </label>
        </div>

        <div class="field">
            <label>Email:

                <div class="control">
                    <input
                        class="input @error('email') is-danger  @enderror"
                        type="text"
                        name="email"
                        id="email"
                        placeholder="votreEmail@mail.fr"
                        value="{{ old('email') }}">

                    @error('email')
                        <p class="help is-danger">{{ $errors->first('email') }}</p>
                    @enderror
                </div>
            </label>
        </div>

        <div class="field">
            <label>Message:

                <div class="control">
                    <input
                        class="textarea @error('message') is-danger  @enderror"
                        type="text"
                        name="message"
                        id="message"
                        placeholder="Dites-nous tout ! :)"
                        value="{{ old('message') }}">

                    @error('message')
                        <p class="help is-danger">{{ $errors->first('message') }}</p>
                    @enderror
                </div>
            </label>
        </div>


        <div class="field is-grouped">
            <div>
                <button class="button is-link" type="submit">Envoyer le message</button>
            </div>
        </div>

    </form>

</div>
@endsection
