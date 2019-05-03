<!--- AUTHOR: Tyson Kerr -->

<?php
    /**
     * To use this trial type, use multiple entries in the Text column of the
     * procedure file to create the question and the possible responses.
     *
     * For example, if your text column contains:
     *     Which choice is best?|First|Second|Third
     * participants will have the choices "First", "Second", and "Third" for
     * the question "Which choice is best?"
     *
     * As usual, separate entries in the Text column are separated by the pipe
     * character |, which you can use by holding Shift and pressing the
     * backslash character \.  
     */

    $texts = explode('|', $cue);
    foreach ($texts as &$t) {
        $t = trim($t);
		if (substr($t, 0, 1) === "*") {
			$t = substr($t, 1);
		}
    }
    unset($t);
 ?>
    <style>
        label       { display: table-row; }
        label > div { display: table-cell; }
        .McOuter    { text-align: center; }
        .McInner    { display: inline-block; text-align: left; }
    </style>
    <div class="McOuter">
        <div class="McInner">
            <?php
                echo array_shift($texts);
                foreach ($texts as $txt) {
                    ?><label><div><input type="radio" name="Response" value="<?= $txt ?>" required /></div><div><?= $txt ?></div></label><?php
                }
            ?>
            <div><button class="collectorButton collectorAdvance" id="FormSubmitButton">Submit</button></div>
        </div>
    </div>
