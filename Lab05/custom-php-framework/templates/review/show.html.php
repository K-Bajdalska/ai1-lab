<?php

/** @var \App\Model\Review $review */
/** @var \App\Service\Router $router */

$title = "Review #{$review->getId()}";
$bodyClass = 'show';

ob_start(); ?>
    <h1>Review Details: #<?= $review->getId(); ?></h1>
    <article class="review-details">
        <p><strong>Reservation number:</strong><?= $review->getReservationNumber();?></p>
        <p><strong>Main Rating:</strong>
            <span class="rating"><?= str_repeat("★", $review->getMainRating()); ?></span>
        </p>
        <p><?= "\"" . $review->getMainComment() . "\""; ?></p>
        <?php if ($review->getAdvantages()): ?>
            <p class="to-right">
                <strong>➕:</strong>
                <?= $review->getAdvantages();?>
            </p>
        <?php endif; ?>
        <?php if ($review->getDisadvantages()): ?>
            <p class="to-right">
                <strong>➖:</strong>
                <?= $review->getDisadvantages();?>
            </p>
        <?php endif; ?>
        <p><strong>Hotel:</strong>
            <span class="rating"><?= str_repeat("★", $review->getHotelRating()); ?></span>
        </p>
        <?php if ($review->getHotelComment()): ?>
            <p class="to-right"><?= $review->getHotelComment();?></p>
        <?php endif; ?>
        <p><strong>Location:</strong>
            <span class="rating"><?= str_repeat("★", $review->getLocationRating()); ?></span>
        </p>
        <?php if ($review->getLocationComment()): ?>
            <p class="to-right"><?= $review->getLocationComment();?></p>
        <?php endif; ?>
        <p><strong>Value to money:</strong>
            <span class="rating"><?= str_repeat("★", $review->getValueToMoneyRating()); ?></span>
        </p>
        <?php if ($review->getValueToMoneyComment()): ?>
            <p class="to-right"><?= $review->getValueToMoneyComment();?></p>
        <?php endif; ?>
        <p>Would you recommend this trip? </p>
        <?php if ($review->getIsRecommended()): ?>
            <span>✅️</span>
        <?php else: ?>
            <span>❌</span>
        <?php endif; ?>
        <p><strong>Author:</strong><?= $review->getAuthor();?></p>
        <p><strong>Email:</strong><?= $review->getEmail();?></p>
    </article>

    <ul class="action-list">
        <li> <a href="<?= $router->generatePath('review-index') ?>">Back to list</a></li>
        <li><a href="<?= $router->generatePath('review-edit', ['id'=> $review->getId()]) ?>">Edit</a></li>
    </ul>
<?php $main = ob_get_clean();

include __DIR__ . DIRECTORY_SEPARATOR . '..' . DIRECTORY_SEPARATOR . 'base.html.php';
