<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign Up Form</title>
    <h1>Buat Account Baru!</h1>

    <div class="form-sign-up">
      <h3>Sign Up Form</h3>
      <form action="{{ route('welcome') }}" method="POST">
        @csrf
        <label for="first-name">First Name : </label>
        <br /><br />
        <input type="text" name="first-name" id="first-name" />
        <br /><br /><br />

        <label for="last-name">Last Name : </label>
        <br /><br />
        <input type="text" name="last-name" id="last-name" />
        <br /><br /><br />

        <label for="input-gender">Gender:</label><br /><br />
        <input type="radio" id="male" name="gender" value="male" />
        <label for="male">Male</label>
        <br />
        <input type="radio" id="female" name="gender" value="female" />
        <label for="female">Female</label>
        <br /><br />

        <label for="input-gender">Language Spoken :</label><br /><br />
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

        <br /><br /><br />
        <label for="other">Bio</label><br /><br />
        <textarea name="message" rows="8" cols="20" id="bio"></textarea>

        <br /><br />
        <input type="submit" value="Sign Up" />
      </form>
    </div>
  </head>
  <body></body>
</html>
