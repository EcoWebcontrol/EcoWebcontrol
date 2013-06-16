<div class="modal-header" dc="dialog">
    <a class="close" data-dismiss="modal">&times;</a>
  <h3>{$lng['success']['success']}</h3>
</div>
<div class="modal-body">
    <p>$success_message</p>
    <if $redirect_url != ''>
			<br /><a class="btn" href="{$redirect_url}">{$lng['success']['clickheretocontinue']}</a>
		</if>
</div>
