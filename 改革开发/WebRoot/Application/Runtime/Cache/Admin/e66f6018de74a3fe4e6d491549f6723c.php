<?php if (!defined('THINK_PATH')) exit();?>
<div class="page">  
	<div class="pageContent"> 
		 
		<form action="/index.php/Admin/Base/Role/chzend/navTabId/listrole/callbackType/closeCurrent" method="post" class="pageForm required-validate" 
		onsubmit="return iframeCallback(this,dialogAjaxDone);"><?php  ?>
		<div class="pageFormContent">
			<ul>
				<li><div class="buttonActive"><div class="buttonContent">保存</div></div></li>
			 			
				<li><select  id="oselect" name="wID" onsubmit="return fun();"> 
				<?php if(is_array($web)): $i = 0; $__LIST__ = $web;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$webvo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($webvo); ?>" ><?php echo (getnamebywebid($webvo,$webvo)); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
				 </select> </li>
				<!-- <li><div class="buttonActive"><div class="buttonContent"><button onclick="qx();return false;">选择所有</button></div></div></li>    
				 <li><div class="buttonActive"><div class="buttonContent"><button onclick="qbx();return false;">取消所有</button></div></div></li>   -->
			</ul>
		</div>
				
		<table class="list" width="100%" layoutH="116">
			<thead>
			<tr>
				<th width="5%">序号</th>
				<th width="10%">栏目名称</th>  
				<th width="10%">浏览</th>  
				<th width="10%">添加</th>  
				<th width="10%">删除</th>  
				<th width="10%">修改</th>   
				 
				
			</tr>
			</thead>
			<tbody id="tbody">
			<?php if(is_array($authlist)): $i = 0; $__LIST__ = $authlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="aaa">  
					<td><?php echo ($vo['id']); ?></td>
					<td><?php for($i=0;$i<$vo['count'];$i++){ echo '|—'; } ?> <?php echo (getnamebyclassid($vo['cID'],$vo['cID'])); ?></td> 
					<td><input type="checkbox" class="canview" name="canview[]" value="<?php echo ($vo['id']); ?>"  <?php if(($vo["canview"]) == "1"): ?>checked<?php endif; ?> /></td>
					<td><input type="checkbox" class="canadd" name="canadd[]"value="<?php echo ($vo['id']); ?>" <?php if(($vo["canadd"]) == "1"): ?>checked<?php endif; ?> /></td> 
					<td><input type="checkbox" class="candel" name="candel[]" value="<?php echo ($vo['id']); ?>" <?php if(($vo["candel"]) == "1"): ?>checked<?php endif; ?> /></td> 
					<td><input type="checkbox" class="canup" name="canupdate[]" value="<?php echo ($vo['id']); ?>" <?php if(($vo["canupdate"]) == "1"): ?>checked<?php endif; ?> /></td>
				</tr><?php endforeach; endif; else: echo "" ;endif; ?> 
			
			</tbody>
				<input type="hidden" id="rID" name="rID" value='<?php echo ($_REQUEST["rID"]); ?>'/>
		</table>
	</form> 
	
	</div> 
	
</div>
<script>
	 $("#oselect").change(function(){
		var id=$(this).children('option:selected').val(); 
		var rID=$("#rID").val();  
		 $("#tbody").empty();
		 $("#tbody").load("/index.php/Admin/Base/Role/load",{"id":id,"rID":rID});
	
	}) 
	 
	function qx(){ 
	
				var id=document.getElementsByTagName('checkbox');
				
				for(i=0;i<id.length;i++){

					id[i].checked=true;
				}
			} 
	function qbx(){
				
				var id=document.getElementsByTagName('checkbox');
				
				for(i=0;i<id.length;i++){

					id[i].checked=false;
				}
			}
	$(function(){
		$('.buttonContent').click(function(){
			var str = '{id:{';
			$('.aaa').each(function(){
				str += $(this).find('td').eq(0).text() + ':{';
				if($(this).find('.canview').attr('checked')){
					str += "'canview':1,";
				}else{
					str += "'canview':0,";
				}
				if($(this).find('.canadd').attr('checked')){
					str += "'canadd':1,";
				}else{
					str += "'canadd':0,";
				}
				if($(this).find('.candel').attr('checked')){
					str += "'candel':1,";
				}else{
					str += "'candel':0,";
				}
				if($(this).find('.canup').attr('checked')){
					str += "'canupdate':1}";
				}else{
					str += "'canupdate':0}";
				}
				str += ','
			})
			str = str.substr(0, str.length-1);
			str += '}}'; 
			
			str = eval('('+str+')');
			
			var url = "/index.php/Admin/Base/Role/chzend";
			
			$.post(url, str, function(data){
				if(data.status == 1){
					alert(data.msg);
				}else{
					alert(data.msg);
				}
			}, 'json')
		})
		
	})
</script>