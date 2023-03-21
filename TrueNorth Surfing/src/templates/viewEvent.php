<?php
echo '<h1 style="color: #5e9ca0;">' . $event->event_title . '&nbsp;</h1>';
echo '<h2><strong>Event Time: ' . date("H:i", strtotime($event->event_date)) . '</strong></h2>';
echo '<h2><strong>Event Date: ' . date("d/m/Y", strtotime($event->event_date)) . '</strong></h2>';
echo '<h2><strong>Event Location: ' . $event->event_location . '</strong></h2>';
echo '<h3 style="color: #2e6c80;">Details</h3>';
echo '<p>' . $event->event_summary . '</p>';
echo '<blockquote>';
echo '<p>' . date("d/m/Y", strtotime($event->post_date)) . '</p>';
echo '</blockquote>';
