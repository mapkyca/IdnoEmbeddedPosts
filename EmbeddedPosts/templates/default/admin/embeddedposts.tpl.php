<div class="row">

    <div class="col-md-10 col-md-offset-1">
        <h1>Enbedded Posts</h1>
        <?=$this->draw('admin/menu')?>
    </div>

</div>
<div class="row">
    <div class="col-md-10 col-md-offset-1">
        <form action="/admin/embeddedposts/" class="form-horizontal" method="post">
            <div class="control-group">
                <div class="controls">
                    <p>Configure a whitelist of other Known domains for which embedded posts will be automatically activated, comma, semicolon or new line separated.</p>
                </div>
            </div>
            <div class="control-group">
		<label class="control-label" for="whitelist">Domain Whitelist</label>
		<div class="controls">
                <textarea name="whitelist"><?php 
		foreach (\Idno\Core\site()->config()->embeddedposts['whitelist'] as $line) {
		    echo htmlspecialchars($line)."\n";
		}
		?></textarea>
		</div>
            </div>
            <div class="control-group">
                <div class="controls">
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
            <?= \Idno\Core\site()->actions()->signForm('/admin/embeddedposts/')?>
        </form>
    </div>
</div>