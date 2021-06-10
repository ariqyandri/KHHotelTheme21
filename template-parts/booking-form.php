<form id="booking-form" class="booking-<?php echo get_post_type( );?>">
    <div class="input_start">
        <label for="start">Start Date</label>
        <div class="input_box">
            <input type="date" id="start" name="start" >
        </div>
    </div>
    <div class="input_end">
        <label for="end">End Date</label>
        <div class="input_box">
            <input type="date" id="end" name="end">
        </div>
    </div>
    <div class="input_button">
        <button type="button" class="booking-submit book-button" id="booking-<?php echo get_post_type( );?>">BOOK NOW</button>
    </div>
</form>
