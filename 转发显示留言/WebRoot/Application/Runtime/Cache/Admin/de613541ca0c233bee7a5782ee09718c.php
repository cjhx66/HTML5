<?php if (!defined('THINK_PATH')) exit();?><div class="pageContent">
	<form method="post" action="/index.php/Admin/Base/Users/insert/navTabId/listusers/callbackType/closeCurrent"   class="pageForm required-validate" 
		onsubmit="return iframeCallback(this,dialogAjaxDone);">
		<?php  ?>
		<input type="hidden" name="formstatus" value="<?php echo ($formstatus); ?>" />
		<div class="pageFormContent" layoutH="60">
			<dl>
				<dt>用户账号：</dt>
				<dd><input type="text" class="required"  style="width:100%" name="username"/></dd>
			</dl>
			<dl>
				<dt>真实姓名：</dt>
				<dd><input type="text" class="required"  style="width:100%" name="realname"/></dd>
			</dl>
			<dl>
				<dt>用户密码：</dt>
				<dd><input type="password" class="required"  style="width:100%" name="password"/></dd>
			</dl>
			<dl>
				<dt>所属公司：</dt>
				<dd><input type="text" class="required"  style="width:100%" name="company"/></dd>
			</dl>
			<dl>
				<dt>所属部门：</dt>
				<dd><input type="text" class="required"  style="width:100%" name="depart"/></dd>
			</dl>
			<input type="hidden" class="required"  style="width:100%" value="<?php echo ($time); ?>" name="writetime"/>
			<dl>
				<dt>选择角色：</dt> 
				<dd>
					<select id="oselect" name="rID"  > 
				 		<option value="0">请选择角色</option> 
						<?php echo ($option); ?>
					</select> 
				</dd>  
			</dl>
			<dl>
				<dt>默认站点：</dt> 
				<dd id="dl"> 
				</dd> 
			</dl> 
		</div> 
		<div class="formBar">
			<ul>
				<li><div class="buttonActive"><div class="buttonContent"><button type="submit" onclick="return mycheck();">保存</button></div></div></li>
				<li><div class="button"><div class="buttonContent"><button type="button" class="close">取消</button></div></div></li>
			</ul>
		</div>
	</form>
</div>
<script>  
function mycheck(){
	var id=$("#oselect").children('option:selected').val(); 			
	//alert(id);
	if(id==0){
	 alert('请选择角色');
	 return false;
	}
}
	
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