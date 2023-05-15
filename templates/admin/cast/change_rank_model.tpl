{include file="admin/header.tpl"}
	<div id="Content" class="adminWrap">
		<section class="wrapBlock bgDamask">
			<div class="inner">
				<header class="page-header">
					<h2 class="header_ttl quicksan">
						Cast List<span class="ja">キャスト並び替え</span>
					</h2>
					<div class="add-link-box">
						<ul>
							<li>
								<span class="add_link">
									<a href="{$smarty.const.BASE_ADMIN_CAST}">キャスト一覧</a>
								</span>
							</li>
						</ul>
					</div>
				</header>
				<div class="adminList">
					<form action="" method="POST" enctype="multipart/form-data">
						<ul class="sortable_cast Com">
							{foreach from=$cast item=val}
							<li id="{$val.cast_id}" class="list_item">
								<img src="{$smarty.const.BASE_ADMIN_CAST_IMAGE}{$val.cast_thumbnail}" width="191px" height="287px">
								{$val.cast_name}
								<input type="hidden" name="rank_cast_id[{$val.cast_id}]" value="{$val.cast_id}" />
							</li>
							{/foreach}
						</ul>
						<ul class="input-btn">
							<li class="button">
								<input type="hidden" id="result_cast" name="result_cast" />
								<input type="hidden" name="submit_change[cast]" value="変更する" />
								<input type="submit" id="submit_cast" name="submit_change[cast]" value="変更する" onclick="return confirm('モデルの並び替えを致します\n本当に宜しいですか。');" />
							</li>
						</ul>
					</form>
				</div>
			</div>
		</section>
	</div>
{include file="admin/footer.tpl"}
