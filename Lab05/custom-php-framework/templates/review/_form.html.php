<?php
/** @var $review ?\App\Model\Review */
?>

<div class="form-group">
    <label for="reservationNumber"><strong>Reservation number</strong></label>
    <input required type="number" id="reservationNumber" name="review[reservationNumber]" value="<?= $review ? $review->getReservationNumber() : '' ?>">
</div>

<div class="form-group">
    <label for="mainRating"><strong>Main Rating</strong></label>
    <input required
           type="range"
           min="1"
           max="5"
           id="mainRating"
           name="review[mainRating]"
           value="<?= $review ? $review->getMainRating() : '' ?>"/>
</div>

<div class="form-group">
    <label for="mainComment"><strong>Your general thoughts</strong></label>
    <textarea required id="mainComment" name="review[mainComment]"><?= $review? $review->getMainComment() : '' ?></textarea>
</div>

<div class="form-group">
    <label for="advantages"><strong>What was good</strong></label>
    <textarea id="advantages" name="review[advantages]"><?= $review? $review->getAdvantages() : '' ?></textarea>
</div>

<div class="form-group">
    <label for="disadvantages"><strong>What was bad</strong></label>
    <textarea id="disadvantages" name="review[disadvantages]"><?= $review? $review->getDisadvantages() : '' ?></textarea>
</div>

<div class="form-group">
    <label for="hotelRating"><strong>How would you rate the hotel</strong></label>
    <input required
           type="range"
           min="1"
           max="5"
           id="hotelRating"
           name="review[hotelRating]"
           value="<?= $review ? $review->getHotelRating() : '' ?>"/>
</div>

<div class="form-group">
    <label for="hotelComment"><strong>Tell us something about hotel</strong></label>
    <textarea id="hotelComment" name="review[hotelComment]"><?= $review? $review->getHotelComment() : '' ?></textarea>
</div>

<div class="form-group">
    <label for="locationRating"><strong>How would you rate the location</strong></label>
    <input required
           type="range"
           min="1"
           max="5"
           id="locationRating"
           name="review[locationRating]"
           value="<?= $review ? $review->getLocationRating() : '' ?>"/>
</div>

<div class="form-group">
    <label for="locationComment"><strong>Tell us something location</strong></label>
    <textarea id="locationComment" name="review[locationComment]"><?= $review? $review->getLocationComment() : '' ?></textarea>
</div>

<div class="form-group">
    <label for="valueToMoneyRating"><strong>How do you rate the quality/price ratio?</strong></label>
    <input required
           type="range"
           min="1"
           max="5"
           id="valueToMoneyRating"
           name="review[valueToMoneyRating]"
           value="<?= $review ? $review->getValueToMoneyRating() : '' ?>"/>
</div>

<div class="form-group">
    <label for="valueToMoneyComment"><strong>Tell us something about quality/price ratio</strong></label>
    <textarea id="valueToMoneyComment" name="review[valueToMoneyComment]"><?= $review? $review->getValueToMoneyComment() : '' ?></textarea>
</div>

<div class="radio-group">
    <label><strong>Would you recommend this trip?</strong></label>
    <input type="radio" id="isRecommendedYes" name="review[isRecommended]" value="1"
            <?= $review && $review->getIsRecommended() ? 'checked' : '' ?> />
    <label for="isRecommendedYes">Yes</label>
    <input type="radio" id="isRecommendedNo" name="review[isRecommended]" value="0"
            <?= $review && !$review->getIsRecommended() ? 'checked' : '' ?> />
    <label for="isRecommendedNo">No</label>
</div>

<div class="form-group">
    <label for="author"><strong>Your name</strong></label>
    <input required type="text" id="author" name="review[author]" value="<?= $review? $review->getAuthor() : ''?>"/>
</div>
<div class="form-group">
    <label for="email"><strong>Your email</strong></label>
    <input required type="email" id="email" name="review[email]" value="<?= $review? $review->getEmail() : '' ?>"/>
</div>



<div class="form-group">
    <label></label>
    <input type="submit" value="Submit">
</div>
