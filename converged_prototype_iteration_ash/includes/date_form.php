<?php

$start_date = isset($_GET['start_date']) ? $_GET['start_date'] : '';
$end_date = isset($_GET['end_date']) ? $_GET['end_date'] : '';

?>
<form class="tna-form" action="/results.php?era=custom" method="get">
    <fieldset>
        <div class="tna-form__row">
            <label for="start_date">Start year</label>
            <input type="number" name="start_date" placeholder="YYYY"
                   value="<?php echo $start_date ?>">
        </div>
        <div class="tna-form__row">
            <label for="end_date">End year</label>
            <input type="number" name="end_date" placeholder="YYYY"
                   value="<?php echo $end_date ?>">
        </div>
        <div class="tna-form__row">
            <input type="hidden" name="era" value="custom-date-range" />
            <label for="">&nbsp;</label>
            <input class="tna-button" type="submit" value="Show records">
        </div>

    </fieldset>
</form>
