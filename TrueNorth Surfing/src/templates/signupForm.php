<form action="signup.php?action=signup" method="post" style="width: 50%;">
  <input type="hidden" name="signup" value="true" />

  <?php if ( isset( $results['errorMessage'] ) ) { ?>
    <div class="errorMessage"><?php echo $results['errorMessage'] ?></div>
  <?php } ?>

  <ul>
    <li>
      <label for="username">Username</label>
      <input type="text" name="username" id="username" placeholder="Choose a username" required autofocus maxlength="20" />
    </li>

    <li>
      <label for="email">Email</label>
      <input type="email" name="email" id="email" placeholder="Enter your email address" required maxlength="50" />
    </li>

    <li>
      <label for="password">Password</label>
      <input type="password" name="password" id="password" placeholder="Choose a password" required maxlength="20" />
    </li>

    <li>
      <label for="confirm_password">Confirm Password</label>
      <input type="password" name="confirm_password" id="confirm_password" placeholder="Confirm your password" required maxlength="20" />
    </li>
  </ul>

  <div class="buttons">
    <input type="submit" name="signup" value="Sign Up" />
  </div>
</form>