<?php
    $data = $_POST;
    
    $targets = array($target1, $target2);
    
    $responses = array();
    for ($i=1; $i<=2; ++$i) {
        $responses[] = $_POST["Response$i"];
    }
    
    $lenientCriterion = $_CONFIG->lenient_criteria;
    
    function scoreAccuracy($target, $response, $criterion) {
        $response   = trim(strtolower($response));
        $correctAns = trim(strtolower($target));
        $accuracy   = NULL;
        
        $scores = array();
        
        #### Calculating and saving accuracy for trials with user input
        similar_text($response, $correctAns, $accuracy);                   // determine text similarity and store as $Acc
        $scores['Accuracy'] = $accuracy;
        
        #### Scoring and saving scores
        if ($accuracy == 100) {                          // strict scoring
            $scores['strictAcc'] = 1;
        } else {
            $scores['strictAcc'] = 0;
        }
        
        if ($accuracy >= $criterion) {             // lenient scoring
            $scores['lenientAcc'] = 1;
        } else {
            $scores['lenientAcc'] = 0;
        }
        
        return $scores;
    }
    
    foreach ($targets as $i => $target) {
        $index = $i+1; // human-readable index
        $scores = array(
            'Accuracy'    => 0,
            'strictAcc'   => 0,
            'lenientAcc'  => 0,
            'outputOrder' => 'na',
            'matchedResp' => 'na'
        );
        
        foreach ($responses as $j => $resp) {
            $possibleScores = scoreAccuracy($target, $resp, $lenientCriterion);
            
            if ($possibleScores['lenientAcc'] > 0) {
                unset($responses[$j]);
                $scores = $possibleScores;
                $scores['outputOrder'] = $j+1; // human-readable index
                $scores['matchedResp'] = $resp;
            }
        }
        
        foreach ($scores as $column => $value) {
            $data[$column . $index] = $value;
        }
    }
?>
