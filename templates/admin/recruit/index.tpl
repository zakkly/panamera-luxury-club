{include file="admin/header.tpl"}
	<div id="Content" class="adminWrap">
		<section class="wrapBlock bgDamask">
			<div class="inner">
				<header class="page-header">
					<h2 class="header_ttl quicksan">
						Recruit List<span class="ja">求人応募一覧</span>
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
							{foreach from=$apply item=data}
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
