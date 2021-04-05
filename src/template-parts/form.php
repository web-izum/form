<?php
$licences = getLicense(); ?>

<section class="form-block">
    <form class="form" method="POST">
        <ul class="form__combobox combobox">
            <?
            $i = 1;
            if(!empty($licences)) :
                foreach ($licences as $licence) : ?>
                    <li class="combobox__item">
                        <label class="combobox__item-label" tabindex="<?=$i?>" data-cost="<?=$licence['cost'];?>" data-id="<?=$licence['id'];?>">
                            <input class="combobox__item-input" type="radio" name="license" value="<?=$licence['id'];?>" tabindex="<?=$i?>">
                            <b class="combobox__item-wrap">
                            <span class="combobox__item-title">
                                Licence <?=$licence['name'];?>
                            </span>
                                <span class="combobox__item-cost">
                                $<?=$licence['cost'];?> per license
                            </span>
                            </b>
                        </label>
                    </li>
                <?
                $i++;
                endforeach;
            else:
                echo '<p class="combobox__not-cont">We have nothing to offer you.</p>';
            endif; ?>
        </ul>
        <div class="form__quantity quantity">
            <label class="quantity__label">
            <b>
                Number of licenses:
            </b>
                <input class="quantity__input" type="number" name="quantity" min="1" value="1">
            </label>
        </div>
        <div class="form__footer">
            <p class="form__footer-total">
                Total: <i>$</i><span>0</span><i>us</i>
            </p>
            <p class="form__footer-btn-wrap">
                <button class="form__footer-btn" type="submit">
                    Buy now
                </button>
            </p>
            <p class="form__footer-select">
                Selected plan: <span></span>
            </p>
        </div>
    </form>
</section>
<!-- /.form-block -->
