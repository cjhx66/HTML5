<?php if (!defined('THINK_PATH')) exit();?><div class="pageContent">
	<form method="post" action="/index.php/Admin/Base/Users/update/navTabId/listusers/callbackType/closeCurrent"  class="pageForm required-validate" 
		onsubmit="return validateCallback(this,dialogAjaxDone);">
		<?php  ?>
		<input type="hidden" name="formstatus" value="<?php echo ($formstatus); ?>" />
		<input type="hidden" name="id" value="<?php echo ($vo["id"]); ?>"/>
		<div class="pageFormContent" layoutH="60">
				<dl>
				<dt>用户账号：</dt>
				<dd><input type="text" class="required"  style="width:100%" value="<?php echo ($vo["username"]); ?>" name="username"/></dd>
			</dl>
			<dl>
				<dt>真实姓名：</dt>
				<dd><input type="text" class="required"  style="width:100%" value="<?php echo ($vo["realname"]); ?>" name="realname"/></dd>
			</dl> 
			<dl>
				<dt>所属公司：</dt>
				<dd><input type="text" class="required"  style="width:100%" value="<?php echo ($vo["company"]); ?>" name="company"/></dd>
			</dl>
			<dl>
				<dt>所属部门：</dt>
				<dd><input type="text" class="required"  style="width:100%" value="<?php echo ($vo["depart"]); ?>" name="depart"/></dd>
			</dl> 
			<dl>
				<dt>选择角色：</dt>
					<select id="oselect" name="rID"  > 
				 		<option value="0">请选择角色</option> 
						<?php echo ($option); ?>
					</select> 
				<dd>
				</dd> 
			</dl>
			<dl>
				<dt>默认站点：</dt> 
				<dd id="dl"> 
				<?php if($vo["defaultw"] != 0): ?><input checked type="radio" name="defaultw" value="<?php echo ($vo["defaultw"]); ?>"/>
					<?php echo (getnamebywebid($vo['defaultw'],$vo['defaultw'])); endif; ?>	
					
				</dd> 
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
	//alert(id);  
	if(id==0){
		 alert('请选择角色');
		 return false;
	}else{
		$.ajax({
			type:"POST",
			url:'/index.php/Admin/Base/Users/path',
			data:"id="+id, 
			dataType:'text',
			success:function(data){ 
				$('#dl').empty();
				$("#dl").append(data);
			}
		})	
	}
	})
</script>