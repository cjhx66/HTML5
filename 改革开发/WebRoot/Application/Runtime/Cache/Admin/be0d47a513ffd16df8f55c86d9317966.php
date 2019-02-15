<?php if (!defined('THINK_PATH')) exit();?><div class="pageContent">
	<form method="post" action="/index.php/Admin/Base/Class/insert/navTabId/listzimodule/callbackType/closeCurrent"  class="pageForm required-validate" 
	onsubmit="return validateCallback(this,dialogAjaxDone);">
	<?php  ?>
	<input type="hidden" name="formstatus" value="<?php echo ($formstatus); ?>" />
	<div class="pageFormContent" layoutH="60" >
		<dl>
			<dt>栏目名称：</dt>
			<dd><input type="text" class="required"  style="width:100%" name="name"/></dd>
		</dl> 
		<dl>
			<dt>上级栏目：</dt>
			<dd>
				<?php if($pid == 0): ?>无 <input type="hidden" class=""  style="width:100%" value="0" name="pid"/> 
					<input type="hidden" class=""  style="width:100%" value="0" name="path"/> 
					<?php else: ?>
					<?php echo ($name); ?>
					<input type="hidden" class=""  style="width:100%" value="<?php echo ($pid); ?>" name="pid"/> 
					<input type="hidden" class=""  style="width:100%" value="<?php echo ($path); ?>-<?php echo ($pid); ?>" name="path"/><?php endif; ?>
			</dd>
		</dl>
		<dl>
			<dt>栏目简介：</dt>
			<dd><input type="text" class="required"  style="width:100%" name="Intro"/></dd>
		</dl>
		
		<dl>
			<dt>网站后台地址：</dt>
			<dd><input type="text"   style="width:100%" name="url"/></dd>
		</dl>  
		<dl>
			<dt>前台显示信息：</dt>
			<dd><input type="text" class="required"  style="width:100%" name="view"/></dd>
		</dl>
		<dl>
			<dt>排序：</dt>
			<dd><input type="text" style="width:70%" value="<?php echo ($vo["orders"]); ?>" name="orders" placeholder="请填写字母" /></dd>
		</dl>
		<dl>
			<dt>是否显示：</dt>
			<dd>
				<input type="radio" name="status" value="1" checked>是
				<input type="radio" name="status" value="2">否
			</dd>
		</dl>
		<dl style="display:none">
			<dt>时间：</dt>
			<dd><input type="text" class="required"  style="width:100%" value="<?php echo ($time); ?>" name="writetime"/></dd>
			<input type="hidden" class=""  style="width:100%" value="<?php echo ($language); ?>" name="language"/> 
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