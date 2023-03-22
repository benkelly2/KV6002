from flask import Flask, render_template, request, redirect, url_for
from flask_sqlalchemy import SQLAlchemy
from flask import flash
from flask_caching import Cache
from sentiment_analysis_tool import get_sentiment_score
import os

app = Flask(__name__)
app.secret_key = '123115'  # Add this line
app.config['SQLALCHEMY_DATABASE_URI'] = 'sqlite:///reviews.db'
app.config['CACHE_TYPE'] = 'simple'
cache = Cache(app)
db = SQLAlchemy(app)

class Review(db.Model):
    id = db.Column(db.Integer, primary_key=True)
    content = db.Column(db.Text, nullable=False)
    sentiment = db.Column(db.Float, nullable=False)
    status = db.Column(db.String(10), nullable=False)

with app.app_context():
    db.create_all()

@app.route('/')
def index():
    approved_reviews = Review.query.filter_by(status="approved").all()
    return render_template('review.html', approved_reviews=approved_reviews)

@app.route('/submit_review', methods=['POST'])
def submit_review():
    review_text = request.form['review']
    sentiment_score = get_sentiment_score(review_text)

    review = Review(content=review_text, sentiment=sentiment_score)

    if sentiment_score < 50:
        review.status = "on hold"
        flash("Your review is being processed by our team.", "warning")
    else:
        review.status = "approved"
        flash("Your review has been updated.", "success")

    db.session.add(review)
    db.session.commit()
    return redirect(url_for('index'))

@app.route('/approved_reviews')
def approved_reviews():
    reviews = Review.query.filter_by(status="approved").all()
    return render_template('approved_reviews.html', reviews=reviews)

@app.route('/admin/reviews')
def admin_reviews():
    reviews = Review.query.all()
    return render_template('admin_reviews.html', reviews=reviews)

@app.route('/admin/approve_review/<int:review_id>')
def approve_review(review_id):
    review = Review.query.get_or_404(review_id)
    review.status = "approved"
    db.session.commit()
    return redirect(url_for('admin_reviews'))  # Update the endpoint here

@app.route('/admin/delete_review/<int:review_id>')
def delete_review(review_id):
    review = Review.query.get_or_404(review_id)
    db.session.delete(review)
    db.session.commit()
    return redirect(url_for('admin_reviews'))  # Update the endpoint here

if __name__ == '__main__':
    app.run(debug=True)
