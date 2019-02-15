<?php if (!defined('THINK_PATH')) exit();?><div class="pageContent">
	<form method="post" action="/index.php/Admin/Base/Role/insert/navTabId/listrole/callbackType/closeCurrent"  class="pageForm required-validate" 
		onsubmit="return iframeCallback(this,dialogAjaxDone);">
		<?php  ?>
		<input type="hidden" name="formstatus" value="<?php echo ($formstatus); ?>" />
		<div class="pageFormContent" layoutH="60">
			<dl>
				<dt>角色名称：</dt>
				<dd><input type="text" class="required"  style="width:100%" name="rname"/></dd>
			</dl>
			<dl>
				<dt>角色简介：</dt>
				<dd><input type="text" class="required"  style="width:100%" name="rdesc"/></dd>
			</dl>
	 
	 
			
		</div>
		
		<div class="formBar">
			<ul>
				<li><div class="buttonActive"><div class="buttonContent"><button type="submit">保存</button></div></div></li>
				<li><div class="button"><div class="buttonContent"><button type="button" class="close">取消</button></div></div></li>
			</ul>
		</div>
	</form>
</div>