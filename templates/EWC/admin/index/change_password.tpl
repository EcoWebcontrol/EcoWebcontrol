$header
	<article>
		<header>
			<h2>
				{$lng['menue']['main']['changepassword']}
			</h2>
		</header>

		<section class="fullform bradiusodd">
			<form rel="submit" class="nomargin" method="post" action="{$linker->getLink(array('section' => 'index'))}" enctype="application/x-www-form-urlencoded">
		    <input type="hidden" name="s" value="$s" />
		    <input type="hidden" name="page" value="$page" />
		    <input type="hidden" name="send" value="send" />		
				<fieldset>
                
					<table class="table table-bordered table-striped">
						<tr><td class="formlabeltd">
						<label for="old_password">{$lng['changepassword']['old_password']}:</label>
						</td><td>
						<input type="password" id="old_password" name="old_password" class="span5"/>
						</td></tr>
						
						<tr><td class="formlabeltd">
						<label for="new_password">{$lng['changepassword']['new_password']}:</label>
						</td><td>
						<input type="password" id="new_password" name="new_password" class="span5"/>
						</td></tr>
						
						<tr><td class="formlabeltd">
						<label for="new_password_confirm">{$lng['changepassword']['new_password_confirm']}:</label>
						</td><td>
						<input type="password" id="new_password_confirm" name="new_password_confirm"class="span5"/>
						</td></tr>
						<tr>
						<td style="text-align:right;" colspan="2">
							<input class="btn btn-success" type="submit" value="{$lng['menue']['main']['changepassword']}" />
	        				<a class="btn" data-dismiss="modal">{$lng['panel']['abort']}</a>
						</td></tr>
					</table>
				</fieldset>
			</form>

		</section>

	</article>
$footer