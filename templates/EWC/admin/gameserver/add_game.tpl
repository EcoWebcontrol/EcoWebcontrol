<form class="nomargin" method="post" action="{$linker->getLink(array('section' => 'customers', 'page' => $page, 'action' => 'add'))}" enctype="application/x-www-form-urlencoded">
    <div class="modal-header">
        <a class="close" data-dismiss="modal">&times;</a>
      <h3>{$lng['gameserver']['select']['game']}</h3>
    </div>
    <div class="modal-body">
        <fieldset>
        	<select name="game">
				$gameserver
			</select>
        </fieldset>
    </div>
    <div class="modal-footer">
        <input class="btn btn-success" type="submit" value="{$lng['panel']['next']}" />
    </div>
</form>