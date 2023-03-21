from textblob import TextBlob
from functools import lru_cache

@lru_cache(maxsize=100)  # Adjust maxsize based on memory constraints and expected number of unique reviews
def get_sentiment_score(text):
    sentiment = TextBlob(text).sentiment.polarity
    sentiment_score = (sentiment + 1) / 2 * 100
    return sentiment_score
