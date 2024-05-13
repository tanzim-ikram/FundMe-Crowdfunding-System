<?php
// session_start();

if (isset($_POST['giveaway_id'])) {
    $giveaway_id = $_POST['giveaway_id'];
    
    // You can generate a link to share the campaign using the campaign ID
    // For example:
    $share_link = "http://localhost/Project/view/giveaways.php?id=$giveaway_id";

    // Now you can use $share_link to display or share the link
    echo "Share this link: $share_link";
}
?>
