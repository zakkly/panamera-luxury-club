{include file="header.tpl"}
	<div id="Content" class="pageWrap">
		<section class="ApplyWrap wrapBlock">
			<header class="caption-header">
				<div class="header-inner">
					<img class="pc_img" src="{$smarty.const.BASE_IMAGE}recruit_paget_view.jpg" alt="{$smarty.const.BASE_ALT}応募する" title="" width="1920" height="660" />
					<img class="sp_img" src="{$smarty.const.BASE_IMAGE}sp_recruit_paget_view.jpg" alt="{$smarty.const.BASE_ALT}応募する" title="" width="640" height="480" />
					<h2 class="header_ttl quicksan">
						Apply<span class="ja">応募する</span>
					</h2>
				</div>
			</header>
			<div class="ApplyFormWrap">
				<div class="inner">
					<div class="textWrap">
						<p class="comment">
							下記フォームにご記入いただき、確認画面へボタンを押してください。
						</p>
					</div>
					<span class="msg" style="color:red;">
						{foreach from=$error item=err}
						※{$err}<br />
						{/foreach}
						{$msg|default:""}
					</span>
					<form action="" method="POST">
						<table class="tbl-r01">
							<tr>
								<th class="th_table">お名前<span class="notation">必須</span></th>
								<td class="td_table"><input type="text" class="input-text" name="your_name" size="30" value="{$smarty.post.your_name|default:""}"></td>
							</tr>
							<tr>
								<th class="th_table">生年月日<span class="notation">必須</span></th>
								<td class="td_table">
									<ul class="Com">
										<li><input type="text" class="s-text" name="your_year" size="30" value="{$smarty.post.your_year|default:""}"><span class="ja">年</span></li>
										<li><input type="text" class="s-text" name="your_month" size="30" value="{$smarty.post.your_month|default:""}"><span class="ja">月</span></li>
									</ul>
								</td>
							</tr>
							<tr>
								<th class="th_table">メールアドレス<span class="notation">必須</span></th>
								<td class="td_table"><input type="text" class="input-text" name="your_email" size="30" value="{$smarty.post.your_email|default:""}"></td>
							</tr>
							<tr>
								<th class="th_table">携帯番号<span class="notation">必須</span></th>
								<td class="td_table">
									<input type="text" class="input-text" name="your_tel" size="30" value="{$smarty.post.your_tel|default:""}">
									<span>※半角数字</span>
								</td>
							</tr>
							<tr>
								<th class="th_table">面接希望日<span class="notation">必須</span></th>
								<td class="td_table">
									日付：<input type="text" name="date" id="datepicker" class="date-text" value="{$post.date|default:""}">
								</td>
							</tr>
							<tr>
								<th class="th_table">質問内容</th>
								<td class="td_table">
									<textarea name="your_comment" cols="60" rows="5">{$smarty.post.your_comment|default:""}</textarea>
									<p>※何でも気軽にご質問ください</p>
								</td>
							</tr>
						</table>
						<div class="SubmitBtn">
							<ul>
								<li class="button">
									<input type="submit" name="contact_add" value="送信する">
								</li>
							</ul>
						</div>
					</form>
				</div>
			</div>
		</section>
	</div>
{include file="footer.tpl"}
