<?php if (!defined('THINK_PATH')) exit();?><form id="pagerForm" action="/index.php/Admin/Base/Class" method="post">
	<input type="hidden" name="pageNum" value="1"/>
	<input type="hidden" name="numPerPage" value="1000" />
	<input type="hidden" name="language" value="<?php echo ($_REQUEST["language"]); ?>" />
	<input type="hidden" name="account" value="<?php echo ($_REQUEST["account"]); ?>"/>
	
</form>
<div class="page">
	<div class="pageHeader">
		<form onsubmit="return navTabSearch(this);" action="/index.php/Admin/Base/Class/index" method="post">
			<input type="hidden" name="pageNum" value="1"/>
			<input type="hidden" name="formstatus" value="<?php echo ($formstatus); ?>" />
		</form>
	</div>
	
	<div class="pageContent">
		<div class="panelBar">
			<ul class="toolBar">
				<?php if($_SESSION['adminuser']['username']== 'developer'): ?><li><a class="add" href="/index.php/Admin/Base/Class/add/language/<?php echo ($_REQUEST["language"]); ?>/pid/0" target="dialog" mask="true" width="600" height="500"><span>新增栏目</span></a></li><?php endif; ?>
			</ul>
		</div>

		<table class="list" width="100%" layoutH="116">
			<thead>
			<tr>
				<th width="5%">编号</th>
				<th width="10%">栏目名称</th>
				<th width="10%">后台栏目地址</th> 
				<th width="15%">创建时间</th> 
				<?php if($_SESSION['adminuser']['username']== 'developer'): ?><th width="30%">操作</th><?php endif; ?>
				
			</tr>
			</thead>
			<tbody>
			<?php if(is_array($lang)): $i = 0; $__LIST__ = $lang;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr target="sid_user" rel="<?php echo ($vo['id']); ?>">
					<td><?php echo ($vo['id']); ?></td>
					
					<td><?php for($i=0;$i<$vo['count'];$i++){ echo '|—'; } ?> 
						<?php echo ($vo["name"]); ?></td>
					
					<td><?php echo ($vo['url']); ?></td> 
					<td><?php echo (date("Y-m-d",$vo['writetime'])); ?></td> 
					<?php if($_SESSION['adminuser']['username']== 'developer'): ?><td>
                      <a class="edit" href="/index.php/Admin/Base/Class/edit/id/<?php echo ($vo['id']); ?>/language/<?php echo ($_REQUEST["language"]); ?>" target="dialog" mask="true" width="500" height="400"><span>编辑</span></a>&nbsp;&nbsp; 
					  <a class="edit" href="/index.php/Admin/Base/Class/add/language/<?php echo ($_REQUEST["language"]); ?>/pid/<?php echo ($vo["id"]); ?>/name/<?php echo ($vo["name"]); ?>" target="dialog" mask="true" width="600" height="500"><span>添加子栏目</span></a>&nbsp;&nbsp;  
                      <a class="delete" href="/index.php/Admin/Base/Class/delete/id/<?php echo ($vo['id']); ?>/navTabId/listzimodule" target="ajaxTodo" title="你确定要删除吗？" ><span>删除</span></a>
                    </td><?php endif; ?>
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			</tbody>
		</table>

		<!-- <div class="panelBar">
			<div class="pages">
				<span>显示</span>
			<select class="combox" name="numPerPage" onchange="navTabPageBreak({numPerPage:this.value})">
				<option value="10" {if condition="$numPerPage eq 10"}selected{/if}>10</option>
				<option value="15" {if condition="$numPerPage eq 15"}selected{/if}>15</option>
				<option value="20" {if condition="$numPerPage eq 20"}selected{/if}>20</option>
				<option value="25" {if condition="$numPerPage eq 25"}selected{/if}>25</option>
				<option value="30" {if condition="$numPerPage eq 30"}selected{/if}>30</option>
			</select>
				<span>共<?php echo ($totalCount); ?>条</span>
			</div>
			<div class="pagination" targetType="navTab" totalCount="<?php echo ($totalCount); ?>" numPerPage="<?php echo ($numPerPage); ?>" pageNumShown="10" currentPage="<?php echo ($currentPage); ?>"></div>
		</div>  -->
	</div> 
</div>