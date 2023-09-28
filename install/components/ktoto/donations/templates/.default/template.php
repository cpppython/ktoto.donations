<?
/**
 * Created by Kto-to-eshe - 2023
 * @ Offers for full-time work: magicnotepad@yandex.ru
 * @ Technical support for the module, other questions: magicnotepad@gmail.com
 * @ https://www.1c-bitrix.ru/partners/18365340.php
 * @ https://kwork.ru/user/kto-to-eshe
 */

if(!defined("B_PROLOG_INCLUDED") || B_PROLOG_INCLUDED!==true)die();
?>

<form method="POST" target="_blank" action="<?if ($arResult["OPTIONS"]["MODULE_SETTINGS"]) { echo $arResult["OPTIONS"]["MODULE_SETTINGS"]; }
    else { echo GetMessage("KTOTO_DONATIONS_LINK_YM"); }?>">
    <input type="hidden" name="sum" value="<?=$arResult["OPTIONS"]["summ"]?>">
    <input type="hidden" name="successURL" value="">
    <input type="hidden" name="quickpay-form" value="small">
    <input type="hidden" name="receiver" value="<?=$arResult["OPTIONS"]["invoice_yoomoney"]?>">
    <input type="hidden" name="referer" value="<?=SITE_SERVER_NAME?>">
    <input type="hidden" name="label" value=""><input type="hidden" name="buttonText" value="text-14">
    <input type="hidden" name="buttonSize" value="M">
    <input type="hidden" name="is-inner-form" value="true">
    <div class="ThemeLocal__StyledThemeLocal-sc-1y2ad8h-0 zTGsN">
        <a href="<?=GetMessage("KTOTO_DONATIONS_LINK")?>"><img src="<?=$templateFolder."/images/icon.png"?>" width="1px" height="1px"></a>
        <button class="MuiButton-root MuiButton-contained MuiButton-containedActive MuiButton-sizeMedium MuiButton-containedSizeMedium MuiButton-disableElevation MuiButtonBase-root qa-fundraise-button enfsc3z0 mui-1wu6et2" tabindex="0" type="submit">
            <div class="MuiBox-root mui-1xtyy1x">
                <svg class="SignLogo__StyledSignLogo-sc-1tz305z-0 fKsBKL qa-fundraise-button-logo" viewBox="0 0 16 16">
                    <path d="M4.638 8.5a5.67 5.67 0 015.681-5.68A5.693 5.693 0 0116 8.5a5.693 5.693 0 01-5.68 5.682A5.67 5.67 0 014.637 8.5zm3.56 0c0 1.151.97 2.122 2.121 2.122 1.15 0 2.085-.97 2.121-2.121 0-1.15-.97-2.121-2.12-2.121-1.151 0-2.122.97-2.122 2.12zm-3.596 4.243v-8.27H0l2.589 8.27h2.013z" clip-rule="evenodd"></path>
                </svg>
            </div>
            <span class="MuiTypography-root MuiTypography-bodyM qa-fundraise-button-text mui-1pxiznv"><?=$arResult["OPTIONS"]["text"]?></span>
            <span class="MuiTypography-root MuiTypography-bodyM mui-1ffr77o">
                <span class="qa-fundraise-button-price" aria-label="<?=$arResult["OPTIONS"]["summ"]?>₽">
                    <span class="Text__StyledTextSpan-sc-9bqqn7-0 dZyMnu"><?=$arResult["OPTIONS"]["summ"]?></span>
                    <span class="Text__StyledTextSpan-sc-9bqqn7-0 dZyMnu">&nbsp;₽</span>
                </span>
            </span>
        </button>
    </div>
</form>
