{assign var="page_title" value="##Payment Error##"}
{include file="header.inc.tpl"}

<h1 class="notice">{$page_title|escape}</h1>

<p>##We were unable to process your order.##</p>

<p><strong>{$reason|escape}</strong></p>

<p>##Please reference ID number## <strong>{$smarty.session.payment_id}</strong> ##if you need to contact us about this transaction.##</p>

<p>
  <a href="{url|escape href="/get_pixels.php"}?step=6">##Choose Another Payment Method##</a> |
  <a href="{url|escape href="/index.php"}">##Return to Home Page##</a>
</p>

{include file="footer.inc.tpl"}
