<article>
	<header>
		<h2>
			{$lng['aps']['specialoptions']}
		</h2>
	</header>

	<section class="midform midformaps_1 bradiusodd">
	
		<form action="$filename" method="post" enctype="application/x-www-form-urlencoded">
			<fieldset>
			<legend>EcoWebcontrol&nbsp;-&nbsp;{$lng['aps']['specialoptions']}</legend>
			<p>
				<strong>{$lng['admin']['phpsettings']['actions']}</strong>
			</p>
			<p class="submit">
				<input type="hidden" name="s" value="$s" />
				<input type="hidden" name="action" value="$action" />
				<input type="hidden" name="page" value="$page" />
				<input type="hidden" name="save" value="save" />
				<input type="submit" name="downloadallpackages" value="{$lng['aps']['downloadallpackages']}" />
			</p>
			</fieldset>
		</form>

	</section>

</article>

