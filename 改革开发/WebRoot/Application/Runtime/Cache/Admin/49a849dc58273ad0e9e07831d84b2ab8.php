<?php if (!defined('THINK_PATH')) exit();?> 
<div class="page">
 
	<div class="pageContent">
	  
		<table class="list" width="100%" layoutH="116">
			<thead>
			<tr>
				<th width="15%">编号</th>
				<th width="15%">用户名</th> 
				<th width="15%">真实姓名</th> 
				<th width="25%">备注</th>
				
			</tr>
			</thead>
			<tbody>
			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
					<td><?php echo ($vo['id']); ?></td>
					<td><?php echo ($vo['username']); ?></td> 
					<td><?php echo ($vo['realname']); ?></td> 
					<td><?php echo ($vo['desc']); ?></td>
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			</tbody>
		</table> 
		
	</div> 
</div>