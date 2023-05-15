{include file="admin/header.tpl"}
	<div id="Content" class="adminWrap">
		<section class="wrapBlock bgDamask">
			<div class="inner">
				<header class="page-header">
					<h2 class="header_ttl quicksan">
						News<span class="ja">お知らせ</span>
					</h2>
				</header>
				<div class="adminList">
					<form action="{$smarty.const.BASE_ADMIN_NEWS}add_edit.php" METHOD="POST">
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
								<td data-label="一覧画像" class="thumbnail"><img src="{$smarty.const.BASE_ADMIN_NEWS_IMAGE}{$data.news_thumbnail}" alt="日記画像" width="80px" height="60px"></td>
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
				</div>
			</div>
			<div class="inner">
				<header class="page-header">
					<h2 class="header_ttl quicksan">
						Recruit<span class="ja">求人応募</span>
					</h2>
				</header>
				<div class="adminList">
					<form action="{$smarty.const.BASE_ADMIN_RECRUIT}apply_disp.php" METHOD="POST">
						<table class="tbl-r01">
							<tr class="thead">
								<th class="name">お名前</th>
								<th class="birthday">生年月日</th>
								<th class="mail">メールアドレス</th>
								<th class="date">体入希望日</th>
								<th class="date">送信日時</th>
								<th class="input">確認・削除</th>
							</tr>
							{foreach from=$contact item=data}
							<tr>
								<td data-label="お名前" class="name">{$data.your_name|default:""}</td>
								<td data-label="生年月日" class="birthday">{$data.your_year|default:""}年{$data.your_month|default:""}月</td>
								<td data-label="メールアドレス" class="mail">{$data.your_email|default:""}</td>
								<td data-label="体入希望日" class="date">{$data.trial_month|default:""}月{$data.trial_day|default:""}日</td>
								<td data-label="送信日時" class="date">{$data.apply_create_date|date_format:"%Y/%m/%d %H:%M"}</td>
								<td data-label="確認・削除" class="input">
									<input type="submit" name ="submit_confirm[{$data.id}]" value="確認" />
									<input type="submit" name ="submit_del[{$data.id}]" value="削除" onclick="return confirm('削除確認です。\n本当に削除致しますか');"/>
								</td>
							</tr>
							{/foreach}
						</table>
					</form>
				</div>
			</div>
		</section>
	</div>
{include file="admin/footer.tpl"}
