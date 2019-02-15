<?php if (!defined('THINK_PATH')) exit();?>
<div class="page">
	<div class="pageHeader">
		<form onsubmit="return navTabSearch(this);" action="/index.php/Admin/Mcenter/DemoCs/index" method="post">
			<input type="hidden" name="pageNum" value="1" />
			<input type="hidden" name="formstatus" value="<?php echo ($formstatus); ?>" /> 
			<div class="searchBar">
				<table class="searchContent">
					<tr>
						<td>
							<b>搜索</b> &nbsp; [电话] ： <input type="text" name="keyword" size="10" value="<?php echo ($keyword); ?>" /> 
						</td>
						<!--<td>
							<select name="status">
								<option value="">选择状态</option> 
								<option value="1" <?php if($status == 1): ?>selected<?php endif; ?> >正常</option>
								<option value="2" <?php if($status == 2): ?>selected<?php endif; ?> >锁定</option> 
							</select>
						</td> -->
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
			 <?php if(($lie["canadd"] == 1) OR ($_SESSION['adminuser']['username']== 'developer') OR ($_SESSION['adminuser']['username']== 'admin')): ?><li><a class="add" title="将数据导出为Excel表格" href="/index.php/Admin/Mcenter/DemoCs/excel"> <span>导出Excel</span></a></li><?php endif; ?> 
				<?php if(($lie["candel"] == 1) OR ($_SESSION['adminuser']['username']== 'developer') OR ($_SESSION['adminuser']['username']== 'admin')): ?><li><a title="确实要删除这些记录吗?" target="selectedTodo" rel="id" postType="string" href="/index.php/Admin/Mcenter/DemoCs/delete" class="delete"><span>批量删除</span></a></li><?php endif; ?> 
		</ul>
	</div>

	<table class="list" width="100%" layoutH="116">
		<thead>
			<tr>
				<th width="5%"><input type="checkbox"   group="id" class="checkboxCtrl"></th>
				<th width="5%">编号</th>
				<th width="15%">用户名</th>
				<th width="15%">电话</th>  
				<th width="15%">来源</th>
			    <th width="20%">报名时间</th>
				<!-- <th width="20%">操作</th> -->
				
			</tr>
		</thead>
		<tbody>
			<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr target="sid_user" rel="<?php echo ($vo['id']); ?>">
					<td><input name="id" value="<?php echo ($vo["id"]); ?>" type="checkbox"></td>
					<td class="<?php echo ($vo["id"]); ?>"><?php echo ($vo['id']); ?></td>
					<td><?php echo ($vo['name']); ?></td>
					
				<!-- 	<?php if($vo["classID"] == 2): ?><td>腾讯新闻APP</td>
								<?php elseif($vo["classID"] == 1): ?>
								<td>天天快报APP</td>
								<?php elseif($vo["classID"] == ''): ?>
								<td></td><?php endif; ?> -->
					<!-- <td><?php echo ($vo['email']); ?></td> -->
					<td><?php echo ($vo['phone']); ?></td>  
					<td><?php echo ($vo['source']); ?></td>  
					<td><?php echo (date("Y-m-d H:i:s",$vo['writetime'])); ?></td>  
					<!-- <td name="<?php echo ($vo["status"]); ?>">
						<a href="javascript:;" class="status">
							<?php if($vo["status"] == 2): ?><span id="span_<?php echo ($vo["id"]); ?>"><font color="red">锁定</font></span>
								<?php elseif($vo["status"] == 1): ?>
								<span id="span_<?php echo ($vo["id"]); ?>">正常</span><?php endif; ?>
						</a>
					</td> -->
					<td>
						<!-- <?php if(($lie["canupdate"] == 1) OR ($_SESSION['adminuser']['username']== 'developer') OR ($_SESSION['adminuser']['username']== 'admin')): ?><a class="edit" href="/index.php/Admin/Mcenter/Changanthbm/edit/id/<?php echo ($vo['id']); ?>/classID/<?php echo ($classID); ?>/navTabId/classID<?php echo ($classID); ?>" target="navTab"><span>查看</span></a>&nbsp;&nbsp;<?php endif; ?>   -->
						<!-- <?php if(($lie["canview"] == 1) OR ($_SESSION['adminuser']['username']== 'developer') OR ($_SESSION['adminuser']['username']== 'admin')): ?><a class="edit" href="/index.php/Admin/Mcenter/Changanthbm/mydeal/id/<?php echo ($vo['id']); ?>/classID/<?php echo ($classID); ?>/language/<?php echo ($language); ?>/navTabId/classID<?php echo ($classID); ?>" target="navTab"><span>订单</span></a><?php endif; ?>   -->
					<!-- <?php if(($lie["candel"] == 1) OR ($_SESSION['adminuser']['username']== 'developer') OR ($_SESSION['adminuser']['username']== 'admin')): ?><a class="delete" href="/index.php/Admin/Mcenter/Index/delete/id/<?php echo ($vo['id']); ?>/navTabId/classID<?php echo ($classID); ?>" target="ajaxTodo" title="你确定要删除吗？" ><span>删除</span></a><?php endif; ?>  --> 
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

<script>
	$(".status").click(function(){
		var status = $(this).parent('td').attr("name");
		var id = $(this).parent('td').siblings("td[class]").attr('class');

		$.get('/index.php/Admin/Mcenter/Index/changeStatus', {'status':status, 'id':id}, function(data){

			if(data == '正确'){			

				var spanHTML = $('#span_'+id).html();				
				if(spanHTML == '正常'){
					$('#span_'+id).html('锁定');
				}else{
					$('#span_'+id).html('正常');
				}

				if(status == 1){
					$('#span_'+id).parent('a').parent('td').attr("name", 2);
				}else{
					$('#span_'+id).parent('a').parent('td').attr("name", 1);
				}
			}
		});
	})
</script>