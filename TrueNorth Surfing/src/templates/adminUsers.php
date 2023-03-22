<div id="adminHeader">
    <p>You are logged in as <b><?php echo htmlspecialchars( $_SESSION['username']) ?></b>. <a href="login.php?action=logout"?>Log out</a></p>
    </div>

    <h1><?php echo $results['pageTitle']?></h1>

<form action="admin.php?action=<?php echo $results['formAction']?>" method="post">
    <input type="hidden" name="user_id" value="<?php echo $results['user']->user_id ?>"/>

<?php if ( isset( $results['errorMessage'] ) ) { ?>
        <div class="errorMessage"><?php echo $results['errorMessage'] ?></div>
<?php } ?>

    <ul>

    <li>
    <label for="username">Username:</label>
    <input type="text" id="username" name="username" value="<?php echo $results['user']->username; ?>" readonly>
    </li>

    <li>
    <label for="email">Code:</label>
    <input type="text" id="email" name="email" value="<?php echo $results['user']->email; ?>" readonly>
    </li>


    <li>
    <label for="membership_permission">Verified Member:</label>
    <select id="form_membership_permission" name="membership_permission">
    <option value="1" <?php echo ($results['user']->membership_permission == 1) ? 'selected' : ''; ?>>Yes</option>
    <option value="0" <?php echo ($results['user']->membership_permission == 0) ? 'selected' : ''; ?>>No</option>
    </select>
    </li>

    <li>
    <label for="admin_permission">Admin Privlages:</label>
    <select id="form_admin_permission" name="admin_permission">
    <option value="1" <?php echo ($results['user']->admin_permission == 1) ? 'selected' : ''; ?>>Yes</option>
    <option value="0" <?php echo ($results['user']->admin_permission == 0) ? 'selected' : ''; ?>>No</option>
    </select>
    </li>
  
    </ul>

    <div class="buttons">
          <input type="submit" name="saveChanges" value="Save Changes" />
          <input type="submit" formnovalidate name="cancel" value="Cancel" />
    </div>
    </form>

<?php if ( $results['user']->user_id ) { ?>
      <p><a href="admin.php?action=deleteUser&amp;user_id=<?php echo $results['user']->user_id ?>" onclick="return confirm('Delete This User?')">Delete This User</a></p>
<?php } ?>