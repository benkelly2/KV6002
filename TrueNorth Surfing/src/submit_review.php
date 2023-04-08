<?php
session_start();
include("config.php");
include("sentiment.php");
include("review.php");

$review_text = $_POST['review_text'];

// Analyze the sentiment of the review text
$sentiment_data = analyze_sentiment($review_text);
$sentiment = $sentiment_data['sentiment'];
$compound_score = $sentiment_data['compound_score'];

if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['product_id']) && isset($_POST['rating']) && isset($_POST['review_text'])) {
    $product_id = intval($_POST['product_id']);
    $rating = intval($_POST['rating']);
    $review_text = $_POST['review_text'];

    // You need to set the user_id value. You can get it from the session after the user logs in.
    // For now, we'll use a hardcoded value for demonstration purposes.
    $user_id = 1;

    $review = new Review();
    $review->storeFormValues(array(
        'product_id' => $product_id,
        'user_id' => $user_id,
        'rating' => $rating,
        'review_text' => $review_text,
        'sentiment' => $sentiment,
        'compound_score' => $compound_score,
    ));

    $rating_difference = abs($rating * 20 - $compound_score * 100);
    if ($rating_difference <= 20) {
        $review->insert();
        echo "Review submitted successfully!";
    } else {
        // Set needs_review to true
        $review->storeFormValues(array_merge($review->toArray(), ['needs_review' => true]));
        $review->insert();
        echo "Your review has been submitted for moderation.";
    }
} else {
    echo "Error: Invalid data!";
}
?>
<?php include 'chatbot/chatbot.html'; ?>
