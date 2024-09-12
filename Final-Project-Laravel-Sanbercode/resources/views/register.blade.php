@extends('layout.master')

@section('judul')
Buat Account Baru!
@endsection

@section('content')
    <div class="form-sign-up">
      <h3>Sign Up Form</h3>
      <form action="{{ route('welcome') }}" method="POST">
        @csrf
        <label for="first-name">First Name : </label>
        <br />
        <input type="text" name="fname" id="first-name" />
        <br /><br />

        <label for="last-name">Last Name : </label>
        <br />
        <input type="text" name="lname" id="last-name" />
        <br /><br />

        <label for="input-gender">Gender:</label><br />
        <input type="radio" id="male" name="gender" value="male" />
        <label for="male">Male</label>
        <br />
        <input type="radio" id="female" name="gender" value="female" />
        <label for="female">Female</label>
        <br /><br />

        <label for="input-gender">Language Spoken :</label><br />
        <input
          type="checkbox"
          id="indonesian"
          name="language_spoken"
          value="indonesian"
        />
        <label for="indonesian">Bahasa Indonesia</label>
        <br />
        <input
          type="checkbox"
          id="english"
          name="language_spoken"
          value="english"
        />
        <label for="english">Bahasa Inggris</label>
        <br />
        <input
          type="checkbox"
          id="other"
          name="language_spoken"
          value="other"
        />
        <label for="other">Other</label>

        <br />
        <label for="other">Bio</label><br />
        <textarea name="message" rows="8" cols="35" id="bio"></textarea>

        <br /><br />
        <input type="submit" value="Sign Up" />
      </form>
    </div>
@endsection