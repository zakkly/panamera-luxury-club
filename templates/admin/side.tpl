<aside class="admin-sidebar Com">
	<div class="side-box">
		<dl>
			<dt>一覧画像</dt>
			<dd>
				<ul>
					<li><img src="{$smarty.const.BASE_ADMIN_NEWS_IMAGE}{$news.news_thumbnail}" alt="一覧画像" width="180px" height="100px"></li>
					<li><input type="file" name="news_thumbnail" class="add-file" size="80"></li>
					<li>
						<input type='hidden' name='upd_news_thumbnail' value="{$news.news_thumbnail}" />
						<input type="checkbox" name="del_thum_flg" value="1" /><label>削除</label>
					</li>
				</ul>
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
							<input type="submit" name="news_submit_add" value="登録する" />
						{else}
							<input type="submit" class="news-submit" name="news_submit_change" value="更新する" />
						{/if}
					</li>
				</ul>
			</dd>
		</dl>
	</div>
</aside>
