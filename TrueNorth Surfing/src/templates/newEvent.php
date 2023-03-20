<form method="post" >
  <label for="event_title">Event Title:</label>
  <input type="text" id="form_event_title" name="event_title" >
  <br>
  <label for="event_location">Event Location:</label>
  <input type="text" id="form_event_location" name="event_location" >
  <br>
  <label for="event_date">Event Date:</label>
  <input type="datetime-local" id="form_event_date" name="event_date" >
  <br>
  <label for="event_summary">Event Summary:</label>
  <textarea id="event_summary" name="event_summary"></textarea>
  <br>
  <label for="post_date">Post Date:</label>
  <input type="datetime-local" id="form_post_date" name="post_date" value="<?php echo date('Y-m-d\TH:i:s'); ?>" readonly>
  <br>
  <label for="post_display">Post Display:</label>
  <select id="form_post_display" name="post_display">
    <option value="1" <?php echo ($event->post_display == 1) ? 'selected' : ''; ?>>Yes</option>
    <option value="0" <?php echo ($event->post_display == 0) ? 'selected' : ''; ?>>No</option>
  </select>
  <br>
  <input type="submit" value="Submit">
</form>
