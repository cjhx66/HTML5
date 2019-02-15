<?php if (!defined('THINK_PATH')) exit();?>
<div class="page">  
	<div class="pageContent"> 
		 
		<form action="/index.php/Admin/Base/Role/ch/navTabId/listrole/callbackType/closeCurrent" method="post" class="pageForm required-validate" 
		onsubmit="return iframeCallback(this,dialogAjaxDone);"><?php  ?>
		<div class="pageFormContent">
			<ul>
				<li><div class="buttonActive"><div class="buttonContent"><button type="submit">保存</button></div></div></li>  
				<li><div class="buttonActive"><div class="buttonContent"><button onclick="qx();return false;">选择所有</button></div></div></li>    
				 <li><div class="buttonActive"><div class="buttonContent"><button onclick="qbx();return false;">取消所有</button></div></div></li>  
			</ul>
		</div>
				
		<table class="list" width="100%" layoutH="116">
			<thead>
			<tr>
				<th width="5%">序号</th>
				<th width="10%">站点名称</th>  
				<th width="30%">站点管理</th>
				
			</tr>
			</thead>
			<tbody>
			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
					<td><?php echo ($vo['id']); ?></td>
					<td><?php echo ($vo['name']); ?></td> 
					<td><input type="checkbox" name="wID[]" value="<?php echo ($vo['id']); ?>" 
						<?php if( in_array($vo['id'],$rolelist) == true)echo 'checked'; ?>

					/></td> 
					
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			<input type="hidden" name="rID" value='<?php echo ($_REQUEST["rID"]); ?>'/>
			</tbody>
		</table>
	</form> 
	</div> 
</div>
<script>
	function qx(){
				
				var id=document.getElementsByName('wID[]');
				
				for(i=0;i<id.length;i++){

					id[i].checked=true;
				}
			} 
			function qbx(){
				
				var id=document.getElementsByName('wID[]');
				
				for(i=0;i<id.length;i++){

					id[i].checked=false;
				}
			}
</script>