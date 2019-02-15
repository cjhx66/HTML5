<?php if (!defined('THINK_PATH')) exit();?><div class="pageContent">
	<form method="post" <?php if($zilan == ''): ?>action="/index.php/Admin/Base/Class/update/navTabId/listzimodule/callbackType/closeCurrent"<?php else: ?>action="/index.php/Admin/Base/Class/set/navTabId/listzimodule/callbackType/closeCurrent"<?php endif; ?>  class="pageForm required-validate" 
		onsubmit="return validateCallback(this,dialogAjaxDone);">
		
		<?php  ?>
		<input type="hidden" name="id" value="<?php echo ($vo["id"]); ?>"/>
		<input type="hidden" name="formstatus" value="<?php echo ($formstatus); ?>" />
		<div class="pageFormContent" layoutH="60">
			<dl>
				<dt>栏目名称：</dt>
				<dd><input type="text" class="required"  style="width:100%" value="<?php echo ($vo["name"]); ?>" name="name"/></dd>
			</dl> 
			<dl>
				<dt>上级栏目：</dt> 
				
				<select id="oselect" name="pid"> 
					<option value="0" <?php if($vo["pid"] == 0): ?>selected<?php endif; ?>>请选择父级栏目</option>
					<?php echo ($option); ?> 
				</select> 
				<input type="hidden" id="asd"   style="width:100%"  value="<?php echo ($vo["path"]); ?>"  name="path"/>   
				
			</dl>
			<dl>
				<dt>栏目简介：</dt>
				<dd><input type="text" class="required"  style="width:100%" value="<?php echo ($vo["Intro"]); ?>" name="Intro"/></dd>
			</dl>
			<dl>
				<dt>网站后台地址：</dt>
				<dd><input type="text" style="width:100%"  value="<?php echo ($vo["url"]); ?>" name="url"/></dd>
			</dl>  
			<dl>
				<dt>前台显示信息：</dt>
				<dd><input type="text" class="required"  style="width:100%" value="<?php echo ($vo["view"]); ?>" name="view"/></dd>
			</dl>
			<dl>
				<dt>排序：</dt>
				<dd><input type="text" style="width:70%" value="<?php echo ($vo["orders"]); ?>" name="orders" placeholder="请填写字母" /></dd>
			</dl>
			<dl>
				<dt>是否显示：</dt>
				<dd>
					<input type="radio" name="status" value="1" <?php if($vo["status"] == 1): ?>checked<?php endif; ?> >是
					<input type="radio" name="status" value="2" <?php if($vo["status"] == 2): ?>checked<?php endif; ?> >否
				</dd>
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
<script>
	
	$("#oselect").change(function(){
		var id=$(this).children('option:selected').val();  
		if(id==0){
			$("#asd").val(0);
		}else{
			$.ajax({
				type:"POST",
				url:'/index.php/Admin/Base/Class/path',
				data:"id="+id, 
				dataType:'text',
				success:function(data){
					$("#asd").val(data+'-'+id);
					
				}
			})	
		}
	})
</script>