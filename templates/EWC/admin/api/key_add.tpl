<div class="modal-header" dc="dialog">
    <a class="close" data-dismiss="modal">&times;</a>
  <h3>{$lng['success']['success']}</h3>
</div>
<div class="modal-body">
    <p>Neuer Schlüssel wurde hinzugefügt:</p>
    <table border="0" width="100%" cellpadding="3" cellspacing="3" class="table table-bordered table-striped">
		<tr>
			<td>{$lng['admin']['api']['open']}</td>
			<td>{$key1}</td>
		</tr>
		<tr>
			<td>{$lng['admin']['api']['open']}</td>
			<td>{$key2}</td>
		</tr>
	</table>
	<br /><a class="btn" href="{$linker->getLink(array('section' => 'api', 'page' => $page))}" rel="confirm">{$lng['success']['clickheretocontinue']}</a>
	




</div>
