{include file="admin/header.tpl"}
	<div id="Content" class="adminWrap">
		<section class="wrapBlock bgDamask">
			<div class="inner">
				<header class="page-header">
					<h2 class="header_ttl quicksan">
						News List<span class="ja">お知らせ一覧</span>
					</h2>
				</header>
				<div class="adminList">
					<form action="add_edit.php" METHOD="POST">
						<table class="tbl-r01">
							<tr class="thead">
								<th class="title">タイトル</th>
								<th class="thumbnail">一覧画像</th>
								<th class="editor">内容</th>
								<th class="category">カテゴリー</th>
								<th class="date">登録日時</th>
								<th class="input">変更・削除</th>
							</tr>
							{foreach from=$news item=data}
							<tr>
								<td data-label="タイトル" class="title">{$data.news_title|truncate:16|default:""}</td>
								<td data-label="一覧画像" class="thumbnail"><img src="{$smarty.const.BASE_ADMIN_NEWS_IMAGE}{$data.news_thumbnail}" alt="NEWS画像" width="80px" height="60px"></td>
								<td data-label="内容" class="editor">{$data.editor|truncate:40|default:""}</td>
								<td data-label="カテゴリー" class="category">{$data.news_category_name|default:""}</td>
								<td data-label="登録日時" class="date">{$data.news_create_date|date_format:"%Y/%m/%d"}</td>
								<td data-label="変更・削除" class="input">
									<input type="submit" name ="news_submit[{$data.id}]" value="変更" />
									<input type="submit" name ="submit_delete[{$data.id}]" value="削除" onclick="return confirm('削除確認です。\n本当に削除致しますか');"/>
								</td>
							</tr>
							{/foreach}
						</table>
					</form>
					<div class="list-pager">
						<ul class="clearFix">
							{$pager->getPreviousNavi()}{$pager->getPageNavi2()}{$pager->getNextNavi()}
						</ul>
					</div>
				</div>
			</div>
		</section>
	</div>
{include file="admin/footer.tpl"}
