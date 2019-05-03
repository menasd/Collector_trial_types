<!-- AUTHOR: Courtney Clack -->

<div><?php echo $text; ?></div>

<style>
    .cueTargetsArea {
        font-size: 200%;
        width: 100%;
        margin: 20px auto;
    }
    .cueTargetsArea td {
        vertical-align: middle;
    }
    .cueArea { text-align: right; width: 48%; }
    .responseArea { text-align: left; width: 85%; }
    .responseArea input { margin: 5px 0; }
    .middleArea { text-align: center; }
</style>

<table class="cueTargetsArea">
    <tr>
        <td class="cueArea"><?= $cue ?></td>
        <td class="middleArea"> : </td>
        <td class="responseArea">
            <?php
                for ($i=1; $i<=2; ++$i) {
                    echo "<div>
                            <input name='Response$i' type='text' class='collectorInput copybox'>
                            <input name='firstKeypress$i' type='hidden' class='firstKeypress' value='-1'>
                            <input name='lastKeypress$i' type='hidden' class='lastKeypress' value='-1'>
                          </div>";
                }
            ?>
        </td>
    </tr>
</table>

<div class="textright">
    <button class="collectorButton collectorAdvance" id="FormSubmitButton">Next</button>
</div>

<script>
    $(".collectorInput").on("input", function() {
        var timestamp = COLLECTOR.getRT();
        var container = $(this).closest("div");
        var firstKeypress = container.find(".firstKeypress");
        var lastKeypress = container.find(".lastKeypress");
        var value = this.value;
        
        if (value === '') {
            firstKeypress.val('-1');
            lastKeypress.val('-1');
            return true;
        }
        
        if (firstKeypress.val() === '-1') {
            firstKeypress.val(timestamp);
        }
        
        lastKeypress.val(timestamp);
    });
</script>
