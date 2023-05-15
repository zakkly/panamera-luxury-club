{include file="admin/header.tpl"}
	<div id="Content" class="adminWrap">
		<section class="wrapBlock bgDamask">
			<header class="page-header">
				<h2 class="header_ttl quicksan">
					Newsカテゴリー
				</h2>
			</header>
			<div class="inner Com">
				<div class="add-category">
					<h3>新規カテゴリー登録</h3>
					<form action="" METHOD="POST" enctype="multipart/form-data">
						<input type="hidden" name="shop_id" value="{$shopID}" />
						<span style="color:red;">
							<br />
							{foreach from=$error item=err}
								※{$err}<br />
							{/foreach}
							{$msg|default:""}
						</span>
						<div class="add-box">
							<dl>
								<dt>カテゴリー名</dt>
								<dd><input type="text" class="input-text" name="news_category_name" value=""></dd>
							</dl>
							<dl>
								<dt>色</dt>
								<dd><input type="color" class="input-color" name="news_category_color" value=""></dd>
							</dl>
							<ul class="input-btn">
								<li class="button">
									<input type="submit" name="submit_add" value="登録する" />
								</li>
							</ul>
						</div>
					</form>
				</div>
				<div class="adminList list-category">
					<h3>カテゴリーリスト</h3>
					<form action="" METHOD="POST" enctype="multipart/form-data">
						<span style="color:red;">
							<br />
							{foreach from=$error2 item=err}
								※{$err}<br />
							{/foreach}
							{$msg2|default:""}
						</span>
						<table class="tbl-r01">
							<tr class="thead">
								<th class="title">カテゴリー名</th>
								<th class="color">色</th>
								<th class="input">変更・削除</th>
							</tr>
							{foreach from=$category item=val}
							<tr>
								<td data-label="カテゴリー名" class="title"><input type="text" class="input-text" name="news_category_name[]" value="{$val.news_category_name|default:""}"></td>
								<td data-label="色" class="color"><input type="color" class="input-color" name="news_category_color[]" value="{$val.news_category_color|default:"#b7b7b7"}"></td>
								<td data-label="変更・削除" class="input">
									<input type="hidden" name="newsCategoryID[]" value="{$val.id}" />
									<input type="checkbox" name ="news_category_delete[]" value="{$val.id}" />
								</td>
							</tr>
							{/foreach}
						</table>
						<table class="input-btn">
							<tr>
								<td class="button">
									<input type="submit" name ="changeNewsCategory" value="変更" />
								</td>
							</tr>
						</table>
					</form>
				</div>
			</div>
		</section>
	</div>
{include file="admin/footer.tpl"}
