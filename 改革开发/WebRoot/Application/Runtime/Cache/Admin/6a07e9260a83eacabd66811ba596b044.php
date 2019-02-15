<?php if (!defined('THINK_PATH')) exit();?><form id="pagerForm" action="/index.php/Admin/Base/Role" method="post">
	<input type="hidden" name="pageNum" value="1"/>
	<input type="hidden" name="numPerPage" value="10" />
	<input type="hidden" name="language" value="<?php echo ($_REQUEST["language"]); ?>" />
	<input type="hidden" name="account" value="<?php echo ($_REQUEST["account"]); ?>"/>
	
</form>
<div class="page">
	<div class="pageHeader">
		<form onsubmit="return navTabSearch(this);" action="/index.php/Admin/Base/Role/index" method="post">
		<input type="hidden" name="pageNum" value="1"/>
		<!-- <div class="searchBar">
			<ul class="searchContent">
				<li>
					<label>用户名：</label>
					<input type="text" name="account" value=""/>
				</li>
			</ul>
			<div class="subBar">
				<ul>
					<li><div class="buttonActive"><div class="buttonContent"><button type="submit">查询</button></div></div></li>
				</ul>
			</div>
		</div> -->
		</form>
	</div>
	
	<div class="pageContent">
		<div class="panelBar">
			<ul class="toolBar">
				<li><a class="add" href="/index.php/Admin/Base/Role/add" target="dialog" mask="true" width="500" height="400"><span>新增</span></a></li>
				<!-- <li><a class="icon" href="/Public/dwz/demo/common/dwz-team.xls" target="dwzExport" targetType="navTab" title="确实要导出这些记录吗?"><span>导出EXCEL</span></a></li> -->
				<li class="line">line</li> 
			</ul>
		</div>

		<table class="list" width="100%" layoutH="116">
			<thead>
			<tr>
				<th width="5%">编号</th>
				<th width="10%">角色名</th> 
				<th width="10%">角色介绍</th> 
				<th width="30%">操作</th>
				
			</tr>
			</thead>
			<tbody>
			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr target="sid_user" rel="<?php echo ($vo['id']); ?>">
					<td><?php echo ($vo['id']); ?></td>
					<td><?php echo ($vo['rname']); ?></td> 
					<td><?php echo ($vo['rdesc']); ?></td> 
					<td>
                      <a class="edit" href="/index.php/Admin/Base/Role/edit/id/<?php echo ($vo['id']); ?>/navTabId/listrole" target="dialog" mask="true" width="500" height="400"><span>编辑</span></a>&nbsp;&nbsp;&nbsp;&nbsp;
					   <a class="edit" href="/index.php/Admin/Base/Role/inner/id/<?php echo ($vo['id']); ?>" target="dialog" mask="true" width="500" height="400"><span>此角色下用户</span></a>&nbsp;&nbsp;&nbsp;&nbsp; 
					  <!--  <a class="edit" href="/index.php/Admin/Base/Role/ninner/id/<?php echo ($vo['id']); ?>" target="dialog" mask="true" width="500" height="400"><span>非此角色下用户&nbsp;&nbsp;&nbsp;&nbsp;</span></a>--> 
					  <a href="/index.php/Admin/Base/Role/website/rID/<?php echo ($vo["id"]); ?>" target="dialog" mask="true" width="500" height="400" rel="listwebsite-role" title="<?php echo ($vo['rname']); ?> 分配站点" ><span>分配站点</span> </a> &nbsp;&nbsp;&nbsp;&nbsp;
					  
					   <a href="/index.php/Admin/Base/Role/channel/rID/<?php echo ($vo["id"]); ?>" target="dialog" mask="true" title="<?php echo ($vo['rname']); ?> 权限设置 " width="800" height="600" ><span>栏目权限</span> </a> &nbsp;&nbsp;&nbsp;&nbsp;
						
						
					 <a class="delete" href="/index.php/Admin/Base/Role/delete/id/<?php echo ($vo['id']); ?>/navTabId/listrole" target="ajaxTodo" title="你确定要删除吗？" ><span>删除</span></a>&nbsp;&nbsp;&nbsp;&nbsp;
                    </td>
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			</tbody>
		</table>

		<div class="panelBar">
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
		</div>

	</div> 
</div>