{include file="admin/header.tpl"}
	<div id="Content" class="adminWrap">
		<section class="wrapBlock bgDamask">
			<header class="page-header">
				<h2 class="header_ttl quicksan">求人応募内容確認</h2>
			</header>
			<div class="inner Com">
				<div class="admin-contact">
					<p class="date">{$apply[0].apply_create_date|date_format:"%Y/%m/%d %H:%M"}</p>
					<div class="add-box">
						<dl>
							<dt>お名前</dt>
							<dd>{$apply[0].your_name|default:""}</dd>
						</dl>
						<dl>
							<dt>生年月日</dt>
							<dd>{$apply[0].your_year|default:""}年{$apply[0].your_month|default:""}月</dd>
						</dl>
						<dl>
							<dt>メールアドレス</dt>
							<dd>{$apply[0].your_email|default:""}</dd>
						</dl>
						<dl>
							<dt>携帯番号</dt>
							<dd>{$apply[0].your_tel|default:""}</dd>
						</dl>
						<dl>
							<dt>体入希望日</dt>
							<dd>{$apply[0].trial_month|default:""}月{$apply[0].trial_day|default:""}日</dd>
						</dl>
						<dl>
							<dt>質問内容</dt>
							<dd>{$apply[0].your_comment|nl2br|default:""}</dd>
						</dl>
						<table class="input-btn">
							<tr>
								<td class="button">
									<input type="button" onclick="history.back();" value="戻る">
								</td>
							</tr>
						</table>
					</div>
				</div>
			</div>
		</section>
	</div>
{include file="admin/footer.tpl"}
