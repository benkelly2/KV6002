<div id="adminHeader">
    <p>You are logged in as <b><?php echo htmlspecialchars( $_SESSION['username']) ?></b>. <a href="admin.php?action=logout"?>Log out</a></p>
    </div>

<form method="post">
<div class="buttons">
          <input type="submit" name="eventButton" value="Events" />
          <input type="submit" name="codeButton" value="Discount Codes" />
          <input type="submit" name="usersButton" value="Users" />
          <input type="submit" name="productButton" value="Products" />
</div>
</form>
