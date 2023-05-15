{include file="admin/header.tpl"}
	<div id="Content" class="adminWrap">
		<section class="wrapBlock bgDamask">
			<div class="inner">
				<header class="page-header">
					<h2 class="header_ttl quicksan">
						Cast List<span class="ja">キャスト一覧</span>
					</h2>
					<div class="add-link-box">
						<ul>
							<li>
								<span class="add_link">
									<a href="{$smarty.const.BASE_ADMIN_CAST}change_rank_model.php">女の子並び替え</a>
								</span>
							</li>
						</ul>
					</div>
				</header>
				<div class="adminList">
					<form action="add_edit.php" METHOD="POST">
						<ul class="Com">
							{foreach from=$cast item=data}
							<li class="list_item">
								<dl>
									<dt><img src="{$smarty.const.BASE_ADMIN_CAST_IMAGE}{$data.cast_thumbnail}" width="191px" height="287px"></dt>
									<dd>
										<input type="submit" name ="cast_submit[{$data.id}]" value="変更" />
										<input type="submit" name ="submit_delete[{$data.id}]" value="削除" onclick="return confirm('削除確認です。\n本当に削除致しますか');"/>
									</dd>
								</dl>
							</li>
							{/foreach}
						</ul>
					</form>
				</div>
			</div>
		</section>
	</div>
{include file="admin/footer.tpl"}
