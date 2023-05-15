{include file="admin/header.tpl"}
	<div id="Content" class="adminWrap">
		<section class="wrapBlock bgDamask">
			<header class="page-header">
				<h2 class="header_ttl quicksan">
					{if empty($post_edit_id)}
					News新規登録
					{else}
					Newsの編集
					{/if}
				</h2>
			</header>
			<div class="inner Com">
				<form action="" METHOD="POST" enctype="multipart/form-data">
					<div class="admin-main">
						<div class="add-box">
							<input type="hidden" name="post_edit_id" value="{$post_edit_id|default:""}" />
							<input type="hidden" name="shop_id" value="{$shopID}" />
							<dl>
								<dt>タイトル</dt>
								<dd><input type="text" class="input-text" name="news_title" value="{$news.news_title|default:""}"></dd>
							</dl>
							<dl>
								<dt>内容</dt>
								<dd><textarea id="editor" name="editor" class="ckeditor">{$news.editor|default:""}</textarea></dd>
							</dl>
						</div>
					</div>
					<aside class="admin-sidebar Com">
						<div class="side-box">
							<dl>
								<dt>一覧画像</dt>
								<dd>
									<ul>
										<li><img src="{$smarty.const.BASE_ADMIN_NEWS_IMAGE}{$news.news_thumbnail|default:""}" alt="一覧画像" width="180px" height="100px"></li>
										<li><input type="file" name="news_thumbnail" class="add-file" size="80"></li>
										<li>
											<input type='hidden' name='upd_news_thumbnail' value="{$news.news_thumbnail|default:""}" />
											<input type="checkbox" name="del_thum_flg" value="1" /><label>削除</label>
										</li>
									</ul>
								</dd>
							</dl>
						</div>
						<div class="side-box">
							<dl>
								<dt>カテゴリー</dt>
								<dd>
									<select name="news_cat" class="select_cat">
										{foreach from=$category item=val}
											<option value="{$val.id}" {if !empty($news.news_cat) && $news.news_cat == $val.id}selected{/if}>{$val.news_category_name}</option>
										{/foreach}
									</select>
								</dd>
							</dl>
						</div>
						<div class="side-box">
							<dl>
								<dt>登録・更新</dt>
								<dd>
									<ul>
										<li><input type="submit" name="return" value="戻る" /></li>
										<li>
											{if empty($post_edit_id) }
												<input type="submit" name="submit_add" value="登録する" />
											{else}
												<input type="submit" name="submit_change" value="更新する" />
											{/if}
										</li>
									</ul>
								</dd>
							</dl>
						</div>
					</aside>
				</form>
			</div>
		</section>
	</div>
<script>
CKEDITOR.replace( 'editor', {
   // Adding drag and drop image upload.
	extraPlugins: 'print,format,font,colorbutton,justify,uploadimage',
	uploadUrl: 'https://lalapaluuza-matsudo.com/admin/news/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',

	// Configure your file manager integration. This example uses CKFinder 3 for PHP.
	filebrowserBrowseUrl: 'https://lalapaluuza-matsudo.com/admin/news/ckfinder/ckfinder.html',
	filebrowserImageBrowseUrl: 'https://lalapaluuza-matsudo.com/admin/news/ckfinder/ckfinder.html?type=Images',
	filebrowserUploadUrl: 'https://lalapaluuza-matsudo.com/admin/news/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files',
	filebrowserImageUploadUrl: 'https://lalapaluuza-matsudo.com/admin/news/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Images',

	height: 560,
});
</script>
{include file="admin/footer.tpl"}
