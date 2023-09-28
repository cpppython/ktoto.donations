<?
/**
 * Created by Kto-to-eshe - 2023
 * @ Offers for full-time work: magicnotepad@yandex.ru
 * @ Technical support for the module, other questions: magicnotepad@gmail.com
 * @ https://www.1c-bitrix.ru/partners/18365340.php
 * @ https://kwork.ru/user/kto-to-eshe
 */

use Bitrix\Main\Loader;

Loader::includeModule("ktoto.donations");

$aTabs = [
    [
        "DIV" => "template", 
        "TAB" => GetMessage("KTOTO_DONATIONS_TAB_NAME_OPTIONS")
    ],
];
$tabControl = new \CAdminTabControl("tabControl", $aTabs);

if ($_REQUEST["action"] == "save") {
    \Ktoto\Donations\Options::setAll($_REQUEST["params"]);
}

$options = \Ktoto\Donations\Options::getAll();
?>

<form method="post"
    action="<?=$APPLICATION->GetCurPage(false)?>?mid=<?=htmlspecialcharsbx($mid)?>&lang=<?=LANGUAGE_ID?>"
    name="post_form">
    <?=bitrix_sessid_post()?>
    <input type="hidden" name="action" value="save">

    <?
    $tabControl->Begin();
    $tabControl->BeginNextTab();
    ?>

    <tr class="heading">
        <td colspan="2"><?=GetMessage("KTOTO_DONATIONS_COMPONENT_VIEW")?></td>
    </tr>
    <tr>
        <td width="40%"><?=GetMessage("KTOTO_DONATIONS_TEXT_ON_BUTTON_TITLE")?></td>
        <td width="60%">
            <input type="text" name="params[text]" size="50" value="<?=$options["text"]?>"
                placeholder="<?=GetMessage("KTOTO_DONATIONS_TEXT_ON_BUTTON")?>">
        </td>
    </tr>
    <tr>
        <td width="40%"><?=GetMessage("KTOTO_DONATIONS_SUMM_TITLE")?></td>
        <td width="60%">
            <input type="text" name="params[summ]" size="50" value="<?=$options["summ"]?>"
                placeholder="<?=GetMessage("KTOTO_DONATIONS_SUMM")?>">
        </td>
    </tr>
    <tr class="heading">
        <td colspan="2"><?=GetMessage("KTOTO_DONATIONS_PAYSYSTEM_NAME_YM")?></td>
    </tr>
    <tr>
        <td width="40%"><?=GetMessage("KTOTO_DONATIONS_NUM_INVOICE_TITLE")?></td>
        <td width="60%">
            <input type="text" name="params[invoice_yoomoney]" size="50" value="<?=$options["invoice_yoomoney"]?>"
                placeholder="<?=GetMessage("KTOTO_DONATIONS_NUM_INVOICE_EXAMPLE_YM")?>">
        </td>
    </tr>

    <?
    $tabControl->Buttons([
        "disabled" => false,
        "back_url" => false,
    ]);
    $tabControl->End();
    ?>
</form>