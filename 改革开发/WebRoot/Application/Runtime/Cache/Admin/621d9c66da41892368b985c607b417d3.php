<?php if (!defined('THINK_PATH')) exit();?><div class="pageContent">
	<form method="post" action="/index.php/Admin/Base/Website/insert/navTabId/listwebsite/callbackType/closeCurrent"  class="pageForm required-validate" 
		onsubmit="return validateCallback(this,dialogAjaxDone);">
		<?php  ?>
		<input type="hidden" name="formstatus" value="<?php echo ($formstatus); ?>" />
		<div class="pageFormContent" layoutH="60">
			<dl>
				<dt>站点名称：</dt>
				<dd><input type="text" class="required"  style="width:100%" name="name"/></dd>
			</dl>
			<dl>
				<dt>网站title：</dt>
				<dd><input type="text" class="required"  style="width:100%" name="title"/></dd>
			</dl>
			<dl>
				<dt>网页关键字：</dt>
				<dd><input type="text" class="required"  style="width:100%" name="keys"/></dd>
			</dl>
			<dl>
				<dt>网站描述：</dt>
				<dd><input type="text" class="required"  style="width:100%" name="description"/></dd>
			</dl>  
			<dl>
				<dt>版权信息：</dt>
				<dd><input type="text" class="required"  style="width:100%" name="copyright"/></dd>
			</dl>
			<dl>
				<dt>ICP备案：</dt>
				<dd><input type="text" class="required"  style="width:100%" name="ICP"/></dd>
			</dl>
			<dl>
				<dt>静态文件目录：</dt>
				<dd><input type="text" class="required"  style="width:100%" name="spath"/></dd>
			</dl>
			<dl>
				<dt>网址：</dt>
				<dd><input type="text" class="required"   style="width:100%" name="www"/></dd>
			</dl> 
			<dl style="display:none">
				<dt>时间：</dt>
				<dd><input type="text" class="required"  style="width:100%" value="<?php echo ($time); ?>" name="writetime"/></dd>
			</dl>
			<dl>
			提示：标注*的项目为必填项目。
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