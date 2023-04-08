<?php

function analyze_sentiment($text) {
    $lexicon_file = 'vader_lexicon.txt';
    $lexicon = [];

    $handle = fopen($lexicon_file, 'r');
    if ($handle) {
        while (($line = fgets($handle)) !== false) {
            $parts = explode("\t", trim($line));
            $word = $parts[0];
            $score = $parts[1];
            $lexicon[$word] = $score;
        }
        fclose($handle);
    } else {
        return ['error' => 'Error: could not read lexicon file.'];
    }

    $words = preg_split('/\s+/', strtolower($text));
    $scores = [];
    $sumScores = 0;

    foreach ($words as $word) {
        $word = preg_replace('/[^a-z0-9]+/i', '', $word);
        if (isset($lexicon[$word])) {
            $score = $lexicon[$word];
            $scores[] = $score;
            $sumScores += $score;
        }
    }

    $numScores = count($scores);
    $compound_score = $numScores > 0 ? $sumScores / sqrt($sumScores * $sumScores + 15) : 0;

    if ($compound_score >= 0.05) {
        $sentiment = 'Positive';
    } elseif ($compound_score <= -0.05) {
        $sentiment = 'Negative';
    } else {
        $sentiment = 'Neutral';
    }

    return [
        'sentiment' => $sentiment,
        'compound_score' => $compound_score,
    ];
}
