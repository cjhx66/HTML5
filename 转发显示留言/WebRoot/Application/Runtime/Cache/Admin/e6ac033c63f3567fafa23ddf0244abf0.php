<?php if (!defined('THINK_PATH')) exit(); $cid = dowith_include($classID); $w = dowith_include($web); $status = dowith_include($status); $keyword = dowith_include($keyword); $account = dowith_include($account); $authid = dowith_include($authid); $veri = dowith_include($_SESSION['veri']); $lieid = dowith_include($_SESSION['lieid']); $formstatus = dowith_include($_SESSION['formstatus']); ?>
<form id="pagerForm" action="/index.php/Admin/Cms/News" method="post">
	<input type="hidden" name="pageNum" value="1"/>
	<input type="hidden" name="numPerPage" value="15" />
	<input type="hidden" name="classID" value="<?php echo ($cid); ?>" />
	<input type="hidden" name="w" value="<?php echo ($w); ?>" />
	<input type="hidden" name="status" value="<?php echo ($status); ?>" />
	<input type="hidden" name="keyword" value="<?php echo ($keyword); ?>" />
	<input type="hidden" name="account" value="<?php echo ($account); ?>" />  
	<input type="hidden" name="authid" value="<?php echo ($authid); ?>" />   
	<input type="hidden" name="veri" value="<?php echo ($veri); ?>" />   
	<input type="hidden" name="lie" value="<?php echo ($lieid); ?>" />
	<input type="hidden" name="formstatus" value="<?php echo ($formstatus); ?>" />
</form>
<div class="page">
	<div class="pageHeader">
		<form onsubmit="return navTabSearch(this);" action="/index.php/Admin/Cms/News/index" method="post">
			<input type="hidden" name="pageNum" value="1" /> 
			<input type="hidden" name="formstatus" value="<?php echo ($formstatus); ?>" />
			<div class="searchBar">
				<table class="searchContent">
					<tr>
						<td>
							<b>搜索</b> &nbsp; [标题] ：<input type="text" name="keyword" size="10" value="<?php echo ($keyword); ?>" /> 
						</td>
						<td>
							<select name="status">  
								<option value="1" <?php if($status == 1): ?>selected<?php endif; ?> >提交</option>
								<option value="2" <?php if($status == 2): ?>selected<?php endif; ?> >暂存</option> 
							</select>
						</td>
						<!--查询必带参数-->
						<input type="hidden" name="classID" value="<?php echo ($classID); ?>" />
						<input type="hidden" name="w" value="<?php echo ($web); ?>" />
						<!--查询必带参数-->

						<td>
							<div class="buttonActive"><div class="buttonContent"><button type="submit">检索</button></div></div>
						</td>
					</tr>
				</table>
			</div>
		</form>
	</div>
	
	<div class="pageContent">
		<div class="panelBar">
			<ul class="toolBar">
				<?php if(($lie["canadd"] == 1) OR ($_SESSION['adminuser']['username']== 'developer') OR ($_SESSION['adminuser']['username']== 'admin')): ?><li><a class="add" href="/index.php/Admin/Cms/News/add/classID/<?php echo ($classID); ?>/language/<?php echo ($language); ?>/navTabId/classID<?php echo ($classID); ?>" target="navTab" title="<?php echo (getnamebyclassid($classID,$classID)); ?>新增" > <span>新增</span></a></li><?php endif; ?> 
				<?php if(($lie["candel"] == 1) OR ($_SESSION['adminuser']['username']== 'developer') OR ($_SESSION['adminuser']['username']== 'admin')): ?><li><a title="确实要删除这些记录吗?" target="selectedTodo" rel="id" postType="string" href="/index.php/Admin/Cms/News/delete/classID/<?php echo ($classID); ?>/navTabId/classID<?php echo ($classID); ?>" class="delete"><span>批量删除</span></a></li><?php endif; ?>
			</ul>
		</div>

		<table class="list" width="100%" layoutH="116">
			<thead>
				<tr>
					<th width="5%"><input type="checkbox" group="id" class="checkboxCtrl"></th>
					<th width="5%">编号</th>
					<th width="30%">标题</th>
					<th width="10%">时间</th> 
					<th width="15%">浏览</th> 
					<th width="15%">状态</th> 
					<th width="30%">操作</th>
				</tr>
			</thead>
			<tbody>
				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr target="sid_user" rel="<?php echo ($vo['id']); ?>">
						<td><input name="id" value="<?php echo ($vo["id"]); ?>" type="checkbox"></td>
						<td><?php echo ($vo['id']); ?></td>
						<td><?php echo ($vo['title']); ?></td>
						<td><?php echo (date("Y-m-d",$vo['writetime'])); ?></td> 
						<td><?php echo ($vo['hits']); ?></td> 
						<td><?php if($vo["status"] == 2): ?><font color="red">暂存</font>
							<?php elseif($vo["status"] == 1): ?>
							提交<?php endif; ?></td> 
						<td>
							<?php if(($lie["canupdate"] == 1) OR ($_SESSION['adminuser']['username']== 'developer') OR ($_SESSION['adminuser']['username']== 'admin')): ?><a class="edit" href="/index.php/Admin/Cms/News/edit/id/<?php echo ($vo['id']); ?>/navTabId/classID<?php echo ($classID); ?>" target="navTab"><span>编辑</span></a>&nbsp;&nbsp;<?php endif; ?>  
							<?php if(($lie["candel"] == 1) OR ($_SESSION['adminuser']['username']== 'developer') OR ($_SESSION['adminuser']['username']== 'admin')): ?><a class="delete" href="/index.php/Admin/Cms/News/delete/id/<?php echo ($vo['id']); ?>/navTabId/classID<?php echo ($classID); ?>" target="ajaxTodo" title="你确定要删除吗？" ><span>删除</span></a><?php endif; ?>  
						</td>
					</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			</tbody>
		</table>

		<div class="panelBar">
			<div class="pages">
				<span>显示</span>
				<select class="combox" name="numPerPage" onchange="navTabPageBreak({numPerPage:this.value})">
					<option value="10" <?php if($numPerPage == 10): ?>selected<?php endif; ?> >10</option>
					<option value="15" <?php if($numPerPage == 15): ?>selected<?php endif; ?> >15</option>
					<option value="20" <?php if($numPerPage == 20): ?>selected<?php endif; ?> >20</option>
					<option value="25" <?php if($numPerPage == 25): ?>selected<?php endif; ?> >25</option>
					<option value="30" <?php if($numPerPage == 30): ?>selected<?php endif; ?> >30</option>
				</select>
				<span>共<?php echo ($totalCount); ?>条</span>
			</div>
			<div class="pagination" targetType="navTab" totalCount="<?php echo ($totalCount); ?>" numPerPage="<?php echo ($numPerPage); ?>" pageNumShown="10" currentPage="<?php echo ($currentPage); ?>"></div>
		</div> 
	</div> 
</div>