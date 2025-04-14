<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Sign Up - Campus IdeaForge</title>
  <link rel="stylesheet" href="signup.css" />
</head>
<body>

  <div class="container">
    <div class="left-section">
      <h2>Welcome to <br> Campus IdeaForge</h2>
    </div>

    <div class="right-section">
      <h3>Create Your Account</h3>
      <form action="signup.php" method="POST" onsubmit="return validateForm()">
        <div class="form-group">
          <label for="name">Full Name</label>
          <input type="text" id="name" name="name" required />
        </div>
        <div class="form-group">
          <label for="email">Email Address</label>
          <input type="email" id="email" name="email" required />
        </div>
        <div class="form-group">
          <label for="username">Username</label>
          <input type="text" id="username" name="username" required />
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" required />
        </div>
        <div class="form-group">
          <label for="confirm">Confirm Password</label>
          <input type="password" id="confirm" name="confirm" required />
        </div>
        <div class="form-group">
          <button type="submit">Sign Up</button>
        </div>
      </form>
    </div>
  </div>

  <script>
    function validateForm() {
      const password = document.getElementById('password').value;
      const confirm = document.getElementById('confirm').value;

      const strongPassword = /^(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
      
      if (!strongPassword.test(password)) {
        alert("Password must be at least 8 characters long, include an uppercase letter, a number, and a special character.");
        return false;
      }

      if (password !== confirm) {
        alert("Passwords do not match.");
        return false;
      }

      return true;
    }
  </script>

</body>
</html>
